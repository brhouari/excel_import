<?php
namespace src\Models;

use src\Models\Model;

class User extends Model {
    public function getAllUsers() {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
}
