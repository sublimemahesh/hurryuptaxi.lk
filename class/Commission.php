<?php

/**
 * Description of Commision
 *
 * @author Mayomi Gunawardana
 */
class Commission {

    public $id;
    public $user;
    public $parent;
    public $date;
    public $bank;
    public $payment_reference;
    public $other_comment;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`user`,`parent`,`date`,`bank`,`payment_reference`,`other_comment` FROM `commission` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->parent = $result['parent'];
            $this->date = $result['date'];
            $this->bank = $result['bank'];
            $this->payment_reference = $result['payment_reference'];
            $this->other_comment = $result['other_comment'];

            return $this;
        }
    }

    public function create() {

        date_default_timezone_set('Asia/Colombo');

        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `commission` (`user`,`parent`,`date`,`bank`,`payment_reference`,`other_comment`) VALUES  ('"
                . $this->user . "', '"
                . $this->parent . "', '"
                . $this->date . "', '"
                . $this->bank . "','"
                . $this->payment_reference . "', '"
                . $this->other_comment . "' )";

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

        $query = "SELECT * FROM `commission`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `commission` SET "
                . "`user` ='" . $this->user . "', "
                . "`parent` ='" . $this->parent . "', "
                . "`date` ='" . $this->date . "', "
                . "`bank` ='" . $this->bank . "', "
                . "`payment_reference` ='" . $this->payment_reference . "', "
                . "`other_comment` ='" . $this->other_comment . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function GetCommisionByUser($user) {

        $query = "SELECT * FROM `commission` WHERE `user` = '" . $user . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetCommisionByBank($bank) {

        $query = "SELECT * FROM `commission` WHERE `bank` = '" . $bank . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetUserByParent($parent) {

        $query = "SELECT * FROM `commission` WHERE `parent` = '" . $parent . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function delete() {

        $query = 'DELETE FROM `commission` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}