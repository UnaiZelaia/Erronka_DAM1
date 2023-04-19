<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");

session_start();


$day = $_POST["day"];
$type = $_POST["type"];
$userId = $_POST["userId"];
$date = $_POST["date"];

if(isset($day) && isset($type)){
    $year = date("Y");
    $month = date("m");
    $date = $year . "-" . $month . "-" . $day;

    MySQLPDO::makeReserve($date, $menu, $userId);
}
else{
    header("Location: ../templates/reservationError.php");
}
?>