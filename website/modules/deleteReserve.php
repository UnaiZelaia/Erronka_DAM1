<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$idReserve = $_GET["cancel"];


if(isset($idReserve) && isset($_SESSION["user"])){
    

    MySQLPDO::deleteReserve($idReserve);
    header("Location: ../templates/reservesList.php");
}
else{
    header("Location: ../public/errorPage.html");
}

?>