<?php

class Search {

    public function GetVehiclesByKeywords($city, $vehicletype, $requesttype, $pageLimit, $setLimit) {

        $w = array();
        $where = '';

        if (!empty($city)) {
            $w[] = "`city` = '" . $city . "'";
        }
        if (!empty($vehicletype)) {
            $w[] = "`mainTypes` = '" . $vehicletype . "'";
        }
        if (!empty($requesttype)) {
            $w[] = "`requestTypes` = '" . $requesttype . "'";
        }
        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $query = "SELECT * FROM `rent_a_car` $where  LIMIT " . $pageLimit . " , " . $setLimit . "";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}