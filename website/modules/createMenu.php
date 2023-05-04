<?php
require('../model/MySQLPDO.class.php');
require('../model/User.class.php');
session_start();
if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["hiddenItemArray"])){
    $name = $_POST["name"];
    $type = $_POST["type"];
    $items = $_POST["hiddenItemArray"];
    $items = json_decode($items);
    MySQLPDO::insertMenu($name, $type);
    $lastMenu = MySQLPDO::selectMenuId();
    $lastMenu = $lastMenu[0]["id_menu"];
    foreach($items as $item){
        $itemId = MySQLPDO::selectItemId($item);
        $itemId = $itemId[0];
        extract($itemId);
        MySQLPDO::insertMenuItems($lastMenu, $id_item);
    }
    header("Location: ../templates/createMenu.php");
}
else{
    header("Location: ../templates/error.php");
}

?>






