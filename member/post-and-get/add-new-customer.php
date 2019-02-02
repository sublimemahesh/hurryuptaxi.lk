<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {

    $CUSTOMER = new Customer(NULL);
    $VALID = new Validator();

    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $unique_id = mb_strtoupper(strval(bin2hex(openssl_random_pseudo_bytes(8))));

    $CUSTOMER->name = $_POST['name'];
    $CUSTOMER->unique_id = $unique_id;
    $CUSTOMER->email = $_POST['email'];
    $CUSTOMER->contact_no = $_POST['contact_no']; 
    $CUSTOMER->created_at = $_POST['created_at'];
    $CUSTOMER->encrypted_password = $password;
    $CUSTOMER->verified = $_POST['active'];



    $VALID->check($CUSTOMER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        'encrypted_password' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $CUSTOMER->create();

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

    $CUSTOMER = new Customer($_POST['id']);

    $CUSTOMER->name = $_POST['name'];    
    $CUSTOMER->email = $_POST['email'];
    $CUSTOMER->contact_no = $_POST['contact_no'];
    $CUSTOMER->otp = $_POST['otp'];
    $CUSTOMER->verified = $_POST['active'];

    $VALID = new Validator();

    $VALID->check($CUSTOMER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_no' => ['required' => TRUE],
        
    ]);

    if ($VALID->passed()) {
        $CUSTOMER->update();

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

if (isset($_POST['updateprofilepic'])) {

    $dir_dest = '../../upload/user/';

    $handle = new Upload($_FILES['image']);
    $imageName = $_POST ["oldImageName"];

    if (empty($imageName)) {
        $imageName = Helper::randamId();
    }

    $imgName = null;
    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $imageName;
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $CUSTOMER = new User($_POST['id']);

    $CUSTOMER->profile_picture = $imgName;

    $VALID = new Validator();

    $VALID->check($CUSTOMER, [
        'profile_picture' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $CUSTOMER->update();

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

if (isset($_POST['changePassword'])) {

    $result = Customer::changePassword($_POST["id"], $_POST["newPass"]);
 
    if ($result == 'TRUE') {
        header('location: ../change-password-customer.php?id=' . $_POST["id"] . '&&message=9');
        exit();
    } else {
        header('location: ../change-password-customerr.php?id=' . $_POST["id"] . '&&message=14');
        exit();
    }
}

 
