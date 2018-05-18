<?php

//----------------------Company Information---------------------

$comany_name = "Hurry Up Taxi, Mahaedanda, Karandeniya, Galle";
$website_name = "www.hurryuptaxi.lk";
$comConNumber = "(+94) 77 758 9288, (+94) 78 770 1625";
$comEmail = "hurryuptaxi@gmail.com";

$from = 'hurryuptaxi@gmail.com';
$replay = 'hurryuptaxi@gmail.com';

//----------------------CAPTCHACODE---------------------
session_start();

 
$response = array();
if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {
    $response['status'] = 'incorrect';
    $response['msg'] = 'Security Code is invalid';
    echo json_encode($response);
    exit();
}

//----------------------Visitor Information---------------------


$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_country = $_POST['country'];
$visitor_phone = $_POST['visitor_phone'];
$subject = 'New Website Enquiry - ' . $_POST['subject'];
$message = $_POST['message'];


date_default_timezone_set('Asia/Colombo');

$todayis = date("l, F j, Y, g:i a");

$site_link = "http://" . $_SERVER['HTTP_HOST'];

include("mail-template.php");

// mandatory headers for email message, change if you need something different in your setting.
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $replay . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Sending mail

if (mail($visitor_email, $subject, $visitor_message, $headers) && mail($replay, $subject, $company_message, $headers)) {
    $response['status'] = 'correct';
    $response['msg'] = "Your message has been sent successfully";
//"Your message has been sent successfully"
    echo json_encode($response);
    exit();
} else {
    $response['status'] = 'correct';
    $response['msg'] = "Could nod be sent your message";
    echo json_encode($response);
    exit();
} 
