<?php
require_once 'EntityInterface.php';

class SimpleClass implements  EntityInterface{
    protected $id = 0;
    protected $name = "";

    public function __construct($id, $name){
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getID(){
        return $this->id;
        // TODO: Implement getID() method.
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    public function setID($id){
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name){
        $this->name = $name;
    }
}

?>