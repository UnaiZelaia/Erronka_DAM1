<?php
class MySQLPDO {
    private static $host = "192.168.122.160"; //o la IP del servidor de BBBDD remoto
    private static $database = "canteen";
    private static $username = "unai";
    private static $password = "123";
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
        $sql = "SELECT email, password_hash FROM user WHERE UPPER(email) = ?";
        $params = array(strtoupper($userEmail));
        $result = MySQLPDO::select($sql, $params);
        return $result[0];
    }

    public static function signup($user){
        try{
        $sql = "INSERT INTO user(name, surname, email, hash_password, birthdate, id_role, balance) VALUES(?, ?, ?, ?, ?, ?, ?)";
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
                        WHERE UPPER(m.type) = ? AND r.menu_date = ?";
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
}
    ?>