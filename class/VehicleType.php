<?php
/**
 * Description of VehicleType
 *
 * @author Sublime Holdings
 */
class VehicleType {

    public function mainTypes() {

        return [
            1 => 'Car',
            2 => 'Van',
            3 => 'Bus',
            4 => 'SUV'
        ];
    }

    public function requestTypes() {

        return [
            1 => 'Self Drive',
            2 => 'Tours/ Chauffeur Driven',
            3 => 'Weddings & Events',
            4 => 'Airport/ City Transfers'
        ];
    }

    public function fuelTypes() {
        return [
            1 => 'Diesel',
            2 => 'Electric',
            3 => 'Petrol',
            4 => 'Hybrid'
        ];
    }

}