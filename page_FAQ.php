<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFAQ.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP FAQ</title>
</head>

<body>
    <div class="content-wrapper">
        <!-- Login Form -->
        <div class="login-cover" id="login">
            <div class="login-form">
                <i class="fa-solid fa-xmark close-icon" onclick="openLogin()"></i>
                <div class="login-header">
                    Log-In
                </div>
                <div class="error-message">
                    <?php
                    if (!isset($_SESSION['isValidEmail'])) {
                    } else if ($_SESSION['isValidEmail'] == false) {
                        echo '<span class="error-dialogue"> This email address is not connected to an account! Please double-check or register first.</span>';
                    } else if (!isset($_SESSION['isValidPass'])) {
                    } else if ($_SESSION['isValidPass'] == false) {
                        echo '<span class="error-dialogue"> Your password is incorrect! Please try again.</span>';
                    }
                    ?>
                </div>
                <div class="loginform-wrapper">
                    <form action="" method="post">
                        <span>Email:</span>
                        <div class="form-input">
                            <input type="text" name="" id="" required>
                        </div>
                        <span>Password: </span>
                        <div class="form-input">
                            <input type="password" name="" id="" required>
                            <i class="fa-solid fa-eye" id="pass-icon"></i>
                        </div>
                        <span><a href="" target="_self" rel="noopener noreferrer">Forgot Password?</a></span>
                        <button type="submit">Log-in</button>
                        <span>Don't have an account yet? <a href="" target="_self" rel="noopener noreferrer">Register Now</a></span>
                    </form>
                </div>
            </div>
        </div>


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
                <div class="nav-item active">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">View Services</div>
                        <div class="nav-item">Set Appointment</div>
                        <div class="nav-item">View Appointment</div>
                        <div class="nav-item">Search Record</div>
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
                    echo '<div class="nav-item dropdown">' ?>
                    <span class="dp-title">Profile <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">Profile</div>
                        <div class="nav-item">Log-Out</div>
                    </div>
                <?php '</div>';
                }
                ?>
            </div>
        </nav>

        <!-- FAQ content -->
        <div class="main-body-wrapper">
            <section class="main-content">
                <div class="main-header">
                    <span><i class="fa-solid fa-circle-question"></i> Frequently Asked Question/s</span>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>What are your office hours?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>Monday: No office</span>
                            <span>Tuesday - Saturday: 8:00 - 11:30 AM | 1:30 - 5:00 PM</span>
                            <span>Sunday: 8:00 AM - 12:00 NN</span>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>Do you entertain walk-in appointments?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>Yes, we do! However, those who make appointments online will be prioritized over walk-ins. </span>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>What are the schedules of the daily masses?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <div class="mass-sched">
                                <div class="parish-masses">
                                    <span><strong>St. John of the Cross Parish Masses</strong></span>
                                    <span>Monday - Friday: 6:00 PM</span>
                                    <span>Saturday: 6:00 AM</span>
                                    <span>Sunday:</span>
                                    <span>6:00 AM - Tagalog</span>
                                    <span>7:30 AM - English</span>
                                    <span>9:00 AM - Children’s Mass</span>
                                    <span>4:30 PM - Tagalog</span>
                                    <span>6:00 PM - Youth and Young Adult Mass</span>
                                </div>
                                <div class="chapel-masses">
                                    <span><strong>Masses at Partner Chapels</strong></span>
                                    <span>Saturday:</span>
                                    <span>5:00 PM - San Pancratio Chapel</span>
                                    <span>6:10 PM - Fatima Chapel</span>
                                    <span>7:15 PM - San Isidro Chapel</span>
                                    <span>Sunday:</span>
                                    <span>5:00 PM - Sto. Niño Chapel</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>How can I set appointments online?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>1. First, visit our Calendar under the Events tab to view the available dates and times.</span>
                            <span>2. Next, go to our Set Appointents page and select the type of appointment you want to make.</span>
                            <span>3. Fill out the corresponding form and take note of the requirements and notes displayed for your appointment.</span>
                            <span>4. Confirm your details and submit the form.</span>
                            <span>5. Wait for 1-3 business days for updates regarding your appointment. Updates could be seen in the View Appointments page under our Services tab and also sent to your email address.</span>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>What services do you offer? What requirements are needed for those services?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <p?>We offer the following services in our church: private and mass weddings; mass confirmations; private and mass baptisms; funeral masses and blessings; mass intentions;
                                house, car, and motorcycle blessings; and document requests for baptismal, wedding, confirmation, and good moral certificates, and permit and no records. To view the
                                requirements for a specific service, please check out our <a href="">Services page</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>Who can avail your services?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>Anyone, including non-Pembo and Rizal residents, can avail our services.</span>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>Can I have someone else claim my document on my behalf?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>Yes, another person may claim your document as long as they have a copy of your valid ID
                                and an authorization letter saying that you are allowing this person to claim your document.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="faq-container">
                    <div class="faq-upper">
                        <i class="fa-solid fa-q">:</i>
                        <span>Where is the church located?</span>
                    </div>
                    <div class="faq-lower">
                        <i class="fa-solid fa-a">:</i>
                        <div>
                            <span>We are located at Catholic Rectory, 9 Sampaguita St, Brgy. Pembo, Taguig City, 1218 Kalakhang Maynila.
                                Nearby landmarks are Ospital ng Makati, Pembo Elementary School, and St. Therese Hospital.
                            </span>
                        </div>
                    </div>
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
    <script src="reuse.js"></script>
</body>

</html>