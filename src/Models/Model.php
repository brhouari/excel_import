<?php
// app/Models/Model.php

namespace src\Models;

use PDO;
use PDOException;

class Model {
    protected $db;

    public function __construct() {
        $config = require_once __DIR__ . '/../../config/database.php';
        
        try {
            $this->db = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['user'],
                $config['pass']
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

   
}
