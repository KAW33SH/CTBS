<?php

require_once 'User.php';

session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Retrieve the user data from the session
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo $user->getFirstName(); ?></h2>
    <p>This is your dashboard. Add your content here.</p>
    <a href="logout.php">Logout</a>
</body>

</html>