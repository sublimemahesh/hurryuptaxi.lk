<?php
echo '1111';
include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

$BOOKING = new Booking($_POST['id']);

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


$VALID = new Validator();
    $VALID->check($BOOKING, [
        'rent_a_car' => ['required' => TRUE],
        'first_name' => ['required' => TRUE],
        'second_name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'pick_up' => ['required' => TRUE],
        'drop_off' => ['required' => TRUE],
        'pick_up_date' => ['required' => TRUE],
        'pick_up_time' => ['required' => TRUE],
        'drop_off_date' => ['required' => TRUE],
        'drop_off_time' => ['required' => TRUE],
        'no_of_passengers' => ['required' => TRUE],
        'no_of_baggage' => ['required' => TRUE],
        'message' => ['required' => TRUE]
        
    ]);

    if ($VALID->passed()) {
        $BOOKING->update();

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
