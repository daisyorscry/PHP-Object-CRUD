<?php

namespace belajar\php\Connection;


class Connection
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "dev"): \PDO
    {
        if (self::$pdo === null) 
        {
            require_once __DIR__ . "./../../config/database.php";
            $config = getDatabaseConfig();
            
            self::$pdo = new \PDO(
                $config["database"][$env]["url"], 
                $config["database"][$env]["username"], 
                $config["database"][$env]["password"]);
            }
            
            return self::$pdo;
    }
    
    
}

Connection::getConnection("dev");