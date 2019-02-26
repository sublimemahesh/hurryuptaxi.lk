<?php

/**
 * Description of VehicleType
 *
 * @author Sublime Holdings
 */
class DriverPayment {

    public $id;
    public $driver;
    public $date;
    public $time;
    public $price;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `driver_payment` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->driver = $result['driver'];
            $this->date = $result['date'];
            $this->time = $result['time'];
            $this->price = $result['price'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `driver_payment` (`driver`,`date`,`time`,`price`,`status`) VALUES  ('"
                . $this->driver . "','"
                . $this->date . "','"
                . $this->time . "','"
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

        $query = "SELECT * FROM `driver_payment`  ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getBookingsByDriver($driver) {

        $query = "SELECT * FROM `driver_payment` WHERE driver= '" . $driver . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPaymentByDriver($date, $today, $driver) {

        $query = "SELECT * FROM `driver_payment` WHERE `date`  BETWEEN '" . $date . "' AND '" . $today . "' AND driver= '" . $driver . "'";

        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `driver_payment` SET "
                . "`date` ='" . $this->date . "', "
                . "`time` ='" . $this->time . "', "
                . "`price` ='" . $this->price . "', "
                . "`status` ='" . $this->status . "' "
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

        $query = 'DELETE FROM `driver_payment` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vehicle) {
        $query = "UPDATE `driver_payment` SET `sort` = '" . $key . "'  WHERE id = '" . $vehicle . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
