<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-commission'])) {

    $COMMISSION = New Commission(NULL);
    $VALID = new Validator();

    $COMMISSION->id = $_POST['id'];
    $COMMISSION->user = $_POST['user'];
    $COMMISSION->parent = $_POST['parent'];
    $COMMISSION->date = $_POST['date'];
    $COMMISSION->bank = $_POST['bank'];
    $COMMISSION->payment_reference = $_POST['payment_reference'];
    $COMMISSION->other_comment = $_POST['other_comment'];


    $VALID->check($COMMISSION, [
        'user' => ['required' => TRUE],
        'other_comment' => ['required' => TRUE],
        'bank' => ['required' => TRUE],
        'payment_reference' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $COMMISSION->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
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



