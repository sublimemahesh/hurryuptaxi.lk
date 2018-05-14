<?php

/**
 * Description of Driver
 *
 * @author official
 */
class Driver {

    public $id;
    public $user;
    public $name;
    public $contact_no;
    public $profile_picture;
    public $district;
    public $city;
    public $address;
    public $vehicle_number;
    public $nic_number;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`user`,`name`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number` FROM `driver` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->name = $result['name'];
            $this->contact_no = $result['contact_no'];
            $this->profile_picture = $result['profile_picture'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->address = $result['address'];
            $this->vehicle_number = $result['vehicle_number'];
            $this->nic_number = $result['nic_number'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `driver` (`user`,`name`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number`) VALUES  ('"
                . $this->user . "', '"
                . $this->name . "', '"
                . $this->contact_no . "', '"
                . $this->profile_picture . "','"
                . $this->district . "', '"
                . $this->city . "', '"
                . $this->address . "', '"
                . $this->vehicle_number . "', '"
                . $this->nic_number . "' )";

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

        $query = "SELECT * FROM `driver`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `driver` SET "
                . "`user` ='" . $this->user . "', "
                . "`name` ='" . $this->name . "', "
                . "`contact_no` ='" . $this->contact_no . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`district` ='" . $this->district . "', "
                . "`city` ='" . $this->city . "', "
                . "`address` ='" . $this->address . "', "
                . "`vehicle_number` ='" . $this->vehicle_number . "', "
                . "`nic_number` ='" . $this->nic_number . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function GetDriversByUser($user) {

        $query = "SELECT * FROM `driver` WHERE `user` = '" . $user . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function delete() {

        $V_PHOTO = new VehiclePhotos(NULL);

        $result = $V_PHOTO->deleteRentACarPhotoByRentACar($this->id);

        if ($result) {
            $query = 'DELETE FROM `driver` WHERE id="' . $this->id . '"';
        }

        $db = new Database();

        return $db->readQuery($query);
//        dd($query);
    }

}
