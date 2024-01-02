<?php
session_start();
require 'dbconnect.php';

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['access'] != "User") {
    header('Location:page_HOME.php');
}

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    $login_email = $_SESSION['login_email'];
    $query = "SELECT * FROM login_userinfo WHERE email='$login_email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePROFILE.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>USER PROFILE</title>
    <link rel="icon" type="image/png" href="tabicon.png">
</head>

<body>
    <div class="content-wrapper">
        <!-- Reusable Nav -->
        <nav class="nav-wrapper">
            <div class="navicon-wrapper">
                <div class="icon-container">
                    <i class="fa-solid fa-church"></i> SJCP
                </div>
            </div>
            <div class="nav-content">
                <div class="top-icon" onclick="triggerSideNav()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="nav-item">Home</div>
                <div class="nav-item">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">
                            View Services
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            Set Appointment
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            View Appointment
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            Search Record
                        </div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Events <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">Announcements</div>
                        <div class="nav-item">Calendar</div>
                    </div>
                </div>
                <div class="nav-item">About Us</div>
                <?php
                if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                    echo '<div class="nav-item" onclick="openLogin()">Login</div>';
                } else if ($_SESSION['isLoggedIn'] == true) {
                    echo '<div class="nav-item dropdown active">' ?>
                    <span class="dp-title">Profile <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item active">Profile</div>
                        <div class="nav-item" onclick="openForm(logoutForm)">Log-Out</div>
                    </div>
                <?php '</div>';
                }
                ?>
                <div id="logoutForm">
                    <form action="logoutCall.php" method="post">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Confirm Logout?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(logoutForm)">No</button>
                                <button type="submit" name="submit" value="delete">Yes</button>
                            </div>
                    </form>
                </div>
            </div>
    </div>
    </nav>

    <!-- FAQ content -->
    <div class="main-body-wrapper">
        <section class="main-content">
            <div class="main-left">
                <form action="profileHandler.php" method="post">
                    <span class="spanln">Hi!<span class="spanfn">&nbsp<?php echo $row['firstName'] ?></span></span>
                    <button type="submit" name="submit" value="edit">Edit Profile</button>
                    <button type="submit" name="submit" value="changePass">Change Password</button>
                    <button type="button" onclick="openForm(deleteForm)">Delete Account</button>
                    <button type="submit" name="submit" value="view">View Appointments</button>
                    <div id="deleteForm">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Delete Account?<br>
                                <small>All appointments and personal info will be deleted and you will be unable to login using this account's credentials.</small>
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(deleteForm)">No</button>
                                <button type="submit" name="submit" value="delete">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="main-right">
                <form action="profileHandler.php" method="post">
                    <i class="fa-solid fa-user"></i>
                    <?php if (!isset($_SESSION['profPage'])) { ?>
                        <div class="prof-view profile">
                            <div class="form-heading">Profile</div>
                            <div><strong>First Name:</strong><span><?php echo $row['firstName'] ?></span></div>
                            <div><strong>Last Name:</strong><span><?php echo $row['lastName'] ?></span></div>
                            <div><strong>Contact Number:</strong><span><?php echo $row['contactNum'] ?></span></div>
                            <div><strong>Email Address:</strong><span><?php echo $row['email'] ?></span></div>
                        </div>
                    <?php } else if ($_SESSION['profPage'] == 'edit') { ?>
                        <div class="prof-edit profile">
                            <input type="hidden" name="isChanging" value="ChangeInfo">
                            <div class="form-heading">Edit Profile</div>
                            <div>
                                <strong>First Name:</strong>
                                <input type="text" name="newfn" id="" value="<?php echo $row['firstName'] ?>">
                            </div>
                            <div>
                                <strong>Last Name:</strong>
                                <input type="text" name="newln" id="" value="<?php echo $row['lastName'] ?>">
                            </div>
                            <div>
                                <strong>Contact Number:</strong>
                                <div class="contact-form">
                                    <input type="tel" name="phone1" id="" value="+63" readonly>
                                    <input type="tel" name="phone2" id="" value="<?php echo trim($row['contactNum'], "+63") ?>">
                                </div>
                            </div>
                            <div>
                                <strong>Email Address:</strong>
                                <input type="text" name="" id="" value="<?php echo $row['email'] ?>" disabled>
                            </div>
                            <div class="button-area">
                                <button type="button" onclick="openForm(clearForm)" id="clear">Cancel</button>
                                <button type="button" onclick="openForm(submitForm)" id="submit">Save</button>
                            </div>
                            <?php unset($_SESSION['profPage']) ?>
                        </div>
                    <?php } else if ($_SESSION['profPage'] == 'change') { ?>
                        <div class="pass-edit profile">
                            <input type="hidden" name="isChanging" value="ChangePass">
                            <div class="form-heading">Change Password</div>
                            <div>
                                <strong>Current Password:</strong>
                                <input type="password" name="oldPass" id="" placeholder="Current Password">
                            </div>
                            <div>
                                <strong>New Password:</strong>
                                <input type="password" name="newPass" id="password" onkeyup="checkPass()" placeholder="New Password">
                            </div>
                            <div>
                                <strong>Confirm Password:</strong>
                                <input type="password" name="conPass" id="cpass" onkeyup="checkConfirm()" placeholder="Confirm New Password">
                            </div>
                            <div class="error-box">
                                <small>
                                    <?php
                                    if (isset($_SESSION['invalidOld']) && $_SESSION['invalidOld'] == true) {
                                        echo "Current password is invalid.";
                                    }
                                    ?>
                                </small>
                            </div>
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
                            <div class="button-area">
                                <button type="button" onclick="openForm(clearForm)" id="clear">Cancel</button>
                                <button type="button" onclick="openForm(submitForm)" id="submit">Save</button>
                            </div>
                            <?php unset($_SESSION['profPage']) ?>
                        </div>
                    <?php } else if ($_SESSION['profPage'] == 'delete') { ?>
                        <div id="confirmDel">
                            <div class="delete-acc profile">
                                <input type="hidden" name="isChanging" value="deleteAcc">
                                <div class="form-heading">Confirm Account Deletion</div>
                                <div>
                                    <p>Enter <strong>"CONFIRM"</strong> below to proceed with account deletion. <br/> Warning! This action is irreversible. You will not be able to recover your former account and will have to register again to schedule an event with the church online.</p>
                                </div>
                                <div>
                                    <input type="text" name="" id="" placeholder="CONFIRM" pattern="CONFIRM" title="Please type CONFIRM" required>
                                </div>
                                <div class="button-area">
                                    <button type="button" onclick="location.href='?'" id="clear">Cancel</button>
                                    <button type="button" id="submit">Save</button>
                                </div>
                                <?php unset($_SESSION['profPage']) ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="clearForm">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Discard changes made?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(clearForm)">No</button>
                                <button type="submit" name="submit" value="cancel">Yes</button>
                            </div>
                        </div>
                    </div>
                    <div id="submitForm">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Save changes?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(submitForm)">No</button>
                                <button type="submit" name="submit" value="change">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Reusable Footer -->
    <footer class="footer-wrapper">
        <div class="footer-logo">
            <div class="footer-logowrap">
                <i class="fa-solid fa-church"></i> SJCP
            </div>
            <div class="footer-addwrap">
                <span>Catholic Rectory, 9 Sampaguita St, Taguig, 1218 Kalakhang Maynila</span>
                <span><i class="fa-solid fa-copyright"></i>All rights reserved.</span>
            </div>
        </div>
        <div class="footer-contact">
            <div class="foot-item">
                <div class="foot-icon">
                    <i class="fa-brands fa-facebook"></i>
                </div>
                <div class="foot-info">
                    <span>St. John of the Cross Parish Pembo</span>
                </div>
            </div>
            <div class="foot-item">
                <div class="foot-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="foot-info">
                    <span>Contact Number: 8527-7925</span>
                </div>
            </div>
            <div class="foot-item">
                <div class="foot-icon">
                    <i class="fa-solid fa-fax"></i>
                </div>
                <div class="foot-info">
                    <span>Fax: 7799-5429</span>
                </div>
            </div>
            <div class="foot-item">
                <div class="foot-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="foot-info">
                    <span>stjohn_ofthecrosspembo@yahoo.com</span>
                    <span>juandelacruzpembo@gmail.com</span>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="jsPROFILE.js"></script>
</body>

</html>