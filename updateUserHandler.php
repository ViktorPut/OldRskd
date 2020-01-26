<?php
    require_once 'ProjConstants.php';
    require_once 'php/SQL/UserSQL.php';
    ob_start();
    if(!isset($_COOKIE[USER_ID])){
        exit();
    }

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $info = $_POST['info'];
    $name = $_POST['name'];
    $rank = $_POST['number'];

    $sql = new UserSQL();

    $userClass = $sql->getByID($_COOKIE[USER_ID]);
    $userClass->setEmail($email);
    $userClass->setUserInfo($info);
    $userClass->setUserName($name);
    $userClass->setUserPhone($phone);
    $userClass->setRank($rank);
    $allowedFileTypes = array('.jpg', '.gif', '.bmp', '.png'); // Допустимые типы файлов
    $maxSize = 104857600; // Максимальный размер файла в байтах (100мб)
    $uploadPath = "./photo/userPhoto/";
    $filename = $_FILES['userfile']['name'];
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
    if($_FILES['userfile']['size'] != 0) {
//        if (!in_array($ext, $allowedFileTypes)) {
//            die('Данный тип файла не поддерживается.');
//        }
        if (filesize($_FILES['userfile']['tmp_name']) > $maxSize) {
            die('Фаил слишком большой.');
        }
        if (!is_writable($uploadPath)) { // Проверяем, доступна ли на запись папка.
            die('Невозможно загрузить фаил в папку. Установите права доступа - 777.');
        }
        $filename = 'photo' . $_COOKIE[USER_ID] . '.png';
        unlink($uploadPath.$filename);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath . $filename)) {
            $userClass->setPhoto($uploadPath . $filename);
        }
    }
    $sql->updateInfo($userClass);
    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];
        if ($pass !== "") {
            $userClass->setPassword($pass);
            $sql->updatePass($userClass);
        }
    }

    header('Location: ./index.php');

?>