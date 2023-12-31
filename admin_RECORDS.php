<?php
session_start();
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRECORDS.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>The SJCP - Records</title>
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
                <div><i class="fa-solid fa-chart-line"></i>&nbspDashboard</div>
                <div><i class="fa-solid fa-newspaper"></i>&nbspAnnouncements</div>
                <div class="active-btn"><i class="fa-solid fa-file-pen"></i>&nbspRecords</div>
                <div><i class="fa-solid fa-calendar-check"></i>&nbspAppointments</div>
                <div><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbspLog-out</div>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content">
            <div class="record-heading">
                <div class="internal-heading" onclick="openNav()" id="openNav"><i class="fa-solid fa-bars"></i></div>
                <div class="internal-heading"><span id="sjcp"><i class="fa-solid fa-church"></i>&nbspSJCP</span> Records</div>
                <!--<form class="record-filter" action="recordHandler.php" method="post">
                    <button type="submit" name="recordSub" value="Baptism">Baptism</button>&nbsp/&nbsp
                    <button type="submit" name="recordSub" value="Confirmation">Confirmation</button>&nbsp/&nbsp
                    <button type="submit" name="recordSub" value="Wedding">Wedding</button>&nbsp/&nbsp
                    <button type="submit" name="recordSub" value="Funeral">Funeral Mass</button>&nbsp/&nbsp
                </form>-->
            </div>
            <?php
            if (isset($_SESSION['recordFilter'])) {
                $event = $_SESSION['recordFilter'];
            } else {
                $event = 'Baptism';
            }
            ?>
            <form class="search-filter" action="recordHandler.php" method="post">
                <div class="filter">
                    <span><strong>Find by: </strong></span>
                    <select name="searchFilter" id="myFilter" onchange="filterChange()">
                        <option value="" hidden disabled selected>Select Option</option>
                        <option value="name">Name</option>
                        <?php
                        if (isset($_SESSION['recordFilter']) && $_SESSION['recordFilter'] != 'Wedding' && $_SESSION['recordFilter'] != 'Funeral' || !isset($_SESSION['recordFilter'])) { ?>
                            <option value="bday">Birthdate</option>
                        <?php } else if (isset($_SESSION['recordFilter']) && $_SESSION['recordFilter'] == 'Funeral') { ?>
                            <option value="bday">Date of Death</option>
                        <?php } ?>
                        <option value="eday">Event Date</option>
                    </select>
                </div>
                <div id="search-input">
                    <div class="for-search" id="forName">
                        <div>
                            <span>Last Name:&nbsp</span>
                            <input type="text" name="findLn" id="">&nbsp
                        </div>
                        <div>
                            <span>First Name:&nbsp</span>
                            <input type="text" name="findFn" id="">&nbsp
                        </div>
                        <button type="submit" name="filterSub">Search</button>
                    </div>
                    <div class="for-search" id="forBDate">
                        <div>
                            <?php if (isset($_SESSION['recordFilter']) && $_SESSION['recordFilter'] != 'Funeral') { ?>
                                <span>Select Birthdate:&nbsp</span>
                            <?php } else { ?>
                                <span>Select Date of Death:&nbsp</span>
                            <?php } ?>
                            <input type="date" name="findBday" id="">&nbsp
                        </div>
                        <button type="submit" name="filterSub">Search</button>
                    </div>
                    <div class="for-search" id="forEDate">
                        <div>
                            <span>Select Event Date:&nbsp</span>
                            <input type="date" name="findEday" id="">&nbsp
                        </div>
                        <button type="submit" name="filterSub">Search</button>
                    </div>
                </div>
            </form>
            <div class="record-view">
                <div class="filter-cont">
                    <span>Filter by:&nbsp</span>
                    <div class="view-header" onclick="showoption()">
                    <?php
                    //unset($_SESSION['searchFilter']);
                    if ($event == 'Funeral') {
                        echo $event . " Blessing / Mass";
                    } else {
                        echo $event;
                    }
                    ?>
                    <i class="fa-solid fa-caret-down"></i>
                    <form class="record-filter" id="options" action="recordHandler.php" method="post">
                        <button type="submit" name="recordSub" value="Baptism">Baptism</button>
                        <button type="submit" name="recordSub" value="Confirmation">Confirmation</button>
                        <button type="submit" name="recordSub" value="Wedding">Wedding</button>
                        <button type="submit" name="recordSub" value="Funeral">Funeral Mass</button>
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

                    // Query for Baptism
                    if ($event == 'Baptism') { ?>
                        <tr>
                            <th colspan="2">Date of Baptism</th>
                            <th colspan="2">Date of Birth</th>
                            <th colspan="2">Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if (isset($_SESSION['searchFilter'])) {
                            if ($_SESSION['searchFilter'] == 'byName') {
                                $ln = $_SESSION['findVal'][0];
                                $fn = $_SESSION['findVal'][1];
                                echo "Finding records for $ln, $fn";
                                $query = "SELECT * FROM record_baptism_details WHERE lastName='$ln' AND firstName='$fn'";
                                $sql = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE lastName='$ln' AND firstName='$fn'";
                            } else if ($_SESSION['searchFilter'] == 'byBday') {
                                $Bday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_baptism_details WHERE birthdate='$Bday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE birthdate='$Bday'";
                            } else if ($_SESSION['searchFilter'] == 'byEday') {
                                $Eday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_baptism_details WHERE event_date='$Eday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE event_date='$Eday'";
                            }
                            unset($_SESSION['searchFilter']);
                            unset($_SESSION['findVal']);
                        } else {
                            $query = "SELECT * FROM record_baptism_details LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM record_baptism_details";
                        }

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['event_date'])) ?></td>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['birthdate'])) ?></td>
                                    <td colspan="2"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                    <form action="fillDb.php" method="post">
                                        <?php $view = $row['baptism_id']; ?>
                                        <input type="hidden" name="eventId" value="<?php echo $view ?>">
                                        <td>
                                            <div class="action-btn">
                                                <button type="button" onclick="location.href='<?php echo '?view=' . $view ?>'"><i class="fa-solid fa-eye"></i></button><button type="submit"><i class="fa-solid fa-pencil"></i></button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                        <?php }
                        } else {
                            echo "<td class='no-record' colspan='7'>No records available.</td>";
                        }
                        ?>

                        <!-- Query for Confirmation -->
                    <?php } else if ($event == 'Confirmation') { ?>
                        <tr>
                            <th colspan="2">Date of Confirmation</th>
                            <th colspan="2">Date of Birth</th>
                            <th colspan="2">Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if (isset($_SESSION['searchFilter'])) {
                            if ($_SESSION['searchFilter'] == 'byName') {
                                $ln = $_SESSION['findVal'][0];
                                $fn = $_SESSION['findVal'][1];
                                echo "Finding records for $ln, $fn";
                                $query = "SELECT * FROM record_confirmation_details WHERE lastName='$ln' AND firstName='$fn'";
                                $sql = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE lastName='$ln' AND firstName='$fn'";
                            } else if ($_SESSION['searchFilter'] == 'byBday') {
                                $Bday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_confirmation_details WHERE dob='$Bday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE dob='$Bday'";
                            } else if ($_SESSION['searchFilter'] == 'byEday') {
                                $Eday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_confirmation_details WHERE confirmation_date='$Eday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE confirmation_date='$Eday'";
                            }
                            unset($_SESSION['searchFilter']);
                            unset($_SESSION['findVal']);
                        } else {
                            $query = "SELECT * FROM record_confirmation_details LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM record_confirmation_details";
                        }

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['confirmation_date'])) ?></td>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['dob'])) ?></td>
                                    <td colspan="2"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                    <form action="fillDb.php" method="post">
                                        <?php $view = $row['confirmation_id']; ?>
                                        <input type="hidden" name="eventId" value="<?php echo $row['confirmation_id'] ?>">
                                        <td>
                                            <div class="action-btn">
                                                <button type="button" onclick="location.href='<?php echo '?view=' . $view ?>'"><i class="fa-solid fa-eye"></i></button><button type="submit"><i class="fa-solid fa-pencil"></i></button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                        <?php }
                        } else {
                            echo "<td class='no-record' colspan='7'>No records available.</td>";
                        }
                        ?>

                        <!-- Query for Wedding -->
                    <?php } else if ($event == 'Wedding') { ?>
                        <tr>
                            <th colspan="2">Date of Wedding</th>
                            <th colspan="2">Groom's Name</th>
                            <th colspan="2">Bride's Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if (isset($_SESSION['searchFilter'])) {
                            if ($_SESSION['searchFilter'] == 'byName') {
                                $ln = $_SESSION['findVal'][0];
                                $fn = $_SESSION['findVal'][1];
                                echo "Finding records for $ln, $fn";
                                $query = "SELECT * FROM record_wedding_details WHERE groom_lastName='$ln' AND groom_firstName='$fn' OR bride_lastName='$ln' AND bride_firstName='$fn'";
                                $sql = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE groom_lastName='$ln' AND groom_firstName='$fn' OR bride_lastName='$ln' AND bride_firstName='$fn'";
                            } else if ($_SESSION['searchFilter'] == 'byEday') {
                                $Eday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_wedding_details WHERE event_date='$Eday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE event_date='$Eday'";
                            }
                            unset($_SESSION['searchFilter']);
                            unset($_SESSION['findVal']);
                        } else {
                            $query = "SELECT * FROM record_wedding_details LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM record_wedding_details";
                        }

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['event_date'])) ?></td>
                                    <td colspan="2"><?php echo $row['groom_lastName'] . ", " . $row['groom_firstName'] ?></td>
                                    <td colspan="2"><?php echo $row['bride_lastName'] . ", " . $row['bride_firstName'] ?></td>
                                    <form action="" method="post">
                                        <?php $view = $row['wedding_id']; ?>
                                        <input type="hidden" name="eventId" value="<?php echo $row['wedding_id'] ?>">
                                        <td>
                                            <div class="action-btn">
                                                <button type="button" onclick="location.href='<?php echo '?view=' . $view ?>'"><i class="fa-solid fa-eye"></i></button><button type="submit"><i class="fa-solid fa-pencil"></i></button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                        <?php }
                        } else {
                            echo "<td class='no-record' colspan='7'>No records available.</td>";
                        }
                        ?>

                        <!-- Query for Funeral -->
                    <?php } else if ($event == 'Funeral') { ?>
                        <tr>
                            <th colspan="2">Funeral Blessing Date</th>
                            <th colspan="2">Date of Death</th>
                            <th colspan="2">Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if (isset($_SESSION['searchFilter'])) {
                            if ($_SESSION['searchFilter'] == 'byName') {
                                $ln = $_SESSION['findVal'][0];
                                $fn = $_SESSION['findVal'][1];
                                echo "Finding records for $ln, $fn";
                                $query = "SELECT * FROM record_funeral_details WHERE lastName='$ln' AND firstName='$fn'";
                                $sql = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE lastName='$ln' AND firstName='$fn'";
                            } else if ($_SESSION['searchFilter'] == 'byBday') {
                                $Bday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_funeral_details WHERE date_of_death='$Bday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE date_of_death='$Bday'";
                            } else if ($_SESSION['searchFilter'] == 'byEday') {
                                $Eday = $_SESSION['findVal'];
                                $query = "SELECT * FROM record_funeral_details WHERE event_date='$Eday' LIMIT $startFrom, $recordsPerPage";
                                $sql = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE event_date='$Eday'";
                            }
                            unset($_SESSION['searchFilter']);
                            unset($_SESSION['findVal']);
                        } else {
                            $query = "SELECT * FROM record_confirmation_details LIMIT $startFrom, $recordsPerPage";
                            $sql = "SELECT COUNT(*) AS total FROM record_funeral_details";
                        }

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['event_date'])) ?></td>
                                    <td colspan="2"><?php echo date('F d, Y', strtotime($row['date_of_death'])) ?></td>
                                    <td colspan="2"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                    <form action="fillDb.php" method="post">
                                        <?php $view = $row['funeral_id']; ?>
                                        <input type="hidden" name="eventId" value="<?php echo $row['funeral_id'] ?>">
                                        <td>
                                            <div class="action-btn">
                                                <button type="button" onclick="location.href='<?php echo '?view=' . $view ?>'"><i class="fa-solid fa-eye"></i></button><button type="submit"><i class="fa-solid fa-pencil"></i></button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                        <?php }
                        } else {
                            echo "<td class='no-record' colspan='7'>No records available.</td>";
                        }
                        ?>
                    <?php } ?>
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
                        if ($event == 'Baptism') {
                            $viewQuery = "SELECT * FROM record_baptism_details WHERE baptism_id='$queryId'";
                        } else if ($event == 'Confirmation') {
                            $viewQuery = "SELECT * FROM record_confirmation_details WHERE confirmation_id='$queryId'";
                        } else if ($event == 'Wedding') {
                            $viewQuery = "SELECT * FROM record_wedding_details WHERE wedding_id='$queryId'";
                        } else if ($event == 'Funeral') {
                            $viewQuery = "SELECT * FROM record_funeral_details WHERE funeral_id='$queryId'";
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
                                        <span><?php echo date("h:i:s A", strtotime($viewRow['event_time'])) ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Name</span>
                                        <span>Birthdate</span>
                                        <span>Gender</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['lastName'] . ", " . $viewRow['firstName'] . " " . $viewRow['middleName']  ?></span>
                                        <span><?php echo date('F d, Y', strtotime($viewRow['birthdate'])) ?></span>
                                        <span><?php echo $viewRow['gender'] ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Place of Birth</span>
                                        <span>Address</span>
                                        <span>Contact Number</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['birthplace'] ?></span>
                                        <span><?php echo $viewRow['address'] ?></span>
                                        <span><?php echo $viewRow['contactNum'] ?></span>
                                    </div>
                                    <div class="inner-view-heading1">
                                        <span>Father's Name</span>
                                        <span>Father's Place of Birth</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo $viewRow['fatherName'] ?></span>
                                        <span><?php echo $viewRow['father_pob'] ?></span>
                                    </div>
                                    <div class="inner-view-heading1">
                                        <span>Mother's Name</span>
                                        <span>Mother's Place of Birth</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo $viewRow['motherName'] ?></span>
                                        <span><?php echo $viewRow['mother_pob'] ?></span>
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
                                        <span><?php echo $viewRow['godfatherName'] ?></span>
                                        <span><?php echo $viewRow['godfather_address'] ?></span>
                                    </div>
                                    <div class="inner-view-heading1">
                                        <span>Godmother's Name</span>
                                        <span>Godmother's Address</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo $viewRow['godmotherName'] ?></span>
                                        <span><?php echo $viewRow['godmother_address'] ?></span>
                                    </div>
                                <?php } else if ($event == 'Confirmation') { ?>
                                    <!-- For Confirmation -->
                                    <div class="view-heading">Confirmation Record Details</div>
                                    <div class="inner-view-heading1">
                                        <span>Confirmation Date</span>
                                        <span>Confirmation Time</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo date('F d, Y', strtotime($viewRow['confirmation_date'])) ?></span>
                                        <span><?php echo date("h:i:s A", strtotime($viewRow['confirmation_time'])) ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Name</span>
                                        <span>Birthdate</span>
                                        <span>Gender</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['lastName'] . ", " . $viewRow['firstName'] . " " . $viewRow['middleName']  ?></span>
                                        <span><?php echo date('F d, Y', strtotime($viewRow['dob'])) ?></span>
                                        <span><?php echo $viewRow['gender'] ?></span>

                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Place of Birth</span>
                                        <span>Place of Baptism</span>
                                        <span>Date of Baptism</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['pob'] ?></span>
                                        <span><?php echo $viewRow['placeof_baptism'] ?></span>
                                        <span><?php echo date('F d, Y', strtotime($viewRow['dateof_baptism'])) ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Father's Name</span>
                                        <span>Mother's Name</span>
                                        <span>Contact Number</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['fatherName'] ?></span>
                                        <span><?php echo $viewRow['motherName'] ?></span>
                                        <span><?php echo $viewRow['contactNum'] ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Address</span>
                                        <span>Godfather's Name</span>
                                        <span>Godmother's Name</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['address'] ?></span>
                                        <span><?php echo $viewRow['godfatherName'] ?></span>
                                        <span><?php echo $viewRow['godmotherName'] ?></span>
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
                                        <span><?php echo date("h:i:s A", strtotime($viewRow['event_time'])) ?></span>
                                    </div>
                                    <div class="view-heading">Groom</div>
                                    <div class="inner-view-heading2">
                                        <span>Name</span>
                                        <span>Date of Birth</span>
                                        <span>Place of Birth</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['groom_lastName'] . ", " . $viewRow['groom_firstName'] . " " . $viewRow['groom_middleName']  ?></span>
                                        <span><?php echo $viewRow['groom_dob'] ?></span>
                                        <span><?php echo $viewRow['groom_pob'] ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Contact Number</span>
                                        <span>Religion</span>
                                        <span>Address</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['groom_contactNum'] ?></span>
                                        <span><?php echo $viewRow['groom_religion'] ?></span>
                                        <span><?php echo $viewRow['groom_address'] ?></span>
                                    </div>
                                    <div class="inner-view-heading1">
                                        <span>Father's Name</span>
                                        <span>Mother's Name</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo $viewRow['groom_fatherName'] ?></span>
                                        <span><?php echo $viewRow['groom_motherName'] ?></span>
                                    </div>
                                    <div class="view-heading">Bride</div>
                                    <div class="inner-view-heading2">
                                        <span>Name</span>
                                        <span>Date of Birth</span>
                                        <span>Place of Birth</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['bride_lastName'] . ", " . $viewRow['bride_firstName'] . " " . $viewRow['bride_middleName']  ?></span>
                                        <span><?php echo $viewRow['bride_dob'] ?></span>
                                        <span><?php echo $viewRow['bride_pob'] ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Contact Number</span>
                                        <span>Religion</span>
                                        <span>Address</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['bride_contactNum'] ?></span>
                                        <span><?php echo $viewRow['bride_religion'] ?></span>
                                        <span><?php echo $viewRow['bride_address'] ?></span>
                                    </div>
                                    <div class="inner-view-heading1">
                                        <span>Father's Name</span>
                                        <span>Mother's Name</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo $viewRow['bride_fatherName'] ?></span>
                                        <span><?php echo $viewRow['bride_motherName'] ?></span>
                                    </div>
                                <?php } else if ($event == 'Funeral') { ?>
                                    <!-- For Funeral -->
                                    <div class="view-heading">Funeral Mass Record Details</div>
                                    <div class="inner-view-heading1">
                                        <span>Funeral Mass Date</span>
                                        <span>Funeral Mass Time</span>
                                    </div>
                                    <div class="inner-view-content1">
                                        <span><?php echo date('F d, Y', strtotime($viewRow['event_date'])) ?></span>
                                        <span><?php echo date("h:i:s A", strtotime($viewRow['event_time'])) ?></span>
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
                                        <span><?php echo date('F d, Y', strtotime($viewRow['date_of_death'])) ?></span>
                                        <span><?php echo $viewRow['cause_of_death'] ?></span>
                                        <span><?php echo date('F d, Y', strtotime($viewRow['date_of_internment'])) ?></span>
                                    </div>
                                    <div class="inner-view-heading2">
                                        <span>Place of Cemetery</span>
                                        <span>Sacrament Received</span>
                                        <span>Burial</span>
                                    </div>
                                    <div class="inner-view-content2">
                                        <span><?php echo $viewRow['place_of_cemetery'] ?></span>
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
                                        <span><?php echo $viewRow['informant_name'] ?></span>
                                        <span><?php echo $viewRow['contactNum'] ?></span>
                                        <span><?php echo date('F d, Y', strtotime($viewRow['address'])) ?></span>
                                    </div>
                        <?php }
                            }
                        } else {
                            echo 'Records not available';
                        }
                        ?>
                        <button class="closeme" onclick="location.href='?'"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
            <?php } ?>
            <button onclick="location.href = 'add_RECORDS.php'" class="add-btn"><i class="fa-solid fa-plus"></i>&nbsp<span>Add Record</span></button>
        </div>
    </div>
    <script src="jsRECORDS.js"></script>
</body>

</html>