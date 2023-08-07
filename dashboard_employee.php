<!-- Show Dashboard welcome with employee name and role -->
<?php
require_once 'Authentication.php';
require_once 'User.php';
require_once 'Employee.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
$user = $_SESSION['user'];
if (!$user instanceof Employee) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
</head>

<body>
    <h1>Welcome <?php echo $user->getFirstName(); ?></h1>
</body>

</html>