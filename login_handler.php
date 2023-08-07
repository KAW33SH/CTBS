<?php
require_once 'Authentication.php';





// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $auth = new Authentication();
    $user = $auth->loginUser($email, $password);

    if ($user !== null) {
        // Login successful, redirect to the dashboard or appropriate page
        if ($user instanceof Employee) {
            // set session variable
            session_start();
            $_SESSION['user'] = $user;
            // Redirect to the employee dashboard
            header("Location: dashboard_employee.php");
        } elseif ($user instanceof Customer) {
            // set session variable
            session_start();
            $_SESSION['user'] = $user;
            // Redirect to the customer dashboard
            header("Location: dashboard_customer.php");
        } else {
            // Handle any other user type (if applicable)
            // ...
        }
    } else {
        // Login failed, redirect back to the login page with an error message
        header("Location: login.php?error=1");
    }
}