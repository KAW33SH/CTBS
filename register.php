<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codehal</title>
    <link rel="stylesheet" href="CSS/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="register_handler.php" method="post">
            <h1>Register</h1>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo "<p style='color: red; text-align: center;'>Email already registered. Please use a different email.</p>";
            }
            ?>
            <div class="input-box">
                <input type="text" placeholder="First name" name="firstName" required>
                <i class='bx bx-rename' ></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last name" name="lastName" required>
                <i class='bx bx-rename' ></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" required>
                <i class='bx bxs-envelope' ></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="select-box">
            <i class='bx bxs-user-detail'></i>
            <select name="userType">
            <option value="" disabled selected>Select User Type</option>
                <option value="employee">Employee</option>
                <option value="customer">Customer</option>
            </select>
            </div>
            <button type="submit" class="btn" value="Register">Register</button>

            <div class="register-link">
                <p>Already have an account?<a href="login.php">Login Here</a></p>
            </div>

        </form>
    </div>

</body>

</html>