<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-driver'])) {

    $DRIVER = New Driver(NULL);
    $VALID = new Validator();

    
    $DRIVER->user = $_POST['user'];
    $DRIVER->name = $_POST['name'];
    $DRIVER->username = $DRIVER->getNextAvailableUsername();
    $DRIVER->email = $_POST['email'];
    $DRIVER->contact_no = $_POST['contact_no'];
    $DRIVER->district = $_POST['district'];
    $DRIVER->city = $_POST['city'];
    $DRIVER->address = $_POST['address'];
    $DRIVER->vehicle_number = $_POST['vehicle_number'];
    $DRIVER->nic_number = $_POST['nic_number'];
    $DRIVER->price_per_km = $_POST['price_per_km'];

    $DRIVER->vehicle_type = $_POST['vehicle_type'];

    $DRIVER->base_price = $_POST['base_price'];
    $DRIVER->password = $_POST['password'];


    $dir_dest = '../../upload/driver/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $DRIVER->profile_picture = $imgName;

    $VALID->check($DRIVER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'vehicle_number' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'profile_picture' => ['required' => TRUE],
        'price_per_km' => ['required' => TRUE],
        'base_price' => ['required' => TRUE],
        'password' => ['required' => TRUE]
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


    $dir_dest = '../../upload/driver/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;
    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $DRIVER = New Driver($_POST['id']);
    $VALID = new Validator();

   
    
    $DRIVER->user = $_POST['user'];
    $DRIVER->name = $_POST['name'];
    $DRIVER->email = $_POST['email'];
    $DRIVER->contact_no = $_POST['contact_no'];
    $DRIVER->address = $_POST['address'];
    $DRIVER->vehicle_number = $_POST['vehicle_number'];
    $DRIVER->nic_number = $_POST['nic_number'];
    $DRIVER->price_per_km = $_POST['price_per_km'];
    $DRIVER->vehicle_type = $_POST['vehicle_type'];
    $DRIVER->base_price = $_POST['base_price'];
    $DRIVER->password = md5($_POST['password']);
    
    

    $VALID->check($DRIVER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'vehicle_number' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'profile_picture' => ['required' => TRUE],
        'base_price' => ['required' => TRUE],
        'password' => ['required' => TRUE]
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



