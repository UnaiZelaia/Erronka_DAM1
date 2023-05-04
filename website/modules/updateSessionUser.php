<?php

function updateUser(){
    

    if(isset($_SESSION["user"]) && $_SESSION["loged"] == "ok"){

        $result = MySQLPDO::updateSessionUser($_SESSION["user"]->getId());
        
        $_SESSION["user"] -> setId($result["id_user"]);
        $_SESSION["user"] -> setEmail($result["email"]);
        $_SESSION["user"] -> setName($result["name"]);
        $_SESSION["user"] -> setSurname($result["surname"]);
        $_SESSION["user"] -> setBirthdate($result["birthdate"]);
        $_SESSION["user"] -> setRole($result["id_role"]);
        $_SESSION["user"] -> setBalance($result["balance"]);
        return;
    }
}

?>