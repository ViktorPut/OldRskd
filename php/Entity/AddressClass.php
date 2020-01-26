<?php

    require_once 'EntityInterface.php';
//    require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/php/Entity/EntityInterface.php';
//    require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/php/Entity/SimpleClass.php';
    require_once 'SimpleClass.php';

    class AddressClass implements  EntityInterface {
        protected $id = 0;
        protected $houseNumber = 0;
        protected $country = null ;
        protected $city = null;
        protected $district = null;
        protected $street = null;

        public function __construct($id, $country, $city, $district, $street){
            $this->country = $country;
            $this->city = $city;
            $this->district = $district;
            $this->street = $street;
            $this->id = $id;
        }

        public function getID(){
            return $this->id;
            // TODO: Implement getID() method.
        }

        /**
         * @return SimpleClass
         */
        public function getCity(){
            return $this->city;
        }

        /**
         * @return SimpleClass
         */
        public function getCountry(){
            return $this->country;
        }

        /**
         * @return null
         */
        public function getDistrict(){
            return $this->district;
        }

        public function getNumber(){
            return $this->houseNumber;
        }

        /**
         * @return null
         */
        public function getStreet(){
            return $this->street;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function setNumber($number){
            $this->houseNumber = $number;
        }

        /**
         * @return string
         */
        public function getFullName(){
            return $this->city->getName() . ', '.$this->district->getName() .', '. $this->street->getName() . ', '.$this->houseNumber;
        }
    }

?>