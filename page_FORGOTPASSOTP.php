<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styleFORGOTPASSOTP.css">
		<!-- Font Awesome Icon Script -->
		<script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
		<title>SJCP | Forgot Password</title>
		<link rel="icon" type="image/png" href="tabicon.png">
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
					<span><i class="fa-solid fa-church"></i> Finish Forgot Password</span>
				</div>
				<div class="otp-card">
					<button class="backbtn">
						<i class="fa-solid fa-arrow-left" title="Back" onclick="history.back()"></i>
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
							your email <strong><?php echo $_SESSION['email']; ?></strong>. The code is
							valid for 30 minutes.
						</p>
					</div>
					<form action="validationForgotpass.php" method="post">
						<div class="otp-input">
							<span>Enter your OTP here</span>
							<input type="text" name="userOTP" id="userOTP">
							<?php
							if (!isset($_SESSION['isValidOTP'])) {
							} else if (!$_SESSION['isValidOTP']) {
								echo '<span>Invalid OTP</span>';
							}
							?>
						</div>
						<div class="otp-input">
							<span>New Password</span>
							<input type="password" name="password" id="password" onkeyup="checkPass(), checkConfirm()">
							<div class="password-space">
								<i class="fa-solid fa-eye" id="viewPass" onclick="toggle(password, viewPass)"></i>
							</div>
						</div>
						<div class="otp-input">
							<span>Confirm Password</span>
							<input type="password" name="conpassword" id="cpass" onkeyup="checkConfirm()">
							<div class="password-space">
								<i class="fa-solid fa-eye" id="viewCPass" onclick="toggle(cpass, viewCPass)"></i>
							</div>
						</div>
						<div class="error pass" id="errorPass">Passwords do not match</div>
						<div class="pass-requirements">
							<span>Password Requirements:</span>
							<div class="requirement">
								<span class="req1"><i class="fa-solid fa-circle-exclamation req1"></i> At least 8 characters long</span>
							</div>
							<div class="requirement">
								<span class="req2"><i class="fa-solid fa-circle-exclamation req2"></i> A combination of uppercase and lowercase letters</span>
							</div>
							<div class="requirement">
								<span class="req3"><i class="fa-solid fa-circle-exclamation req3"></i> Must contain at least one special character</span>
							</div>
						</div>
						<div class="option-wrapper">
							<button type="submit" name="submitOTP">Submit</button>
							</form>
							<form action="sendOTP.php" method="post">
								<span id="resend"><input type="submit" name="submit" value="submit"></span>
							</form>
						</div>
				</div>
			</section>
		</div>
		<script src="jsFORGOTPASS.js"></script>
		<?php
			unset($_SESSION['isValidOTP']);
		?>
	</body>
</html>