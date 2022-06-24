<?php

require_once __DIR__ . '/../core/Database.php';

class Model extends Database
{
    protected $table;
    protected $query;

    public function __construct()
    {
        parent::__construct();
    }

    public function select(mixed $columns = ['*']) 
    {
        $this->query = "SELECT ". implode(',' , $columns) .  " FROM $this->table ";
        return $this;
    }

    public function update(mixed $columns = ['*']) 
    {
        $this->query .= "UPDATE $this->table SET " . parse_array_to_string($columns) . " ";; 
        return $this;
    }
    public function where($column, $operator = '=', $value)
    {
        $this->query .= "WHERE $column $operator '$value' ";
        return $this;
    }

    public function get()
    {
        try
        {
            $result = $this->db->prepare($this->query)->execute();
            return $result;
        }
        catch(PDOException $exception)
        {
            die($exception->getMessage());
        }
    }

    public function first()
    {
        try
        {
            return $this->db->prepare($this->query)->execute()->fetch();
        }
        catch(PDOException $exception)
        {
            die($exception->getMessage());
        }
    }

}