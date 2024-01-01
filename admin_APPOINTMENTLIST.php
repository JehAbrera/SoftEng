<?php
session_start();
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdminAppointments.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>The SJCP - Appointments</title>
    <link rel="icon" type="image/png" href="tabicon.png">
    </script>
</head>

<body>
    <div class="content-wrapper">
         <!-- Nav Wrapper -->
        <!-- Add active class on active button of current page -->
        <div class="nav-wrapper" id="sideNav">
            <i class="fa-solid fa-angles-left close-nav" onclick="openNav()"></i>
            <div class="icon-wrapper">
                <i class="fa-solid fa-church"></i> SJCP
            </div>
            <div class="nav-items">
                <div onclick="window.location.href='admin_DASHBOARD.php'"><i class="fa-solid fa-chart-line"></i>&nbspDashboard</div>
                <div onclick="window.location.href='admin_ANNOUNCEMENT.php'"><i class="fa-solid fa-newspaper"></i>&nbspAnnouncements</div>
                <div onclick="window.location.href='admin_RECORDS.php'"><i class="fa-solid fa-file-pen"></i>&nbspRecords</div>
                <div class="active-btn" onclick="window.location.href='admin_APPOINTMENTLIST.php'"><i class="fa-solid fa-calendar-check"></i>&nbspAppointments</div>
                <div><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbspLog-out</div>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content">
            <div class="record-heading">
                <div class="internal-heading" onclick="openNav()" id="openNav"><i class="fa-solid fa-bars"></i></div>
                <div class="internal-heading"><span id="sjcp"><i class="fa-solid fa-church"></i>&nbspSJCP</span> Appointments</div>
                <!--<form class="record-filter" action="statusHandler.php" method="post">
                    <button type="submit" name="stat" value="Pending">Pending</button>&nbsp/&nbsp
                    <button type="submit" name="stat" value="Accepted">Accepted</button>&nbsp/&nbsp
                    <button type="submit" name="stat" value="Completed">Completed</button>&nbsp/&nbsp
                    <button type="submit" name="stat" value="Rejected">Rejected</button>&nbsp/&nbsp
                    <button type="submit" name="stat" value="Canceled">Canceled</button>&nbsp/&nbsp
                </form>-->
            </div>
            <div class="record-view">
                <div class="filter-cont">
                    <span>Filter by:&nbsp</span>
                    <div class="view-header" onclick="showoption()">
                        <?php
                        if (isset($_SESSION['status'])) {
                            $status = $_SESSION['status'];
                        } else {
                            $status = 'Pending';
                        }
                        echo $status;
                        ?>
                        <i class="fa-solid fa-caret-down"></i>
                        <form class="record-filter" id="options" action="statusHandler.php" method="post">
                            <button type="submit" name="stat" value="Pending">Pending</button>&nbsp/&nbsp
                            <button type="submit" name="stat" value="Accepted">Accepted</button>&nbsp/&nbsp
                            <button type="submit" name="stat" value="Completed">Completed</button>&nbsp/&nbsp
                            <button type="submit" name="stat" value="Rejected">Rejected</button>&nbsp/&nbsp
                            <button type="submit" name="stat" value="Canceled">Canceled</button>&nbsp/&nbsp
                        </form>
                    </div>
                </div>
                <table>
                    <?php
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
                    <tr>
                        <th>Reference #</th>
                        <th colspan="2">Name</th>
                        <th colspan="3">Email</th>
                        <th colspan="2">Date Appointed</th>
                        <th colspan="2">Time Appointed</th>
                        <th colspan="2">Appointment Type</th>
                        <th colspan="2">Status</th>
                        <th>Action</th>

                    </tr>
                    <?php
                    // Query for Pending
                    if ($status == 'Pending') { 
                            $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage" ; //KULANG PA NG ORDER BY DESC
                            $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'";
                        //Query for aCCEPTED
                    } else if ($status == 'Accepted') { 
                            $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'";
                        // Query for Completed
                    } else if ($status == 'Completed') { 
                        $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage";
                        $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'";
                        // Query for rEJECTED
                    } else if ($status == 'Rejected') { 
                            $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'";    
                    }  else if($status == 'Canceled'){
                        $query = "SELECT * FROM appointment_details WHERE appointment_status = '$status' LIMIT $startFrom, $recordsPerPage";
                        $sql = "SELECT COUNT(*) AS total FROM appointment_details WHERE appointment_status = '$status'";
                    }
                    $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { 
                                $id = $row['appointment_id'];
                                $accept = "accept".$id;
                                $complete = "complete".$id;
                                $rejected = "rejected".$id;
                                $rejectconf = "rejectconf".$id;
                                $canceled = "canceled".$id;
                                $cancelconf = "cancelconf".$id;
                                $add = "add".$id;
                                ?>
                                <tr>
                                    <td><?php echo $row['appointment_id'] ?></td>
                                    <td colspan="2"><?php echo $row['name'] ?></td>
                                    <td colspan="3"><?php echo $row['email'] ?></td>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['date_appointed']))?></td>
                                    <td colspan="2"><?php echo date('h:i:s a', strtotime($row['time_appointed']))?></td>
                                    <td colspan="2"><?php echo $row['appointment_type'] ?></td>
                                    <td colspan="2"><?php echo $row['appointment_status'] ?></td>
                                    <?php $view = $row['appointment_id']; ?>
                                    <?php $type = $row['appointment_type']; ?>

                                    <td>
                                    <div class="action-btn">
                                        <div class="tooltip">
                                            <button type="button" onclick="location.href='<?php echo '?view=' . $view. '&event='.$type. '&page='. $currentPage?>'"><i class="fa-solid fa-eye"></i></button>
                                            <span class="tooltiptext">View</span>
                                        </div>
                                            <?php if ($status == 'Pending') { ?> 
                                                <div class="tooltip">
                                                    <button type="button" class="positive" onclick="openForm('<?php echo $accept ?>')"><i class="fa-solid fa-calendar-check"></i></i></button>
                                                    <span class="tooltiptext">Accept</span>
                                                </div>
                                                <div class="tooltip">
                                                    <button type="button" class="negative" onclick="openForm('<?php echo $rejectconf ?>')"><i class="fa-solid fa-xmark"></i></button>
                                                    <span class="tooltiptext">Reject</span>
                                                </div>
                                            <?php } else if ($status == 'Accepted') { ?>
                                                <div class="tooltip">
                                                    <button type="button" class="positive" onclick="openForm('<?php echo $complete ?>')"><i class="fa-solid fa-check"></i></button>
                                                    <span class="tooltiptext">Complete</span>
                                                </div>
                                                <div class="tooltip">
                                                    <button type="button" class="negative" onclick="openForm('<?php echo $cancelconf ?>')"><i class="fa-solid fa-xmark"></i></button>
                                                    <span class="tooltiptext">Cancel</span>
                                                </div>
                                            <?php } else if ($status == 'Completed') {  
                                                if($row['appointment_type'] != "Wedding" && $row['appointment_type'] != "Baptism" && $row['appointment_type'] != "Funeral Mass/Blessing"){
                                                    //hindi lalabas yung asdd to records kung hindi wedding, baptism, and funeral
                                                } else { 
                                                    if($row['recorded'] == "Yes"){
                                                        //hindi lalabas yung asdd to records kung hindi wedding, baptism, and funeral  
                                                    } else { ?>
                                                        <div class="tooltip">
                                                            <button type="button" class="positive" onclick="openForm('<?php echo $add ?>')"><i class="fa-solid fa-add"></i></button>
                                                            <span class="tooltiptext">Add to records</span>
                                                        </div><?php
                                                    }
                                                }
                                            } ?>
                                        </div>
                                    </td>
                                </tr>
                                <form action="admin_LANDINGPAGE.php" method="post">
                                    <div class="popupCover" id="<?php echo $accept ?>">
                                        <div class="popupForm">
                                            <div class="icon-box">
                                                <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                            </div>
                                            <div class="headertext-box">
                                                <h2> Are you sure you want to Accept this appointment number <?php echo $id?>? </h2>
                                            </div>
                                            <div class="form-btnarea">
                                                <input type="hidden" name="acceptid" value="<?php echo $row['appointment_id']?>">    
                                                <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $accept ?>')">No</button>
                                                <button type="submit" class="buttonresched" name="submit" value="accept">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="admin_LANDINGPAGE.php" method="post">
                                    <div class="popupCover" id="<?php echo $complete ?>">
                                        <div class="popupForm">
                                            <div class="icon-box">
                                                <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                            </div>
                                            <div class="headertext-box">
                                                <h2> Are you sure you want to Complete this appointment number <?php echo $id?>? </h2>
                                            </div>
                                            <div class="form-btnarea">
                                                <input type="hidden" name="completeid" value="<?php echo $row['appointment_id']?>">    
                                                <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $complete ?>')">No</button>
                                                <button type="submit" class="buttonresched" name="submit" value="complete">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="admin_LANDINGPAGE.php" method="post">
                                    <div class="popupCover" id="<?php echo $add ?>">
                                        <div class="popupForm">
                                            <div class="icon-box">
                                                <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                            </div>
                                            <div class="headertext-box">
                                                <h2> Are you sure you want to Add appointment  #<?php echo $id?> details to Records? </h2>
                                            </div>
                                            <div class="form-btnarea">
                                                <input type="hidden" name="addid" value="<?php echo $id?>">    
                                                <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $add ?>')">No</button>
                                                <button type="submit" class="buttonresched" name="submit" value="add">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="popupCover" id="<?php echo $cancelconf ?>">
                                        <div class="popupForm">
                                            <div class="icon-box">
                                                <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                            </div>
                                            <div class="headertext-box">
                                                <h2> Are you sure you want to Cancel this appointment?</h2>
                                            </div>
                                            <div class="form-btnarea">
                                                <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $cancelconf ?>')">No</button>
                                                <button class="buttonresched" type="button" onclick="closeForm('<?php echo $cancelconf ?>'), openForm('<?php echo $canceled?>')" name="sure">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popupCover" id="<?php echo $rejectconf?>">
                                        <div class="popupForm">
                                            <div class="icon-box">
                                                <i class="fa fa-question-circle" style="font-size: 4rem"></i>
                                            </div>
                                            <div class="headertext-box">
                                                <h2> Are you sure you want to Reject this appointment?</h2>
                                            </div>
                                            <div class="form-btnarea">
                                                <button class="buttoncancel" type="button" onclick="closeForm('<?php echo $rejectconf?>')">No</button>
                                                <button class="buttonresched" type="button" onclick="closeForm('<?php echo $rejectconf?>'), openForm('<?php echo $rejected?>')" name="sure">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                <form action="admin_LANDINGPAGE.php" method="post">
                                    <div class="popupCover-reason" id="<?php echo $rejected?>">
                                        <div class="popupForm-reason">
                                            <div class="headertext-box">
                                                <h2> Reason/s </h2>
                                                <p>Please provide a reason for the Rejection of appointment # <?php echo $id?> </p>
                                            </div>
                                            <div class="form-area">
                                                <p><strong>Reason for  Rejection</strong></p>
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
                                                    <input type="hidden" name="reasonid" value="<?php echo $id?>">
                                                    <button type="button" class="buttoncancel" onclick="closeForm('<?php echo $rejected?>')"> Cancel</button>
                                                    <button type="submit" class="buttonresched" name="submit" value="rejected">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="admin_LANDINGPAGE.php" method="post">
                                    <div class="popupCover-reason" id="<?php echo $canceled?>">
                                        <div class="popupForm-reason">
                                            <div class="headertext-box">
                                                <h2> Reason/s </h2>
                                                <p>Please provide a reason for the Cancellation of appointment # <?php echo $id?> </p>
                                            </div>
                                            <div class="form-area">
                                                <p><strong>Reason for  cancelation</strong></p>
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
                                                    <input type="hidden" name="reasonid" value="<?php echo $id?>">
                                                    <button type="button" class="buttoncancel" onclick="closeForm('<?php echo $canceled?>')"> Cancel</button>
                                                    <button type="submit" class="buttonresched" name="submit" value="canceled">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        <?php }
                        } else {
                            echo "<td colspan=4>No records available.</td>";
                        }
                        ?>
                </table>

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
            <?php if (isset($_GET['view'])) { ?>
                <div class="view-container">
                    <div class="view-card">
                        <script>
                            document.body.style.height = "100%";
                            document.body.style.overflow = "hidden";
                        </script>
                        <?php
                        $queryId = $_GET['view'];
                        $event = $_GET['event'];
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
            <?php } 
            
            if(isset($_SESSION['updated'])){
                $message1 = $_SESSION['m1'];
                $message2 = $_SESSION['m2'];
            ?>
             <div class="popupCover-message" id="message">
                <div class="popupMessage">
                    <div> <i class="fa fa-check-circle" style="font-size: 4rem"></i> </div>
                    <div class="title-cont"> <h2><?php echo $message1?></h2> </div>
                    <div class="desc-cont"><?php echo $message2?> </div>
                    <div class="button-cont">  <button type="button" onclick="location.href='admin_APPOINTMENTLIST.php'"> <b>Back to Appointment List</b></button> </div>
                    <?php unset($_SESSION['updated']) ?>
                </div>
            </div>
           <?php }
            ?>
        </div>
    </div>
    <script src="jsAPPOINTMENTLIST.js"></script>
</body>

</html>