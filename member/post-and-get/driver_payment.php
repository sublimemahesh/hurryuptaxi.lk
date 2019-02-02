<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['create'])) {

    $DRIVER_PAYMENT = New DriverPayment(NULL);
    $VALID = new Validator();

    $DRIVER_PAYMENT->driver = $_POST['driver'];
    $DRIVER_PAYMENT->date_time = $_POST['date_time'];
    $DRIVER_PAYMENT->price = $_POST['price'];
    $DRIVER_PAYMENT->status = 'paid';

    $VALID->check($DRIVER_PAYMENT, [
        'price' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $DRIVER_PAYMENT->create();

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

if (isset($_POST['update'])) {

    $DRIVER_PAYMENT = New DriverPayment($_POST['id']);
    $VALID = new Validator();

    $DRIVER_PAYMENT->driver = $_POST['driver'];
    $DRIVER_PAYMENT->date_time = $_POST['date_time'];
    $DRIVER_PAYMENT->price = $_POST['price'];
    $DRIVER_PAYMENT->status = $_POST['status'];

    $VALID->check($DRIVER_PAYMENT, [
        'price' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $DRIVER_PAYMENT->update();

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

if (isset($_POST['save-arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $DRIVER_PAYMENT = City::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

