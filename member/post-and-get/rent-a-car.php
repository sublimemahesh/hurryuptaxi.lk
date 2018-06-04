<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-rent-a-car'])) {

    $RENT_A_CAR = New RentACar(NULL);
    $VALID = new Validator();

    $RENT_A_CAR->id = $_POST['id'];
    $RENT_A_CAR->user = $_POST['user'];
    $RENT_A_CAR->name = $_POST['name'];
    $RENT_A_CAR->mainTypes = $_POST['mainTypes'];
    $RENT_A_CAR->requestTypes = $_POST['requestTypes'];
    $RENT_A_CAR->fuelType = $_POST['fuelType'];
    $RENT_A_CAR->conatcName = $_POST['conatcName'];
    $RENT_A_CAR->phoneNumber = $_POST['phoneNumber'];
    $RENT_A_CAR->email = $_POST['email'];
    $RENT_A_CAR->district = $_POST['district'];
    $RENT_A_CAR->city = $_POST['city'];
    $RENT_A_CAR->address = $_POST['address'];
    $RENT_A_CAR->vehicleNumber = $_POST['vehicleNumber'];
    $RENT_A_CAR->noOfPassengers = $_POST['noOfPassengers'];
    $RENT_A_CAR->noOfBaggage = $_POST['noOfBaggage'];
    $RENT_A_CAR->noOfDoors = $_POST['noOfDoors'];
    $RENT_A_CAR->airConditioned = $_POST['airConditioned'];
    $RENT_A_CAR->price_self_drive = $_POST['price_self_drive'];
    $RENT_A_CAR->price_tours = $_POST['price_tours'];
    $RENT_A_CAR->price_wedding = $_POST['price_wedding'];
    $RENT_A_CAR->price_airport = $_POST['price_airport'];
    $RENT_A_CAR->excited_milage_self_drive = $_POST['excited_milage_self_drive'];
    $RENT_A_CAR->excited_milage_tour = $_POST['excited_milage_tour'];
    $RENT_A_CAR->excited_milage_wedding = $_POST['excited_milage_wedding'];
    $RENT_A_CAR->excited_milage_airport = $_POST['excited_milage_airport'];

    $VALID->check($RENT_A_CAR, [
        'name' => ['required' => TRUE],
        'mainTypes' => ['required' => TRUE],
        'requestTypes' => ['required' => TRUE],
        'fuelType' => ['required' => TRUE],
        'conatcName' => ['required' => TRUE],
        'phoneNumber' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'vehicleNumber' => ['required' => TRUE],
        'noOfPassengers' => ['required' => TRUE],
        'noOfBaggage' => ['required' => TRUE],
        'noOfDoors' => ['required' => TRUE],
        'airConditioned' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $RESULT = $RENT_A_CAR->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ../add-rent-a-car-photos.php?id='.$RESULT->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-rent-a-car'])) {

    $RENT_A_CAR = New RentACar($_POST['id']);

    $RENT_A_CAR->user = $_POST['user'];
    $RENT_A_CAR->name = $_POST['name'];
    $RENT_A_CAR->mainTypes = $_POST['mainTypes'];
    $RENT_A_CAR->requestTypes = $_POST['requestTypes'];
    $RENT_A_CAR->conatcName = $_POST['conatcName'];
    $RENT_A_CAR->phoneNumber = $_POST['phoneNumber'];
    $RENT_A_CAR->email = $_POST['email'];
    $RENT_A_CAR->district = $_POST['district'];
    $RENT_A_CAR->city = $_POST['city'];
    $RENT_A_CAR->address = $_POST['address'];
    $RENT_A_CAR->vehicleNumber = $_POST['vehicleNumber'];
    $RENT_A_CAR->fuelType = $_POST['fuelType'];
    $RENT_A_CAR->noOfPassengers = $_POST['noOfPassengers'];
    $RENT_A_CAR->noOfBaggage = $_POST['noOfBaggage'];
    $RENT_A_CAR->noOfDoors = $_POST['noOfDoors'];
    $RENT_A_CAR->airConditioned = $_POST['airConditioned'];
    $RENT_A_CAR->price_self_drive = $_POST['price_self_drive'];
    $RENT_A_CAR->price_tours = $_POST['price_tours'];
    $RENT_A_CAR->price_wedding = $_POST['price_wedding'];
    $RENT_A_CAR->price_airport = $_POST['price_airport'];
    $RENT_A_CAR->excited_milage_self_drive = $_POST['excited_milage_self_drive'];
    $RENT_A_CAR->excited_milage_tour = $_POST['excited_milage_tour'];
    $RENT_A_CAR->excited_milage_wedding = $_POST['excited_milage_wedding'];
    $RENT_A_CAR->excited_milage_airport = $_POST['excited_milage_airport'];

    $VALID = new Validator();
    $VALID->check($RENT_A_CAR, [
        'name' => ['required' => TRUE],
        'mainTypes' => ['required' => TRUE],
        'requestTypes' => ['required' => TRUE],
        'fuelType' => ['required' => TRUE],
        'conatcName' => ['required' => TRUE],
        'phoneNumber' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'vehicleNumber' => ['required' => TRUE],
        'noOfPassengers' => ['required' => TRUE],
        'noOfBaggage' => ['required' => TRUE],
        'noOfDoors' => ['required' => TRUE],
        'airConditioned' => ['required' => TRUE],

        
    ]);

    if ($VALID->passed()) {
        $RENT_A_CAR->update();

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
