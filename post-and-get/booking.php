<?php

include_once(dirname(__FILE__) . '/../class/include.php');

$RENT_A_CAR = new RentACar($_POST['rent_a_car']);
$user = $RENT_A_CAR->user;

$ADMIN = new User(1);
$admin_email = $ADMIN->email;

$VEHICLE_OWNER = new User($user);
$vehicle_owner_email = $VEHICLE_OWNER->email;

$BOOKING = new Booking(NULL);

$BOOKING->date_time_booked = $_POST['date_time_booked'];
$BOOKING->rent_a_car = $_POST['rent_a_car'];
$BOOKING->first_name = $_POST['first_name'];
$BOOKING->second_name = $_POST['second_name'];
$BOOKING->email = $_POST['email'];
$BOOKING->contact_number = $_POST['contact_number'];
$BOOKING->pick_up = $_POST['pick_up'];
$BOOKING->drop_off = $_POST['drop_off'];
$BOOKING->pick_up_date = $_POST['pick_up_date'];
$BOOKING->pick_up_time = $_POST['pick_up_time'];
$BOOKING->drop_off_date = $_POST['drop_off_date'];
$BOOKING->drop_off_time = $_POST['drop_off_time'];
$BOOKING->no_of_passengers = $_POST['no_of_passengers'];
$BOOKING->no_of_baggage = $_POST['no_of_baggage'];
$BOOKING->message = $_POST['message'];



$RESULT = $BOOKING->create();

if ($RESULT) {

    $visitor_f_name = $RESULT->first_name;
    $visitor_l_name = $RESULT->second_name;
    $visitor_email = $RESULT->email;
    $visitor_contactno = $RESULT->contact_number;

    $rent_a_car_title = $RENT_A_CAR->name;

    foreach (VehicleType::mainTypes() as $key => $vtype) {
        if ($key == $RENT_A_CAR->mainTypes) {
            $vehicle_type = $vtype;
        }
    }
    foreach (VehicleType::requestTypes() as $key => $rtype) {
        if ($key == $RENT_A_CAR->requestTypes) {
            $request_type = $rtype;
        }
    }
    foreach (VehicleType::fuelTypes() as $key => $ftype) {
        if ($key == $RENT_A_CAR->fuelType) {
            $fuel_type = $ftype;
        }
    }


    $picking_up = $RESULT->pick_up;
    $dropping_off = $RESULT->drop_off;

    $no_of_passangers = $RESULT->no_of_passengers;
    $no_of_baggage = $RESULT->no_of_baggage;
    $date_time_booked = $RESULT->date_time_booked;
    $pick_up_date = $RESULT->pick_up_date;
    $pick_up_time = $RESULT->pick_up_time;
    $drop_off_date = $RESULT->drop_off_date;
    $drop_off_time = $RESULT->drop_off_time;
    $message = $RESULT->message;
    $vehicle_no = $RENT_A_CAR->vehicleNumber;
    $name = $RENT_A_CAR->name;
    

    $site_link = "http://" . $_SERVER['HTTP_HOST'];
    $website_name = 'www.hurryuptaxi.lk';
    $comany_name = 'Hurryup Taxi';
    $comConNumber = '(+)94-77-758-9288';
    $comEmail = 'hurryuptaxi@gmail.com';
    date_default_timezone_set('Asia/Colombo');

    $todayis = date("l, F j, Y, g:i a");

    $subject = 'Hurryup Taxi - Rent A Car Booking';
    $from = 'noreply@hurryuptaxi.lk'; // give from email address


    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Rent A Car Booking - '. $name .'</title>
    </head>

    <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
            <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr style="background-color: #c8d6d8;">
                                        <td width="40"></td>
                                        <td width="144">
                                            <a href= "' . $site_link . '" target="_blank"> '
            . '<img src="' . $site_link . '/images/booking/logo.png" border="0" alt=""/>
                                            </a>
                                        </td>
                                        <td width="393">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td height="46" align="right" valign="middle">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="67%" align="right">
                                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:16px; " >
                                                                        <a href= "' . $site_link . '" style="color:#224ee4; text-decoration:none; text-transform: uppercase;">
                                                                            <h4>www.hurryuptaxi.lk</h4>
                                                                        </a>
                                                                    </font>
                                                                </td>
                                                                <td width="4%">&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table></td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" align="center" style="border-bottom:1px solid #000000" height="50">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#0B0B0E; font-size:18px; " >
                                                <h4>Rent A Car Booking - '. $name .'</h4>
                                            </font>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; ">
                                                Hi ' . $visitor_f_name . ',
                                                <br /><br />
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                Thank you for visiting ' . $website_name . ' web site and contacting us. You have been chosen to travel from ' . $picking_up . ' to ' . $dropping_off . ' on ' . $pick_up_date . ' at ' . $pick_up_time . '. One of representative will be contact you shortly. 
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;<br /><br /></td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                The details of your Rent A Car Booking are shown below.
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Visitor Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Name : ' . $visitor_f_name . '&nbsp;' . $visitor_l_name . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Email : ' . $visitor_email . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Contact Number : ' . $visitor_contactno . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Booking Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Title : ' . $rent_a_car_title . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Vehicle Type : ' . $vehicle_type . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Vehicle Number : ' . $vehicle_no . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Request Type : ' . $request_type . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Fuel Type : ' . $fuel_type . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Passengers : ' . $no_of_passangers . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Baggages : ' . $no_of_baggage . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Pick Up Location : ' . $picking_up . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Drop Off Location : ' . $dropping_off . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Pick Up Date : ' . $pick_up_date . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Pick Up Time : ' . $pick_up_time . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Drop Off Date : ' . $drop_off_date . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Drop Off Time : ' . $drop_off_time . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:11px; " >
                                                <h4>Message</h4>
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                ' . $message . '
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><img src="' . $site_link . '/images/booking/bottom_bar.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%" align="center">&nbsp;</td>
                                        <td width="29%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>Phone Number : <br/> ' . $comConNumber . ' </strong>
                                            </font>
                                        </td>
                                        <td width="2%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>|</strong>
                                            </font>
                                        </td>
                                        <td width="30%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>Website : <br/> ' . $website_name . '  </strong>
                                            </font>
                                        </td>
                                        <td width="2%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>|</strong>
                                            </font>
                                        </td>
                                        <td width="25%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>E-mail :  <br/> ' . $comEmail . '</strong>
                                            </font>
                                        </td> 
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="3%" align="center">&nbsp;</td>
                                        <td width="28%" align="center"><font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > © ' . date('Y') . ' Copyright ' . $comany_name . '</font> </td>
                                        <td width="10%" align="center"></td>
                                        <td width="3%" align="center"></td> 
                                        <td width="30%" align="right">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > 
                                                <a href="http://www.sublime.lk/">
                                                    Solution By: Sublime Holdings</a>
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table></td>
            </tr>
        </table>
    </body>
</html>';


    if (mail($visitor_email, $subject, $html, $headers) &&
            mail($admin_email, $subject, $html, $headers) && mail($vehicle_owner_email, $subject, $html, $headers)) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=success');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=error');
    }
} 