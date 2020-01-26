<?php
require_once "Entity/HousingClass.php";


class FilterClass{
    public $spaceMax = 0;
    public $spaceMin = 0;

    public $costMax = 0;
    public $costMin = 0;

    public $countRooms = null;

    public $city = "";
    public $district = "";
    public $street = "";

    public function filter($housing){

        foreach ($housing as $house) {
            if ($this->spaceMax != 0 && $this->spaceMax < $house->getSpace()){
                continue;
            }

            if ($this->spaceMin != 0 && $this->spaceMin > $house->getSpace()){
                continue;
            }

            if ($this->costMax != 0 && $this->costMax < $house->getCost()){
                continue;
            }

            if ($this->costMin != 0 && $this->costMin > $house->getCost()){
                continue;
            }
            $check = false;
            $room = $house->getRoomsNumber();
            if(count($this->countRooms) > 0){
                foreach ($this->countRooms as $rooms){
                    if($rooms == $room){
                        $check = true;
                        break;
                    }
                    if($rooms == 4 && $room > 3 ){
                        $check = true;
                        break;
                    }
                }
            }else{
                $check = true;
            }
            if ($check === false){
                continue;
            }
            if (   ($this->city != $house->getAddressObject()->getCity()->getName() && $this->city != "")
                || ($this->district != $house->getAddressObject()->getDistrict()->getName() && $this->district != "" )
                || ($this->street != $house->getAddressObject()->getStreet()->getName() && $this->street != "" ) ) {
                if(    !preg_match("/$this->city/",     $house->getAddressObject()->getCity()->getName() )
                    || !preg_match("/$this->district/", $house->getAddressObject()->getDistrict()->getName())
                    || !preg_match("/$this->street/",   $house->getAddressObject()->getStreet()->getName())){
                    continue;
                }
            }
            $answer[] = $house;
        }

        return $answer;
    }

    public function resetFilter(){
        $this->spaceMax = 0;
        $this->spaceMin = 0;

        $this->costMax = 0;
        $this->costMin = 0;

        $this->countRooms = null;

        $this->city = "";
        $this->district = "";
        $this->street = "";
    }
}

?>