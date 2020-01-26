<?php
    require_once 'ProjConstants.php';
//    require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/ProjConstants.php';
//    require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/php/Entity/SimpleClass.php';
    require_once 'php/Entity/SimpleClass.php';

    class SimpleSQL{
        protected  $connection;
        public function __construct($connection){
            $this->connection = $connection;
        }
        /**
         * @param $tableName
         * @param $refParam
         * @param string $refField
         * @return SimpleClass
         */
        public function getSimpleParam($tableName, $refParam, $refField = 'id'){
            if ($refField == 'id')
                $sql = "SELECT * FROM $tableName WHERE $refField = $refParam";
            else
                $sql = "SELECT * FROM $tableName WHERE $refField = '$refParam'";
            $rows = $this->connection->query($sql);
            if($rows->rowCount() > 0) {
                foreach ($rows as $row) {
                    return new SimpleClass($row["id"], $row["name"]);
                }
            }else{
                return new SimpleClass(0,'');
            }
        }

        public function insertSimpleParam($tableName, $insertedInstance){
            if ($insertedInstance === null) {
                return false;
            }
//            $id = $this->getSimpleParam($tableName, $insertedInstance->getName(), 'name')->getID();
//            if ($id !== 0){
//                $insertedInstance->setID($id);
//                return true;
//            }
            $sql = "INSERT INTO $tableName (name) VALUES(:name)";
            $this->connection->beginTransaction();

            try{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute(['name' => $insertedInstance->getName()]);
                $insertedInstance->setID( $this->connection->lastInsertId());
                $this->connection->commit();
            }catch (PDOException $exception){
                $this->connection->rollBack();
                $insertedInstance->setID( 0 );
                return false;
            }
            return true;
        }

        public function updateSimpleParam($tableName, $instance){
            if ($instance === null ){
                return false;
            }
            $name = $instance->getName();
            $id = $instance->getID();
            $sql = "UPDATE $tableName SET name = '$name' WHERE id = $id";
            $this->connection->beginTransaction();

            try{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $this->connection->commit();
                return true;
            }catch (PDOException $exception){
                $this->connection->rollBack();
                return false;
            }
        }
    }
?>