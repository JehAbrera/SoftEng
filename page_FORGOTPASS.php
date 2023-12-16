<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFORGOTPASS.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP | Forgot Password</title>
	<link rel="icon" type="image/png" href="tabicon.png">
</head>

<body>
    <div class="registration-wrapper">
        <!-- Left Section -->
        <section class="left-content">
            <div class="content-wrapper">
                <div class="heading-wrapper">
                    <span><i class="fa-solid fa-church"></i></span>
                    <span>&nbsp&nbspSt. John of the Cross Parish</span>
                </div>
				<div class="direction-wrapper">
					<strong><span style="font-size: 1.3rem;">Forgot Password?</span></strong>
					<p>Here's a step-by-step guide to recovering access to your account if you've forgotten your password:</p>
					<ol>
						<li>Please enter the email address linked with your account.</li>
						<li>Check your inbox for the OTP.</li>
						<li>In the forgot password page, enter the OTP you received.</li>
						<li>Create a new strong and unique password after the OTP verification.</li>
					</ol>
					<span>Already Registered? <a href="" style="color: blue;">Login</a></span>
				</div>
            </div>
        </section>

        <!-- Right/ Form Section -->
        <section class="right-content">
            <div class="registration-part">
                <span><i class="fa-solid fa-church"></i> Forgot Password</span>
            </div>
            <div class="otp-card">
                <button class="backbtn">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <div class="progress-wrapper">
                    progress here
                </div>
                <div class="form-heading">
                    <span>Forgot Password</span>
                </div>
                <div class="info-content">
                    <p style="text-align: center;">
                        Please enter your email address to receive an OTP to reset your account password.
                    </p>
                </div>
                <form action="validationForgotpass.php" method="post">
                    <div class="otp-input">
                        <span>Enter your Email Address</span>
                        <input type="text" name="userEmail" id="">  
                        <?php
                        if (!isset($_SESSION['exist'])) {
                        } else if (!$_SESSION['exist']) {
                            echo '<span>Unregistred Email</span>';
                        }
                        ?>
                    </div>
                    <div class="option-wrapper">
                        <button type="submit" name="submitEmail">Submit</button>
                        </form>
                    </div>
            </div>
        </section>
    </div>
	<script src="jsFORGOTPASS.js"></script>
    <?php
        unset($_SESSION['exist']);
    ?>
</body>

</html>