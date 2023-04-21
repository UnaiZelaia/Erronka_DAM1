<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');

if (isset($_POST["name"]) || isset($_POST["surname"]) || isset($_POST["email"])) {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];

        MySQLPDO::updateUserName($name, $_SESSION["user"]->getId());
    }

    if (isset($_POST["surname"])) {
        $surname = $_POST["surname"];

        MySQLPDO::updateUserSurname($surname, $_SESSION["user"]->getId());
    }

    if (isset($_POST["email"])) {
        $email = 
    }
}
?>