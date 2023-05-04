<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$oldPass = $_POST["oldPassword"];
$newPass = $_POST["newPassword1"];
$confirmPass = $_POST["newPassword2"];

if(isset($oldPass) && isset($newPass) && isset($confirmPass) && $newPass == $confirmPass){
    $userData = MySQLPDO::login($_SESSION["user"] -> getEmail());

    if(password_verify($oldPass, $userData["hash_password"]) ){
        $hashPass = password_hash($newPass, PASSWORD_DEFAULT);

        MySQLPDO::updatePassword($hashPass, $_SESSION["user"] -> getId());
<<<<<<< HEAD
        header("Location: ../templates/myUser.php?a=1");
    }
    else{
        header("Location: ../templates/myUser.php?a=0");
=======
        header("Location: ../templates/myUser.php");
>>>>>>> 7a7786032cc83dded0a472fc4bb9e56441e5a999
    }
}

?>