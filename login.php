<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codehal</title>
    <link rel="stylesheet" href="CSS/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        
        <form action="login_handler.php" method="post">
            <h1>Login</h1>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo "<p style='color: red; text-align: center;'>Invalid email or password.</p>";
            }
            ?>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password ?</a>
            </div>

            <button type="submit" class="btn" value="Login">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register.php">Register</a></p>
            </div>

        </form>
    </div>

</body>

</html>