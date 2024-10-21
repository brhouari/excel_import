<?php
namespace src\Models;

use src\Models\Model;

class User extends Model {
    public function getAllUsers() {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
     // Method to check if the user exists in the database
    public function checkCredentials($email, $password) {
        // Prepare the SQL query to check the user
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        // Fetch the user
        $user = $stmt->fetch();
       

        if ($user) {
            // Verify the password using password_hash (assuming the password is hashed)
            /*if ($password == $user['password']) {
                return $user;  // Return user data if authentication is successful
            }*/
              if (password_verify($password, $user['password'])) {
            return true;  // Password is correct
        }
    }
    

        
        return false;  // Return false if the credentials are incorrect
    }
    public function createUser($name, $email, $password) {
        // Hash the password using password_hash()
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => $hashedPassword
        ]);

        return $this->db->lastInsertId(); // Return the new user's ID
    }
}
