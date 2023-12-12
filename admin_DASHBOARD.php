<?php
session_start();
require 'dbconnect.php';

$baptismDataPoints = array(
    array("y" => 10, "label" => "Male"),
    array("y" => 25, "label" => "Female"),
    array("y" => 35, "label" => "Total")
);


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
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "St. John of the Cross Baptism Tally"
                },
                axisY: {
                    title: "Total per Gender",
                    includeZero: true,
                },
                dataPointWidth: 40,
                data: [{
                    type: "column",
                    yValueFormatString: "",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontWeight: "bolder",
                    indexLabelFontColor: "white",
                    dataPoints: <?php echo json_encode($baptismDataPoints, JSON_NUMERIC_CHECK);
                                ?>,
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div class="content-wrapper">
        <!-- Nav Wrapper -->
        <!-- Add active class on active button of current page -->
        <div class="nav-wrapper">
            <div class="icon-wrapper">
                <i class="fa-solid fa-church"></i> SJCP
            </div>
            <div class="nav-items">
                <button class="active-btn">Dashboard</button>
                <button>Add Announcement</button>
                <button>Records</button>
                <button>Appointments</button>
                <button>Log-out</button>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content">
            <div class="main-left">
                <div class="appointment-overview">
                    <div class="appointment-heading">
                        Appointments Overview
                    </div>
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
                                <span>New</span>
                                <span>
                                    <?php
                                        $newQuery = "";
                                    ?>0
                                </span>
                            </div>
                        </div>
                        <div class="appointment-card">
                            <i class="fa-solid fa-calendar-day"></i>
                            <div>
                                <span>Today</span>
                                <span>
                                    <?php
                                        $nowQuery = "SELECT COUNT(*) FROM appointment_details WHERE date_appointed = 'date(NOW())'";
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
                            <div class="inner-heading">Baptism</div>
                            <div class="bapt-icon">
                                <div class="bapt-icon-wrapper">
                                    <i class="fa-solid fa-mars"></i>
                                    <span>Male</span>
                                    <span>0</span>
                                </div>
                                <div class="bapt-icon-wrapper">
                                    <i class="fa-solid fa-venus"></i>
                                    <span>Female</span>
                                    <span>0</span>
                                </div>
                            </div>
                        </div>
                        <div class="stat-wedding stat-card">
                            <div class="inner-heading">Wedding</div>
                            <div class="wedding-count">
                                <div class="wed-content"><span></span><span><strong>Total</strong></span></div>
                                <div class="wed-content"><span><strong>Same Religion</strong></span><span>0</span></div>
                                <div class="wed-content"><span><strong>Different Religion</strong></span><span>0</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="stat-event">
                        <div id="chartContainer"></div>
                        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    </div>
                </div>
            </div>
            <div class="main-right">
                <div class="container-sched">
                    <div class="sched-heading">Today's Events</div>
                    <div class="today-events">
                        <!-- PHP here -->
                    </div>
                </div>
                <div class="container-sched">
                    <div class="sched-heading">Upcoming Events</div>
                    <div class="upcoming-events">
                        <!-- PHP here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>