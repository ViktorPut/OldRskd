<?php
//    require_once 'php/SQL/AbstractSQLClass.php';
//    require_once 'php/Entity/RCClass.php';
//    require_once 'php/Entity/SimpleClass.php';
//
//    class RCSQL extends AbstractSQLClass{
//
//        public function __construct($tableName = 'residential_complex'){
//            parent::__construct($tableName);
//        }
//
//        protected function createInstance($row){
//            $deleloper = $this->simpleSQL->getSimpleParam("developer", $row["developer_id"]);
//            $name = $row['name'];
//            $id = $row['id'];
//            return new RCClass($id, $name, $deleloper);
//            // TODO: Implement createInstance() method.
//        }
//
//        /**Получить объекты по простому признаку
//         * @param $param
//         * @param $nameParam
//         * @return array|null
//         */
//
//        public function insertRC($insertInstance){
//            if ($this->simpleSQL->insertSimpleParam('developer', $insertInstance->getDeveloper())){
//                $sql = "INSERT INTO $this->tableName (name, developer_id) VALUES(:name, :developer_id)";
//                $this->connection->beginTransaction();
//                try{
//                    $stmt = $this->connection->prepare($sql);
//                    $stmt->execute([
//                        'name' => $insertInstance->getName(),
//                        'developer_id' =>$insertInstance->getDeveloper()->getID()
//                    ]);
//                    $insertInstance->setID($this->connection->lastInsertID());
//                    $this->connection->commit();
//                    return true;
//                }catch (PDOException $exception){
//                    $this->connection->rollBack();
//                    $insertInstance->setID(0);
//                    return false;
//                }
//            }else{
//                return false;
//            }
//        }
//
//        public function updateRC($instance){
//            if ($instance === null){
//                return false;
//            }
//
//            $sql = "UPDATE $this->tableName SET name = :name WHERE id = :id";
//            $this->simpleSQL->updateSimpleParam('developer', $instance->getDeveloper());
//
//            $this->connection->beginTransaction();
//
//            try{
//                $stmt = $this->connection->prepare($sql);
//                $stmt->execute([
//                    'name' => $instance->getName(),
//                    'id'  => $instance->getID()
//                ]);
//                $this->connection->commit();
//                return true;
//            }catch (PDOException $exception){
//                $this->connection->rollBack();
//                return false;
//            }
//        }
//    }
//?>