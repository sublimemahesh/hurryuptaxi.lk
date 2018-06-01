<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-commission'])) {

    $COMMISSION = New Commission(NULL);
    $VALID = new Validator();

    $COMMISSION->date = $_POST['date'];
    $COMMISSION->paid_for = $_POST['paid_for'];
    $COMMISSION->paid_to = $_POST['paid_to'];
    $COMMISSION->commission_amount = $_POST['commission_amount'];
    $COMMISSION->bank = $_POST['bank'];
    $COMMISSION->payment_reference = $_POST['payment_reference'];
    $COMMISSION->other_comment = $_POST['other_comment'];


    $VALID->check($COMMISSION, [
        'date' => ['required' => TRUE],
        'paid_for' => ['required' => TRUE],
        'paid_to' => ['required' => TRUE],
        'commission_amount' => ['required' => TRUE],
        'bank' => ['required' => TRUE],
        'payment_reference' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $RESULT = $COMMISSION->create();
        if ($RESULT) {
            $USER = New User(NULL);
            $USER->id = $RESULT->paid_for;
            $USER->isComPaid = 1;
            $USER->setisComPaidTrue();
        }

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ../manage-commission.php');
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-commission'])) {

    $COMMISSION = New Commission($_POST['id']);
    $VALID = new Validator();

    $COMMISSION->user = $_POST['user'];
    $COMMISSION->parent = $_POST['parent'];
    $COMMISSION->bank = $_POST['bank'];
    $COMMISSION->payment_reference = $_POST['payment_reference'];
    $COMMISSION->other_comment = $_POST['other_comment'];

    $VALID->check($COMMISSION, [
        'user' => ['required' => TRUE],
        'parent' => ['required' => TRUE],
        'other_comment' => ['required' => TRUE],
        'bank' => ['required' => TRUE],
        'payment_reference' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $COMMISSION->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}



