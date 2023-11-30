<?php
session_start();
require 'dbconnect.php';
$_SESSION['isLoggedIn'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSCHEDULEEVENT.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP AVAILABLE SCHEDULES</title>
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
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
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

        <!-- FAQ content -->
        <div class="main-body-wrapper">
            <section class="main-content">
                <div class="main-header">
                    <span><strong>Set Schedules</strong></span>
                </div>
                <div class="schedule-container">
                    <div class="events-preference">
						<form action="page_SCHEDULEEVENT.php" method="post">
							<div class="select-cont">
							<?php 
								if(!isset($_POST["submit"])){
									 ?> <div class="events-select-container" id="events-select-container" style="display:flex">
											<span>
												<label for="ddEvent"><strong> Select to Appoint: </strong></label>
												<select class="dropdown" id="ddEvent" name="ddEvent" onchange="chooseEvent()">
													<option value="default" disabled selected hidden></option>
													<option value="Special Event">Special Event</option>											
													<option value="Mass Intention">Mass Intention</option>
													<option value="Blessing">Blessing</option>
													<option value="Document Request">Document Request</option>
												</select>
											</span>
										</div> <?php
								} else {
									?> <div class="events-select-container" id="events-select-container" style="display:none">
											<span>
												<label for="ddEvent"><strong> Select to Appoint: </strong></label>
												<select class="dropdown" id="ddEvent" name="ddEvent" onchange="chooseEvent()">
													<option value="default" disabled selected hidden></option>
													<option value="Special Event">Special Event</option>											
													<option value="Mass Intention">Mass Intention</option>
													<option value="Blessing">Blessing</option>
													<option value="Document Request">Document Request</option>
												</select>
											</span>
										</div> <?php
								}
							?>
								<div class="events-select-container" id="specificSpecial" style="display: none;">
									<span>
										<label for="ddSpecialEvent"><strong>Select type of special event: </strong></label>
										<select class="dropdown" id="ddSpecialEvent" name="Event" onchange="openCalendar();">
											<option value="" disabled selected hidden>Special Events</option>
											<option value="Wedding">Private Wedding</option>
											<option value="Baptism">Private Baptism</option>
											<option value="Funeral Mass/Blessing">Funeral Mass/Blessing</option>
										</select>
									</span>
								</div>
								
								<div class="events-select-container" id="specificMassInt" style="display: none;">
									<span>
									</span>
								</div>
									
								<div class="events-select-container" id="specificBlessing" style="display: none;">
									<span>
										<label for="ddBlessing"><strong>Select type of blessing: </strong></label>
										<select class="dropdown" id="ddBlessing" name="Event" onchange="openCalendar();">
											<option value="" disabled selected hidden>Blessings</option>
											<option value="House Blessing">House</option>
											<option value="Car Blessing">Car</option>
											<option value="Motorcycle Blessing">Motorcycle</option>
											<option value="Store Blessing">Store</option>
										</select>
									</span>
								</div>
									
								<div class="events-select-container" id="specificDocument" style="display: none;">
									<span>
										<label for="ddDocument"><strong>Select type of document: </strong></label>
										<select class="dropdown" id="ddDocument" name="Event" onchange="openCalendar();">
											<option value="" disabled selected hidden>Documents</option>
											<option value="Baptismal Certificate">Baptismal Certificate</option>
											<option value="Wedding Certificate">Wedding Certificate</option>
											<option value="Confirmation Certificate">Confirmation Certificate</option>
											<option value="Good Moral Certificate">Good Moral Certificate</option>
											<option value="Permit and No Record">Permit and No Record</option>
										</select>
									</span>
								</div>
							</div>
							<div class="date-preferred-container">
								<div id="chooseCal" style="display: none;">
									<label for="calDate"><strong>Select date:</strong></label>
									<input type="date" id="calDate" name="calDate" min="<?php echo date("Y-m-d"); ?>" required>
								</div>
								
								<div>
									<button type="submit" value="submit" name="submit" id="submitbtn" style="display: none"> View available time slots </button>
								</div>
							</div>
						</form>
						
						<?php
							if(isset($_POST["submit"])){
								$type = $_POST["ddEvent"];
								$date = $_POST["calDate"];
								if($type != "Mass Intention"){
									$event = $_POST["Event"];
									echo '<div> Event main type: '.$type.'</div>';
									echo '<div> Event type: '.$event.'</div>';
									echo '<div> Date: '.$date.'</div>';
									
									if($event == "Wedding"){
										?> <div> Wedding form </div><?php
										
										/* OUTER COMMENT START
										$weddingst = array("09:00", "10:00", "14:00", "15:30");
										$weddinget = array("10:30", "12:00", "14:00", "17:00");
										$duration = "01:30";
										$query = "SELECT event_time FROM appointment_details WHERE appointment_status = 'Accepted' AND event_date = '$date'";
										$result = mysqli_query($conn, $query);
										/*INNER COMMENT START
										while ($row = mysqli_fetch_array($result)) {
											
											for($x = 0; $x < count($weddingst); $x++){
												if(strtotime($row[0]) != strtotime($weddingst[$x])){
													echo $weddingst[$x];
												} else if(strtotime($row[0]) == strtotime($weddingst[$x])){
													
												} else {
													echo "wala lang";
												}
											}
											INNER COMMENT END * /
										$ttime = array();
										$counter = 0;
										while ($row = mysqli_fetch_assoc($result)){
											$ttime[$counter] = $row['event_time'];
											$counter++;
										}
										
										$avtime = array();
										$count =0;
										for ($x = 0; $x < count($weddingst); $x++){
											for($y = 0; $y < count($ttime); $y++) {
												if(strtotime($weddingst[$x]) != strtotime($ttime[$y])){
													$avtime[$count] = $weddingst[$x];
													$count++;
													echo $x;
												} else if(strtotime($weddingst[$x]) == strtotime($ttime[$y])){
													echo"2";
												} else {
													echo "wala lang";
												}
											}
										}
										foreach($avtime as $i){
											echo $i;
										}
										OUTER COMMENT END*/
											?> 
											<b> Requirements: </b>
											> Birth Certificate & 2x2 ID picture			> Wedding Interview <br>
											> Baptismal Certificate (Original copy)			> Marriage License or Live-In Liscense (article 34) <br>
											> Confirmation Certificate (original copy)		> Cenomar (Certificate of No Marriage - photocopy) <br>
											> Long Brown Envelope							> Pre-Cana Seminar <br>
											> Publication  of wedding banns					> Marriage contract (Civil Marriage) <br>
											> Confession <br>
											
											<b> Notes: </b>
											> The couple must submit all the requirements before the date of the event. <br>
											
											<b> Groom </b>
											<label for="groom_lastName">Last name: </label>
											<input type="text" id="groom_lastName" name="groom_lastName" required><br>
											<label for="groom_firstName">First name: </label>
											<input type="text" id="groom_firstName" name="groom_firstName" required><br>
											<label for="groom_middleName">Middle name: </label>
											<input type="text" id="groom_middleName" name="groom_middleName"><br>
											<label for="groom_contactNum">Contact number: </label>
											<input type="tel" id="groom_contactNum" name="groom_contactNum" required><br>
											<label for="groom_dob">Birth date: </label>
											<input type="date" id="groom_dob" name="groom_dob" required><br>
											<label for="groom_pob">Birth place: </label>
											<input type="text" id="groom_pob" name="groom_pob" required><br>
											<label for="groom_address">Present address: </label>
											<input type="text" id="groom_address" name="groom_address" required><br>
											<label for="groom_fatherName">Father's name: </label>
											<input type="text" id="groom_fatherName" name="groom_fatherName" required><br>
											<label for="groom_motherName">Mother's maiden name: </label>
											<input type="text" id="groom_motherName" name="groom_motherName" required><br>
											<label for="groom_religion">Religion: </label>
											<input type="text" id="groom_religion" name="groom_religion" required><br>
											
											<b> Bride </b>
											<label for="bride_lastName">Last name: </label>
											<input type="text" id="bride_lastName" name="bride_lastName" required><br>
											<label for="bride_firstName">First name: </label>
											<input type="text" id="bride_firstName" name="bride_firstName" required><br>
											<label for="bride_middleName">Middle name: </label>
											<input type="text" id="bride_middleName" name="bride_middleName"><br>
											<label for="bride_contactNum">Contact number: </label>
											<input type="tel" id="bride_contactNum" name="bride_contactNum" required><br>
											<label for="bride_dob">Birth date: </label>
											<input type="date" id="bride_dob" name="bride_dob" required><br>
											<label for="bride_pob">Birth place: </label>
											<input type="text" id="bride_pob" name="bride_pob" required><br>
											<label for="bride_address">Present address: </label>
											<input type="text" id="bride_address" name="bride_address" required><br>
											<label for="bride_fatherName">Father's name: </label>
											<input type="text" id="bride_fatherName" name="bride_fatherName" required><br>
											<label for="bride_motherName">Mother's maiden name: </label>
											<input type="text" id="bride_motherName" name="bride_motherName" required><br>
											<label for="bride_religion">Religion: </label>
											<input type="text" id="bride_religion" name="bride_religion" required><br>
											
											<?php
										
									} else if($event == "Baptism"){
										?> <div> Baptism form </div>
										
										<b> Requirements: </b>
										> Child’s PSA/Local Birth Certificate (photocopy) <br>
										> Marriage Contract of parents (photocopy) <br>
											
										<b> Notes: </b>
										> Parents and Sponsors are required to attend the seminar <br>
										> White dress or polo and pants for the child <br>
										> Any colors for the parents and sponsors <br>
										> The Godfather (Ninong) and Godmother (Ninang) must be 18 years of age or older. <br>
										> Only baptized Catholics are eligible to be chosen as Godfathers (Ninong) and Godmothers (Ninang). <br>
										
										<b> To be baptized's </b>
										<label for="lastName">Last name: </label>
										<input type="text" id="lastName" name="lastName" required><br>
										<label for="firstName">First name: </label>
										<input type="text" id="firstName" name="firstName" required><br>
										<label for="middleName">Middle name: </label>
										<input type="text" id="middleName" name="middleName"><br>
										<p> Gender: </p>
										<input type="radio" id="genderMale" name="gender" required>
										<label for="genderMale">Male </label> <br>
										<input type="radio" id="genderFemale" name="gender" required>
										<label for="genderFemale">Female </label> <br>
										<label for="dob">Birth date: </label>
										<input type="date" id="dob" name="dob" required><br>
										<label for="pob">Birth place: </label>
										<input type="text" id="pob" name="pob" required><br>
										<label for="address">Present address: </label>
										<input type="text" id="address" name="address" required><br>
										<label for="contactNum">Parent/Guardian's contact number: </label>
										<input type="tel" id="contactNum" name="contactNum" required><br>
										<label for="fatherName">Father's name: </label>
										<input type="text" id="fatherName" name="fatherName" required><br>
										<label for="fatherPob">Father's birth place: </label>
										<input type="text" id="fatherPob" name="fatherPob" required><br>
										<label for="motherName">Mother's maiden name: </label>
										<input type="text" id="motherName" name="motherName" required><br>
										<label for="motherPob">Mother's birth place: </label>
										<input type="text" id="motherPob" name="motherPob" required><br>
										<label for="marriage_type">Parents' type of marriage: </label>
										<select class="dropdown" id="marriage_type" name="marriage_type">
											<option value="default" disabled selected hidden></option>
											<option value="Catholic Marriage">Catholic Marriage</option>											
											<option value="Civil Marriage">Civil Marriage</option>
										</select>
										<label for="godfatherName">Godfather's name: </label>
										<input type="text" id="godfatherName" name="godfatherName" required><br>
										<label for="godfatherAddress">Godfather's address: </label>
										<input type="text" id="godfatherAddress" name="godfatherAddress" required><br>
										<label for="godmotherName">Godmother's name: </label>
										<input type="text" id="godmotherName" name="godmotherName" required><br>
										<label for="godmotherAddress">Godmother's address: </label>
										<input type="text" id="godmotherAddress" name="godmotherAddress" required><br>
										
										<?php
									} else if($event == "Funeral Mass/Blessing"){
										?> <div> Funeral Mass/Blessing form </div>
										
										<b> Requirements: </b>
										> Death certificate of the deceased <br>
											
										<b> Notes: </b>
										> Funeral masses are held at the church while funeral blessings are held at the wake. <br>
										> Funeral mass - Php 1,000.00 <br>
										> Funeral blessing - Donation <br>
										
										<b> Deceased's </b>
										<label for="lastName">Last name: </label>
										<input type="text" id="lastName" name="lastName" required><br>
										<label for="firstName">First name: </label>
										<input type="text" id="firstName" name="firstName" required><br>
										<label for="middleName">Middle name: </label>
										<input type="text" id="middleName" name="middleName"><br>
										<label for="age">Age: </label>
										<input type="num" id="age" name="age" required><br>
										<label for="date_of_internment">Date of internment: </label>
										<input type="date" id="date_of_internment" name="date_of_internment" required><br>
										<p> Gender: </p>
										<input type="radio" id="genderMale" name="gender" required>
										<label for="genderMale">Male </label> <br>
										<input type="radio" id="genderFemale" name="gender" required>
										<label for="genderFemale">Female </label> <br>
										<label for="place_of_cemetery">Place of cemetery: </label>
										<input type="text" id="place_of_cemetery" name="place_of_cemetery" required><br>
										<label for="address">Present address: </label>
										<input type="text" id="address" name="address" required><br>
										<label for="cause_of_death">Cause of death: </label>
										<input type="text" id="cause_of_death" name="cause_of_death" required><br>
										<p> Sacrament Received: </p>
										<input type="radio" id="sacramentYes" name="sacrament" required>
										<label for="sacramentYes">Yes </label><br>
										<input type="radio" id="sacramentNo" name="sacrament" required>
										<label for="sacramentNo">No </label><br>
										<p> Casket or urn: </p>
										<input type="radio" id="burialCasket" name="burial" required>
										<label for="burialCasket">Casket </label>
										<input type="radio" id="burialUrn" name="burial" required>
										<label for="burialUrn">Urn </label>
										
										<br><br>
										<b> Informant's </b>
										<label for="informantLastName">Last name: </label>
										<input type="text" id="informantLastName" name="informantLastName" required><br>
										<label for="informantFirstName">First name: </label>
										<input type="text" id="informantFirstName" name="informantFirstName" required><br>
										<label for="informantMiddleName">Middle name: </label>
										<input type="text" id="informantMiddleName" name="informantMiddleName"><br>
										<label for="contactNum">Contact number: </label>
										<input type="tel" id="contactNum" name="contactNum" required><br>
										<label for="address">Present address: </label>
										<input type="text" id="address" name="address" required><br>
										
										<?php
									} else {
										?> <div> More form </div><?php
									}
								}
								else {
									echo '<div> Event type: '.$type.'</div>';
									echo '<div> Date: '.$date.'</div>';
									?> <div> mass intention form </div><?php
								}
							} else {
								//do nothing
							}
						?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>