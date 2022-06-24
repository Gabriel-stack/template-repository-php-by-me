<?php

require_once __DIR__ . '/../config/consts.php';

class Database
{
    protected $db;

    public function __construct()
    {
        $this->connect();
        
    }
    public function connect()
    {
        try
        {
            $this->db = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );
        }
        catch(PDOException $exception)
        {
            die($exception->getMessage());
        }
    }
}

