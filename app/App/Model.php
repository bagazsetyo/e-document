<?php

namespace Kuliah\ManagementDocument\App;

use Kuliah\ManagementDocument\Config\DB as ConfigDB;
use Kuliah\ManagementDocument\Models\Log;

class Model extends ConfigDB
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    protected $query;
    protected $logable;
    protected $logMessage;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDb();
        $this->query = new QueryBuilder($this->db, $this->table);
    }

    public function __destruct()
    {
        $this->log();
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

    public function join($type, $table, $operator)
    {
        $this->query->join($table, $operator, $type);
        return $this;
    }

    public function where($column, $operator = '=', $value = null, $boolean = 'and')
    {
        $this->query->where($column, $operator, $value, $boolean);
        return $this;
    }

    public function andWhere($column, $operator = null, $value = null)
    {
        $this->query->andWhereOp($column, $operator, $value, 'and');
        return $this;
    }

    public function orWhere($column, $operator = null, $value = null)
    {
        $this->query->orWhereOp($column, $operator, $value, 'or');
        return $this;
    }

    public function having($column, $operator = null, $value = null)
    {
        $this->query->having($column, $operator, $value);
        return $this;
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
        $this->logMessage = 'Get data from ' . $this->table;
        return $this->query->get();
    }

    public function first()
    {
        $this->logMessage = 'Get first data from ' . $this->table;
        return $this->query->first();
    }

    public function paginate($perPage = 10)
    {
        $this->logMessage = 'Get data from ' . $this->table . ' with pagination';

        $perPage = $perPage > 0 ? $perPage : 10;
        $page = requestGet('page') ? (int) requestGet('page') : 1;
        $total = $this->query->count();
        $totalPage = ceil($total / $perPage);
        $start = ($page - 1) * $perPage;

        $data = $this->query->limit($perPage)->offset($start)->get();

        // dd($this->query);

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
        $this->logMessage = 'Create data to ' . $this->table;

        return $this->query->create($data);
    }

    public function update($data)
    {
        $this->logMessage = 'Update data to ' . $this->table;

        return $this->query->update($data);
    }

    public function delete()
    {
        $this->logMessage = 'Delete data from ' . $this->table;

        return $this->query->delete();
    }

    public function log()
    {
        if($this->logable) {
            $log = new Log();
            $log->create([
                'time' => date('Y-m-d H:i:s'),
                'user_id' => !empty(getSession('user')->id) ? getSession('user')->id : 0,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'information' => $this->logMessage,
            ]);
        }
    }
}
