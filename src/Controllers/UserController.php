<?php
namespace src\Controllers;

use src\Controllers\Controller; 
use src\Models\User;

class UserController extends Controller {
    public function index() {
        // Create an instance of the User model
        $userModel = new User();
        
        // Fetch users from the database
        $users = $userModel->getAllUsers();
        
        // Pass the data to the view
      $this->view('user', ['title' => 'User Page']);
    }
}
