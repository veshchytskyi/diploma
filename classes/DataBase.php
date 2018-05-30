<?php
class DataBase {
    protected static $_database;

    public static function Connect($host=DB_HOSTNAME, $database=DB_DATABASE, $user=DB_USERNAME, $password=DB_PASSWORD,
                                   $port=DB_PORT, $charset='utf8', $collation='utf8_general_ci')
    {
        $dsn = "mysql:host={$host};dbname={$database};charset={$charset}";
        self::$_database = new PDO($dsn, $user, $password);
    }

    public static function handler() {
        return self::$_database;
    }
}