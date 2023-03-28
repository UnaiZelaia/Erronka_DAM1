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
            $dsn = "mysql:host=" . MySQLPDO::$host . ";dbname=" . MySQLPDO::$database;
            MySQLPDO::$base = new PDO($dsn, MySQLPDO::$username, MySQLPDO::$password);
            MySQLPDO::$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return MySQLPDO::$base;
        } catch (Exception $e) {
            die ("Error connecting: {$e->getMessage()}");
        }
    }
    
    //ejecuta sentencias INSERT, UPDATE y DELETE
    public static function exec($sql, $params) {
        MySQLPDO::connect();
        $stmt = MySQLPDO::$base->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->rowCount();
        return $result; //devuelve el nº de filas afectadas por la sentencia
    }

    public static function select($sql, $params) {
        MySQLPDO::connect();
        $stmt = MySQLPDO::$base->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
        return $result; //devuelve el conjunto de datos de la consulta
    }



    public static function login($userEmail){
        MySQLPDO::connect();
        $sql = "SELECT email, password_hash FROM user WHERE UPPER(email) = ?";
        $params = array($userEmail);
        $result = MySQLPDO::select($sql, $params);
        return $result[0];
    }

    public static function signup($user){
        MySQLPDO::connect();
        $sql = "INSERT INTO user(name, surname, email, hash_password, birthdate, id_role, balance) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $params = array($user -> getName(), $user -> getSurname(), $user -> getEmail(), $user -> getPassHash(), $user -> getBirthdate(), $user -> getRole(), $user -> getBalance());
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }
}
    ?>