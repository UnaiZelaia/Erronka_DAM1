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
<<<<<<< HEAD
    header("Location: ../templates/myUser.php?a=1");
}
else{
    header("Location: ../templates/myUser.php?a=0");
=======
    header("Location: ../templates/myUser.php");
}
else{
    echo $_POST["name"];
    echo $_POST["surname"];
    echo $_POST["email"];
>>>>>>> 7a7786032cc83dded0a472fc4bb9e56441e5a999
}
?>