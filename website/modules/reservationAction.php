<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");


$day = $_GET["day"];
$type = $_GET["type"];

if(isset($day) && isset($type)){
    $year = date("Y");
    $month = date("m");
    $date = $year . "-" . $month . "-" . $day;

    MySQLPDO::makeReserve($date, $menu, $_SESSSION["user"] -> getId());
}
else{
    header("Location: ../templates/reservationError.php");
}
?>