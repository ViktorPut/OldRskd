<?php
    require_once 'php/SQL/HousingSQL.php';
    require_once 'php/SQL/AddressSQL.php';
    require_once 'php/Entity/SimpleClass.php';
    require_once 'php/Entity/AddressClass.php';
    if(!isset($_COOKIE[USER_ID])){
        exit();
    }
    ob_start();


    if(isset($_POST["floors"])){
        $floors = htmlentities($_POST["floors"]);
    }else{
        $floors = 1;
    }
    if(isset($_POST["rooms"])){
        $rooms = htmlentities($_POST["rooms"]);
    }else{
        $rooms = 1;
    }

    if(isset($_POST["category"])){
        $category = htmlentities($_POST["category"]);
    }else{
        $category = "";
    }

    if(isset($_POST["balcony"])){
        $balcony = htmlentities($_POST["balcony"]);
    }else{
        $balcony = "";
    }
    if(isset($_POST["type"])){
        $type = htmlentities($_POST["type"]);
    }else{
        $type = "";
    }
    if(isset($_POST["rc"])){
        $rc = htmlentities($_POST["rc"]);
    }else{
        $rc = "";
    }

    $space = htmlentities($_POST["space"]);
    $number = htmlentities($_POST["number"]);
    $cost = htmlentities($_POST["cost"]);
    $description = htmlentities($_POST["description"]);
    $city =  htmlentities($_POST["city"]);
    $district =  htmlentities($_POST["district"]);
    $street =  htmlentities($_POST["street"]);

    $adr = new AddressClass(0, new SimpleClass(1, ""), new SimpleClass(0, $city), new SimpleClass(0, $district), new SimpleClass(0, $street));
    $adr->setNumber($number);
    $hSQL = new HousingSQL();

    $newHouse = new HousingClass(
        0,
        new SimpleClass(0, $type),
        new SimpleClass(0, $category),
        new SimpleClass(0, $balcony),
        $adr,
        $rooms,
        $floors,
        $cost,
        $space,
        $description,
        new SimpleClass(0, $rc)
    );

    if(!$hSQL->insertHousing( $newHouse )){
        header('Location: index.php');
        ob_end_flush();
        exit();
    }
//    $allowedFileTypes = array('.jpg', '.gif', '.bmp', '.png'); // Допустимые типы файлов
    $maxSize = 104857600; // Максимальный размер файла в байтах (100мб)
    mkdir("./photo/housePhoto/".$newHouse->getID());
    $uploadPath = "./photo/housePhoto/".$newHouse->getID()."/";
    for( $i = 0; $i < count($_FILES["userfile"]["name"]); $i++){
        $filename = $_FILES['userfile']['name'][$i];
        $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
//        if (!in_array($ext, $allowedFileTypes)) {
//            continue;
//        }
        if (filesize($_FILES["userfile"]["tmp_name"][$i]) > $maxSize) {
            continue;
        }
        if (!is_writable($uploadPath)) { // Проверяем, доступна ли на запись папка.
            continue;
        }
        $filename = $newHouse->getNextPhotoName() . '.png';
        if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadPath . $filename)) {
            $photo[$i] = $uploadPath.$filename;
        }

    }
    if(count($photo) > 0) {
        $newHouse->setPhotos($photo);
        foreach ($photo as $p){
            $hSQL->insertPhoto($p, $newHouse->getID());
        }
    }
    header('Location: index.php');
    ob_end_flush();
    exit();


?>