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
                                    $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Pending'";
                                        echo'<div class="details-container">
                                            <h2>PENDING</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $id = $row[0];
                                        ?>
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <p>Appointment Number: <?php echo $row[0] ?></p>
                                                        <p>Date Appointed: <?php echo $row[3] ?></p>
                                                        <p>Time Appointed: <?php echo $row[4] ?></p>
                                                        <p>Appointment Type: <?php echo $row[8] ?></p>
                                                    </div>
                                                    <div class="button-cont">
                                                        <form action="Appointments.php" method="post">
                                                            <button type="button" class="buttoncancel" onclick="openForm()"> Cancel </button>
                                                            <div class="popupCover" id="submitForm">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Cancel this appointment? </h2>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                        <button class="buttonresched" type="Submit" name="sure">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                                <div class="bot-cont">
                                                    <div class="seemore">
                                                        <p>Details</p>
                                                        <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                    </div>
                                                    <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                        <?php
                                                        if($row[8] == "Wedding"){
                                                            $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                            $resultwed = mysqli_query($conn, $querywed);
                                                            while($row = mysqli_fetch_array($resultwed)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Groom's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                </div>
                                                                <h4>Brides's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptism"){
                                                          
                                                            $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                            $resultbap = mysqli_query($conn, $querybap);
                                                            while($row = mysqli_fetch_array($resultbap)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Child's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                </div>
                                                                <h4>Parents's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                    <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                </div>
                                                                <h4>BodFather's and GodMother's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                    <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                    <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                    <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                </div>

                                                            <?php
                                                            }
                                                        } else if($row[8] == "Funeral Mass/Blessing"){
                                                            $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                            $resultfun = mysqli_query($conn, $queryfun);
                                                            while($row = mysqli_fetch_array($resultfun)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Deceased's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                    <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                </div>
                                                                <h4>Informant's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Mass Intention"){
                                                            $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                            $resultmass = mysqli_query($conn, $querymass);
                                                            while($row = mysqli_fetch_array($resultmass)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                    <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Good Moral Certificate") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        else if($row[8] == "Permit and No Record") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                    }
                                }
                                if (isset($_GET['status'])){
                                    if ($_GET['status'] == "pending"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Pending'";
                                        echo'<div class="details-container">
                                            <h2>PENDING</h2>';
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)) {
                                            $id = $row[0];
                                            ?>
                                                <div class="indiv-cont">
                                                    <div class="top-cont">
                                                        <div>
                                                            <p>Appointment Number: <?php echo $row[0] ?></p>
                                                            <p>Date Appointed: <?php echo $row[3] ?></p>
                                                            <p>Time Appointed: <?php echo $row[4] ?></p>
                                                            <p>Appointment Type: <?php echo $row[8] ?></p>
                                                        </div>
                                                        <div class="button-cont">
                                                            <form action="Appointments.php" method="post">
                                                                <button type="button" class="buttoncancel" onclick="openForm()"> Cancel </button>
                                                                <div class="popupCover" id="submitForm">
                                                                    <div class="popupForm">
                                                                        <div class="icon-box">
                                                                            <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                        </div>
                                                                        <div class="headertext-box">
                                                                            <h2> Are you sure you want to Cancel this appointment? </h2>
                                                                        </div>
                                                                        <div class="form-btnarea">
                                                                            <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                            <button class="buttonresched" type="Submit" name="submitform">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="bot-cont">
                                                        <div class="seemore">
                                                            <p>Details</p>
                                                            <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                        </div>
                                                        <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                            <?php
                                                            if($row[8] == "Wedding"){
                                                                $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                                $resultwed = mysqli_query($conn, $querywed);
                                                                while($row = mysqli_fetch_array($resultwed)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Groom's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                        <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                        <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    </div>
                                                                    <h4>Brides's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                        <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                        <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                        <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Baptism"){
                                                            
                                                                $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                                $resultbap = mysqli_query($conn, $querybap);
                                                                while($row = mysqli_fetch_array($resultbap)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Child's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    </div>
                                                                    <h4>Parents's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                        <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                        <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                        <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                        <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    </div>
                                                                    <h4>BodFather's and GodMother's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                        <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                        <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                        <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                    </div>

                                                                <?php
                                                                }
                                                            } else if($row[8] == "Funeral Mass/Blessing"){
                                                                $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                                $resultfun = mysqli_query($conn, $queryfun);
                                                                while($row = mysqli_fetch_array($resultfun)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Deceased's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                        <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                        <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                        <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                        <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                        <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                        <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                    </div>
                                                                    <h4>Informant's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Mass Intention"){
                                                                $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                                $resultmass = mysqli_query($conn, $querymass);
                                                                while($row = mysqli_fetch_array($resultmass)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                        <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                                $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                                $resultbless = mysqli_query($conn, $querybless);
                                                                while($row = mysqli_fetch_array($resultbless)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                                $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                                $resultbless = mysqli_query($conn, $querybless);
                                                                while($row = mysqli_fetch_array($resultbless)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                        <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Good Moral Certificate") {
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                            else if($row[8] == "Permit and No Record") {
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                        }
                                        }
                                        if ($_GET['status'] == "accepted"){
                                            $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Accepted'";
                                        echo'<div class="details-container">
                                            <h2>Accepted</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $id = $row[0];
                                        ?>
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <p>Appointment Number: <?php echo $row[0] ?></p>
                                                        <p>Date Appointed: <?php echo $row[3] ?></p>
                                                        <p>Time Appointed: <?php echo $row[4] ?></p>
                                                        <p>Appointment Type: <?php echo $row[8] ?></p>
                                                    </div>
                                                    <div class="button-cont">
                                                        <form action="Appointments.php" method="post">
                                                            <button type="button" class="buttoncancel" onclick="openForm()"> Cancel </button>
                                                            <div class="popupCover" id="submitForm">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Cancel this appointment? </h2>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                        <button class="buttonresched" type="Submit" name="submitform">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="bot-cont">
                                                    <div class="seemore">
                                                        <p>Details</p>
                                                        <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                    </div>
                                                    <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                        <?php
                                                        if($row[8] == "Wedding"){
                                                            $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                            $resultwed = mysqli_query($conn, $querywed);
                                                            while($row = mysqli_fetch_array($resultwed)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Groom's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                </div>
                                                                <h4>Brides's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptism"){
                                                          
                                                            $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                            $resultbap = mysqli_query($conn, $querybap);
                                                            while($row = mysqli_fetch_array($resultbap)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Child's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                </div>
                                                                <h4>Parents's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                    <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                </div>
                                                                <h4>BodFather's and GodMother's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                    <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                    <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                    <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                </div>

                                                            <?php
                                                            }
                                                        } else if($row[8] == "Funeral Mass/Blessing"){
                                                            $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                            $resultfun = mysqli_query($conn, $queryfun);
                                                            while($row = mysqli_fetch_array($resultfun)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Deceased's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                    <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                </div>
                                                                <h4>Informant's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Mass Intention"){
                                                            $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                            $resultmass = mysqli_query($conn, $querymass);
                                                            while($row = mysqli_fetch_array($resultmass)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                    <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Good Moral Certificate") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        else if($row[8] == "Permit and No Record") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                    }
                                        }
                                        if ($_GET['status'] == "completed"){
                                            $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Completed'";
                                            echo'<div class="details-container">
                                                <h2>Completed</h2>';
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)) {
                                            $id = $row[0];
                                            ?>
                                                <div class="indiv-cont">
                                                    <div class="top-cont">
                                                        <div>
                                                            <p>Appointment Number: <?php echo $row[0] ?></p>
                                                            <p>Date Appointed: <?php echo $row[3] ?></p>
                                                            <p>Time Appointed: <?php echo $row[4] ?></p>
                                                            <p>Appointment Type: <?php echo $row[8] ?></p>
                                                        </div>
                                                        <div class="button-cont">
                                                            <form action="Appointments.php" method="post">
                                                                <button type="button" class="buttoncancel" onclick="openForm()"> Cancel </button>
                                                                <div class="popupCover" id="submitForm">
                                                                    <div class="popupForm">
                                                                        <div class="icon-box">
                                                                            <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                        </div>
                                                                        <div class="headertext-box">
                                                                            <h2> Are you sure you want to Cancel this appointment? </h2>
                                                                        </div>
                                                                        <div class="form-btnarea">
                                                                            <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                            <button class="buttonresched" type="Submit" name="submitform">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="bot-cont">
                                                        <div class="seemore">
                                                            <p>Details</p>
                                                            <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                        </div>
                                                        <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                            <?php
                                                            if($row[8] == "Wedding"){
                                                                $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                                $resultwed = mysqli_query($conn, $querywed);
                                                                while($row = mysqli_fetch_array($resultwed)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Groom's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                        <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                        <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    </div>
                                                                    <h4>Brides's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                        <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                        <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                        <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Baptism"){
                                                            
                                                                $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                                $resultbap = mysqli_query($conn, $querybap);
                                                                while($row = mysqli_fetch_array($resultbap)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Child's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                        <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    </div>
                                                                    <h4>Parents's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                        <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                        <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                        <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                        <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                        <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    </div>
                                                                    <h4>BodFather's and GodMother's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                        <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                        <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                        <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                    </div>

                                                                <?php
                                                                }
                                                            } else if($row[8] == "Funeral Mass/Blessing"){
                                                                $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                                $resultfun = mysqli_query($conn, $queryfun);
                                                                while($row = mysqli_fetch_array($resultfun)) {
                                                                ?> 
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <h4>Deceased's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                        <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                        <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                        <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                        <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                        <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                        <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                        <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                        <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                    </div>
                                                                    <h4>Informant's</h4>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Mass Intention"){
                                                                $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                                $resultmass = mysqli_query($conn, $querymass);
                                                                while($row = mysqli_fetch_array($resultmass)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                        <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                                $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                                $resultbless = mysqli_query($conn, $querybless);
                                                                while($row = mysqli_fetch_array($resultbless)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                                $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                                $resultbless = mysqli_query($conn, $querybless);
                                                                while($row = mysqli_fetch_array($resultbless)) {
                                                                ?>
                                                                    <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                    <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                        <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                        <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else if($row[8] == "Good Moral Certificate") {
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                            else if($row[8] == "Permit and No Record") {
                                                                $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                                $resultcert = mysqli_query($conn, $querycert);
                                                                while($row = mysqli_fetch_array($resultcert)) {
                                                                ?>
                                                                    <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div class="display-details-bi">
                                                                        <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                        <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                        <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                        <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                        <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                        }
                                    }
                                    if ($_GET['status'] == "rejected"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Rejected'";
                                        echo'<div class="details-container">
                                            <h2>Rejected</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $id = $row[0];
                                        ?>
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <p>Appointment Number: <?php echo $row[0] ?></p>
                                                        <p>Date Appointed: <?php echo $row[3] ?></p>
                                                        <p>Time Appointed: <?php echo $row[4] ?></p>
                                                        <p>Appointment Type: <?php echo $row[8] ?></p>
                                                    </div>
                                                    <div class="button-cont">
                                                        <form action="Appointments.php" method="post">
                                                            <button type="button" class="buttonresched" onclick="openForm()"> Reschedule </button>
                                                            <div class="popupCover" id="submitForm">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Reschedule this appointment? </h2>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                        <button class="buttonresched" type="Submit" name="submitform">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="bot-cont">
                                                    <div class="seemore">
                                                        <p>Details</p>
                                                        <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                    </div>
                                                    <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                        <?php
                                                        if($row[8] == "Wedding"){
                                                            $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                            $resultwed = mysqli_query($conn, $querywed);
                                                            while($row = mysqli_fetch_array($resultwed)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Groom's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                </div>
                                                                <h4>Brides's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptism"){
                                                          
                                                            $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                            $resultbap = mysqli_query($conn, $querybap);
                                                            while($row = mysqli_fetch_array($resultbap)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Child's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                </div>
                                                                <h4>Parents's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                    <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                </div>
                                                                <h4>BodFather's and GodMother's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                    <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                    <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                    <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                </div>

                                                            <?php
                                                            }
                                                        } else if($row[8] == "Funeral Mass/Blessing"){
                                                            $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                            $resultfun = mysqli_query($conn, $queryfun);
                                                            while($row = mysqli_fetch_array($resultfun)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Deceased's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                    <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                </div>
                                                                <h4>Informant's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Mass Intention"){
                                                            $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                            $resultmass = mysqli_query($conn, $querymass);
                                                            while($row = mysqli_fetch_array($resultmass)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                    <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Good Moral Certificate") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        else if($row[8] == "Permit and No Record") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    if ($_GET['status'] == "canceled"){
                                        $query = "SELECT * FROM appointment_details WHERE appointment_status = 'Canceled'";
                                        echo'<div class="details-container">
                                            <h2>Canceled</h2>';
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                        $id = $row[0];
                                        ?>
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <p>Appointment Number: <?php echo $row[0] ?></p>
                                                        <p>Date Appointed: <?php echo $row[3] ?></p>
                                                        <p>Time Appointed: <?php echo $row[4] ?></p>
                                                        <p>Appointment Type: <?php echo $row[8] ?></p>
                                                    </div>
                                                    <div class="button-cont">
                                                        <form action="Appointments.php" method="post">
                                                            <button type="button" class="buttonresched" onclick="openForm()"> Reschedule </button>
                                                            <div class="popupCover" id="submitForm">
                                                                <div class="popupForm">
                                                                    <div class="icon-box">
                                                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                                                    </div>
                                                                    <div class="headertext-box">
                                                                        <h2> Are you sure you want to Reschedule this appointment? </h2>
                                                                    </div>
                                                                    <div class="form-btnarea">
                                                                        <button class="buttoncancel" type="button" onclick="closeForm()">No</button>
                                                                        <button class="buttonresched" type="Submit" name="submitform">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="bot-cont">
                                                    <div class="seemore">
                                                        <p>Details</p>
                                                        <p onclick="seemore(<?php echo $id?>)">see more</p>
                                                    </div>
                                                    <div class="viewmore" id = "<?php echo $id?>" style="display: none">

                                                        <?php
                                                        if($row[8] == "Wedding"){
                                                            $querywed = "SELECT * FROM wedding_details WHERE foreign_id = '$id'";
                                                            $resultwed = mysqli_query($conn, $querywed);
                                                            while($row = mysqli_fetch_array($resultwed)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Groom's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span> <span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                </div>
                                                                <h4>Brides's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[20],",",$row[21]," ", $row[22];?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[23] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[24] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[25]?></span></div>
                                                                    <div><span><strong>Present Address: </strong></span><span><?php echo $row[26] ?></span></div>
                                                                    <div><span><strong>Religion: </strong></span><span><?php echo $row[29] ?></span></div>
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[27]?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[28]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptism"){
                                                          
                                                            $querybap = "SELECT * FROM baptism_details WHERE foreign_id = '$id'";
                                                            $resultbap = mysqli_query($conn, $querybap);
                                                            while($row = mysqli_fetch_array($resultbap)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Child's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Birth Date: </strong></span><span><?php echo $row[9] ?></span></div>
                                                                    <div><span><strong>Birth Place:  </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Present Address </strong></span><span><?php echo $row[11] ?></span></div>
                                                                </div>
                                                                <h4>Parents's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Father's Name:  </strong></span><span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Father's Place of Birth: </strong></span><span><?php echo $row[14] ?></span></div>
                                                                    <div><span><strong>Mothers's Name:  </strong></span><span><?php echo $row[15]?></span></div>
                                                                    <div><span><strong>Mother's Place of Birth: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                    <div><span><strong>Marriage Type  </strong></span><span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Parent Contact Number:  </strong></span><span><?php echo $row[12] ?></span></div>
                                                                </div>
                                                                <h4>BodFather's and GodMother's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>GodFather's Name:  </strong></span><span><?php echo $row[18]?></span></div>
                                                                    <div><span><strong>GodFather's Address: </strong></span><span><?php echo $row[19] ?></span></div>
                                                                    <div><span><strong>GodMother's Name:  </strong></span><span><?php echo $row[20]?></span></div>
                                                                    <div><span><strong>GodMother's Address: </strong></span><span><?php echo $row[21] ?></span></div>
                                                                </div>

                                                            <?php
                                                            }
                                                        } else if($row[8] == "Funeral Mass/Blessing"){
                                                            $queryfun = "SELECT * FROM funeral_details WHERE foreign_id = '$id'";
                                                            $resultfun = mysqli_query($conn, $queryfun);
                                                            while($row = mysqli_fetch_array($resultfun)) {
                                                            ?> 
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <h4>Deceased's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[5],",",$row[6]," ", $row[7];?></span></div>
                                                                    <div><span><strong>Gender: </strong></span><span><?php echo $row[8] ?></span></div>
                                                                    <div><span><strong>Age: </strong></span><span><?php echo $row[10] ?></span></div>
                                                                    <div><span><strong>Date of Death:  </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Cause of Death: </strong></span><span><?php echo $row[11] ?></span></div>
                                                                    <div><span><strong>Internment Date: </strong></span><span><?php echo $row[12] ?></span></div>
                                                                    <div><span><strong>Place of Cemetery:  </strong></span> <span><?php echo $row[13]?></span></div>
                                                                    <div><span><strong>Sacrament Received:  </strong></span> <span><?php echo $row[17]?></span></div>
                                                                    <div><span><strong>Burial:  </strong></span> <span><?php echo $row[18]?></span></div>
                                                                </div>
                                                                <h4>Informant's</h4>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name:  </strong></span><span><?php echo $row[14]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[15] ?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[16] ?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Mass Intention"){
                                                            $querymass = "SELECT * FROM mass_intention_details WHERE foreign_id = '$id'";
                                                            $resultmass = mysqli_query($conn, $querymass);
                                                            while($row = mysqli_fetch_array($resultmass)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Purpose: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Names: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Motorcycle Blessing" ||$row[8] == "Car Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }else if($row[8] == "House Blessing" ||$row[8] == "Store Blessing"){
                                                            $querybless = "SELECT * FROM blessing_details WHERE foreign_id = '$id'";
                                                            $resultbless = mysqli_query($conn, $querybless);
                                                            while($row = mysqli_fetch_array($resultbless)) {
                                                            ?>
                                                                <div><span><strong>Event's Date: </strong></span><span><?php echo $row[3]?></span></div>
                                                                <div><span><strong>Event's Time: </strong></span><span><?php echo $row[4]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[2]?></span></div>
                                                                    <div><span><strong>Type of Blessing: </strong></span><span><?php echo $row[5]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[6]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Baptismal Certificate" ||$row[8] == "Wedding Certificate" || $row[8] == "Confirmation Certificate"){   
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong> Father's Name: </strong></span><span><?php echo $row[8]?></span></div>
                                                                    <div><span><strong> Mother's Name: </strong></span><span><?php echo $row[9]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        } else if($row[8] == "Good Moral Certificate") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        else if($row[8] == "Permit and No Record") {
                                                            $querycert = "SELECT * FROM document_request_details WHERE foreign_id = '$id'";
                                                            $resultcert = mysqli_query($conn, $querycert);
                                                            while($row = mysqli_fetch_array($resultcert)) {
                                                            ?>
                                                                <div><span><strong>Claiming Date: </strong></span><span><?php echo $row[2]?></span></div>
                                                                <div class="display-details-bi">
                                                                    <div><span><strong>Name: </strong></span><span><?php echo $row[4],", ",$row[5]," ", $row[6] ?></span></div>
                                                                    <div><span><strong>Date of Birth: </strong></span><span><?php echo $row[7]?></span></div>
                                                                    <div><span><strong>Contact Number: </strong></span><span><?php echo $row[10]?></span></div>
                                                                    <div><span><strong>Address: </strong></span><span><?php echo $row[12]?></span></div>
                                                                    <div><span><strong> Purpose: </strong></span><span><?php echo $row[11]?></span></div>

                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                            </div>

                            <!--<div class="popupCover" id="canceledConfirm">
                                <div class="popupForm">
                                    <div class="icon-box">
                                        <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                    </div>
                                    <div class="headertext-box">
                                        <h2> Canceled Successfully </h2>
                                    </div>
                                    <div class="form-btnarea">
                                        <button class="buttonresched" type="button" name="success">Back to View Appointments</button>
                                    </div>
                                </div>
                            </div>-->
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