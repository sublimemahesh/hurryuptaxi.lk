<?php

include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Validator.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/Dealer.php');
include_once(dirname(__FILE__) . '/Bank.php');
include_once(dirname(__FILE__) . '/Driver.php');
include_once(dirname(__FILE__) . '/VehiclePhotos.php');
include_once(dirname(__FILE__) . '/VehicleType.php');
include_once(dirname(__FILE__) . '/RentACar.php');
include_once(dirname(__FILE__) . '/RentACarPhoto.php');
include_once(dirname(__FILE__) . '/Commission.php');
include_once(dirname(__FILE__) . '/Booking.php');

function dd($data) {
    var_dump($data);
    exit();
}

function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}