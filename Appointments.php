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
                                
                                        // Number of Record per Page
                                        $recordsPerPage = 10;


                                        // Current page number
                                        if (isset($_GET['page'])) {
                                            $currentPage = $_GET['page'];
                                        } else {
                                            $currentPage = 1;
                                        }

                                        // Calculate the starting record index
                                        $startFrom = ($currentPage - 1) * $recordsPerPage;

                                $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'"; ?>
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
                                        ?>
                                        
                                            <div class="indiv-cont">
                                                <div class="top-cont">
                                                    <div>
                                                        <table>
                                                            <tr>
                                                                <td><p>Reference Number:</p> </td>
                                                                <td><?php echo $row[0] ?></td>
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
                                                        <form action="page_LANDING.php" method="post">
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" name="id" value="<?php echo $row[0] ?>">
                                                                    <input type="hidden" name="type" value="<?php echo $row[9] ?>">
                                                                    <button type="submit" class="viewmore" name="viewmore"> View more</button>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </table>
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

                        <div>
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
                                        echo "<a class='active' href='?page=$i'>$i</a> ";
                                    } else {
                                        echo "<a href='?page=$i'>$i</a> ";
                                    }
                                }
                            }

                            echo "</div>";
                        ?>
                        </div>
                        <?php if (isset($_SESSION['view'])) { ?>
                            <div class="view-container">
                                <div class="view-card">
                                    <script>
                                        document.body.style.height = "100%";
                                        document.body.style.overflow = "hidden";
                                    </script>
                                    <?php
                                    $queryId = $_SESSION['id'];
                                    $event = $_SESSION['type'];
                                    if ($event == 'Baptism') {
                                        $viewQuery = "SELECT * FROM baptism_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'Confirmation') {
                                        $viewQuery = "SELECT * FROM confirmation_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'Wedding') {
                                        $viewQuery = "SELECT * FROM wedding_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'Funeral Mass/Blessing') {
                                        $viewQuery = "SELECT * FROM funeral_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'Mass Intention'){
                                        $viewQuery = "SELECT * FROM mass_intention_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'House Blessing' || $event == 'Car Blessing' || $event == 'Store Blessing' || $event == 'Motorcycle Blessing'){
                                        $viewQuery = "SELECT * FROM blessing_details WHERE foreign_id='$queryId'";
                                    } else if ($event == 'Baptismal Certificate'|| $event == 'Permit and No Record' || $event == 'Good Moral Certificate' || $event == 'Wedding Certificate' || $event == 'Confirmation Certificate'){
                                        $viewQuery = "SELECT * FROM document_request_details WHERE foreign_id='$queryId'";
                                    }
                                    $res = $conn->query($viewQuery);
                                    if ($res->num_rows > 0) {
                                        while ($viewRow = $res->fetch_assoc()) {
                                            if ($event == 'Baptism') { ?>
                                                <!-- For Baptism -->
                                                <div class="view-heading">Baptism Record Details</div>
                                                <div class="inner-view-heading1">
                                                    <span>Baptism Date</span>
                                                    <span>Baptism Time</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                                    <span><?php echo date("h:i:s A", strtotime($viewRow['event_timeStart'])) ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Birthdate</span>
                                                    <span>Gender</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['lastName'] . ", " . $viewRow['firstName'] . " " . $viewRow['midName']  ?></span>
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['dob'])) ?></span>
                                                    <span><?php echo $viewRow['gender'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Place of Birth</span>
                                                    <span>Address</span>
                                                    <span>Contact Number</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['pob'] ?></span>
                                                    <span><?php echo $viewRow['address'] ?></span>
                                                    <span><?php echo $viewRow['contNum'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Father's Name</span>
                                                    <span>Father's Place of Birth</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['fatherName'] ?></span>
                                                    <span><?php echo $viewRow['fatherPob'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Mother's Name</span>
                                                    <span>Mother's Place of Birth</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['motherName'] ?></span>
                                                    <span><?php echo $viewRow['motherPob'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Marriage Type</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['marriage_type'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Godfather's Name</span>
                                                    <span>Godfather's Address</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['godfathName'] ?></span>
                                                    <span><?php echo $viewRow['godfathAddress'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Godmother's Name</span>
                                                    <span>Godmother's Address</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['godmothName'] ?></span>
                                                    <span><?php echo $viewRow['godmothAddress'] ?></span>
                                                </div>
                                            <?php } else if ($event == 'Wedding') { ?>
                                                <!-- For Wedding -->
                                                <div class="view-heading">Wedding Record Details</div>
                                                <div class="inner-view-heading1">
                                                    <span>Wedding Date</span>
                                                    <span>Wedding Time</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                                    <span><?php echo date("h:i:s A", strtotime($viewRow['event_timeStart'])) ?></span>
                                                </div>
                                                <div class="view-heading">Groom</div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Date of Birth</span>
                                                    <span>Place of Birth</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['groom_lName'] . ", " . $viewRow['groom_fName'] . " " . $viewRow['groom_midName']  ?></span>
                                                    <span><?php echo $viewRow['groom_dob'] ?></span>
                                                    <span><?php echo $viewRow['groom_pob'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Contact Number</span>
                                                    <span>Religion</span>
                                                    <span>Address</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['groom_conNum'] ?></span>
                                                    <span><?php echo $viewRow['groom_religion'] ?></span>
                                                    <span><?php echo $viewRow['groom_address'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Father's Name</span>
                                                    <span>Mother's Name</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['groom_father'] ?></span>
                                                    <span><?php echo $viewRow['groom_mother'] ?></span>
                                                </div>
                                                <div class="view-heading">Bride</div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Date of Birth</span>
                                                    <span>Place of Birth</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['bride_lName'] . ", " . $viewRow['bride_fName'] . " " . $viewRow['bride_midName']  ?></span>
                                                    <span><?php echo $viewRow['bride_dob'] ?></span>
                                                    <span><?php echo $viewRow['bride_pob'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Contact Number</span>
                                                    <span>Religion</span>
                                                    <span>Address</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['bride_conNum'] ?></span>
                                                    <span><?php echo $viewRow['bride_religion'] ?></span>
                                                    <span><?php echo $viewRow['bride_address'] ?></span>
                                                </div>
                                                <div class="inner-view-heading1">
                                                    <span>Father's Name</span>
                                                    <span>Mother's Name</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo $viewRow['bride_father'] ?></span>
                                                    <span><?php echo $viewRow['bride_mother'] ?></span>
                                                </div>
                                            <?php } else if ($event == 'Funeral Mass/Blessing') { ?>
                                                <!-- For Funeral -->
                                                <div class="view-heading">Funeral Mass Record Details</div>
                                                <div class="inner-view-heading1">
                                                    <span>Funeral Mass Date</span>
                                                    <span>Funeral Mass Time</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                                    <span><?php echo date("h:i:s A", strtotime($viewRow['event_timeStart'])) ?></span>
                                                </div>
                                                <div class="view-heading">Deceased</div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Gender</span>
                                                    <span>Age</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['lastName'] . ", " . $viewRow['firstName'] . " " . $viewRow['middleName']  ?></span>
                                                    <span><?php echo $viewRow['gender'] ?></span>
                                                    <span><?php echo $viewRow['age'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Date of Death</span>
                                                    <span>Cause of Death</span>
                                                    <span>Date of Internment</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['deathDate'])) ?></span>
                                                    <span><?php echo $viewRow['deathCause'] ?></span>
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['internmentDate'])) ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Place of Cemetery</span>
                                                    <span>Sacrament Received</span>
                                                    <span>Burial</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['cemeteryPlace'] ?></span>
                                                    <span><?php echo $viewRow['sacrament'] ?></span>
                                                    <span><?php echo $viewRow['burial'] ?></span>
                                                </div>
                                                <div class="view-heading">Informant</div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Contact Number</span>
                                                    <span>Address</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['informLast'] . ", " . $viewRow['informFirst'] . " " . $viewRow['informMid']  ?></span>
                                                    <span><?php echo $viewRow['contNum'] ?></span>
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['address'])) ?></span>
                                                </div>
                                            <?php } else if($event == 'Mass Intention'){ ?>
                                                <div class="view-heading">Mass Inention Details</div>
                                                <div class="inner-view-heading1">
                                                    <span>Mass Intention Date</span>
                                                    <span>Mass Intention Time</span>
                                                </div>
                                                <div class="inner-view-content1">
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                                    <span><?php echo date("h:i:s A", strtotime($viewRow['event_time'])) ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Contact Number</span>
                                                    <span>Purpose</span>
                                                    <span>Name/s</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['contactNum']?></span>
                                                    <span><?php echo $viewRow['purpose'] ?></span>
                                                    <span><?php echo $viewRow['name'] ?></span>
                                                </div>
                                            <?php } else if($event == 'Wedding Certificate' || $event == 'Baptismal Certificate' || $event == 'Confirmation Certificate' || $event == 'Permit and No Record' || $event == 'Good Moral Certificate'){ ?>
                                                <div class="view-heading">Document Request Details</div>
                                                <div class="inner-view-heading2">
                                                    <span>Document Type</span>
                                                    <span>Claiming Date</span>
                                                    <span>Purpose</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $event ?></span>
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['claim_date'])) ?></span>
                                                    <span><?php echo $viewRow['purpose'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Name</span>
                                                    <span>Birthday</span>
                                                    <span>Contact Number</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['lastName'] . ", " . $viewRow['firstName'] . " " . $viewRow['middleName']  ?></span>
                                                    <span><?php echo $viewRow['dob'] ?></span>
                                                    <span><?php echo $viewRow['contactNum'] ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <?php if($event == 'Wedding Certificate' || $event == 'Baptismal Certificate' || $event == 'Confirmation Certificate'){?>
                                                        <span>Father's Name</span>
                                                        <span>Mother's Name</span>
                                                    <?php } ?>
                                                    <?php if($event == 'Permit and No Record') {?>
                                                        <span>Address</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <?php if($event == 'Wedding Certificate' || $event == 'Baptismal Certificate' || $event == 'Confirmation Certificate'){?>
                                                        <span><?php echo $viewRow['fatherName']?></span>
                                                        <span><?php echo $viewRow['motherName'] ?></span>
                                                    <?php } 
                                                    if($event == 'Permit and No Record') {?>
                                                        <span><?php echo $viewRow['address'] ?></span>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="view-heading">Blessing Details</div>
                                                <div class="inner-view-heading1">
                                                    <span>Blessing Type</span>
                                                    <span>Blessing Date</span>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $event ?></span>
                                                    <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                                </div>
                                                <div class="inner-view-heading2">
                                                    <span>Contact Number</span>
                                                    <?php if($event == 'House Blessing' || $event == 'Store Blessing'){ ?>
                                                        <span>Address</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="inner-view-content2">
                                                    <span><?php echo $viewRow['contact_num'] ?></span>
                                                    <?php if($event == 'House Blessing' || $event == 'Store Blessing'){ ?>
                                                        <span><?php echo $viewRow['address'] ?></span>
                                                    <?php } ?>
                                                </div>
            
                                            <?php }
                                        }
                                    } else {
                                        echo 'Records not available';
                                    }
                                    ?>
                                    <button class="closeme" onclick="location.href='?page=<?php echo $currentPage?>'"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <?php unset($_SESSION['view']) ?>
                        <?php } ?>
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