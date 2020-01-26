<?php

    require_once 'php/Entity/UserCLass.php';
    require_once 'php/SQL/UserSQL.php';
    require_once 'D:/OpenServer/OSPanel/domains/localhost/Test/ProjConstants.php';

    session_start();
    if (isset($_POST['login'])){
        $login = htmlentities($_POST['login']);
    }else{
        die("Введите логин!");
        return;
    }
    if (isset($_POST['password'])){
        $password = htmlentities($_POST['password']);
    }else{
        die("Введите пароль!");
        return;
    }
//    $a = ;
    $userSql = new UserSQL();
    $user = $userSql->getByLogin($login, $password);
    if($user !== null ){
        setcookie(USER_ID, $user->getID(), time()+3600*24*30);
        header('Location: index.php');
    }else{
        die("Ошибка авторизации! Проверьте правильность введенных данных");
    }


?>