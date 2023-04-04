<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');

if (isset($_POST["email"])) {

    $user = new User;
    $user->setName($_POST["name"]);
    $user->setSurname($_POST["surname"]);
    $user->setEmail($_POST["email"]);
    $user->setPassHash(password_hash($_POST["password"], PASSWORD_DEFAULT));
    $user->setBirthdate($_POST["birthdate"]);
    $user->setBalance(0);


    if (isset($_POST["resident"]) && $_POST["resident"] == "on") {
        $user->setRole(2);
    } else {
        $user->setRole(1);
    }
    MySQLPDO::signup($user);



    header("Location: ../public/login_form.html");
}
else{
    header("Location: ../public/errorPage.html");
}
?>