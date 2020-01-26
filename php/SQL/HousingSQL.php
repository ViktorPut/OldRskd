<?php
    require_once 'AbstractSQLClass.php';
    require_once 'php/Entity/HousingClass.php';
    require_once 'php/Entity/SimpleClass.php';
    require_once 'php/Entity/RCClass.php';
    require_once 'php/Entity/AddressClass.php';
    require_once 'RCSQL.php';
    require_once 'UserSQL.php';
    require_once 'AddressSQL.php';

    class HousingSQL extends AbstractSQLClass{
        protected $addressSQL = null;
        protected $rcSQL = null;

        public function __construct($tableName = 'housing'){
            parent::__construct($tableName);
            $this->addressSQL = new AddressSQL();
        }

        protected function createInstance($row){
            $id = $row["id"];
            $rcObject = $this->simpleSQL->getSimpleParam('residential_complex', $row['type_id']);
            $houseType = $this->simpleSQL->getSimpleParam('house_type', $row['rc_id']);
//            $rcObject = $this->rcSQL->getByID();
            $category = $this->simpleSQL->getSimpleParam('category', $row['category_id']);
            $balcony = $this->simpleSQL->getSimpleParam('balcony', $row['balcony_id']);
            $addressObject = $this->addressSQL->getByID($row['address_id']);
            $floorsNumber = $row["floors_number"];
            $roomsNumber = $row["rooms_number"];
            $description = $row["description"];
            $space = $row["space_house"];
            $cost  = $row["cost_house"];
            $instance = new HousingClass($id, $houseType, $category, $balcony, $addressObject, $roomsNumber, $floorsNumber, $cost, $space, $description, $rcObject);
            $instance->setPhotos($this->getPhoto($id));
            return $instance;
            // TODO: Implement createInstance() method.
        }

        public function getPhoto($parent_id){
            if ($parent_id == 0)
                return null;
            $sql = "SELECT * FROM photo WHERE house_id = $parent_id";

            $rows = $this->connection->query($sql);
            if ($rows->rowCount() > 0){
                foreach ($rows as $row) {
                    $photos[] = $row['place'];
                }
                if(isset($photos)){
                    return $photos;
                }
            }else{
                return null;
            }
        }

        public function insertPhoto($place, $parent_id){
            if ($parent_id == 0){
                return null;
            }
            $sql = "INSERT INTO photo(id, place, house_id) VALUES(null, '$place', $parent_id)";
            try{
                $this->connection->query($sql);
            }catch (PDOException $exception){
            }
        }

        public function insertHousing($insertInstance){
            $addressSQL = new AddressSQL();
            $addressSQL->insertAddress($insertInstance->getAddressObject());
            $this->simpleSQL->insertSimpleParam('house_type', $insertInstance->getHouseType());
            $this->simpleSQL->insertSimpleParam('category', $insertInstance->getCategory());
            $this->simpleSQL->insertSimpleParam('balcony', $insertInstance->getBalcony());
            $this->simpleSQL->insertSimpleParam('residential_complex', $insertInstance->getRcObject());

            $param = "(floors_number, rooms_number, space_house, cost_house, description, address_id, type_id, category_id, rc_id, balcony_id)";
            $sql = "INSERT INTO $this->tableName $param VALUES(:floors, :rooms, :spaces, :cost, :descr, :addr, :types, :category, :rc, :balcony )";

            $this->connection->beginTransaction();

            try {
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    'floors'   => $insertInstance->getFloorsNumber(),
                    'rooms'    => $insertInstance->getRoomsNumber(),
                    'spaces'   => $insertInstance->getSpace(),
                    'cost'     => $insertInstance->getCost(),
                    'descr'    => $insertInstance->getDescription(),
                    'addr'     => $insertInstance->getAddressObject()->getID(),
                    'types'    => $insertInstance->getHouseType()->getID(),
                    'category' => $insertInstance->getCategory()->getID(),
                    'rc'       => $insertInstance->getRcObject()->getID(),
                    'balcony'  => $insertInstance->getBalcony()->getID()
                ]);
                $insertInstance->setID($this->connection->lastInsertID());
                $this->connection->commit();
//                if ($insertInstance->hasPhoto){
//                    foreach ($insertInstance->getPhotos() as $photo){
//                        $this->insertPhoto($photo, $insertInstance->getID());
//                    }
//                }
                return true;
            } catch (PDOException $exception) {
                echo $this->connection->errorInfo().$this->connection->errorCode();
                $this->connection->rollBack();
                $insertInstance->setID(0);
                return false;
            }
        }

        public function updateHousing($instance){
            if ($instance === null){
                return false;
            }
            $adrSQL = new AddressSQL();

            $adrSQL->updateAddress($instance->getAddressObject());
            $this->simpleSQL->updateSimpleParam('residential_complex', $instance->getRcObject());
            $this->simpleSQL->updateSimpleParam('category', $instance->getCategory());
            $this->simpleSQL->updateSimpleParam('house_type', $instance->getHouseType());
            $this->simpleSQL->updateSimpleParam('balcony', $instance->getBalcony());

            $sql = "UPDATE $this->tableName SET floors_number = :floors, rooms_number = :rooms, space_house = :space, cost_house = :cost, description = :desc WHERE id = :id";
            $this->connection->beginTransaction();
            try{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    'floors' => $instance->getFloorsNumber(),
                    'rooms'  => $instance->getRoomsNumber(),
                    'space'  => $instance->getSpace(),
                    'cost'   => $instance->getCost(),
                    'desc'   => $instance->getDescription(),
                    'id'     => $instance->getID(),
                ]);
                $this->connection->commit();
            }catch (PDOException $exception){
                $this->connection->rollBack();
                return false;
            }
        }
        public function deletePhoto($id){
            $this->connection->query("DELETE FROM photo WHERE house_id = $id");
        }

        public function link_user($user_id, $house_id){
            $sql = "INSERT INTO link_user VALUES(null, :user, :house)";

            $this->connection->beginTransaction();
            try{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    'user' => $user_id,
                    'house' =>$house_id
                ]);
                $this->connection->commit();
                return true;
            }catch (PDOException $exception){
                $this->connection->rollBack();
                return false;
            }
        }

        /**
         * @param $house_id
         * @return |null
         */

        public function getLink($house_id){
            if($house_id == 0){
                return null;
            }
            $rows = $this->connection->query("SELECT * FROM link_user WHERE house_id = $house_id");
            if (count($rows)){
                foreach ($rows as $row){
                    $user = new UserSQL();
                    return $user->getByID($row["user_id"]);
                }
            }
        }

        public function updateLink($user_id, $house_id){
            if($house_id == 0 || $user_id == 0){
                return false;
            }
            $sql = "UPDATE link_user SET user_id = :user WHERE house_id = :house";
            $this->connection->beginTransaction();
            try{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    'user' => $user_id,
                    'house' =>$house_id
                ]);
                $this->connection->commit();
                return true;
            }catch (PDOException $exception){
                $this->connection->roolBack();
                return false;
            }
        }
    }
?>