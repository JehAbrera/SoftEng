<?php
session_start();
require 'dbconnect.php';

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    $login_email = $_SESSION['login_email'];
    $query = "SELECT * FROM login_userinfo WHERE email='$login_email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSEARCH.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>USER PROFILE</title>
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
                <div class="nav-item">Home</div>
                <div class="nav-item active">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">
                            View Services
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            Set Appointment
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            View Appointment
                        </div>
                        <div class="nav-item" <?php if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                                                    echo 'onclick="openLogin()"';
                                                } else {
                                                } ?>>
                            Search Record
                        </div>
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
                    echo '<div class="nav-item" onclick="openLogin()">Login</div>';
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

        <!-- SEARCH content -->
        <div class="main-body-wrapper">
            <section class="main-content">
                <div class="left-cont">
                    <div class="left-heading">Search Record</div>
                    <div class="form-cont">
                        <form action="" method="post">
                            <div class="inner">
                                <span>Last Name&nbsp<small>(Required)</small></span>
                                <input type="text" name="findln" id="" required>
                            </div>
                            <div class="inner">
                                <span>First Name&nbsp<small>(Required)</small></span>
                                <input type="text" name="findfn" id="" required>
                            </div>
                            <div class="inner">
                                <span>Middle Name</span>
                                <input type="text" name="findmn" id="">
                            </div>
                            <div class="inner">
                                <span>Birthdate</span>
                                <input type="date" name="findday" id="">
                            </div>
                            <button type="submit" name="searchREC"><i class="fa-solid fa-magnifying-glass"></i>&nbspFind</button>
                        </form>
                    </div>
                </div>
                <div class="right-cont">
                    <?php
                    $fn = "";
                    $ln = "";
                    $mn = "";
                    $day = "";
                    ?>
                    <?php if (!isset($_POST['searchREC'])) { ?>
                        <div class="no-res">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>It looks like you haven't made a search yet!</span>
                        </div>
                    <?php } else if (isset($_POST['searchREC'])) {
                        $fn = $_POST['findfn'];
                        $ln = $_POST['findln'];
                        if (strlen($_POST['findmn']) == 0 && strlen($_POST['findday']) == 0) {
                            $bapsql = "SELECT COUNT(*) as total FROM record_baptism_details WHERE lastName='$ln' AND firstName='$fn'";
                            $consql = "SELECT COUNT(*) as total FROM record_confirmation_details WHERE lastName = '$ln' AND firstName = '$fn'";
                            $wedsql = "SELECT COUNT(*) as total FROM record_wedding_details WHERE groom_lastName = '$ln' AND groom_firstName = '$fn' OR bride_lastName = '$ln' AND bride_firstName = '$fn'";
                            $funsql = "SELECT COUNT(*) as total FROM record_funeral_details WHERE lastName = '$ln' AND firstName = '$fn'";
                        } else if (strlen($_POST['findmn']) > 0) {
                            $mn = $_POST['findmn'];
                            if (strlen($_POST['findday']) > 0) {
                                $day = $_POST['findday'];
                                $age = (date('Y') - date('Y', strtotime($day)));
                                $bapsql = "SELECT COUNT(*) as total FROM record_baptism_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND birthdate = '$day'";
                                $consql = "SELECT COUNT(*) as total FROM record_confirmation_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND dob = '$day'";
                                $wedsql = "SELECT COUNT(*) as total FROM record_wedding_details WHERE groom_lastName = '$ln' AND groom_firstName = '$fn' AND groom_middleName = '$mn' AND groom_dob = '$day' OR bride_lastName = '$ln' AND bride_firstName = '$fn' AND bride_middleName = '$mn' AND bride_dob = '$day'";
                                $funsql = "SELECT COUNT(*) as total FROM record_funeral_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND age = '$age'";
                            } else {
                                $bapsql = "SELECT COUNT(*) as total FROM record_baptism_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn'";
                                $consql = "SELECT COUNT(*) as total FROM record_confirmation_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn'";
                                $wedsql = "SELECT COUNT(*) as total FROM record_wedding_details WHERE groom_lastName = '$ln' AND groom_firstName = '$fn' AND groom_middleName = '$mn' OR bride_lastName = '$ln' AND bride_firstName = '$fn' AND bride_middleName = '$mn'";
                                $funsql = "SELECT COUNT(*) as total FROM record_funeral_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn'";
                            }
                        } else if (strlen($_POST['findday']) > 0) {
                            $day = $_POST['findday'];
                            $age = (date('Y') - date('Y', strtotime($day)));
                            if (strlen($_POST['findmn']) > 0) {
                                $mn = $_POST['findmn'];
                                $bapsql = "SELECT COUNT(*) as total FROM record_baptism_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND birthdate = '$day'";
                                $consql = "SELECT COUNT(*) as total FROM record_confirmation_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND dob = '$day'";
                                $wedsql = "SELECT COUNT(*) as total FROM record_wedding_details WHERE groom_lastName = '$ln' AND groom_firstName = '$fn' AND groom_middleName = '$mn' AND groom_dob = '$day' OR bride_lastName = '$ln' AND bride_firstName = '$fn' AND bride_middleName = '$mn' AND bride_dob = '$day'";
                                $funsql = "SELECT COUNT(*) as total FROM record_funeral_details WHERE lastName = '$ln' AND firstName = '$fn' AND middleName = '$mn' AND age = '$age'";
                            } else {
                                $bapsql = "SELECT COUNT(*) as total FROM record_baptism_details WHERE lastName = '$ln' AND firstName = '$fn' AND birthdate = '$day'";
                                $consql = "SELECT COUNT(*) as total FROM record_confirmation_details WHERE lastName = '$ln' AND firstName = '$fn' AND dob = '$day'";
                                $wedsql = "SELECT COUNT(*) as total FROM record_wedding_details WHERE groom_lastName = '$ln' AND groom_firstName = '$fn' AND groom_dob = '$day' OR bride_lastName = '$ln' AND bride_firstName = '$fn' AND bride_dob = '$day'";
                                $funsql = "SELECT COUNT(*) as total FROM record_funeral_details WHERE lastName = '$ln' AND firstName = '$fn' AND age = '$age'";
                            }
                        }
                        $bapres = $conn->query($bapsql);
                        $conres = $conn->query($consql);
                        $wedres = $conn->query($wedsql);
                        $funres = $conn->query($funsql);
                        $row1 = $bapres->fetch_assoc();
                        $row2 = $conres->fetch_assoc();
                        $row3 = $wedres->fetch_assoc();
                        $row4 = $funres->fetch_assoc();
                    ?>
                        <div class="result-cont">
                            <div class="center-heading">
                                Record/s Available
                            </div>
                            <div class="inner-rec">
                                <div>
                                    <span><strong>Baptism</strong></span>
                                    <span><?php echo $row1['total'] ?> Record/s Available</span>
                                </div>
                                <div>
                                    <span><strong>Confirmation</strong></span>
                                    <span><?php echo $row2['total'] ?> Record/s Available</span>
                                </div>
                                <div>
                                    <span><strong>Wedding</strong></span>
                                    <span><?php echo $row3['total'] ?> Record/s Available</span>
                                </div>
                                <div>
                                    <span><strong>Funeral</strong></span>
                                    <span><?php echo $row4['total'] ?> Record/s Available</span>
                                </div>
                            </div>
                        </div>
                    <?php }
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
    <script src="jsPROFILE.js"></script>
</body>

</html>