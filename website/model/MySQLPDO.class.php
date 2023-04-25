<?php
class MySQLPDO {
    private static $host = "127.0.0.1"; //o la IP del servidor de BBBDD remoto
    private static $database = "canteen";
    private static $username = "root";
    private static $password = "";
    private static $base;
    
    public static function connect() {
        if (MySQLPDO::$base != null) {
            MySQLPDO::$base = null;
        }
        try {
            $dsn = "mysql:host=" . MySQLPDO::$host .  ";dbname=" . MySQLPDO::$database;
            MySQLPDO::$base = new PDO($dsn, MySQLPDO::$username, MySQLPDO::$password);
            MySQLPDO::$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return MySQLPDO::$base;
        } catch (Exception $e) {
            exit("Error connecting: {$e->getMessage()}");
        }
    }
    
    //ejecuta sentencias INSERT, UPDATE y DELETE
    public static function exec($sql, $params) {
        try{
            MySQLPDO::connect();
            $stmt = MySQLPDO::$base->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->rowCount();
            return $result; //devuelve el nº de filas afectadas por la sentencia
        }
        catch(Exception $e){
            exit("Error: {$e->getMessage()}");
        }
    }

    public static function select($sql, $params) {
        MySQLPDO::connect();
        $stmt = MySQLPDO::$base->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
        return $result; //devuelve el conjunto de datos de la consulta
    }

    public static function login($userEmail){
        $sql = "SELECT id_user, email, hash_password, name, surname, birthdate, id_role, balance FROM user WHERE UPPER(email) = ?";
        $params = array(strtoupper($userEmail));
        $result = MySQLPDO::select($sql, $params);
        return $result[0];
    }

    public static function signup($user){
        try{
        $sql = "INSERT INTO user (name, surname, email, hash_password, birthdate, id_role, balance) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $params = array($user -> getName(), $user -> getSurname(), $user -> getEmail(), $user -> getPassHash(), $user -> getBirthdate(), $user -> getRole(), $user -> getBalance());
        $result = MySQLPDO::exec($sql, $params);
        return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }


    public static function lastOfMealType($meal, $date){
        $sql = "SELECT m.id_menu FROM menu m 
                    INNER JOIN reserve r ON m.id_menu = r.id_menu
                        WHERE UPPER(m.meal) = ? AND r.menu_date = ?";

        $params = array(strtoupper($meal), $date);
        $result = MySQLPDO::select($sql, $params);
        return $result[0];
    }


    public static function makeReserve($date, $idMenu, $idUser){
        try{
            $sql = "INSERT INTO reserve(id_user, id_menu, menu_date) VALUES(?, ?, ?)";
            $params = array($idUser, $idMenu, $date);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
            }
        catch(Exception $e){
            return $e -> getMessage();
            }
    }

    public static function deleteReserve($id_reserve) {
        try{
            $sql ="DELETE FROM reserve WHERE id_reserve=?";

            $params = array($id_reserve);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
            }
        catch(Exception $e){
            return $e -> getMessage();
            }
    }

    public static function listReserve($id_user){
        try{
            $sql = "SELECT r.id_reserve, r.id_menu, m.meal, m.menu_name, r.id_user, r.menu_date FROM reserve r INNER JOIN menu m ON r.id_menu =m.id_menu WHERE id_user=?";
            $params = array($id_user);
            $result = MySQLPDO::select($sql, $params);
            return $result;
            }
        catch(Exception $e){
            return $e -> getMessage();
            }
    }
    public static function selectTransactions($idUser){
        try{
            $sql = "SELECT * FROM transactions WHERE id_user = ?
                        ORDER BY transaction_date ASC";
            $params = array($idUser);
            $result = MySQLPDO::select($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }


    public static function selectMenus(){
        try{
            $sql = "SELECT r.menu_date, m.meal, it.item_description, mt.course, r.id_menu FROM menu m INNER JOIN menu_items mt ON mt.id_menu = m.id_menu INNER JOIN reserve r ON m.id_menu = r.id_menu INNER JOIN items it ON mt.id_item = it.id_item
                        WHERE id_user = ? AND YEARWEEK(r.menu_date, 1) = YEARWEEK(CURDATE(), 1)
                            ORDER BY mt.course ASC";

            $params = array(2);
            $result = MySQLPDO::select($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }


    public static function menuItems(){
        try{
            $sql = "SELECT * FROM items" ;
            $params=array();
            $result = MySQLPDO::select($sql, $params);
            return $result;
        }
        catch(Exception $e) {

            return $e -> getMessage();
        }
    }

    public static function updateSessionUser($userId){
        try{
            $sql = "SELECT * FROM user WHERE id_user = ?";
            $params = array($userId);
            $result = MySQLPDO::select($sql, $params);
            return $result[0];
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public static function  updateUserName($name, $idUser){
        try{
            $sql = "UPDATE FROM user SET name = ? WHERE id_user = ?";
            $params = array($name, $idUser);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public static function updateUserSurname($surname, $idUser){
        try{
            $sql = "UPDATE FROM user SET surname = ? WHERE id_user = ?";
            $params = array($surname, $idUser);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public static function updateUserEmail($email, $idUser){
        try{
            $sql = "UPDATE FROM user SET email = ? WHERE id_user = ?";
            $params = array($email, $idUser);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public static function insertMenu($menuName, $menuMeal){
        try{
            $sql = "INSERT INTO MENU (menu_name, meal) VALUES(?, ?)";
            $params = array($menuName, $menuMeal);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public static function insertMenuItems($menuId ,$item){
        try{
            $sql = "INSERT INTO menu_items (id_menu, id_item) VALUES(?, ?)";
            $params = array($menuId, $item);
            $result = MySQLPDO::exec($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public static function selectMenuId(){
        try{
            $sql = "SELECT id_menu FROM menu ORDER BY id_menu DESC LIMIT 1";
            $params = array();
            $result = MySQLPDO::select($sql, $params);
            return $result;
        }
        catch(Exception $e){
            return $e -> getMessage();
        }
    }
}
