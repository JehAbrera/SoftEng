<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleREGISTER.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP Registration</title>
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
                    <strong><span style="font-size: 1.3rem;">Create an Account</span></strong>
                    <p>By creating an account, you gain access to a host of features designed to make your experience seamless and efficient. Here's a step-by-step guide for creating an account:</p>
                    <ol>
                        <li>Provide Personal information.</li>
                        <li>Create a strong Password.</li>
                        <li>Verify Account using email address.</li>
                    </ol>
                    <span>Already Registered? <a href="" style="color: blue;">Login</a></span>
                </div>
            </div>
        </section>

        <!-- Right/ Form Section -->
        <section class="right-content">
            <div class="registration-part">
                <span><i class="fa-solid fa-church"></i> User Registration</span>
            </div>
            <div class="form-wrapper">
                <button class="backbtn">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <div class="progress-wrapper">
                    progress here
                </div>
                <div class="form-heading">
                    <span>Account Information</span>
                </div>
                <div class="form-content">
                    <form action="be_validate.php" method="post">
                        <div class="form-input">
                            <span>Last Name</span>
                            <input type="text" name="lname" id="">
                        </div>
                        <div class="form-input">
                            <span>First Name</span>
                            <input type="text" name="fname" id="">
                        </div>
                        <div class="form-input">
                            <span>Mobile Number</span>
                            <input type="tel" name="mobile" id="">
                        </div>
                        <div class="form-input">
                            <span>Email Address</span>
                            <input type="email" name="" id="">
                        </div>
                        <?php
                        if (isset($_SESSION['takenEmail']) && $_SESSION['takenEmail']) {
                            echo '<div class="error email">Email already taken. Please use a different email.</div>';
                        }
                        ?>
                        <div class="form-input">
                            <span>Password</span>
                            <div class="password-space">
                                <input type="password" name="password" id="password" onkeyup="checkPass()">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="form-input">
                            <span>Confirm Password</span>
                            <div class="password-space">
                                <input type="password" name="conpassword" id="cpass" onkeyup="checkConfirm()">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="error pass" id="errorPass">Passwords do not match</div>
                        <div class="pass-requirements">
                            <span>Password Requirements:</span>
                            <div class="requirement">
                                <span class="req1" id="req1"><i class="fa-solid fa-circle-exclamation req1"></i> Atleast 8 characters long</span>
                            </div>
                            <div class="requirement">
                                <span class="req2"><i class="fa-solid fa-circle-exclamation req2"></i> A combination of uppercase and lowercase letters</span>
                            </div>
                            <div class="requirement">
                                <span class="req3"><i class="fa-solid fa-circle-exclamation req3"></i> Must contain atleast one special character/s</span>
                            </div>
                        </div>
                        <div class="button-area">
                            <button type="button" onclick="openForm(clearForm)" id="clear">Clear</button>
                            <button type="button" onclick="openForm(submitForm)" id="submit">Submit</button>
                        </div>
                        <div class="popupForm" id="clearForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Are you sure you want to clear?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(clearForm)">No</button>
                                <button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
                            </div>
                        </div>
                        <div class="popupForm" id="submitForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Are you sure you want to submit?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(submitForm)">No</button>
                                <button type="Submit">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="jsREGISTER.js"></script>
</body>

</html>