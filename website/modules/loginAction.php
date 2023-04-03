<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');

$email = $_POST["email"];
$pass = $_POST["password"];

$result = MySQLPDO::login($email);
print($result);

if(isset($result["email"])){
    if(password_verify($pass, $result["password_hash"])){
        $_SESSION["user"] = new User;
        $_SESSION["user"] -> setEmail($result["email"]);
        $_SESSION["user"] -> setName($result["name"]);
        $_SESSION["user"] -> setSurname($result["surname"]);
        $_SESSION["user"] -> setBirhtdate($result["birthdate"]);
        $_SESSION["user"] -> setRole($result["id_role"]);
        $_SESSION["user"] -> setBalance($result["balance"]);
        $_SESSION["loged"] = "ok";
        session_start();
        header("Location: ../templates/home_log.php");
    }
    else{
        header("Location: ../public/loginError.html");
    }
}
else{
    header("Location: ../public/loginError.html");
}
?>