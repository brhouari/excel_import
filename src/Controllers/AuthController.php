<?php

namespace src\Controllers;

use src\Models\User;

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password']; echo '<pre>';
           

            // Validate input (basic example, add more validation as needed)
            if (!empty($email) && !empty($password)) {
                // Instantiate the UserModel to check credentials
                $userModel = new User();
                $user = $userModel->checkCredentials($email, $password);
                  
                if ($user) {
                    // Login successful - Start a session and store user data
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];

                    // Redirect to a dashboard or home page
                    header('Location: /home');
                    exit;
                } else {
                    // Invalid credentials
                    $error = "Invalid email or password.";
                }
            } else {
                // Input validation error
                $error = "Please fill out both fields.";
            }
        }

        // Include the login view and pass the error (if any)
        include_once '../src/views/login.php';
    }

    public function logout() {
        // Logout function to destroy the session
        session_start();
        session_unset();
        session_destroy();

        // Redirect to login page
        header('Location: /login');
        exit;
    }
}
