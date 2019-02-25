<?php

/**
 * Description of VehicleType
 *
 * @author Sublime Holdings
 */
class VehicleType {

    public $id;
    public $name;
    public $image;
    public $passengers;
    public $baggages;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `vehicle_type` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->image = $result['image'];
            $this->passengers = $result['passengers'];
            $this->baggages = $result['baggages'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `vehicle_type` (`name`,`image`,`passengers`,`baggages`,`sort`) VALUES  ('"
                . $this->name . "','"
                . $this->image . "','"
                . $this->passengers . "','"
                . $this->baggages . "','"
                . $this->sort . "')";

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

        $query = "SELECT * FROM `vehicle_type` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `vehicle_type` SET "
                . "`name` ='" . $this->name . "', "
                . "`image` ='" . $this->image . "', "
                . "`passengers` ='" . $this->passengers . "', "
                . "`baggages` ='" . $this->baggages . "' "
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

        $query = 'DELETE FROM `vehicle_type` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vehicle) {
        $query = "UPDATE `vehicle_type` SET `sort` = '" . $key . "'  WHERE id = '" . $vehicle . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function mainTypes() {

        return [
            1 => 'Car',
            2 => 'Van',
            3 => 'Bus',
            4 => 'SUV'
        ];
    }

    public function requestTypes() {

        return [
            1 => 'Self Drive',
            2 => 'Tours/ Chauffeur Driven',
            3 => 'Weddings & Events',
            4 => 'Airport/ City Transfers'
        ];
    }

    public function fuelTypes() {
        return [
            1 => 'Diesel',
            2 => 'Electric',
            3 => 'Petrol',
            4 => 'Hybrid'
        ];
    }

}
