<?php

session_start();
require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleEDITREC.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous">
    </script>
    <title>The SJCP - Records</title>
    <link rel="icon" type="image/png" href="tabicon.png">
</head>

<body>
    <div class="content-wrapper">
        <div class="main-content">
            <button type="button" onclick="location.href='admin_RECORDS.php'" class="backbtn"><i class="fa-solid fa-arrow-left"></i>&nbspBack</button>
            <?php
            if (isset($_GET['event'])) {
                $id = $_GET['id'];
                echo '<form action="" method="post">';
                echo '<h3>Edit&nbsp<i class="fa-solid fa-pen"></i></h3>';
                if ($_GET['event'] == 'Baptism') {
                    $query = "SELECT * FROM record_baptism_details WHERE baptism_id='$id'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) { ?>
                            <div class="form-heading">
                                Baptized's Information
                            </div>
                            <div>Name</div>
                            <div class="by3">
                                <small>Last Name</small>
                                <small>First Name</small>
                                <small>Middle Name</small>
                            </div>
                            <div class="by3">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by3">
                                <small>Gender</small>
                                <small>Birthdate</small>
                                <small>Place of Birth</small>
                            </div>
                            <div class="by3">
                                <div>
                                    <label for="">Male</label>
                                    <input type="radio" name="" id="">
                                    <label for="">Female</label>
                                    <input type="radio" name="" id="">
                                </div>
                                <input type="date" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by1">
                                <small>Address</small>
                            </div>
                            <div class="by1">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by2">
                                <small>Father's Name</small>
                                <small>Father's Place of Birth</small>
                            </div>
                            <div class="by2">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by2">
                                <small>Mother's Name</small>
                                <small>Mother's Place of Birth</small>
                            </div>
                            <div class="by2">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by2">
                                <small>Parent/Guardian's Contact Number</small>
                                <small>Parent's Type of Marriage</small>
                            </div>
                            <div class="by2">
                                <div class="contact">
                                    <input type="text" name="" id="" value="+63" readonly>
                                    <input type="tel" name="" id="">
                                </div>
                                <select name="" id="">
                                    <option value="" selected hidden disabled>Type of Marriage</option>
                                    <option value="">Civil Marriage</option>
                                    <option value="">Church Marriage</option>
                                </select>
                            </div>
                            <div class="by2">
                                <small>Godfather's Name</small>
                                <small>Godfather's Address</small>
                            </div>
                            <div class="by2">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                            <div class="by2">
                                <small>Godmother's Name</small>
                                <small>Godmother's Address</small>
                            </div>
                            <div class="by2">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </div>
                        <?php }
                    } else {
                        echo "Details to this Record cannot be found or unavailable!";
                    }
                } else if ($_GET['event'] == 'Confirmation') {
                    $query = "SELECT * FROM record_confirmation_details WHERE baptism_id='$id'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) { ?>
                        <div class="form-heading">
                            Confirmant's Information
                        </div>
                        <div>Name</div>
                        <div class="by3">
                            <small>Last Name</small>
                            <small>First Name</small>
                            <small>Middle Name</small>
                        </div>
                        <div class="by3">
                            <input type="text" name="" id="">
                            <input type="text" name="" id="">
                            <input type="text" name="" id="">
                        </div>
                <?php }
                    } else {
                        echo "Details to this Record cannot be found or unavailable!";
                    }
                } else if ($_GET['event'] == 'Wedding') {
                    $query = "SELECT * FROM record_wedding_details WHERE baptism_id='$id'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) {
                        }
                    } else {
                        echo "Details to this Record cannot be found or unavailable!";
                    }
                } else if ($_GET['event'] == 'Funeral') {
                    $query = "SELECT * FROM record_funeral_details WHERE baptism_id='$id'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) {
                        }
                    } else {
                        echo "Details to this Record cannot be found or unavailable!";
                    }
                } ?>
                <div class="button-area">
                    <button type="button" onclick="openForm(clearForm)" id="clear">Cancel</button>
                    <button type="button" onclick="openForm(submitForm)" id="submit">Save</button>
                </div>
                <div id="clearForm">
                    <div class="popupForm">
                        <div class="icon-box"></div>
                        <div class="headertext-box">
                            Discard changes made?
                        </div>
                        <div class="form-btnarea">
                            <button type="button" onclick="openForm(clearForm)">No</button>
                            <button type="reset" onclick="openForm(clearForm)">Yes</button>
                        </div>
                    </div>
                </div>
                <div id="submitForm">
                    <div class="popupForm">
                        <div class="icon-box"></div>
                        <div class="headertext-box">
                            Save changes?
                        </div>
                        <div class="form-btnarea">
                            <button type="button" onclick="openForm(submitForm)">No</button>
                            <button type="submit" name="submit" value="change">Yes</button>
                        </div>
                    </div>
                </div>
            <?php echo '</form>';
            }
            ?>
        </div>
    </div>
</body>

</html>