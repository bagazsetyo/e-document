<?php

namespace Kuliah\ManagementDocument\Config;

use PDO;

class DB
{
    protected $dbHost = 'localhost';
    protected $dbName = 'edocument';
    protected $dbUser = 'root';
    protected $dbPass = '';

    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getDb()
    {
        return $this->db;
    }
}
