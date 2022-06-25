<?php

namespace app\models;
use app\core\Database;

class Model extends Database
{
   
    protected $query;

    public function __construct(protected readonly string $table)
    {
        parent::__construct();
    }

    public function select(array $columns = ['*']) 
    {
        $this->query = "SELECT ". implode(',' , $columns) .  " FROM $this->table ";
        return $this;
    }

    public function update(array $columns = ['*']) 
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
            $this->db->prepare($this->query)->execute();
            return $this->db->query($this->query)->fetchAll();
        }
        catch(\PDOException $exception)
        {
            die($exception->getMessage());
        }
    }

    public function first()
    {
        try
        {
            $this->db->prepare($this->query)->execute();
            return $this->db->query($this->query)->fetch();
        }
        catch(\PDOException $exception)
        {
            die($exception->getMessage());
        }
    }
    
    public function find($id)
    {
        try
        {
            $query = "SELECT * FROM $this->table WHERE id = $id limit 1";
            $this->db->prepare("SELECT * FROM $this->table WHERE id = $id")->execute();
            return $this->db->query($query)->fetch();
        }
        catch(\PDOException $exception)
        {
            die($exception->getMessage());
        }
    }

}