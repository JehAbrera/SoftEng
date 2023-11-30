<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleREGISTEROTP.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP Registration</title>
</head>

<body>
    <!-- To update for validation and patterns -->
    <div class="registration-wrapper">
        <!-- Left Section -->
        <section class="left-content">
            <div class="content-wrapper">
                <div class="heading-wrapper">
                    <span><i class="fa-solid fa-church"></i></span>
                    <span>&nbsp&nbspSt. John of the Cross Parish</span>
                </div>
            </div>
        </section>

        <!-- Right/ Form Section -->
        <section class="right-content">
            <div class="registration-part">
                <span><i class="fa-solid fa-church"></i> Finish Registration</span>
            </div>
            <div class="otp-card">
                <button class="backbtn">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <div class="progress-wrapper">
                    progress here
                </div>
                <div class="form-heading">
                    <span>Verify Account</span>
                </div>
                <div class="info-content">
                    <p style="text-align: center;">
                        Please enter the verification code that was sent to
                        your email <strong>juandelacruz@gmail.com</strong>. The code is
                        valid for 30 minutes.
                    </p>
                </div>
                <form action="" method="post">
                    <div class="otp-input">
                        <span>Enter your OTP here</span>
                        <input type="text" name="" id="">
                        <?php
                            if(!isset($_SESSION['isValidOTP'])) {

                            } else if (!$_SESSION['isValidOTP']) {
                                echo '<span>Invalid OTP</span>';
                            }
                        ?>
                    </div>
                    <div class="option-wrapper">
                        <span><a href="" target="_self" rel="noopener noreferrer">Resend OTP</a></span>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="jsREGISTER.js"></script>
</body>

</html>