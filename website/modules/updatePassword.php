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
        header("Location: ../templates/myUser.php");
    }
}

?>