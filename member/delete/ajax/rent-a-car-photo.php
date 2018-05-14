<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $RENT_A_CAR_PHOTO = new RentACarPhoto($_POST['id']);

    unlink(Helper::getSitePath() . "upload/rent-car-photos/" . $RENT_A_CAR_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/rent-car-photos/thumb/" . $RENT_A_CAR_PHOTO->image_name);

    $result = $RENT_A_CAR_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}