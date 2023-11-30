<?php
session_start();
$_SESSION['isLoggedIn'] = true;
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAppointments.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>View Appointments</title>
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
                    <span class=".nav-item.active">Services <i class="fa-solid fa-angle-down"></i></span>
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
        <!-- Filler Body - No need to Copy -->
        <div class="main-body-wrapper">
            <section class="main-content"> 
                <div class="main-content-title"> 
                    <h1> Appointments </h1>
                </div> 
            </section>
            <section class = "content-container">
                <div class="body-content">
                    <form action="Appointments.php" method="get">
                        <button type="submit" name="status" value="pending">PENDING</button>
                        <button type="submit" name="status" value="accepted">ACCEPTED</button>
                        <button type="submit" name="status" value="completed">COMPLETED</button>
                        <button type="submit" name="status" value="rejected">REJECTED</button>
                        <button type="submit" name="status" value="canceled">CANCELED</button>
                    </form>
                    <div class="details">
                            <?php 
                                if (!isset($_GET['status'])){
                                    echo'<div class="details-container">
                                            <h2>PENDING</h2>';
                                    $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Pending'";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                        </div> //closing if div class details-container
                                        <?php
                                      }
                                }
                                if (isset($_GET['status'])){
                                    if ($_GET['status'] == "pending"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Pending'";
                                        echo'<div class="details-container">
                                            <h2>PENDING</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                            <?php
                                      }
                                    }
                                    if ($_GET['status'] == "accepted"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Accepted'";
                                        echo'<div class="details-container">
                                            <h2>ACCEPTED</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                            <?php
                                      }
                                    }
                                    if ($_GET['status'] == "completed"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Completed'";
                                        echo'<div class="details-container">
                                            <h2>COMPLETED</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                            <?php
                                      }
                                    }
                                    if ($_GET['status'] == "rejected"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Rejected'";
                                        echo'<div class="details-container">
                                            <h2>REJECTED</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                            <?php
                                      }
                                    }
                                    if ($_GET['status'] == "canceled"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Canceled'";
                                        echo'<div class="details-container">
                                            <h2>CANCELED</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {?>
                                            <div class="top-cont">
                                                <div>
                                                    <p>appointment number: <?php echo $row[0] ?></p>
                                                    <p>appointment date: <?php echo $row[3] ?></p>
                                                    <p>appointment time: <?php echo $row[4] ?></p>
                                                    <p>appointment type: <?php echo $row[7] ?></p>
                                                </div>
                                                <div class="delete-cont">
                                                    <button class="deletebutton">Delete</button>
                                                </div>
                                            </div>
                                            <div class="top-cont">
                                                <p>Details</p>
                                                <p>see more</p>
                                            </div>
                                            <?php
                                      }
                                    }
                                }
                                ?>
                            </div>
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