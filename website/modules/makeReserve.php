<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];

$meal = $_GET["reservationMeal"];


if(isset($date) && isset($meal) && isset($_SESSION["user"])){
    $idMeal = MySQLPDO::lastOfMealType($meal, $date);
    extract($idMeal[0]);

    $dateFormatted = date("d-m-Y", strtotime($date));

    MySQLPDO::makeReserve($date,  $id_menu, $_SESSION["user"] -> getId());
    header("Location: ../templates/index.php");
}
else{
    header("Location: ../public/errorPage.html");
}

?>