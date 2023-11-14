<?php
session_start();
$_SESSION['isLoggedIn'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reuse.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>Reuse Nav Footer</title>
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
                <div class="nav-item">Home</div>
                <div class="nav-item">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">View Services</div>
                        <div class="nav-item">Set Appointment</div>
                        <div class="nav-item">View Appointment</div>
                        <div class="nav-item">Search Record</div>
                    </div>
                </div>
                <div class="nav-item">Events</div>
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
        <!-- Filler Body - No need to Copy -->
        <div class="main-body-wrapper">
            <section class="main-content"></section>
        </div>
        <!-- Reusable Footer -->
        <footer class="footer-wrapper">

        </footer>
    </div>
    <script src="reuse.js"></script>
</body>

</html>