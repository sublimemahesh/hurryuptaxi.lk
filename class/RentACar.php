<?php

/**
 * Description of RentACar
 *
 * @author official
 */
class RentACar {

    public $id;
    public $user;
    public $name;
    public $mainTypes;
    public $requestTypes;
    public $fuelType;
    public $conatcName;
    public $phoneNumber;
    public $email;
    public $district;
    public $city;
    public $address;
    public $vehicleNumber;
    public $noOfPassengers;
    public $noOfBaggage;
    public $noOfDoors;
    public $airConditioned;
    public $price_self_drive;
    public $price_tours;
    public $price_wedding;
    public $price_airport;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT "
                    . "`id`,"
                    . "`user`,"
                    . "`name`,"
                    . "`mainTypes`,"
                    . "`requestTypes`,"
                    . "`fuelType`,"
                    . "`conatcName`,"
                    . "`phoneNumber`,"
                    . "`email`,"
                    . "`district`,"
                    . "`city`,"
                    . "`address`,"
                    . "`vehicleNumber`,"
                    . "`noOfPassengers`,"
                    . "`noOfBaggage`,"
                    . "`noOfDoors`,"
                    . "`airConditioned`,"
                    . "`price_self_drive`,"
                    . "`price_tours`,"
                    . "`price_wedding`,"
                    . "`price_airport`"
                    . " FROM `rent_a_car` WHERE `id`=" . $id;


            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->name = $result['name'];
            $this->mainTypes = $result['mainTypes'];
            $this->requestTypes = $result['requestTypes'];
            $this->fuelType = $result['fuelType'];
            $this->conatcName = $result['conatcName'];
            $this->phoneNumber = $result['phoneNumber'];
            $this->email = $result['email'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->address = $result['address'];
            $this->vehicleNumber = $result['vehicleNumber'];
            $this->noOfPassengers = $result['noOfPassengers'];
            $this->noOfBaggage = $result['noOfBaggage'];
            $this->noOfDoors = $result['noOfDoors'];
            $this->airConditioned = $result['airConditioned'];
            $this->price_self_drive = $result['price_self_drive'];
            $this->price_tours = $result['price_tours'];
            $this->price_wedding = $result['price_wedding'];
            $this->price_airport = $result['price_airport'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_a_car` "
                . "(`user`,`name`,`mainTypes`,`requestTypes`,`conatcName`,`phoneNumber`,`email`,`district`,`city`,`address`,"
                . "`vehicleNumber`,`fuelType`,`noOfPassengers`,`noOfBaggage`,`noOfDoors`,`airConditioned`,`price_self_drive`,`price_tours`,`price_wedding`,`price_airport`) "
                . "VALUES "
                . " ('" . $this->user . "',"
                . "'" . $this->name . "',"
                . "'" . $this->mainTypes . "',"
                . "'" . $this->requestTypes . "',"
                . "'" . $this->conatcName . "',"
                . "'" . $this->phoneNumber . "',"
                . "'" . $this->email . "',"
                . "'" . $this->district . "',"
                . "'" . $this->city . "',"
                . "'" . $this->address . "',"
                . "'" . $this->vehicleNumber . "',"
                . "'" . $this->fuelType . "',"
                . "'" . $this->noOfPassengers . "',"
                . "'" . $this->noOfBaggage . "',"
                . "'" . $this->noOfDoors . "',"
                . "'" . $this->airConditioned . "',"
                . "'" . $this->price_self_drive . "',"
                . "'" . $this->price_tours . "',"
                . "'" . $this->price_wedding . "',"
                . "'" . $this->price_airport . "')";

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

        $query = "SELECT * FROM `rent_a_car` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `rent_a_car` SET "
                . "`user` ='" . $this->user . "', "
                . '`name`= "' . $this->name . '", '
                . '`mainTypes`= "' . $this->mainTypes . '", '
                . '`requestTypes`= "' . $this->requestTypes . '", '
                . '`conatcName`= "' . $this->conatcName . '", '
                . '`phoneNumber`= "' . $this->phoneNumber . '", '
                . '`email`= "' . $this->email . '", '
                . '`district`= "' . $this->district . '", '
                . '`city`= "' . $this->city . '", '
                . '`address`= "' . $this->address . '", '
                . '`vehicleNumber`= "' . $this->vehicleNumber . '", '
                . '`fuelType`= "' . $this->fuelType . '", '
                . '`noOfPassengers`= "' . $this->noOfPassengers . '", '
                . '`noOfBaggage`= "' . $this->noOfBaggage . '", '
                . '`noOfDoors`= "' . $this->noOfDoors . '", '
                . '`airConditioned`= "' . $this->airConditioned . '", '
                . '`price_self_drive`= "' . $this->price_self_drive . '", '
                . '`price_tours`= "' . $this->price_tours . '", '
                . '`price_wedding`= "' . $this->price_wedding . '", '
                . '`price_airport`= "' . $this->price_airport . '"'
                . ' WHERE id="' . $this->id . '"';

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function GetRentACarsByUser($user) {

        $query = "SELECT * FROM `rent_a_car` WHERE `user` = '" . $user . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function delete() {

        $RENT_A_CAR_PHOTO = new RentACarPhoto(NULL);

        $result = $RENT_A_CAR_PHOTO->deleteRentACarPhotoByRentACar($this->id);

        if ($result) {
            $query = 'DELETE FROM `rent_a_car` WHERE id="' . $this->id . '"';
        }

        $db = new Database();

        return $db->readQuery($query);
//        dd($query);
    }

}
