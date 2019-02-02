<?php

/**
 * Description of VehicleType
 *
 * @author Sublime Holdings
 */
class AppBooking {

    public $id;
    public $customer;
    public $driver;
    public $pickup;
    public $destination;
    public $date_time;
    public $price;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `app_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->customer = $result['customer'];
            $this->driver = $result['driver'];
            $this->pickup = $result['pickup'];
            $this->destination = $result['destination'];
            $this->date_time = $result['date_time'];
            $this->price = $result['price'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `app_booking` (`customer`,`driver`,`pickup`,`destination`,`date_time`,`price`,`status`) VALUES  ('"
                . $this->customer . "','"
                . $this->driver . "','"
                . $this->pickup . "','"
                . $this->destination . "','"
                . $this->date_time . "','"
                . $this->price . "','"
                . $this->status . "')";

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

        $query = "SELECT * FROM `app_booking`  ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getBookingsByDriver($driver) {

        $query = "SELECT * FROM `app_booking` WHERE driver= '" . $driver . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `app_booking` SET "
                . "`name` ='" . $this->name . "', "
                . "`image` ='" . $this->image . "', "
                . "`passengers` ='" . $this->passengers . "' "
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

        $query = 'DELETE FROM `app_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vehicle) {
        $query = "UPDATE `app_booking` SET `sort` = '" . $key . "'  WHERE id = '" . $vehicle . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
