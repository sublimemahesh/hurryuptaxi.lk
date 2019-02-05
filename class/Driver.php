<?php

date_default_timezone_set('Asia/Colombo');

/**
 * Description of Driver
 *
 * @author official
 */
class Driver {

    public $id;
    public $user;
    public $name;
    public $email;
    public $contact_no;
    public $profile_picture;
    public $district;
    public $city;
    public $address;
    public $vehicle_number;
    public $nic_number;
    public $base_price;
    public $price_per_km;
    public $password;
    public $otp;
    public $verified;
    public $createdAt;
    public $last_update_time;
    public $longitude;
    public $latitude;
    public $vehicle_type;
    public $longitude;
    public $latitude;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`user`,`name`,`email`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number`,`base_price`,`price_per_km`,`password`,`otp`,`verified`,`created_at`,`last_update_time`,`longitude`,`latitude`,`vehicle_type`  FROM `driver` WHERE `id`=" . $id;
            $query = "SELECT `id`,`user`,`name`,`email`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number`,`base_price`,`price_per_km`,`password`,`otp`,`verified`,`created_at`,`longitude`,`latitude`  FROM `driver` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->contact_no = $result['contact_no'];
            $this->profile_picture = $result['profile_picture'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->address = $result['address'];
            $this->vehicle_number = $result['vehicle_number'];
            $this->nic_number = $result['nic_number'];
            $this->base_price = $result['base_price'];
            $this->price_per_km = $result['price_per_km'];
            $this->password = $result['password'];
            $this->otp = $result['otp'];
            $this->verified = $result['verified'];
            $this->createdAt = $result['created_at'];

            $this->last_update_time = $result['last_update_time'];
            $this->longitude = $result['longitude'];
            $this->latitude = $result['latitude'];
            $this->vehicle_type = $result['vehicle_type'];

            $this->longitude = $result['longitude'];
            $this->latitude = $result['latitude'];


            return $this;
        }
    }

    public function create() {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');


        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `driver` (`user`,`name`,`email`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number`,`base_price`,`price_per_km`,`password`,`verified`,`created_at`,`vehicle_type`) VALUES  ('"

        $query = "INSERT INTO `driver` (`user`,`name`,`email`,`contact_no`,`profile_picture`,`district`,`city`,`address`,`vehicle_number`,`nic_number`,`base_price`,`price_per_km`,`password`,`verified`,`created_at`) VALUES  ('"

                . $this->user . "', '"
                . $this->name . "', '"
                . $this->email . "', '"
                . $this->contact_no . "', '"
                . $this->profile_picture . "','"
                . $this->district . "', '"
                . $this->city . "', '"
                . $this->address . "', '"
                . $this->vehicle_number . "', '"
                . $this->nic_number . "', '"
                . $this->base_price . "', '"
                . $this->price_per_km . "', '"
                . md5($this->password) . "', '"
                . 1 . "', '"

                . $createdAt . "', '"
                . $this->vehicle_type . "' )";

                . $createdAt . "' )";


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

    public function getDriversByVehicleType($id, $user) {

        $query = "SELECT * FROM `driver` WHERE vehicle_type= '" . $id . "' AND user= '" . $user . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getUserByDriver($user) {

        $query = "SELECT * FROM `driver` WHERE `user`= '" . $user . "'";
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
                . "`email` ='" . $this->email . "', "
                . "`contact_no` ='" . $this->contact_no . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`district` ='" . $this->district . "', "
                . "`city` ='" . $this->city . "', "
                . "`address` ='" . $this->address . "', "
                . "`vehicle_number` ='" . $this->vehicle_number . "', "
                . "`nic_number` ='" . $this->nic_number . "', "
                . "`base_price` ='" . $this->base_price . "', "
                . "`price_per_km` ='" . $this->price_per_km . "', "
                . "`password` ='" . md5($this->password) . "', "

                . "`verified` ='" . $this->verified . "', "
                . "`vehicle_type` ='" . $this->vehicle_type . "' "

                . "`verified` ='" . $this->verified . "' "

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

    public function updateDriverLocation() {

        $createdAt = date('Y-m-d H:i:s');

        $query = "UPDATE  `driver` SET "
                . "`last_update_time` ='" . $createdAt . "', "

        $query = "UPDATE  `driver` SET "

                . "`longitude` ='" . $this->longitude . "', "
                . "`latitude` ='" . $this->latitude . "'"
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

        $V_PHOTO = new VehiclePhotos(NULL);

        $result = $V_PHOTO->deleteRentACarPhotoByRentACar($this->id);

        if ($result) {
            $query = 'DELETE FROM `driver` WHERE id="' . $this->id . '"';
        }

        $db = new Database();

        return $db->readQuery($query);
//        dd($query);
    }

    public function GetDriversByPickup($latitude, $longitude) {



        $newTime = strtotime('-20 minutes');

        $timeAt = "'" . date('Y-m-d H:i:s', $newTime) . "'";


        $query = 'SELECT *, ROUND((6371 * acos ( cos ( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin ( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ), 2) AS distance
        FROM driver WHERE  ' . $timeAt . '  <= last_update_time HAVING distance <= 1.00 ORDER BY distance';

        $query = 'SELECT *, ROUND((6371 * acos ( cos ( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin ( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ), 2) AS distance FROM driver HAVING distance <= 1.00 ORDER BY distance';


        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
