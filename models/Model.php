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

    public function select($columns = '*') 
    {
        $this->query = "SELECT $columns FROM $this->table";
        return $this;
    }

    public function update($columns = '*') 
    {
        $this->query = "UPDATE $this->table SET $columns";
        return $this;
    }
    public function where($column, $operator = '=', $value)
    {
        $this->query .= " WHERE $column $operator '$value'";
        return $this;
    }

    public function get()
    {
       return $this->db->prepare($this->query)->execute()->fetchAll();
    }

    public function first()
    {
        return $this->db->prepare($this->query)->execute()->fetch();
    }

}