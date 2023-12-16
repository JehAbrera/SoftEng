<?php
session_start();
require 'dbconnect.php';
    if(isset($_POST["submitEmail"])){
        $email = $_POST["userEmail"];
        $queryemail = "SELECT email FROM login_userinfo WHERE email = '$email' ";
        $resultemail = mysqli_query($conn, $queryemail);

        if(mysqli_num_rows($resultemail) == 0){
            $_SESSION['exist'] = false;
            header('Location: page_FORGOTPASS.php');
        } else {
            $_SESSION['exist'] = true;
            $_SESSION['OTPFor'] = "Forgotpass";
            $_SESSION["email"] = $email;
            header('Location: sendOTPForgotPass.php');
        }
    }

    if (isset($_POST['submitOTP'])) {
        $submittedOTP = $_POST['userOTP'];
        if ($submittedOTP != $_SESSION['otp']) {
            $_SESSION['isValidOTP'] = false;
            header('Location: page_FORGOTPASSOTP.php');
        } else {
            $Email = $_SESSION['email'];
            $newpass = $_POST['newPass'];
            $encrypt = hash('sha256', $newpass);
            $query = "UPDATE login_userinfo SET user_password ='$encrypt' WHERE email = '$Email'";
            $result = mysqli_query($conn, $query);
            header('Location: page_FORGOTPASSDONE.php');
        }
    };
?>