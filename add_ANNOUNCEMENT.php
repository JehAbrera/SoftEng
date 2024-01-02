<?php
session_start();
require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleADD.css">
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
            <div class="form-wrapper">
                <div class="form-card">
                    <button class="backbtn" onclick="openForm(cancel)">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <div id="cancel">
                        <div class="popupForm">
                            <div class="icon-box">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="headertext-box">
                                <span>Discard changes?</span>
                                <p>Discarding will not post the current announcment you are making and will not save any changes</p>
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(cancel)">No</button>
                                <button type="button" onclick="location.href = 'admin_ANNOUNCEMENT.php'">Yes</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-heading">Post Announcement</div>
                    <form action="addPOST.php" method="post" enctype="multipart/form-data">
                        <span>Add Image:</span>
                        <input type="file" name="image" id="" accept="image/*">
                        <?php
                        if (isset($_SESSION['invalidImage']) && $_SESSION['invalidImage'] == true) {
                            echo '<strong style="color:red">Invalid image!</strong>';
                        }
                        ?>
                        <div>
                            <div><span>Announcement Title:</span>
                                <input type="text" name="title" id="" maxlength="40" placeholder="Max 40 Characters">
                            </div>
                            <div>
                                <span>Date:</span>
                                <input type="date" name="date" id="">
                            </div>
                        </div>
                        <span>Description:</span>
                        <textarea name="desc" id="text" rows="3" maxlength="200" onkeyup="checkChar()"></textarea>
                        <small id="count">0 / 200</small>
                        <div class="btn-area">
                            <button type="reset" id="clear">Clear</button>
                            <button type="button" onclick="openForm(submitForm)">Add</button>
                        </div>
                        <div id="submitForm">
                            <div class="popupForm">
                                <div class="icon-box">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                </div>
                                <div class="headertext-box">
                                    <span>Post Announcement?</span>
                                    <p>Clients of SJCP will be able to view posted announcements in their feed.</p>
                                </div>
                                <div class="form-btnarea">
                                    <button type="button" onclick="openForm(submitForm)">No</button>
                                    <button type="submit" name="submitReg" value="submit">Yes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <strong></strong>
        <?php unset($_SESSION['invalidImage']) ?>
        <script src="jsADD.js"></script>
</body>

</html>