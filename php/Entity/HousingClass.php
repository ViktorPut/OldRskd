<?php
    require_once 'EntityInterface.php';
    require_once 'AddressClass.php';
    require_once 'RCClass.php';
//    require_once 'PhotoClass.php';

    class HousingClass implements EntityInterface{
        protected $counterPhoto = 0;
        protected $id = 0;
        protected $houseType = null;
        protected $rc = null;
        protected $category = null;
        protected $balcony = null;
        protected $addressObject = null;
        protected $floorsNumber = 0;
        protected $roomsNumber = 0;
        protected $description = "";
        protected $space = 0.0;
        protected $cost  = 0.0;
        protected $photos;

        public function getID(){
            return $this->id;
            // TODO: Implement getID() method.
        }
        /**
         * @param mixed $photos
         */
        public function setPhotos($photos)
        {
            if (count($photos) == 0) {
                return;
            }
            foreach ($photos as $photo){
                $this->photos[] = $photo;
            }
            $this->counterPhoto = count($this->photos);
        }

        /**
         * @return mixed
         */
        public function getPhotos(){
            if (count($this->photos) == 0) {
                $this->photos[] = 'photo/housePhoto/empty.jpg';
            }
            return $this->photos;
        }

        public function getNextPhotoName(){
            $name = "photo_".$this->id.'_'.$this->counterPhoto;
            $this->counterPhoto += 1;
            return $name;
        }

        public function __construct(
            $id,
            $houseType,
            $category,
            $balcony,
            $addressObject,
            $roomsNumber,
            $floorsNumber,
            $cost,
            $space,
            $description,
            $rcObject
        ){
            $this->id = $id;
            $this->category = $category;
            $this->houseType = $houseType;
            $this->balcony = $balcony;
            $this->addressObject = $addressObject;
            $this->floorsNumber = $floorsNumber;
            $this->roomsNumber = $roomsNumber;
            $this->cost = $cost;
            $this->space = $space;
            $this->rc = $rcObject;
            $this->description = $description;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function setHouseType($houseType){
            $this->houseType = $houseType;
        }

        /**
         * @return null
         */
        public function getAddressObject(){
            return $this->addressObject;
        }

        /**
         * @return null
         */
        public function getBalcony(){
            return $this->balcony;
        }

        /**
         * @return null
         */
        public function getCategory(){
            return $this->category;
        }

        /**
         * @return float
         */
        public function getCost(){
            return $this->cost;
        }

        /**
         * @return string
         */
        public function getDescription(){
            return $this->description;
        }

        /**
         * @return int
         */
        public function getFloorsNumber(){
            return $this->floorsNumber;
        }

        /**
         * @return null
         */
        public function getHouseType(){
            return $this->houseType;
        }

        /**
         * @return null
         */
        public function getRcObject(){
            return $this->rc;
        }

        /**
         * @return int
         */
        public function getRoomsNumber(){
            return $this->roomsNumber;
        }

        /**
         * @return float
         */
        public function getSpace(){
            return $this->space;
        }

        /**
         * @param null $addressObject
         */
        public function setAddressObject($addressObject){
            $this->addressObject = $addressObject;
        }

        /**
         * @param null $balcony
         */
        public function setBalcony($balcony){
            $this->balcony = $balcony;
        }

        /**
         * @param null $category
         */
        public function setCategory($category){
            $this->category = $category;
        }

        /**
         * @param null $rcObject
         */
        public function setRcObject($rc){
            $this->rc = $rc;
        }

        /**
         * @param float $cost
         */
        public function setCost($cost){
            $this->cost = $cost;
        }

        /**
         * @param string $description
         */
        public function setDescription($description){
            $this->description = $description;
        }

        /**
         * @param int $floorsNumber
         */
        public function setFloorsNumber($floorsNumber){
            $this->floorsNumber = $floorsNumber;
        }

        /**
         * @param int $roomsNumber
         */
        public function setRoomsNumber($roomsNumber){
            $this->roomsNumber = $roomsNumber;
        }

        /**
         * @param float $space
         */
        public function setSpace($space){
            $this->space = $space;
        }

    }

?>