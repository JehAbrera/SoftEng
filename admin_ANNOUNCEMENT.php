<?php
session_start();
require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleANNOUNCEMENT.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>The SJCP - Announcement</title>
    <link rel="icon" type="image/png" href="tabicon.png">
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
                <div class="internal-heading"><span id="sjcp"><i class="fa-solid fa-church"></i>&nbspSJCP</span> Announcements</div>
            </div>
            <div class="post-cont">
                <button class="floating-btn" onclick="location.href = 'add_ANNOUNCEMENT.php'"><i class="fa-solid fa-plus"></i>&nbspAdd Post</button>
                <?php
                $query = "SELECT * FROM announcement_details";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dir = "post/" . $row['announce_image']; ?>
                        <div class="post-card">
                            <div class="image-wrapper">
                                <img src="<?php echo $dir ?>" alt="thisimg.jpg">
                            </div>
                            <div class="main-wrapper">
                                <div class="title-box">
                                    <div class="title-heading">Title: <?php echo $row['event_name'] ?></div>
                                    <div class="title-heading">Date: <?php echo $row['event_date'] ?></div>
                                </div>
                                <div class="desc-box">
                                    <strong>Description:</strong> <br>
                                    <div class="para"><?php echo $row['description'] ?></div>
                                </div>
                            </div>
                            <div class="option-wrapper">
                                <form action="" method="post">
                                    <input type="hidden" name="toDelete" value="<?php echo $row['post_id'] ?>">
                                    <button type="submit" name="editPost"><i class="fa-solid fa-pencil"></i>&nbspEdit</button>
                                    <button type="submit" formaction="addPOST.php" name="delPost"><i class="fa-solid fa-trash-can"></i>&nbspDelete</button>
                                </form>
                            </div>
                        </div>
                    <?php }
                } else {
                    ?> <div class="empty-post">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>No Announcements to show.</span>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <script src="jsRECORDS.js"></script>
</body>

</html>