<?php
class Database {
    private static $host = "localhost";
    private static $dbName = "demo";
    private static $username = "root";
    private static $password = "";
    private static $conn;

    public static function getConnection() {
        if (static::$conn == null) {
            try {
                static::$conn = new PDO("mysql:host=" . static::$host . ";dbname=" . static::$dbName, static::$username, static::$password);
                static::$conn->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return static::$conn;
    }
}
