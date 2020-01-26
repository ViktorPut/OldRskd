<?php
    require_once 'ProjConstants.php';
    if(isset($_COOKIE[USER_ID])){
        setcookie(USER_ID, '');
        header('Location: index.php');
    }
?>