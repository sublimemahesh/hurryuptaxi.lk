<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $USER = new User(NULL);
    $VALID = new Validator();
    
    
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $USER->name = filter_input(INPUT_POST, 'name');
    $USER->email = filter_input(INPUT_POST, 'email');
    $USER->parent = filter_input(INPUT_POST, 'parent');
    $USER->createdAt = filter_input(INPUT_POST, 'createdAt');
    $USER->username = filter_input(INPUT_POST, 'username');
    $USER->isActive = 1;
    $USER->password = $password;

    $dir_dest = '../../upload/user/';

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

    $USER->profile_picture = $imgName;

    $VALID->check($USER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'username' => ['required' => TRUE],
        'password' => ['required' => TRUE]
//        'profile_picture' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $USER->create();

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

    $dir_dest = '../../upload/user/';

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

    $USER = new User($_POST['id']);

    $USER->name = filter_input(INPUT_POST, 'name');
    $USER->email = filter_input(INPUT_POST, 'email');
    $USER->createdAt = filter_input(INPUT_POST, 'createdAt');
    $USER->username = filter_input(INPUT_POST, 'username');
    $USER->isActive = 1;

    $VALID = new Validator();
    $VALID->check($USER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'username' => ['required' => TRUE],
        'profile_picture' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $USER->update();

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