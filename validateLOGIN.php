<?php

session_start();

require 'dbconnect.php';

if (!isset($_POST['user_email'])) {
    $_SESSION['isValidEmail'] = false;
    header('Location: page_HOME.php');
} else if (!isset($_POST['user_pass'])) {
    $_SESSION['isValidPass'] = false;
    header('Location: page_HOME.php');
} else {
    $user_email = strtolower($_POST['user_email']);
    $query = "SELECT * FROM login_userinfo WHERE email=$user_email";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_pass = hash('sha256', $_POST['user_pass']);

        if ($user_pass != $row['password']) {
            $_SESSION['isValidPass'] = false;
            header('Location: page_HOME.php');
        } else {
            $_SESSION['isLoggedIn'] = true;
        }
    } else {
        $_SESSION['isValidEmail'] = false;
        header('Location: page_HOME.php');
    }
}

?>
