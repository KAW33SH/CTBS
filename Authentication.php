<?php
require_once 'Database.php';
require_once 'Employee.php';
require_once 'Customer.php';


class Authentication
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function registerUser($firstName, $lastName, $email, $password, $userType)
    {
        // Check if the email is already registered
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $this->db->executeQuery($query);

        if ($result->num_rows > 0) {
            return false; // Email already registered
        }

        // Implement validation and password hashing logic here
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (first_name, last_name, email, password, user_type) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$userType')";
        return $this->db->executeQuery($query);
    }

    public function loginUser($email, $password)
    {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $this->db->executeQuery($query);

        if ($result->num_rows === 1) {
            $userRow = $result->fetch_assoc();
            if (password_verify($password, $userRow['password'])) {
                if ($userRow['user_type'] === 'employee') {
                    return new Employee($userRow['id'], $userRow['first_name'], $userRow['last_name'], $userRow['email'], $userRow['password']);
                } elseif ($userRow['user_type'] === 'customer') {
                    return new Customer($userRow['id'], $userRow['first_name'], $userRow['last_name'], $userRow['email'], $userRow['password']);
                }
            }
        }
        return null;
    }
}
