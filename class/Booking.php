<?php
/**
 * Description of Booking
 *
 * @author U s E r ¨
 */
class Booking {
    
    public $id;
    public $date_time_booked;
    public $rent_a_car;
    public $first_name;
    public $second_name;
    public $email;
    public $contact_number;
    public $pick_up;
    public $drop_off;
    public $pick_up_date;
    public $pick_up_time;
    public $drop_off_date;
    public $drop_off_time;
    public $no_of_passengers;
    public $no_of_baggages;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`date_time_booked`,`rent_a_car`,`first_name`,`second_name`,`email`,`contact_number`,`pick_up`,`drop_off`,`pick_up_date`,`pick_up_time`,`drop_off_date`,`drop_off_time`,`no_of_passengers`,`no_of_baggages`,`message` FROM `booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->date_time_booked = $result['date_time_booked'];
            $this->rent_a_car = $result['rent_a_car'];
            $this->first_name = $result['first_name'];
            $this->second_name = $result['second_name'];
            $this->email = $result['email'];
            $this->contact_number = $result['contact_number'];
            $this->pick_up = $result['pick_up'];
            $this->drop_off = $result['drop_off'];
            $this->pick_up_date = $result['pick_up_date'];
            $this->pick_up_time = $result['pick_up_time'];
            $this->drop_off_date = $result['drop_off_date'];
            $this->drop_off_time = $result['drop_off_time'];
            $this->no_of_passengers = $result['no_of_passengers'];
            $this->no_of_baggage = $result['no_of_baggages'];
            $this->message = $result['message'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `booking` (`date_time_booked`,`rent_a_car`,`first_name`,`second_name`,`email`,`contact_number`,`pick_up`,`drop_off`,`pick_up_date`,`pick_up_time`,`drop_off_date`,`drop_off_time`,`no_of_passengers`,`no_of_baggages`,`message`) VALUES  ('"
                . $this->date_time_booked . "','"
                . $this->rent_a_car . "','"
                . $this->first_name . "','"
                . $this->second_name . "','"
                . $this->email . "','"
                . $this->contact_number . "','"
                . $this->pick_up . "','"
                . $this->drop_off . "','"
                . $this->pick_up_date . "','"
                . $this->pick_up_time . "','"
                . $this->drop_off_date . "','"
                . $this->drop_off_time . "','"
                . $this->no_of_passengers . "','"
                . $this->no_of_baggage . "','"
                . $this->message . "')";

        $db = new Database();

        $result = $db->readQuery($query);
        
        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `booking`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    
    public function getBookingsByUser($user) {

        $query = "SELECT * FROM `booking` WHERE `rent_a_car` in (SELECT `id` FROM `rent_a_car` WHERE `user`='".$user."')";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `booking` SET "
                . "`rent_a_car` ='" . $this->rent_a_car . "', "
                . "`first_name` ='" . $this->first_name . "', "
                . "`second_name` ='" . $this->second_name . "', "
                . "`email` ='" . $this->email . "', "
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`pick_up` ='" . $this->pick_up . "', "
                . "`drop_off` ='" . $this->drop_off . "', "
                . "`pick_up_date` ='" . $this->pick_up_date . "', "
                . "`pick_up_time` ='" . $this->pick_up_time . "', "
                . "`drop_off_date` ='" . $this->drop_off_date . "', "
                . "`drop_off_time` ='" . $this->drop_off_time . "', "
                . "`no_of_passengers` ='" . $this->no_of_passengers . "', "
                . "`no_of_baggages` ='" . $this->no_of_baggage . "', "
                . "`message` ='" . $this->message . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
}