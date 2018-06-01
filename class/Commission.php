<?php

/**
 * Description of Commission
 *
 * @author Mayomi Gunawardana
 */
class Commission {

    public $id;
    public $date;
    public $paid_for;
    public $paid_to;
    public $commission_amount;
    public $bank;
    public $payment_reference;
    public $other_comment;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`date`,`paid_for`,`paid_to`,`commission_amount`,`bank`,`payment_reference`,`other_comment` FROM `commission` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->date = $result['date'];
            $this->paid_for = $result['paid_for'];
            $this->paid_to = $result['paid_to'];
            $this->date = $result['commission_amount'];
            $this->bank = $result['bank'];
            $this->payment_reference = $result['payment_reference'];
            $this->other_comment = $result['other_comment'];

            return $this;
        }
    }

    public function create() {

//        date_default_timezone_set('Asia/Colombo');
//        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `commission` (`date`,`paid_for`,`paid_to`,`commission_amount`,`bank`,`payment_reference`,`other_comment`) VALUES  ('"
                . $this->date . "', '"
                . $this->paid_for . "', '"
                . $this->paid_to . "', '"
                . $this->commission_amount . "', '"
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
                . "`date` ='" . $this->date . "', "
                . "`paid_for` ='" . $this->paid_for . "', "
                . "`paid_to` ='" . $this->paid_to . "', "
                . "`commission_amount` ='" . $this->commission_amount . "', "
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

    public function GetCommisionByUser($paid_for) {

        $query = "SELECT * FROM `commission` WHERE `paid_for` = '" . $paid_for . "'";

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

    public function GetUserByParent($paid_to) {

        $query = "SELECT * FROM `commission` WHERE `paid_to` = '" . $paid_to . "'";

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