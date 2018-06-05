<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] === 'inactive') {
    
    $RENT_A_CAR = new RentACar($_POST['id']);
    
    $RENT_A_CAR->isActive = '0';

    $result = $RENT_A_CAR->activeVehicle();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

if ($_POST['option'] == 'active') {
    $RENT_A_CAR = new RentACar($_POST['id']);
    
    $RENT_A_CAR->isActive = '1';

    $result = $RENT_A_CAR->activeVehicle();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

