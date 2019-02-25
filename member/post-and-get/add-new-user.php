 <?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $USER = new User(NULL);
    $VALID = new Validator();

    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $USER->name = filter_input(INPUT_POST, 'name');
    $USER->email = filter_input(INPUT_POST, 'email');
    $USER->district = filter_input(INPUT_POST, 'district');
    $USER->city = filter_input(INPUT_POST, 'city');
    $USER->dealer = 1;


    if (!empty(filter_input(INPUT_POST, 'dealer'))) {
        $USER->parent = filter_input(INPUT_POST, 'dealer');
    } else {
        $USER->parent = filter_input(INPUT_POST, 'parent');
    }

    $USER->address = filter_input(INPUT_POST, 'address');
    $USER->phone_number = filter_input(INPUT_POST, 'phone_number');
    $USER->nic = filter_input(INPUT_POST, 'nic');
    $USER->createdAt = filter_input(INPUT_POST, 'createdAt');
    $USER->username = User::getNextAvailableUsername();
    $USER->bank = filter_input(INPUT_POST, 'bank');
    $USER->branch = filter_input(INPUT_POST, 'branch');
    $USER->account_type = filter_input(INPUT_POST, 'account_type');
    $USER->holder_name = filter_input(INPUT_POST, 'holder_name');
    $USER->account_number = filter_input(INPUT_POST, 'account_number');
    $USER->isActive = 0;
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
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'phone_number' => ['required' => TRUE],
        'nic' => ['required' => TRUE],
        'parent' => ['required' => TRUE],
        'createdAt' => ['required' => TRUE],
        'username' => ['required' => TRUE],
        'password' => ['required' => TRUE],
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

    $USER = new User($_POST['id']);

    $USER->name = filter_input(INPUT_POST, 'name');
    $USER->email = filter_input(INPUT_POST, 'email');
    $USER->district = filter_input(INPUT_POST, 'district');
    $USER->city = filter_input(INPUT_POST, 'city');

    $USER->dealer = 1;

    if (!empty(filter_input(INPUT_POST, 'dealer'))) {
        $USER->parent = filter_input(INPUT_POST, 'dealer');
    } else {
        $USER->parent = 1;
    }
 
    $USER->address = filter_input(INPUT_POST, 'address');
    $USER->phone_number = filter_input(INPUT_POST, 'phone_number');
    $USER->nic = filter_input(INPUT_POST, 'nic');
    $USER->payment = filter_input(INPUT_POST, 'payment');
    $USER->bank = filter_input(INPUT_POST, 'bank');
    $USER->branch = filter_input(INPUT_POST, 'branch');
    $USER->account_type = filter_input(INPUT_POST, 'account_type');
    $USER->holder_name = filter_input(INPUT_POST, 'holder_name');
    $USER->account_number = filter_input(INPUT_POST, 'account_number');
    $USER->isActive = filter_input(INPUT_POST, 'active');
    $USER->profile_picture = $imgName;

    $VALID = new Validator();

    $VALID->check($USER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'district' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'phone_number' => ['required' => TRUE],
        'nic' => ['required' => TRUE],
        'username' => ['required' => TRUE],
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

    $USER = new User($_POST['id']);
    
    $USER->profile_picture = $imgName;

    $VALID = new Validator();

    $VALID->check($USER, [
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

if (isset($_POST['changePassword'])) {


    $result = User::changePassword($_POST["id"], $_POST["newPass"]);
    if ($result == 'TRUE') {
        header('location: ../change-password-user.php?id=' . $_POST["id"] . '&&message=9');
        exit();
    } else {
        header('location: ../change-password-user.php?id=' . $_POST["id"] . '&&message=14');
        exit();
    }
}

if (isset($_POST['updatePayment'])) {

    $USER = new User($_POST['id']);

    $USER->payment = filter_input(INPUT_POST, 'payment');
    $USER->isActive = filter_input(INPUT_POST, 'active');
    $USER->activePaymentDate = filter_input(INPUT_POST, 'paymentDate');

    $VALID = new Validator();

    $VALID->check($USER, [
        'id' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $USER->setPaymentAndActive();

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
