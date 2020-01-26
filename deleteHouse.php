<?php
    require_once 'php/SQL/HousingSQL.php';
    if (isset($_POST["deleteID"])){
        if(!isset($_COOKIE[USER_ID])){
            exit();
        }
        $sql = new HousingSQL();
        $sql->deletePhoto($_POST["deleteID"]);
        $sql->deleteByID($_POST["deleteID"]);
    }
    header('Location: index.php');
?>