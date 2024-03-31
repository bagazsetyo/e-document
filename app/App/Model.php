<?php

namespace Kuliah\ManagementDocument\App;

use Kuliah\ManagementDocument\Config\DB as ConfigDB;

class Model extends ConfigDB
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    protected $query;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDb();
        $this->query = new QueryBuilder($this->db, $this->table);
    }

    public static function model()
    {
        return new static();
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function select($columns = ['*'])
    {
        $this->query->select($columns);
        return $this;
    }

    public function join($table, $first, $operator = null, $second = null, $type = 'inner')
    {
        $this->query->join($table, $first, $operator, $second, $type);
        return $this;
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->query->where($column, $operator, $value, $boolean);
        return $this;
    }

    public function andWhere($column, $operator = null, $value = null)
    {
        return $this->where($column, $operator, $value, 'and');
    }

    public function orWhere($column, $operator = null, $value = null)
    {
        return $this->where($column, $operator, $value, 'or');
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->query->orderBy($column, $direction);
        return $this;
    }

    public function groupBy($columns)
    {
        $this->query->groupBy($columns);
        return $this;
    }

    public function limit($value)
    {
        $this->query->limit($value);
        return $this;
    }

    public function offset($value)
    {
        $this->query->offset($value);
        return $this;
    }

    public function get()
    {
        return $this->query->get();
    }

    public function first()
    {
        return $this->query->first();
    }

    public function paginate($perPage = 10)
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $total = $this->query->count();
        $totalPage = ceil($total / $perPage);
        $start = ($page - 1) * $perPage;

        $data = $this->query->limit($perPage)->offset($start)->get();

        return [
            'data' => $data,
            'total' => $total,
            'perPage' => $perPage,
            'totalPage' => $totalPage,
            'page' => $page,
        ];
    }
    
    public function create($data)
    {
        return $this->query->create($data);
    }

    public function update($data)
    {
        return $this->query->update($data);
    }

    public function delete()
    {
        return $this->query->delete();
    }
}
