<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLOGIN.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <div class="login-form">
        <i class="fa-solid fa-xmark close-icon" onclick=""></i>
        <div class="login-header">
            Log-In
        </div>
        <div class="error-message">
            <?php
            if (!isset($_SESSION['isValidEmail'])) {
            } else if ($_SESSION['isValidEmail'] == false) {
                echo '<span class="error-dialogue"> This email address is not connected to an account! Please double-check or register first.</span>';
            } else if (!isset($_SESSION['isValidPass'])) {
            } else if ($_SESSION['isValidPass'] == false) {
                echo '<span class="error-dialogue"> Your password is incorrect! Please try again.</span>';
            }
            ?>
        </div>
        <div class="form-wrapper">
            <form action="" method="post">
                <span>Email:</span>
                <div class="form-input">
                    <input type="text" name="" id="" required>
                </div>
                <span>Password: </span>
                <div class="form-input">
                    <input type="password" name="" id="" required>
                    <i class="fa-solid fa-eye" id="pass-icon"></i>
                </div>
                <span><a href="" target="_self" rel="noopener noreferrer">Forgot Password?</a></span>
                <button type="submit">Log-in</button>
                <span>Don't have an account yet? <a href="" target="_self" rel="noopener noreferrer">Register Now</a></span>
            </form>
        </div>
    </div>
</body>

</html>