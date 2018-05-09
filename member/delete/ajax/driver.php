<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {

    $DRIVER = new Driver($_POST['id']);

    unlink(Helper::getSitePath() . "upload/driver/" . $DRIVER->profile_picture);
    $result = $DRIVER->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}