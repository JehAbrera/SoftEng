<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFORGOTPASSDONE.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP | Password Changed</title>
	<link rel="icon" type="image/png" href="tabicon.png">
</head>

<body>
    <div class="content-wrapper">
        <div class="card">
            <div class="message-wrapper">
                <div class="pop-icon">
                    <i class="fa-solid fa-bell shake"></i>
                </div>
                <div class="heading">
                    <span>
                        Your password has been changed
                    </span>
                </div>
                <div class="message-body">
                    <span>Your password has been changed successfully. Please use your new password to log in to your account.</span>
                </div>
                <button type="button" onclick="location.href='Aboutus.php'">Back to Log-in</button>
            </div>
        </div>
    </div>
	<script src="jsFORGOTPASS.js"></script>
</body>

</html>