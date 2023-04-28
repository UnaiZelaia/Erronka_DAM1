<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");

session_start();

if(isset($_POST["userId"]) && isset($_POST["menuId"])){
    $userId = $_POST["userId"];
    $date = $_POST["date"];
    $menuId = $_POST["menuId"];

    MySQLPDO::makeReserve($date, $menuId, $userId);
    header("Location: ../templates/index.php?a=1");
}
else{
    header("Location: ../templates/index.php?a=0");
}
?>