<?php

/**
 * Description of Dealear
 *
 * @author official
 */
class Dealer {

    public $id;
    public $name;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name` FROM `dealear` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `dealear` (`name`) VALUES  ('" . $this->name . "')";

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

        $query = "SELECT * FROM `dealear` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = 'UPDATE `dealear` SET `name`= "' . $this->name . '" WHERE id="' . $this->id . '"';

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `dealear` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}