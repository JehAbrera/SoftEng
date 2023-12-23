<?php
session_start();
require 'dbconnect.php';

if (isset($_POST['submitReg'])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["mobile1"] . $_POST["mobile"];
    $pass = $_POST["password"];
    $fname = ucwords(strtolower($fname));
    $lname = ucwords(strtolower($lname));
    $email = strtolower($email);

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['pass'] = $pass;



    $query = "Select email from login_userinfo WHERE email='$email'";
    $row = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($row);

    if ($result) {
        $_SESSION['takenEmail'] = true;
        header('Location: page_REGISTER.php');
    } else {
        header('Location: sendOTP.php');
    }
};

if (isset($_POST['submitOTP'])) {
    $submittedOTP = $_POST['userOTP'];
    if ($submittedOTP != $_SESSION['otp']) {
        $_SESSION['isValidOTP'] = false;
        header('Location: page_REGISTEROTP.php');
    } else {
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $email =$_SESSION['email'];
        $phone = $_SESSION['phone'];
        $pass = $_SESSION['pass'];
        $encrypt = hash('sha256', $pass);
        $query = "INSERT into login_userinfo VALUES ('Client','$fname', '$lname', '$email', '$phone', '$encrypt')";
        $result = mysqli_query($conn, $query);
        header('Location: page_REGDONE.php');
    }
};
