<?php

/**
 * Description of User
 *
 * @author sublime holdings
 * @web www.sublime.lk
 * */
class Database {

//    private $host = 'kelum818.ipagemysql.com';
//    private $name = 'hurryuptaxi';
//    private $user = 'hurryuptaxi';
//    private $password = 'Chin@228@hurryuptaxi';

    private $host = 'localhost';
    private $name = 'hurryuptaxi';
    private $user = 'root';
    private $password = '';

    public function __construct() {
        mysql_connect($this->host, $this->user, $this->password) or die("Invalid host  or user details");
        mysql_select_db($this->name) or die("Unable to select database");
    }

    public function readQuery($query) {

        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

}