<?php
require_once 'ProjConstants.php';
//require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/ProjConstants.php';
require_once 'SimpleSQL.php';
abstract  class AbstractSQLClass {

    protected  $tableName = "Default";
    protected $connection = null;
    protected $simpleSQL = null;
    public function __construct($tableName){
        $this->tableName = $tableName;
        $this->openConnection();
        $this->simpleSQL = new SimpleSQL($this->connection);
    }

    public function getAll(){
        $sqlQuery = "SELECT * FROM $this->tableName";
        $rows = $this->connection->query($sqlQuery);
        if ($rows->rowCount() == 0)
            return null;
        foreach ($rows as $row){
            $result[] = $this->createInstance($row);
        }
        return $result;
    }

    public function openConnection(){
        if ($this->connection !== null){
            return;
        }
        try{
            $dbName = DB_NAME;
            $serverName = SERVER_NAME;
            $charset = "utf8";
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->connection = new PDO("mysql:host=$serverName;dbname=$dbName;charset=$charset", USER_NAME, PASSWORD, $option);
            $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        }catch (PDOException $exception){
            echo "Error. Access denied. " . $exception->getMessage() ;
        }
    }

    public function getBySimpleParam($param, $nameParam, $tableNameChild){//объект класса SimpleParam, название параметра в составной таблице
        if ($param->getID() == 0){
            return null;
        }
        $sql = "SELECT * FROM $tableNameChild WHERE $nameParam = {$param->getID()}";
        $rows = $this->connection->query($sql);
        if ($rows->rowCount() > 0){
            foreach ($rows as $row) {
                $result[] = $this->createInstance($row);
            }
            if (isset($result)) {
                return $result;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function getByID($id){
        if ($id === 0)
            return null;
        $sql = "SELECT * FROM $this->tableName WHERE id = $id";

        $rows = $this->connection->query($sql);
        if ($rows->rowCount() > 0){
            foreach ($rows as $row)
                return $this->createInstance($row);
        }
        return null;

    }

    public function deleteByID($id){
        if($id === 0){
            return false;
        }
        $sql = "DELETE FROM $this->tableName WHERE id = :id";

        $this->connection->beginTransaction();
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);
            $this->connection->commit();
            return true;
        }catch (PDOException $exception){
            $this->connection->rollBack();
            return false;
        }
    }

    public function closeConnection(){
        $this->connection = null;
    }

    protected abstract function createInstance($row);

    public function __destruct()
    {
        $this->closeConnection();
        // TODO: Implement __destruct() method.
    }
}

?>