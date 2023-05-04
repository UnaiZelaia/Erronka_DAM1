<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];
$id_menu = $_GET["reservationMeal"];


if(isset($date) && isset($id_menu) && isset($_SESSION["user"])){
        $dateFormatted = date("Y-m-d", strtotime($date));

        MySQLPDO::makeReserve($dateFormatted, $id_menu, $_SESSION["user"] -> getId());
<<<<<<< HEAD
        header("Location: ../templates/publishMenu.php?a=1");
}
else{
    header("Location: ../public/publishMenu.php?a=0");
=======
        header("Location: ../templates/publishMenu.php");
}
else{
    header("Location: ../public/errorPage.html");
>>>>>>> 7a7786032cc83dded0a472fc4bb9e56441e5a999
}

?>