<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentACarPhoto
 *
 * @author official
 */
class RentACarPhoto {

    public $id;
    public $rentacar;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`rentacar`,`image_name`,`caption`,`sort` FROM `rent_a_car_photo` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->rentacar = $result['rentacar'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_a_car_photo` (`rentacar`,`image_name`,`caption`,`sort`) VALUES  ('"
                . $this->rentacar . "','"
                . $this->image_name . "', '"
                . $this->caption . "', '"
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

        $query = "SELECT * FROM `rent_a_car_photo` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `rent_a_car_photo` SET "
                . "`rentacar` ='" . $this->rentacar . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`caption` ='" . $this->caption . "', "
                . "`sort` ='" . $this->sort . "' "
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

        $query = 'DELETE FROM `rent_a_car_photo` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deleteRentACarPhotoByRentACar($rentacar) {

        $query = "DELETE FROM `rent_a_car_photo` WHERE `rentacar`= '" . $rentacar . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

    public function getRentACarPhotosByRentACar($id) {

        $query = "SELECT * FROM `rent_a_car_photo` WHERE `rentacar`= '" . $id . "' ORDER BY sort ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `rent_a_car_photo` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}