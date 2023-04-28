<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

if (isset($_POST["name"]) || isset($_POST["surname"]) || isset($_POST["email"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];

    try{
    MySQLPDO::updateUserName($name, $_SESSION["user"]->getId());
    }
    catch(Exception $e){
    }
    try{
        MySQLPDO::updateUserSurname($surname, $_SESSION["user"]->getId());
    }
    catch(Exception $e){
    }
    try{
        MySQLPDO::updateUserEmail($email, $_SESSION["user"] -> getId());
    }
    catch(Exception $e){
    }
    header("Location: ../templates/myUser.php?a=1");
}
else{
    header("Location: ../templates/myUser.php?a=0");
}
?>