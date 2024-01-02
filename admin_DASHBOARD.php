<?php
session_start();
require 'dbconnect.php';

// Get query for Baptism chart values //
$femaletotal = "SELECT COUNT(*) AS total from record_baptism_details WHERE gender='Female'";
$maletotal = "SELECT COUNT(*) AS total from record_baptism_details WHERE gender='Male'";
$ftotal = $conn->query($femaletotal);
$mtotal = $conn->query($maletotal);
$femres = $ftotal->fetch_assoc();
$mres = $mtotal->fetch_assoc();
if ($mres['total'] == 0 && $femres['total'] == 0) {
    $baptismDataPoints = array(
        array("y" => 1, "label" => "No Records Available")
    );
} else {
    $baptismDataPoints = array(
        array("y" => $mres['total'], "label" => "Male"),
        array("y" => $femres['total'], "label" => "Female")
    );
}


// Query for Wedding values //
$difreg = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE NOT groom_religion = bride_religion";
$samereg = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE groom_religion = bride_religion";
$quedif = $conn->query($difreg);
$quesame = $conn->query($samereg);
$difres = $quedif->fetch_assoc();
$sameres = $quesame->fetch_assoc();

if ($difres['total'] == 0 && $sameres['total'] == 0) {
    $weddingDataPoints = array(
        array("y" => 1, "label" => "No Records Available")
    );
} else {
    $weddingDataPoints = array(
        array("y" => $difres['total'], "label" => "Different Religion"),
        array("y" => $sameres['total'], "label" => "Same Religion")
    );
}


// Query for Confirmation //
$ftot = "SELECT COUNT(*) AS total from record_confirmation_details WHERE gender='Female'";
$mtot = "SELECT COUNT(*) AS total from record_confirmation_details WHERE gender='Male'";
$fque = $conn->query($ftot);
$mque = $conn->query($mtot);
$resf = $fque->fetch_assoc();
$resm = $mque->fetch_assoc();

if ($resf['total'] == 0 && $resm['total'] == 0) {
    $confirmationDataPoints = array(
        array("y" => 1, "label" => "No Records Available")
    );
} else {
    $confirmationDataPoints = array(
        array("y" => $resf['total'], "label" => "Female"),
        array("y" => $resm['total'], "label" => "Male")
    );
}

