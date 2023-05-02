<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

$date = $_GET["reservationDate"];

$meal = $_GET["reservationMeal"];

$week = $_GET["reservationWeek"];





if(isset($date) && isset($meal) && isset($week) && isset($_SESSION["user"])){
    
    $dateFormatted = date("d-m-Y", strtotime($date));
    
    for ($i = 0; $i < $week; $i++) {
        $idMeal = MySQLPDO::lastOfMealType($meal, $date);
        if(!isset($idMeal[0])) {
            if ($meal == "dinner") {
                MySQLPDO::makeReserve($date, 2, $_SESSION["user"] -> getId());
            }
            else if ($meal == "lunch") {
                MySQLPDO::makeReserve($date, 3, $_SESSION["user"] -> getId());
            }
        }
        else {
        extract($idMeal[0]);
        MySQLPDO::makeReserve($date, $id_menu, $_SESSION["user"] -> getId());
    }
    $date = date('Y-m-d', strtotime($date . ' +7 days'));
}



    
    header("Location: ../templates/index.php");
}
else{
    header("Location: ../public/errorPage.html");
}

?>