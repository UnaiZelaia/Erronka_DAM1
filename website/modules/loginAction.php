<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');

$email = $_POST["email"];
$pass = $_POST["password"];

$result = MySQLPDO::login($email);

if(isset($result["email"])){
    if(password_verify($pass, $result["hash_password"])){
        session_start();
        $_SESSION["user"] = new User;
        $_SESSION["user"] -> setId($result["id_user"]);
        $_SESSION["user"] -> setEmail($result["email"]);
        $_SESSION["user"] -> setName($result["name"]);
        $_SESSION["user"] -> setSurname($result["surname"]);
        $_SESSION["user"] -> setBirthdate($result["birthdate"]);
        $_SESSION["user"] -> setRole($result["id_role"]);
        $_SESSION["user"] -> setBalance($result["balance"]);
        $_SESSION["loged"] = "ok";
        header("Location: ../templates/index.php");
        exit();
    }
    else{
        header("Location: ../public/login_form.php?a=0");
        exit();
    }
}
else{
    header("Location: ../public/login_form.php?a=0");
}
?>