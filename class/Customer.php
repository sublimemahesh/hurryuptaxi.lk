<?php

/**
 * Description of customer
 *
 * @author WJK Nisansala
 */
class Customer {

    public $id;
    public $unique_id;
    public $name;
    public $email;
    public $contact_no;
    public $encrypted_password;
    public $otp;
    public $verified;
    public $created_at;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `customer` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->unique_id = $result['unique_id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->contact_no = $result['contact_no'];
            $this->encrypted_password = $result['encrypted_password'];
            $this->otp = $result['otp'];
            $this->verified = $result['verified'];
            $this->created_at = $result['created_at'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `customer` (`name`,`unique_id`,`email`,`contact_no`,`encrypted_password`,`verified`,`created_at`) VALUES  ('"
                . $this->name . "','"
                . $this->unique_id . "','"
                . $this->email . "', '"
                . $this->contact_no . "', '"
                . $this->encrypted_password . "', '"
                . $this->verified . "', '"
                . $this->created_at . "')";

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

        $query = "SELECT * FROM `customer` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `customer` SET "
                . "`name` ='" . $this->name . "', "
                . "`unique_id` ='" . $this->unique_id . "', "
                . "`email` ='" . $this->email . "', "
                . "`contact_no` ='" . $this->contact_no . "', "
                . "`encrypted_password` ='" . $this->encrypted_password . "', "
                . "`otp` ='" . $this->otp . "', "
                . "`verified` ='" . $this->verified . "', "
                . "`created_at` ='" . $this->created_at . "' "
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

        $query = 'DELETE FROM `customer` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function activecustomer() {

        $query = "SELECT * FROM `customer` WHERE verified = '1' ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function InActivecustomer() {

        $query = "SELECT * FROM `customer` WHERE verified = '0'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function changePassword($id, $password) {

        $enPass = md5($password);

        $query = "UPDATE  `customer` SET "
                . "`encrypted_password` ='" . $enPass . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function arrange($key, $img) {
        $query = "UPDATE `customer` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
