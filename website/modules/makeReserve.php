<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];

$meal = $_GET["reservationMeal"];


if(isset($date) && isset($meal) && isset($_SESSION["user"])){
    $idMeal = MySQLPDO::lastOfMealType($meal, $date);
<<<<<<< HEAD
    extract($idMeal[0]);
=======
    if(isset($idMeal)){
        extract($idMeal);
>>>>>>> 7a7786032cc83dded0a472fc4bb9e56441e5a999

        $dateFormatted = date("Y-m-d", strtotime($date));

<<<<<<< HEAD
    MySQLPDO::makeReserve($date,  $id_menu, $_SESSION["user"] -> getId());
    header("Location: ../templates/index.php");
=======
        MySQLPDO::makeReserve($dateFormatted, $id_menu, $_SESSION["user"] -> getId());
        header("Location: ../templates/reservation_form.php");
    }
    else{
        header("Location: ../templates/reservation_form.php");
    }
>>>>>>> 7a7786032cc83dded0a472fc4bb9e56441e5a999
}
else{
    header("Location: ../public/errorPage.html");
}

?>