<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];
$meal = $_GET["meal"];


if(isset($date) && isset($meal) && isset($_SESSION["user"])){
    

    MySQLPDO::deleteReserve($date, $_SESSION["user"] -> getId, $idMeal);
}
else{
    header("Location: ../public/errorPage.html");
}

?>