<?php
    require_once 'php/SQL/HousingSQL.php';
    require_once 'ProjConstants.php';
    require_once 'php/Entity/HousingClass.php';
//    ob_start();
    if (!isset($_COOKIE[USER_ID])){
        header('Location: index.php');
    }

    $floors = isset($_POST["floors"]) ? htmlentities($_POST["floors"]) : 1;
    $rooms = isset($_POST["rooms"]) ? htmlentities($_POST["rooms"]) : 1;
    $category = isset($_POST["category"]) ? htmlentities($_POST["category"]) : "";
    $balcony = isset($_POST["balcony"]) ? htmlentities($_POST["balcony"]) : "";
    $type = isset($_POST["type"]) ? htmlentities($_POST["type"]) : "";
    $space = isset($_POST["space"]) ? htmlentities($_POST["space"]) : 1;
    $rc = isset($_POST["rc"]) ? htmlentities($_POST["rc"]) : "";
    $number = isset($_POST["number"]) ? htmlentities($_POST["number"]) : 1;
    $cost = isset($_POST["cost"]) ? htmlentities($_POST["cost"]) : 1;
    $description = isset($_POST["description"]) ? htmlentities($_POST["description"]) : "";
    $city = isset($_POST["city"]) ? htmlentities($_POST["city"]) : "";
    $district = isset($_POST["district"]) ? htmlentities($_POST["district"]) : "";
    $street = isset($_POST["street"]) ? htmlentities($_POST["street"]) : "";


    if(isset($_POST["id"])) {
        $id = $_POST["id"];
    }

    //
    $sql = new HousingSQL();
    $house = $sql->getByID($id);

    if ($house->getID() == 0){
        exit();
    }

    $house->getHouseType()->setName($type);
    $house->getRcObject()->setName($rc);
    $house->getAddressObject()->getCity()->setName($city);
    $house->getAddressObject()->getDistrict()->setName($district);
    $house->getAddressObject()->getStreet()->setName($street);
    $house->getAddressObject()->setNumber($number);
    $house->getBalcony()->setName($balcony);
    $house->getCategory()->setName($category);

    $house->setCost($cost);
    $house->setDescription($description);
    $house->setFloorsNumber($floors);
    $house->setRoomsNumber($rooms);
    $house->setSpace($space);



//    $allowedFileTypes = array('.jpg', '.gif', '.bmp', '.png'); // Допустимые типы файлов
    $maxSize = 104857600; // Максимальный размер файла в байтах (100мб)
    $uploadPath = "./photo/housePhoto/".$house->getID()."/";
    $house->setPhotos($sql->getPhoto($id));

    for( $i = 0; $i < count($_FILES["userfile"]["name"]); $i++){
        $filename = $_FILES['userfile']['name'][$i];
        $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
//        if (!in_array($ext, $allowedFileTypes)) {
//            continue;
//        }
        if (filesize($_FILES["userfile"]["tmp_name"][$id]) > $maxSize) {
            continue;
        }
        if (!is_writable($uploadPath)) { // Проверяем, доступна ли на запись папка.
            continue;
        }
        $filename = $house->getNextPhotoName() . '.png';
        if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadPath . $filename)) {
            $sql->insertPhoto($uploadPath.$filename, $id);
        }
    }

    $sql->updateHousing($house);

    header('Location: index.php');

?>
