<?php

namespace kukovski\projet\model;

class Database
{

    public static $servername;
    public static $username;
    public static $password;
    public static $dbname;

    protected function dbConnect()
    {

        try {
            $db = new \PDO("mysql:host=" . self::$servername . ";dbname=" . self::$dbname, self::$username, self::$password);
        } catch (\Exception $e) {
            die("Erreur : " . $e->getMessage());
        }

        return $db;
    }
}
