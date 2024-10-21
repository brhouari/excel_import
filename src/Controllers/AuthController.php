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

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate inputs (this is a basic example, add more validation as needed)
            if (!empty($name) && !empty($email) && !empty($password)) {
                // Create a new user by calling the UserModel
                $userModel = new User();
                $userId = $userModel->createUser($name, $email, $password);

                if ($userId) {
                    // Registration successful - Redirect or show a success message
                    header('Location: /login');
                    exit;
                } else {
                    // Handle the error (e.g., user creation failed)
                    $error = "An error occurred. Please try again.";
                }
            } else {
                // Handle validation errors
                $error = "Please fill in all required fields.";
            }
        }

        // Include the registration view (pass any error messages)
        include_once '../src/views/register.php';
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
