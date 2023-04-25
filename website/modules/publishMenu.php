<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];
$id_menu = $_GET["reservationMeal"];


if(isset($date) && isset($id_menu) && isset($_SESSION["user"])){
        $dateFormatted = date("Y-m-d", strtotime($date));

        MySQLPDO::makeReserve($dateFormatted, $id_menu, $_SESSION["user"] -> getId());
        header("Location: ../templates/publishMenu.php");
}
else{
    header("Location: ../public/errorPage.html");
}

?>