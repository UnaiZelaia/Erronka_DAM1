<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];

$meal = $_GET["reservationMeal"];


if(isset($date) && isset($meal) && isset($_SESSION["user"])){
    $idMeal = MySQLPDO::lastOfMealType($meal, $date);
    if(isset($idMeal)){
        extract($idMeal);

        $dateFormatted = date("Y-m-d", strtotime($date));

        MySQLPDO::makeReserve($dateFormatted, $id_menu, $_SESSION["user"] -> getId());
        header("Location: ../templates/reservation_form.php?a=1");
    }
    else{
        header("Location: ../templates/reservation_form.php?a=0");
    }
}
else{
    header("Location: ../templates/reservation_form.php?a=0");
}

?>