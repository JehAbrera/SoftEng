<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSCHEDEVENT.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP FAQ</title>
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
                    echo '<div class="nav-item">Login</div>';
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

        <!-- Schedule Event content -->
        <div class="main-body-wrapper">
            <section class="main-content">
                <div class="selection" hidden>
                    <div class="event-seletor">
                        <div class="select-event">
                            <select name="" id="">
                                <option value="" selected hidden disabled>Select Event</option>
                                <option value="">Special Event</option>
                                <option value="">Mass Intention</option>
                                <option value="">Blessing</option>
                                <option value="">Document Request</option>
                            </select>
                        </div>
                    </div>
                    <div class="sub-selector">
                        <div class="select-sub">
                            <select name="" id="">
                                <option value="" selected hidden disabled>Select Special Event</option>
                                <option value="">Baptismal</option>
                                <option value="">Wedding</option>
                            </select>
                            <select name="" id="">
                                <option value="" selected hidden disabled>Select Type of Document</option>
                                <option value="">Baptismal Certificate</option>
                                <option value="">Wedding Certificate</option>
                                <option value="">Confirmation Certificate</option>
                                <option value="">Good Moral Certificate</option>
                                <option value="">Permit & No Record</option>
                            </select>
                        </div>
                    </div>
                </div>
                <section class="requirements-collection">
                    <div class="requirements">

                    </div>
                    <div class="notes">

                    </div>
                </section>
                <sectiion class="form-collection">
                    <form action="" method="post">
                        <div class="event-date">
                            <span>Evenet Schedule: </span>
                            <input type="date" name="" id="">
                        </div>
                        <div class="event-time">
                            <span>Time of Event: </span>
                            <select name="" id="">
                                <option value="">soem time value</option>
                            </select>
                        </div>
                    </form>
                </sectiion>
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
    <script src="jsSCHEDEVENT.js"></script>
</body>

</html>