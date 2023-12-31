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
    <script src="jsAppointment.js"></script>
    <title>View Appointments</title>
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
                <div class="nav-item" onclick="window.location.href='page_HOME.php'">Home</div>
                <div class="nav-item" onclick="window.location.href='page_FAQ.php'">FAQs</div>
                <div class="nav-item dropdown">
                    <span class=".nav-item.active">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item" onclick="window.location.href='Services.php'">View Services</div>
                        <div class="nav-item" onclick="window.location.href='page_SCHEDULEEVENT.php'">Set Appointment</div>
                        <div class="nav-item" onclick="window.location.href='Appointments.php'">View Appointment</div>
                        <div class="nav-item">Search Record</div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Events <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item" onclick="window.location.href='page_VIEWANNOUNCEMENT.php'">Announcements</div>
                        <div class="nav-item" onclick="window.location.href='page_VIEWSCHEDULES.php'">Calendar</div>
                    </div>
                </div>
                <div class="nav-item" onclick="window.location.href='Aboutus.php'">About Us</div>
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
                        <button type="submit" name="status" value="Pending">PENDING</button>
                        <button type="submit" name="status" value="Accepted">ACCEPTED</button>
                        <button type="submit" name="status" value="Completed">COMPLETED</button>
                        <button type="submit" name="status" value="Rejected">REJECTED</button>
                        <button type="submit" name="status" value="Canceled">CANCELED</button>
                    </form>
                    <div class="details">
                            <?php 
                                if (!isset($_GET['status'])){
                                    $status = "Pending";
                                } else {
                                    $status = $_GET['status'];
                                }
                                $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status'";
                                $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'"?>
                                        <div class="details-container">
                                            <h2><?php echo $status?></h2>
                                <?php $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $id = $row[0];
                                        $forReason = "again".$id;
                                        $idseemore = "try".$id;
                                        $cancelconf = "cancel".$id;
                                        $resched = "resched".$id;
                                        $fixedtime = date("h:i:s A", strtotime($row[4]));

                                       
                                        // Number of Record per Page
                                        $recordsPerPage = 30;


                                        // Current page number
                                        if (isset($_GET['page'])) {
                                            $currentPage = $_GET['page'];
                                        } else {
                                            $currentPage = 1;
                                        }

                                        // Calculate the starting record index
                                        $startFrom = ($currentPage - 1) * $recordsPerPage;

                                        ?>
                                        
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <table>
                                                            <tr>
                                                                <td><p>Reference Number:</p> </td>
                                                                <td><?php echo $row[1] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>Date Appointed:</p></td>
                                                                <td><?php echo $row[4] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>Time Appointed:</p></td>
                                                                <td><?php echo $fixedtime ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>Appointment Type:</p></td>
                                                                <td><?php echo $row[9] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><button type="button" class="viewmore"> View more</button></td>
                                                            </tr>
                                                        </table>
                                                        <?php //echo $forReason?>
                                                        <?php //secho $idseemore?>
                                                    </div>
                                                    <div class="button-cont">
                                                        <form action="page_LANDING.php" method="post">
                                                            <?php if($status == "Completed"){ ?>
                                                                <!-- no button to show-->
                                                            <?php } else if($status == "Rejected" || $status == "Canceled"){ ?>
                                                                <button type="button" class="buttonresched" onclick="openForm('<?php echo $resched?>')"> Reschedule </button>
                                                            <?php } else { ?>
                                                                <button type="button" class="buttoncancel" onclick="openForm('<?php echo $cancelconf?>')"> Cancel </button>
                                                            <?php } ?>
                                                            <input type="hidden" name="id" value="<?php echo $row[0]?>">
                                                            <div class="popupCover" id="<?php echo $cancelconf?>">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Cancel this appointment? <?php echo $row[0]?></h2>
                                                                        <p>You appointment will be no longer in something somethnig</p>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $cancelconf?>')">No</button>
                                                                        <button class="buttonresched" type="button" onclick="closeForm('<?php echo $cancelconf?>'), openForm('<?php echo $row[0]?>')" name="sure">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="popupCover" id="<?php echo $resched?>">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>   
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Reschedule this appointment? </h2>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $resched?>')">No</button>
                                                                        <button class="buttonresched" type="Submit" name="reschedYes">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="popupCover-reason" id="<?php echo $row[0]?>">
                                                                <div class="popupForm-reason">
                                                                    <div class="headertext-box">
                                                                        <h2> Reason/s </h2>
                                                                        <p>Please provide a reason for the cancellation of your appointment</p>
                                                                    </div>
                                                                    <div class="form-area">
                                                                        <p><strong>Reason for cancelation</strong></p>
                                                                        <div class="reason-container">
                                                                            <div class="form-reason">
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="cop" value="Change of Plans" onclick="hideinput()" required> 
                                                                                    <label for="cop">Change of Plans</label><br>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="lop" value="Lack of Preparetion" onclick="hideinput()" required>
                                                                                    <label for="lop">Lack of Preparetion</label><br>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="uta" value="Unable to attend" onclick="hideinput()" required>
                                                                                    <label for="uta">Unable to attend</label><br>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="emerg" value="Emergency" onclick="hideinput()" required>
                                                                                    <label for="emerg">Emergency</label><br>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="cs" value="Conflicting Schedule" onclick="hideinput()" required>
                                                                                    <label for="cs">Conflicting Schedule</label><br>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio" name="reason" id="ps" value="Personal Stuff" onclick="hideinput()" required>
                                                                                    <label for="ps">Personal Stuff</label><br>
                                                                                </div>  
                                                                            </div>
                                                                            <div class="other">
                                                                                <div>
                                                                                    <input type="radio" name="reason"id="other" value="other" onclick="showinput()" required>
                                                                                    <label for="other">Other</label><br>
                                                                                </div>
                                                                                <div class="other-input" id="otherinput">
                                                                                    <input type="text" class="othertext" name="others">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btn-area">
                                                                            <button type="button" class="buttoncancel" onclick="closeForm('<?php echo $row[0]?>')"> Cancel</button>
                                                                            <button type="submit" class="buttonresched" name="reasonsubmit">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                     <!-- Pagination Link Creation -->
                <?php

                    // Pagination links
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $totalRecords = $row["total"];
                    $totalPages = ceil($totalRecords / $recordsPerPage);

                    echo "<div class='pagination'>";

                    if ($totalPages > 1) {
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                echo "<a class='active' href='?page=$i'>$i $totalRecords </a> ";
                            } else {
                                echo "<a href='?page=$i'>$i</a> ";
                            }
                        }
                    }

                    echo "</div>";
                    ?>
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
