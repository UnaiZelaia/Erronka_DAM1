<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();

if(isset($_POST["userId"]) && isset($_POST["menuId"])){
    $name = $_POST["name"];
    $type = $_POST["type"];
    $items = $_POST["items"];

    MySQLPDO::insertMenu($name, $type);
    $lastMenu = MySQLPDO::selectMenuId();
    $lastMenu = $lastMenu[0]["id_menu"];
    foreach($items as $item){
        $itemId = MySQLPDO::selectItemId($item);
        MySQLPDO::insertMenuItems($lastMenu, $itemId);
    }
    header("Location: ../templates/createMenu.php");
}
else{
    header("Location: ../templates/error.php");
}
?>






