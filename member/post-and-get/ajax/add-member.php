<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['save']) {

    header('Content-Type: application/json; charset=UTF8');
    $response = array();

    if (empty($_POST['name'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter your name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['phone_number'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter your Phone Number.";
        echo json_encode($response);
        exit();
    }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter valid email.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['district'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please select district.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['city'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter city.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['dealer'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter dealer.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['address'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter address.";
        echo json_encode($response);
        exit();
    }  else if (empty($_POST['nic'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter your NIC number.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['image'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Profile Picture.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['username'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter User Name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['password'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Password.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['bank'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Bank.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['branch'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Branch.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['account_type'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Account Type.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['holder_name'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Holder Name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['account_number'])) {
        $response['isActive'] = 'error';
        $response['message'] = "Please enter Account Number.";
        echo json_encode($response);
        exit();
    } else {
        $USER = new User(NULL);
        $result = $USER->checkUsername($_POST['username']);
        if ($result) {
            $response['isActive'] = 'error';
            $response['message'] = "The User Name you entered is already in use.";
            echo json_encode($response);
            exit();
        } else {

            $USER = new User(NULL);

            $USER->name = filter_input(INPUT_POST, 'name');
            $USER->email = filter_input(INPUT_POST, 'email');
            $USER->district = filter_input(INPUT_POST, 'district');
            $USER->city = filter_input(INPUT_POST, 'city');
            $USER->dealer = filter_input(INPUT_POST, 'dealer');
            $USER->address = filter_input(INPUT_POST, 'address');
            $USER->phone_number = filter_input(INPUT_POST, 'phone_number');
            $USER->nic = filter_input(INPUT_POST, 'nic');
            $USER->parent = filter_input(INPUT_POST, 'parent');
            $USER->createdAt = filter_input(INPUT_POST, 'createdAt');
            $USER->username = filter_input(INPUT_POST, 'username');
            $USER->bank = filter_input(INPUT_POST, 'bank');
            $USER->branch = filter_input(INPUT_POST, 'branch');
            $USER->account_type = filter_input(INPUT_POST, 'account_type');
            $USER->holder_name = filter_input(INPUT_POST, 'holder_name');
            $USER->account_number = filter_input(INPUT_POST, 'account_number');
            $USER->isActive = 1;
            $USER->password = $password;

            $USER->create();

            if ($USER->id) {
                $USER->login($USER->username, $USER->password);
                $response['isActive'] = 'success';
                echo json_encode($response);
                exit();
            } else {
                $response['isActive'] = 'error';
                $response['message'] = "Oops. Something went wrong, Please try again.";
                echo json_encode($response);
                exit();
            }
        }
    }
}