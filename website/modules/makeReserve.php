<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];

$meal = $_GET["reservationMeal"];


if(isset($date) && isset($meal) && isset($_SESSION["user"])){
    $idMeal = MySQLPDO::lastOfMealType($meal, $date);

    $dateFormatted = date("d-m-Y", strtotime($date));
    if(isset($idMeal[0])){
        extract($idMeal[0]);
        MySQLPDO::makeReserve($date, $id_menu, $_SESSION["user"] -> getId());
    }
    else{
        if($meal == "dinner"){
            MySQLPDO::makeReserve($date, 2, $_SESSION["user"] -> getId());
        }
        else if($meal == "lunch"){
            MySQLPDO::makeReserve($date, 3, $_SESSION["user"] -> getId());
        }
    }

    header("Location: ../templates/index.php");
}
else{
    header("Location: ../public/error.html");
}

?>