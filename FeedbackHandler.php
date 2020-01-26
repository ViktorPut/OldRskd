<?php
    require_once "ProjConstants.php";
    $from = "";
    $to = TO;
    if(isset($_POST["email"])){
        $from = htmlentities($_POST["email"]);
    }
    $subject = SUBJECT;
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: $from\r\nReply-to: $from\r\n\Content-type: text/plain; charset=utf-8\r\n";
    if(isset($_POST["message"])) {
        $message = htmlentities($_POST["message"]);
    }else{
        $message = "Текс сообщения пуст.";
    }
    mail($to, $subject, $message, $headers);
    header("Location: index.php");
?>