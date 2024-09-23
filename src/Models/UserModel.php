<?php
namespace src\Models;

use src\Core\Model;

class UserModel extends Model {
    public function getAllUsers() {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
}
