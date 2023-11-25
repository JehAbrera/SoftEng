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
            </div>
        </section>

        <!-- Right/ Form Section -->
        <section class="right-content">
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
                        <div class="error email">Email already taken. Please use a different email.</div>
                        <div class="form-input">
                            <span>Password</span>
                            <div class="password-space">
                                <input type="password" name="password" id="">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="form-input">
                            <span>Confirm Password</span>
                            <div class="password-space">
                                <input type="password" name="conpassword" id="">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="error pass">Passwords do not match</div>
                        <div class="pass-requirements">
                            <span>Password Requirements:</span>
                            <div class="requirement">
                                <span><i class="fa-solid fa-circle-exclamation"></i> Atleast 8 characters long</span>
                            </div>
                            <div class="requirement">
                                <span><i class="fa-solid fa-circle-exclamation"></i> A combination of uppercase and lowercase letters</span>
                            </div>
                            <div class="requirement">
                                <span><i class="fa-solid fa-circle-exclamation"></i> Must contain atleast one special character/s</span>
                            </div>
                        </div>
                        <div class="button-area">
                            <button type="button" onclick="openForm(clearForm)">Clear</button>
                            <button type="button" onclick="openForm(submitForm)">Submit</button>
                        </div>
                        <div class="popupForm" id="clearForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Are you sure you want to clear?
                            </div>
                            <div class="form-btnarea">
                                <button type="button">No</button>
                                <button type="reset">Yes</button>
                            </div>
                        </div>
                        <div class="popupForm" id="submitForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Are you sure you want to submit?
                            </div>
                            <div class="form-btnarea">
                                <button type="button">No</button>
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