<?php

namespace Kuliah\ManagementDocument\App;

use PDO;
use PDOException;

class QueryBuilder
{
    protected $db;
    protected $query;
    protected $table;

    protected $select = false;

    public function __construct(PDO $db, $table = null)
    {
        $this->db = $db;
        $this->query = '';
        if ($table) {
            $this->table = $table;
        }
    }

    public function select($columns = ['*'])
    {
        $this->select = true;
        $this->query = 'SELECT ' . implode(', ', $columns) . ' FROM ' . $this->table;
        return $this;
    }

    public function join($table, $operator = null, $type = 'inner')
    {
        $this->query .= " $type JOIN $table ON $operator";
        return $this;
    }

    // public function where($column, $operator = null, $value = null, $boolean = 'and')
    // {
    //     if ($this->query == '') {
    //         $this->query .= ' WHERE ';
    //     } else {
    //         $this->query .= " WHERE $boolean ";
    //     }

    //     if (func_num_args() == 2) {
    //         $this->query .= "$column = '$operator'";
    //     } else {
    //         $this->query .= "$column $operator '$value'";
    //     }

    //     return $this;
    // }
    
    public function where($column, $operator = null, $value = null)
    {
        $this->query .= " WHERE ";
        
        if (func_num_args() == 2) {
            $this->query .= "$column = '$operator'";
        } else {
            $this->query .= "$column $operator '$value'";
        }

        return $this;
    }
    
    public function whereOperation($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->query .= " $boolean ";
        
        if (func_num_args() == 2) {
            $this->query .= "$column = '$operator'";
        } else {
            $this->query .= "$column $operator '$value'";
        }

        return $this;
    }

    public function orWhereOp($column, $operator = null, $value = null)
    {
        return $this->whereOperation($column, $operator, $value, 'or');
    }

    public function andWhereOp($column, $operator = null, $value = null)
    {
        return $this->whereOperation($column, $operator, $value, 'and');
    }

    public function having($column, $operator = null, $value = null)
    {
        $this->query .= " HAVING $column $operator '$value'";
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->query .= " ORDER BY $column $direction";
        return $this;
    }

    public function groupBy($columns)
    {
        $this->query .= " GROUP BY $columns";
        return $this;
    }

    public function limit($value)
    {
        $this->query .= " LIMIT $value";
        return $this;
    }

    public function offset($value)
    {
        $this->query .= " OFFSET $value";
        return $this;
    }

    public function get()
    {
        if($this->query == '') {
            $this->query = 'SELECT * FROM ' . $this->table;
        }elseif(!$this->select){
            if(strpos($this->query, 'SELECT') === false){
                $this->query = 'SELECT * FROM ' . $this->table . $this->query;
            }
        }
        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // find one data 
    public function first()
    {
        if($this->query == '') {
            $this->query = 'SELECT * FROM ' . $this->table;
        }elseif(!$this->select){
            $this->query = 'SELECT * FROM ' . $this->table . $this->query;
        }
        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage() . '<br>' . $this->query;
        }
    }

    // count data 
    public function count()
    {
        if($this->query == '') {
            $this->query = 'SELECT * FROM ' . $this->table;
        }elseif(!$this->select){
            $this->query = 'SELECT * FROM ' . $this->table . $this->query;
        }

        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // insert data
    public function create($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode("', '", array_values($data));
        $this->query = "INSERT INTO $this->table ($columns) VALUES ('$values')";
        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // update data
    public function update($data)
    {
        $set = '';
        foreach($data as $key => $value){
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $this->query = "UPDATE $this->table SET $set" . $this->query;

        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // delete data
    public function delete()
    {
        $this->query = "DELETE FROM $this->table" . $this->query;
        try{
            $stmt = $this->db->prepare($this->query);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getQuery()
    {
        return $this->query;
    }
}
