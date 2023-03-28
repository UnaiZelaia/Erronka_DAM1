<?php
    $user = new User;
    $user -> setName($_POST["name"]);
    $user -> setSurname($_POST["surname"]);
    $user -> setEmail($_POST["email"]);
    $user -> setPassHash(password_hash($_POST["password"], PASSWORD_DEFAULT));
    $user -> setBirhtdate($_POST["birthdate"]);

    $user -> setBalance(0);

    if($_POST["resident"] = "on"){
        $user -> setRole(2);
    }
    else{
        $user -> setRole(1);
    }

    $result = MySQLPDO::signup($user);
    print($result);
    header("Location: ../templates/home_log.php")
?>