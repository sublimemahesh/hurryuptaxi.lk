<?php

/**
 * Description of User
 *
 * @author sublime holdings
 * @web www.sublime.lk
 */
class User {

    public $id;
    public $name;
    public $parent;
    public $email;
    public $district;
    public $city;
    public $dealer;
    public $address;
    public $phone_number;
    public $nic;
    public $createdAt;
    public $profile_picture;
    public $isActive;
    public $authToken;
    public $lastLogin;
    public $payment;
    public $bank;
    public $branch;
    public $account_type;
    public $holder_name;
    public $account_number;
    public $username;
    public $resetCode;
    public $password;
    public $activePaymentDate;
    public $isComPaid;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`parent`,`email`,`district`,`city`,`dealer`,`address`,`phone_number`,`nic`,`createdAt`,`profile_picture`,`isActive`,`authToken`,`lastLogin`,`payment`,`bank`,`branch`,`account_type`,`holder_name`,`account_number`,`username`,`resetcode`,`activePaymentDate`,`isComPaid` FROM `user` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->parent = $result['parent'];
            $this->email = $result['email'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->dealer = $result['dealer'];
            $this->address = $result['address'];
            $this->phone_number = $result['phone_number'];
            $this->nic = $result['nic'];
            $this->createdAt = $result['createdAt'];
            $this->profile_picture = $result['profile_picture'];
            $this->isActive = $result['isActive'];
            $this->lastLogin = $result['lastLogin'];
            $this->payment = $result['payment'];
            $this->bank = $result['bank'];
            $this->branch = $result['branch'];
            $this->account_type = $result['account_type'];
            $this->holder_name = $result['holder_name'];
            $this->account_number = $result['account_number'];
            $this->username = $result['username'];
            $this->authToken = $result['authToken'];
            $this->resetCode = $result['resetcode'];
            $this->activePaymentDate = $result['activePaymentDate'];
            $this->isComPaid = $result['isComPaid'];

            return $result;
        }
    }

    public function create() {

        date_default_timezone_set('Asia/Colombo');

        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `user` (`name`,`email`,`district`,`city`,`dealer`,`address`,`phone_number`,`nic`,`parent`,`createdAt`,`profile_picture`,`isActive`,`bank`,`branch`,`account_type`,`holder_name`,`account_number`,`username`,`password`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->district . "','"
                . $this->city . "','"
                . $this->dealer . "','"
                . $this->address . "','"
                . $this->phone_number . "','"
                . $this->nic . "','"
                . $this->parent . "','"
                . $this->createdAt . "','"
                . $this->profile_picture . "','"
                . $this->isActive . "','"
                . $this->bank . "','"
                . $this->branch . "','"
                . $this->account_type . "','"
                . $this->holder_name . "','"
                . $this->account_number . "','"
                . $this->username . "','"
                . $this->password . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function login($username, $password) {

        $enPass = md5($password);
        $query = "SELECT * FROM `user` WHERE `username`= '" . $username . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));


        if (!$result) {
            return FALSE;
        } else {
            $this->id = $result['id'];
            $this->setAuthToken($result['id']);
            $this->setLastLogin($this->id);

            $user = $this->__construct($this->id);

            $this->setUserSession($user);

            return $user;
        }
    }

    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `user` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function changePassword($id, $password) {

        $enPass = md5($password);

        $query = "UPDATE  `user` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function authenticate() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = NULL;
        $authToken = NULL;

        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
        }

        if (isset($_SESSION["authToken"])) {
            $authToken = $_SESSION["authToken"];
        }

        $query = "SELECT `id` FROM `user` WHERE `id`= '" . $id . "' AND `authToken`= '" . $authToken . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function logOut() {

        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["district"]);
        unset($_SESSION["city"]);
        unset($_SESSION["dealer"]);
        unset($_SESSION["address"]);
        unset($_SESSION["phone_number"]);
        unset($_SESSION["nic"]);
        unset($_SESSION["profile_picture"]);
        unset($_SESSION["isActive"]);
        unset($_SESSION["payment"]);
        unset($_SESSION["authToken"]);
        unset($_SESSION["bank"]);
        unset($_SESSION["branch"]);
        unset($_SESSION["account_type"]);
        unset($_SESSION["holder_name"]);
        unset($_SESSION["account_number"]);
        unset($_SESSION["lastLogin"]);
        unset($_SESSION["username"]);

        return TRUE;
    }

    public function all() {

        $query = "SELECT * FROM `user` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `user` SET "
                . "`name` ='" . $this->name . "', "
                . "`username` ='" . $this->username . "', "
                . "`email` ='" . $this->email . "', "
                . "`district` ='" . $this->district . "', "
                . "`city` ='" . $this->city . "', "
                . "`dealer` ='" . $this->dealer . "', "
                . "`address` ='" . $this->address . "', "
                . "`phone_number` ='" . $this->phone_number . "', "
                . "`nic` ='" . $this->nic . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`isActive` ='" . $this->isActive . "', "
                . "`payment` ='" . $this->payment . "', "
                . "`bank` ='" . $this->bank . "', "
                . "`branch` ='" . $this->branch . "', "
                . "`account_type` ='" . $this->account_type . "', "
                . "`holder_name` ='" . $this->holder_name . "', "
                . "`account_number` ='" . $this->account_number . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    private function setUserSession($user) {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION["id"] = $user['id'];
        $_SESSION["name"] = $user['name'];
        $_SESSION["email"] = $user['email'];
        $_SESSION["district"] = $user['district'];
        $_SESSION["city"] = $user['city'];
        $_SESSION["dealer"] = $user['dealer'];
        $_SESSION["address"] = $user['address'];
        $_SESSION["phone_number"] = $user['phone_number'];
        $_SESSION["nic"] = $user['nic'];
        $_SESSION["profile_picture"] = $user['profile_picture'];
        $_SESSION["isActive"] = $user['isActive'];
        $_SESSION["payment"] = $user['payment'];
        $_SESSION["authToken"] = $user['authToken'];
        $_SESSION["bank"] = $user['bank'];
        $_SESSION["branch"] = $user['branch'];
        $_SESSION["account_type"] = $user['account_type'];
        $_SESSION["holder_name"] = $user['holder_name'];
        $_SESSION["account_number"] = $user['account_number'];
        $_SESSION["lastLogin"] = $user['lastLogin'];
        $_SESSION["username"] = $user['username'];
    }

    private function setAuthToken($id) {

        $authToken = md5(uniqid(rand(), true));

        $query = "UPDATE `user` SET `authToken` ='" . $authToken . "' WHERE `id`='" . $id . "'";

        $db = new Database();

        if ($db->readQuery($query)) {

            return $authToken;
        } else {
            return FALSE;
        }
    }

    public function GetUserByParent($parent) {

        $query = "SELECT * FROM `user` WHERE `parent` = '" . $parent . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    private function setLastLogin($id) {

        date_default_timezone_set('Asia/Colombo');

        $now = date('Y-m-d H:i:s');

        $query = "UPDATE `user` SET `lastLogin` ='" . $now . "' WHERE `id`='" . $id . "'";

        $db = new Database();

        if ($db->readQuery($query)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkEmail($email) {

        $query = "SELECT `email`,`username` FROM `user` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function GenarateCode($email) {

        $rand = rand(10000, 99999);

        $query = "UPDATE  `user` SET "
                . "`resetcode` ='" . $rand . "' "
                . "WHERE `email` = '" . $email . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function SelectForgetUser($email) {

        if ($email) {

            $query = "SELECT `email`,`username`,`resetcode` FROM `user` WHERE `email`= '" . $email . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->username = $result['username'];
            $this->email = $result['email'];
            $this->restCode = $result['resetcode'];

            return $result;
        }
    }

    public function SelectResetCode($code) {

        $query = "SELECT `id` FROM `user` WHERE `resetcode`= '" . $code . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function updatePassword($password, $code) {

        $enPass = md5($password);

        $query = "UPDATE  `user` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `resetcode` = '" . $code . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getNextAvailableUsername() {

        $query = "SELECT MAX(id)+1 FROM `user`";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        return 'HUR' . str_pad($result["MAX(id)+1"], 6, '0', STR_PAD_LEFT);
    }

    public function setPaymentAndActive() {

        $query = "UPDATE  `user` SET "
                . "`isActive` ='" . $this->isActive . "', "
                . "`activePaymentDate` ='" . $this->activePaymentDate . "', "
                . "`payment` ='" . $this->payment . "', "
                . "`isComPaid` ='" . $this->isComPaid . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

}
