<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-driver'])) {

    $DRIVER = New Driver(NULL);
    $VALID = new Validator();

    $DRIVER->id = $_POST['id'];
    $DRIVER->user = $_POST['user'];
    $DRIVER->name = $_POST['name'];
    $DRIVER->contact_no = $_POST['contact_no'];
    $DRIVER->district = $_POST['district'];
    $DRIVER->city = $_POST['city'];
    $DRIVER->address = $_POST['address'];
    $DRIVER->vehicle_number = $_POST['vehicle_number'];
    $DRIVER->nic_number = $_POST['nic_number'];

    $VALID->check($DRIVER, [
        'name' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'vehicle_number' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $DRIVER->create();

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

if (isset($_POST['edit-driver'])) {

    $DRIVER = New Driver($_POST['id']);
    $VALID = new Validator();

    $DRIVER->user = $_POST['user'];
    $DRIVER->name = $_POST['name'];
    $DRIVER->contact_no = $_POST['contact_no'];
    $DRIVER->address = $_POST['address'];
    $DRIVER->vehicle_number = $_POST['vehicle_number'];
    $DRIVER->nic_number = $_POST['nic_number'];

    $VALID->check($DRIVER, [
        'name' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'vehicle_number' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $DRIVER->update();

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