// Query for all //
if (!isset($_GET['allStat'])) {
    $allBap = "SELECT COUNT(*) AS total FROM record_baptism_details";
    $allWed = "SELECT COUNT(*) AS total FROM record_wedding_details";
    $allCon = "SELECT COUNT(*) AS total FROM record_confirmation_details";
    $allFun = "SELECT COUNT(*) AS total FROM record_funeral_details";
    $queBap = $conn->query($allBap);
    $queWed = $conn->query($allWed);
    $queCon = $conn->query($allCon);
    $queFun = $conn->query($allFun);
    $totBap = $queBap->fetch_assoc();
    $totWed = $queWed->fetch_assoc();
    $totCon = $queCon->fetch_assoc();
    $totFun = $queFun->fetch_assoc();
    $allDataPoints = array(
        array("y" => $totBap['total'], "label" => "Baptism"),
        array("y" => $totCon['total'], "label" => "Confirmation"),
        array("y" => $totWed['total'], "label" => "Wedding"),
        array("y" => $totFun['total'], "label" => "Funeral")
    );
} else {
    if ($_GET['allStat'] == "All") {
        $allBap = "SELECT COUNT(*) AS total FROM record_baptism_details";
        $allWed = "SELECT COUNT(*) AS total FROM record_wedding_details";
        $allCon = "SELECT COUNT(*) AS total FROM record_confirmation_details";
        $allFun = "SELECT COUNT(*) AS total FROM record_funeral_details";
    } else if ($_GET['allStat'] == "Week") {
        $allBap = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE event_date > NOW() - INTERVAL 1 WEEK";
        $allWed = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE event_date > NOW() - INTERVAL 1 WEEK";
        $allCon = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE confirmation_date > NOW() - INTERVAL 1 WEEK";
        $allFun = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE event_date > NOW() - INTERVAL 1 WEEK";
    } else if ($_GET['allStat'] == "Month") {
        $allBap = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE event_date > NOW() - INTERVAL 1 MONTH";
        $allWed = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE event_date > NOW() - INTERVAL 1 MONTH";
        $allCon = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE confirmation_date > NOW() - INTERVAL 1 MONTH";
        $allFun = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE event_date > NOW() - INTERVAL 1 MONTH";
    } else if ($_GET['allStat'] == "Year") {
        $allBap = "SELECT COUNT(*) AS total FROM record_baptism_details WHERE event_date > NOW() - INTERVAL 1 YEAR";
        $allWed = "SELECT COUNT(*) AS total FROM record_wedding_details WHERE event_date > NOW() - INTERVAL 1 YEAR";
        $allCon = "SELECT COUNT(*) AS total FROM record_confirmation_details WHERE confirmation_date > NOW() - INTERVAL 1 YEAR";
        $allFun = "SELECT COUNT(*) AS total FROM record_funeral_details WHERE event_date > NOW() - INTERVAL 1 YEAR";
    }
    $queBap = $conn->query($allBap);
    $queWed = $conn->query($allWed);
    $queCon = $conn->query($allCon);
    $queFun = $conn->query($allFun);
    $totBap = $queBap->fetch_assoc();
    $totWed = $queWed->fetch_assoc();
    $totCon = $queCon->fetch_assoc();
    $totFun = $queFun->fetch_assoc();
    $allDataPoints = array(
        array("y" => $totBap['total'], "label" => "Baptism"),
        array("y" => $totCon['total'], "label" => "Confirmation"),
        array("y" => $totWed['total'], "label" => "Wedding"),
        array("y" => $totFun['total'], "label" => "Funeral")
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleDASHBOARD.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>The SJCP - Dashboard</title>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <link rel="icon" type="image/png" href="tabicon.png">
    <script>
        window.onload = function() {

            // Chart for Baptisms //
            var bapt = new CanvasJS.Chart("bapt", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Baptism Tally"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{y} - {label}",
                    yValueFormatString: "#,##0",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($baptismDataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            bapt.render();

            // Chart for Weddings // 
            var wed = new CanvasJS.Chart("wed", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Wedding Tally"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{y} - {label}",
                    yValueFormatString: "#,##0",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($weddingDataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            wed.render();

            // Chart for Confirmation //
            var conf = new CanvasJS.Chart("conf", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Confirmation Tally"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{y} - {label}",
                    yValueFormatString: "#,##0",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($confirmationDataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            conf.render();


            var all = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "SJCP Event Tally"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{y} - {label}",
                    yValueFormatString: "#,##0",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($allDataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            all.render();

        }
    </script>
    <!--<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>-->
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
                <div class="active-btn"><i class="fa-solid fa-chart-line"></i>&nbspDashboard</div>
                <div><i class="fa-solid fa-newspaper"></i>&nbspAnnouncements</div>
                <div><i class="fa-solid fa-file-pen"></i>&nbspRecords</div>
                <div><i class="fa-solid fa-calendar-check"></i>&nbspAppointments</div>
                <div><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbspLog-out</div>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content">
            <div class="dashboard-heading">
                <div class="internal-heading" onclick="openNav()" id="openNav"><i class="fa-solid fa-bars"></i></div>
                <div class="internal-heading"><span id="sjcp"><i class="fa-solid fa-church"></i>&nbspSJCP</span> Dashboard</div>
            </div>
            <div class="inner-main">
                <div class="main-left">
                    <div class="appointment-overview">
                        <div class="appointment-heading">Appointments Overview</div>
                        <div class="appointment-cards">
                            <div class="appointment-card">
                                <i class="fa-solid fa-calendar-days"></i>
                                <div>
                                    <span>All</span>
                                    <span>
                                        <?php
                                        $allQuery = "SELECT COUNT(*) FROM appointment_details";
                                        $query = mysqli_query($conn, $allQuery);
                                        $result = mysqli_fetch_row($query);
                                        echo $result[0];
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="appointment-card">
                                <i class="fa-solid fa-calendar-plus"></i>
                                <div>
                                    <span>Pending</span>
                                    <span>
                                        <?php
                                        $newQuery = "SELECT COUNT(*) FROM appointment_details WHERE appointment_status='Pending'";
                                        $query1 = mysqli_query($conn, $newQuery);
                                        $result1 = mysqli_fetch_row($query1);
                                        echo $result1[0];
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="appointment-card">
                                <i class="fa-solid fa-calendar-day"></i>
                                <div>
                                    <span>Today</span>
                                    <span>
                                        <?php
                                        $nowQuery = "SELECT COUNT(*) FROM appointment_details WHERE date_appointed = date(NOW())";
                                        $query2 = mysqli_query($conn, $nowQuery);
                                        $result2 = mysqli_fetch_row($query2);
                                        echo $result2[0];
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-statistics">
                        <div class="event-heading">
                            Event Statistics
                        </div>
                        <div class="inner-stat">
                            <div class="stat-baptism stat-card">
                                <div class="chart" id="bapt"></div>
                            </div>
                            <div class="stat-wedding stat-card">
                                <div class="chart" id="wed"></div>
                            </div>
                            <div class="stat-confirmation stat-card">
                                <div class="chart" id="conf"></div>
                            </div>
                        </div>
                        <div class="stat-event">
                            <div class="stat-filter">
                                <small>Filter Event Tally by:</small>
                                <div class="selected" onclick="showoption()"><?php if (isset($_GET['allStat'])) {
                                                                                    echo $_GET['allStat'];
                                                                                } else {
                                                                                    echo "All";
                                                                                } ?>&nbsp<i class="fa-solid fa-caret-down"></i></div>
                                <div class="opt-cont" id="options">
                                    <div onclick="location.href='admin_DASHBOARD.php'">All</div>
                                    <div onclick="location.href='admin_DASHBOARD.php?allStat=Week'">Past Week</div>
                                    <div onclick="location.href='admin_DASHBOARD.php?allStat=Month'">Past Month</div>
                                    <div onclick="location.href='admin_DASHBOARD.php?allStat=Year'">Past Year</div>
                                </div>
                            </div>
                            <div class="chart-cont">
                                <div id="chartContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-right">
                    <div class="container-sched">
                        <div class="sched-heading">Today's Events</div>
                        <div class="today-events">
                            <!-- PHP here -->
                            <?php
                            $today = "SELECT * FROM appointment_details WHERE event_date='date(NOW())' and appointment_status='Accepted' ORDER BY event_date ASC, event_timeStart ASC LIMIT 4";
                            $quetoday = $conn->query($today);
                            if ($quetoday->num_rows > 0) {
                                while ($row = $quetoday->fetch_assoc()) { ?>
                                    <div class="display-today">
                                        <div class="type"><?php echo $row['event_type'] ?></div>
                                        <div class="timeslot">
                                            <span><?php echo $row['event_timeStart'] ?></span>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="no-display">No Events for today</div>
                            <?php }

                            ?>
                        </div>
                    </div>
                    <div class="container-sched">
                        <div class="sched-heading">Upcoming Events</div>
                        <div class="upcoming-events">
                            <!-- PHP here -->
                            <?php
                            $today = "SELECT * FROM appointment_details WHERE event_date>'date(NOW())' and appointment_status='Accepted' ORDER BY event_date ASC, event_timeStart ASC LIMIT 4";
                            $quetoday = $conn->query($today);
                            if ($quetoday->num_rows > 0) {
                                while ($row = $quetoday->fetch_assoc()) { ?>
                                    <div class="display-today">
                                        <div class="type"><?php echo $row['event_type'] ?></div>
                                        <div class="timeslot">
                                            <span><?php echo $row['event_date'] ?></span>
                                            <span><?php echo $row['event_timeStart'] ?></span>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="no-display">No Upcoming Events</div>
                            <?php }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jsRECORDS.js"></script>
</body>

</html>