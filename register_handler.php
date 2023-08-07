<?php
require_once 'Authentication.php';

// Handle the registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["userType"]; // Get the selected user type

    $auth = new Authentication();
    $result = $auth->registerUser($firstName, $lastName, $email, $password, $userType);

    if ($result) {
        // Registration successful, redirect to the login page
        header("Location: login.php");
    } else {
        // Registration failed, redirect back to the registration page with an error message
        header("Location: register.php?error=1");
    }
}
