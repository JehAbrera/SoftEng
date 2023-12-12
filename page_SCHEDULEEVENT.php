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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<section class="main-header">
				<h1 class="main-content-title">Set Appointment</h1>
			</section>
            <section class="main-content">
                <!--<div class="main-header">
                    <span><strong>Set Schedules</strong></span>
                </div>-->
                <div class="schedule-container">
                    <div class="events-preference">
				
						<!-- SELECT EVENT AND DATE FORM -->
						<form action="page_SCHEDULEEVENT.php" method="post">
							<div class="select-cont">
								<?php 
									if(!isset($_POST["submit"])){
										?> <div class="events-select-container" id="events-select-container" style="display:flex">
												<label for="ddEvent"><strong> Select to Appoint: </strong></label>
												<select class="dropdown" id="ddEvent" name="ddEvent" onchange="chooseEvent()">
													<option value="default" disabled selected hidden></option>
													<option value="Special Event">Special Event</option>											
													<option value="Mass Intention">Mass Intention</option>
													<option value="Blessing">Blessing</option>
													<option value="Document Request">Document Request</option>
												</select>
											</div> <?php
									} else {
										?> <div class="events-select-container" id="events-select-container" style="display:none">
												<label for="ddEvent"><strong> Select to Appoint: </strong></label>
												<select class="dropdown" id="ddEvent" name="ddEvent" onchange="chooseEvent()">
													<option value="default" disabled selected hidden></option>
													<option value="Special Event">Special Event</option>											
													<option value="Mass Intention">Mass Intention</option>
													<option value="Blessing">Blessing</option>
													<option value="Document Request">Document Request</option>
												</select>
											</div> <?php
									}
									?>
									<div class="events-select-container" id="specificSpecial" style="display: none;">
										<label for="ddSpecialEvent"><strong>Select Special Event:</strong></label>
										<select class="dropdown" id="ddSpecialEvent" name="Event" onchange="openCalendar();">
											<option value="" disabled selected hidden>Special Events</option>
											<option value="Wedding">Private Wedding</option>
											<option value="Baptism">Private Baptism</option>
											<option value="Funeral Mass/Blessing">Funeral Mass/Blessing</option>
										</select>
									</div>
									<div class="events-select-container" id="specificDocument" style="display: none;">
										<label for="ddDocument"><strong>Select Document </strong></label>
										<select class="dropdown" id="ddDocument" name="Event" onchange="openCalendar();">
											<option value="" disabled selected hidden>Documents</option>
											<option value="Baptismal Certificate">Baptismal Certificate</option>
											<option value="Wedding Certificate">Wedding Certificate</option>
											<option value="Confirmation Certificate">Confirmation Certificate</option>
											<option value="Good Moral Certificate">Good Moral Certificate</option>
											<option value="Permit and No Record">Permit and No Record</option>
										</select>
									</div>
									<div class="events-select-container" id="chooseCal" style="display: none">
										<div class="cal-container">
											<label for="calDate"><strong>Select date:</strong></label>
											<input type="date" id="calDate" name="calDate" min="<?php echo date("Y-m-d"); ?>" required>
											<button type="submit" value="submit" name="submit" id="submitbtn"> View available time</button>
										</div>
									</div>
								
							</div>
						</form>

						<?php
							if(isset($_POST["submit"])){
								?>
								<div class="back-icon-cont" onclick="location.href='page_SCHEDULEEVENT.php'">
									<i class="fa-solid fa-arrow-left"> Back </i>
								</div>
								<?php
							}
						?>
                    </div>
                </div>
				<div class="form-container">
					<?php
						if(isset($_POST["submit"])){
							$type = $_POST["ddEvent"];
							$date = $_POST["calDate"];
							$day = date('l', strtotime($date));
							$_SESSION['type'] = $type;
							$_SESSION['date'] = $date;
							//change date format from yyyy-mm-dd to month day, year
							$formated_date = date('F m, Y', strtotime($date));
							if($type != "Mass Intention" && $type != "Blessing"){
								$event = $_POST["Event"];
								$_SESSION['event'] = $event;
								?> 
								
								<div class="Event-grid-cont">
									<div><h1> Event: <?php echo $event?></h1></div>
									<div><h1> Date: <?php echo $formated_date?></h1></div>
								</div>
								<?php	
								// WEDDING FORM
								if($event == "Wedding"){
									
									$weddingst = array("09:00:00", "10:30:00", "14:00:00", "15:30:00");
									$weddinget = array("10:15:00", "11:45:00", "15:15:00", "16:45:00");
									//query for retrieving appointments in the same day
									$query = "SELECT event_timeStart, event_timeEnd FROM appointment_details WHERE appointment_status = 'Accepted' AND event_date = '$date'";
									$result = mysqli_query($conn, $query);
									////////
									$starttime = array();
									$endtime = array();
									$counter = 0;
									while ($row = mysqli_fetch_assoc($result)){
										$starttime[$counter] = $row['event_timeStart'];
										$endtime[$counter] = $row['event_timeEnd'];
										$counter++;
									}
									
									$avtime = $weddingst;
									$count =0;
									$break = false;
									for ($x = 0; $x < count($weddingst); $x++){
										for($y = 0; $y < count($starttime); $y++) {
											if(strtotime($weddingst[$x]) == strtotime($starttime[$y])){
												unset($avtime[$x]);
												break;
											}else if(strtotime($weddingst[$x]) > strtotime($starttime[$y]) && strtotime($weddingst[$x]) < strtotime($endtime[$y])) {
												unset($avtime[$x]);
												break;
											}else if(strtotime($weddinget[$x]) > strtotime($starttime[$y]) && strtotime($weddinget[$x]) < strtotime($endtime[$y])){
												unset($avtime[$x]);
												break;
											} else {
												
											}
										}
									}
									$count_time = 0;?>
									<form action="page_LANDING.php" method="post">
										<div> <strong> Select Available time:</strong> </div>
										<div class="avtime-container">
											<?php
												$event_endtime = "";
												$_SESSION['eventendtime'] = $event_endtime;
												foreach ($avtime as $i){
													for($y = 0; $y < count($weddingst); $y++){
														if(strtotime($i) == strtotime($weddingst[$y])){
															$event_endtime = $weddinget[$y];
														}
													}
													?><div>
														<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i." ".$event_endtime?>" required>
														<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
													</div>
													<?php
													$count_time++;
												}
										
											?> 
										</div>
										
										<div class="contents-cont">
											<div class="req-cont">
												<b> Requirements: </b>
												<div class="Event-grid-cont">
													<div>> PSA Birth Certificate </div>
													<div>> 2x2 ID picture</div>		
													<div>> Baptismal Certificate (Original copy)</div>		
													<div>> Confirmation Certificate (original copy)</div>		
													<div>> Cenomar (Certificate of No Marriage - photocopy) </div>
													<div>> Publication  of wedding banns</div>
													<div>> Pre-Cana Seminar </div>		
													<div>> Marriage License or Live-In Liscense (article 34) / Marriage contract (Civil Marriage) </div>
													<div>> Wedding Interview </div>
													<div>> Confession </div>
													<div>> Long Brown Envelope	</div>	
												</div>
												
												<b> Notes: </b>
												<div class="Event-grid-cont">
													<div>> The couple must submit all the requirements before the date of the event. </div>
												</div>
												<br>
											</div>
												<div class="form-cont">
													<div class="form-content">
														<div class="form-title">
															<h2> Groom's Information </h2>
														</div>
														<div>
															<b>Name</b>
															<div class="form-grid-cont">
																<div class="input-box">
																	<input type="text" id="groom_lastName" name="groom_lastName" placeholder="Last Name"required><br>
																</div>
																<div class="input-box">
																	<input type="text" id="groom_firstName" name="groom_firstName" placeholder="First Name" required><br>
																</div>
																<div class="input-box">
																	<input type="text" id="groom_middleName" name="groom_middleName" placeholder="Middle Name"><br>
																</div>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_contactNum"><strong>Contact number </strong></label>
																<div class="contactnum">
																	<input type="text" name ="mobile1" value="+63" id="" disabled>
																	<input type="tel" id="groom_contactNum" name="groom_contactNum" required><br>
																</div>
															</div>
															<div class="input-box">
																<label for="groom_dob"><strong>Birth Date </strong></label>
																<input type="date" id="groom_dob" name="groom_dob" required><br>
															</div>
															<div class="input-box">
																<label for="groom_pob"><strong>Birth Place </strong> </label>
																<input type="text" id="groom_pob" name="groom_pob" required><br>
															</div>
														</div>
														<div>
															<div class="input-box">
																<label for="groom_address"><strong>Present Address </strong> </label>
																<input type="text" id="groom_address" name="groom_address" required><br>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_fatherName"><strong>Father's Name </strong> </label>
																<input type="text" id="groom_fatherName" name="groom_fatherName" required><br>
															</div>
															<div class="input-box"> 
																<label for="groom_motherName"><strong>Mother's Name </strong> </label>
																<input type="text" id="groom_motherName" name="groom_motherName" required><br>
															</div>
															<div class="input-box">
																<label for="groom_religion"><strong>Religion </strong> </label>
																<input type="text" id="groom_religion" name="groom_religion" required><br>
															</div>
														</div>
														<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_idpic"><strong>2x2 ID Picture </strong> </label>
																<input type="file" id="groom_idpic" name="groom_idpic" required><br>
															</div>
															<div class="input-box">
																<label for="groom_psa"><strong>PSA Birth Certificate </strong> </label>
																<input type="file" id="groom_psa" name="groom_psa" required><br>
															</div>
															<div class="input-box">
																<label for="groom_cenomar"><strong>CENOMAR (Certificate of No Marriage) </strong> </label>
																<input type="file" id="groom_cenomar" name="groom_cenomar" required><br>
															</div>
															<div class="input-box">
																<label for="groom_baptismal"><strong>Baptismal Certificate </strong> </label>
																<input type="file" id="groom_baptismal" name="groom_baptismal" required><br>
															</div>
															<div class="input-box">
																<label for="groom_confirmation"><strong>Confirmation Certificate </strong> </label>
																<input type="file" id="groom_confirmation" name="groom_confirmation" required><br>
															</div>
														</div>
													</div>
													
													<div class="form-content">
														<div class="form-title">
															<h2> Bride's Information </h2>
														</div>
														<div>
															<b>Name</b>
															<div class="form-grid-cont">
																<div class="input-box">
																	<input type="text" id="bride_lastName" name="bride_lastName" placeholder="Last Name" required><br>
																</div>
																<div class="input-box">
																	<input type="text" id="bride_firstName" name="bride_firstName" placeholder="First Name"required><br>
																</div>
																<div class="input-box">
																	<input type="text" id="bride_middleName" name="bride_middleName" placeholder="Middle Name"><br>
																</div>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_contactNum"><strong>Contact number </strong></label>
																<div class="contactnum">
																	<input type="text" name ="mobile1" value="+63" id="" disabled>
																	<input type="tel" id="bride_contactNum" name="bride_contactNum" required><br>
																</div>
															</div>
															<div class="input-box">
																<label for="bride_dob"><strong>Birth Date </strong></label>
																<input type="date" id="bride_dob" name="bride_dob" required><br>
															</div>
															<div class="input-box">
																<label for="bride_pob"><strong>Birth Place </strong> </label>
																<input type="text" id="bride_pob" name="bride_pob" required><br>
															</div>
														</div>
														<div>
															<div class="input-box">
																<label for="bride_address"><strong>Present Address </strong> </label>
																<input type="text" id="bride_address" name="bride_address" required><br>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_fatherName"><strong>Father's Name </strong> </label>
																<input type="text" id="bride_fatherName" name="bride_fatherName" required><br>
															</div>
															<div class="input-box"> 
																<label for="bride_motherName"><strong>Mother's Name </strong> </label>
																<input type="text" id="bride_motherName" name="bride_motherName" required><br>
															</div>
															<div class="input-box">
																<label for="bride_religion"><strong>Religion </strong> </label>
																<input type="text" id="bride_religion" name="bride_religion" required><br>
															</div>
														</div>
														<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_idpic"><strong>2x2 ID Picture </strong> </label>
																<input type="file" id="bride_idpic" name="bride_idpic" required><br>
															</div>
															<div class="input-box">
																<label for="bride_psa"><strong>PSA Birth Certificate </strong> </label>
																<input type="file" id="bride_psa" name="bride_psa" required><br>
															</div>
															<div class="input-box">
																<label for="bride_cenomar"><strong>CENOMAR (Certificate of No Marriage) </strong> </label>
																<input type="file" id="bride_cenomar" name="bride_cenomar" required><br>
															</div>
															<div class="input-box">
																<label for="bride_baptismal"><strong>Baptismal Certificate </strong> </label>
																<input type="file" id="bride_baptismal" name="bride_baptismal" required><br>
															</div>
															<div class="input-box">
																<label for="bride_confirmation"><strong>Confirmation Certificate </strong> </label>
																<input type="file" id="bride_confirmation" name="bride_confirmation" required><br>
															</div>
														</div>
													</div>
													<div class="form-content">
														<div class="form-title">
															<h2>For Couple</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="couple_contract"><strong>Marriage License or Live-In Liscense (article 34) / Marriage contract (Civil Marriage) </strong> </label>
																<input type="file" id="couple_contract" name="couple_contract" required><br>
															</div>
														</div>
													</div>
													<div class="lower-form">
														<div class="button-cont">
															<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
															<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- confirmation pop up -->
										<div class="popupCover" id="clearForm">
											<div class="popupForm">
												<div class="icon-box"></div>
												<div class="headertext-box">
													Are you sure you want to clear?
												</div>
												<div class="form-btnarea">
													<button type="button" onclick="openForm(clearForm)">No</button>
													<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
												</div>
											</div>
										</div>
										<div class="popupCover" id="submitForm">
											<div class="popupForm">
												<div class="icon-box"></div>
												<div class="headertext-box">
													Are you sure you want to submit?
												</div>
												<div class="form-btnarea">
													<button type="button" onclick="openForm(submitForm)">No</button>
													<button type="Submit" name="submitform">Yes</button>
												</div>
											</div>
										</div>
									</form>
									
									<?php
									
								}
								
								// BAPTISM FORM
								else if($event == "Baptism"){ ?> 
										<?php
										$baptismst = array("09:00:00", "10:00:00", "11:00:00", "14:00:00", "15:00:00");
										$baptismet = array("09:45:00", "10:45:00", "11:45:00", "14:45:00", "15:45:00");
										//query for retrieving appointments in the same day
										$query = "SELECT event_timeStart, event_timeEnd FROM appointment_details WHERE appointment_status = 'Accepted' AND event_date = '$date'";
										$result = mysqli_query($conn, $query);
										////////
										$starttime = array();
										$endtime = array();
										$counter = 0;
										while ($row = mysqli_fetch_assoc($result)){
											$starttime[$counter] = $row['event_timeStart'];
											$endtime[$counter] = $row['event_timeEnd'];
											$counter++;
										}
										
										$avtime = $baptismst;
										$count =0;
										$break = false;
										for ($x = 0; $x < count($baptismst); $x++){
											for($y = 0; $y < count($starttime); $y++) {
												if(strtotime($baptismst[$x]) == strtotime($starttime[$y]) || strtotime($baptismst[$x]) == strtotime($endtime[$y])){
													unset($avtime[$x]);
													break;	
												}else if(strtotime($baptismst[$x]) > strtotime($starttime[$y]) && strtotime($baptismst[$x]) < strtotime($endtime[$y])) {
													unset($avtime[$x]);
													break;
												}else if(strtotime($baptismet[$x]) > strtotime($starttime[$y]) && strtotime($baptismet[$x]) < strtotime($endtime[$y])){
													unset($avtime[$x]);
													break;
												} else {
													
												}
											}
										}
										$count_time = 0;?>
										<form action="page_LANDING.php" method="post">
											<div> <strong> Select Available time:</strong> </div>
											<div class="avtime-container">
												<?php
													$event_endtime = "";
													foreach ($avtime as $i){
														for($y = 0; $y < count($baptismst); $y++){
															if(strtotime($i) == strtotime($baptismst[$y])){
																$event_endtime = $baptismet[$y];
															}
														}
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i." ". $event_endtime?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
														$count_time++;
													}
											
												?> 
											</div>
											<div class="req-cont">
												<b> Requirements: </b>
												<div class="Event-grid-cont">
													<div>
														> Child's PSA/Local Birth Certificate (photocopy) <br>
														> Marriage Contract of parents (photocopy) <br>
													</div>
												</div>
												
												<b> Notes: </b>
												<div class="Event-grid-cont">
													<div>> Parents and Sponsors are required to attend the seminar <br>
															> White dress or polo and pants for the child <br>
															> Any colors for the parents and sponsors <br>
															> The Godfather (Ninong) and Godmother (Ninang) must be 18 years of age or older. <br>
															> Only baptized Catholics are eligible to be chosen as Godfathers (Ninong) and Godmothers (Ninang). <br>/div>
													</div>
												<br>
											</div>
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<b>To be baptesize's Information</b>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last Name: </label>
																<input type="text" id="lastName" name="lastName" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First Name: </label>
																<input type="text" id="firstName" name="firstName" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle Name: </label>
																<input type="text" id="middleName" name="middleName"><br>
															</div>
														</div>
													</div>
													<div class="form-grid-cont">
														<div>
															<b>Gender</b>
															<div style="display: flex">
																<div>
																	<input type="radio" id="genderMale" name="gender" required>
																	<label for="genderMale">Male </label> <br>
																</div>
																<div>
																	<input type="radio" id="genderFemale" name="gender" required>
																	<label for="genderFemale">Female </label> <br>
																</div>
															</div>
														</div>
														<div class="input-box">
															<label for="dob"><strong>>Birth Date</strong> </label>
															<input type="date" id="dob" name="dob" required><br>
														</div>
														<div class="input-box">
															<label for="pob"><strong>Birth Place</strong> </label>
															<input type="text" id="pob" name="pob" required><br>
														</div>
													</div>
													<div>
														<div class="input-box">
															<label for="address"><strong>Present Address</strong> </label>
															<input type="text" id="address" name="address" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="fatherName"><strong>Father's Name</strong> </label>
															<input type="text" id="fatherName" name="fatherName" required><br>
														</div>
														<div class="input-box">
															<label for="fatherPob"><strong>Father's Birth Place</strong> </label>
															<input type="text" id="fatherPob" name="fatherPob" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="motherName"><strong>Mother's Name</strong> </label>
															<input type="text" id="motherName" name="motherName" required><br>
														</div>
														<div class="input-box">
															<label for="motherPob"><strong>Mother's Birth Place</strong> </label>
															<input type="text" id="motherPob" name="motherPob" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="contactNum"><strong>Parent/Guardian's contact number</strong></label>
															<input type="tel" id="contactNum" name="contactNum" required><br>
														</div>
														<div class="input-box">
															<label for="marriage_type"><strong>Parents' type of marriage</strong> </label>
															<select id="marriage_type" name="marriage_type">
																<option value="default" disabled selected hidden></option>
																<option value="Catholic Marriage">Catholic Marriage</option>											
																<option value="Civil Marriage">Civil Marriage</option>
															</select>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="godfatherName"><strong>Godfather's name</strong> </label>
															<input type="text" id="godfatherName" name="godfatherName" required><br>
														</div>
														<div class="input-box">
															<label for="godfatherAddress"><strong>Godfather's address</strong> </label>
															<input type="text" id="godfatherAddress" name="godfatherAddress" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="godmotherName"><strong>Godmother's name</strong></label>
															<input type="text" id="godmotherName" name="godmotherName" required><br>
														</div>
														<div class="input-box">
															<label for="godmotherAddress"><strong>Godmother's address</strong></label>
															<input type="text" id="godmotherAddress" name="godmotherAddress" required><br>
														</div>
													</div>
													<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="grid-cont">
															<div class="input-box">
																<label for="psa"><strong>Child's PSA Birth Certificate</strong> </label>
																<input type="file" id="psa" name="psa" required><br>
															</div>
															<div class="input-box">
																<label for="marriage_contract"><strong>Marriage Contract of Parents </strong> </label>
																<input type="file" id="marriage_contract" name="marriage_contract" required><br>
															</div>
														</div>
													<div class="lower-form">
														<div class="button-cont">
															<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
															<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
														</div>
													</div>
												</div>
											</div>

											<div class="popupCover" id="clearForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to clear?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(clearForm)">No</button>
														<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
													</div>
												</div>
											</div>
											<div class="popupCover" id="submitForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to submit?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(submitForm)">No</button>
														<button type="Submit" name="submitform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									<?php
								}
								
								// FUNERAL MASS AND BLESSING FORM
								else if($event == "Funeral Mass/Blessing"){
									?>
									<form action="page_LANDING.php" method="post">
										
										<?php
											$funeralst = array("08:00:00", "13:00:00");
											
											//query for retrieving appointments in the same day
											$query = "SELECT event_timeStart, event_timeEnd FROM appointment_details WHERE appointment_status = 'Accepted' AND event_date = '$date' AND appointment_type = 'Funeral Mass/Blessing'";
											$result = mysqli_query($conn, $query);
											////////
											$starttime = array();
											$counter = 0;
											while ($row = mysqli_fetch_assoc($result)){
												$starttime[$counter] = $row['event_timeStart'];
												$counter++;
											}
											
											$avtime = $funeralst;
											$count =0;
											$break = false;
											for ($x = 0; $x < count($funeralst); $x++){
												for($y = 0; $y < count($starttime); $y++) {
													if(strtotime($funeralst  [$x]) == strtotime($starttime[$y])){
														unset($avtime[$x]);
														break;	
													}
												}
											}
											$count_time = 0;?>
											<div> <strong> Select Available time:</strong> </div>
											<div class="avtime-container">
												<?php
												foreach ($avtime as $i){
													if($day == "Sunday"){
														if($i == "08:00:00"){
															//discarding 8:00 schedule
														} else {
															?><div>
																<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
																<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
															</div>
															<?php
														}
													} else {
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
													}
													$count_time++;
												}
											
												?> 
											</div>

										<b> Requirements: </b>
										> Death certificate of the deceased <br>
											
										<b> Notes: </b>
										> Funeral masses are held at the church while funeral blessings are held at the wake. <br>
										> Funeral mass - Php 1,000.00 <br>
										> Funeral blessing - Donation <br>
										<div class="form-cont">
											<div class="form-content">
												<div class="form-title">
													<h2>Deceased's Information</h2>
												</div>
												<div>
													<b>Name</b>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="lastName">Last name: </label>
															<input type="text" id="lastName" name="lastName" required><br>
														</div>
														<div class="input-box">
															<label for="firstName">First name: </label>
															<input type="text" id="firstName" name="firstName" required><br>
														</div>
														<div class="input-box">
															<label for="middleName">Middle name: </label>
															<input type="text" id="middleName" name="middleName"><br>
														</div>
													</div>
												</div>
												<div class="form-grid-cont">
													<div class="input-box">
														<label for="age"><strong>Age:</strong> </label>
														<input type="num" id="age" name="age" required><br>
													</div>
													<div>
														<b>Gender</b>
														<div style="display: flex">
															<div>
																<input type="radio" id="genderMale" name="gender" required>
																<label for="genderMale">Male </label> <br>
															</div>
															<div>
																<input type="radio" id="genderFemale" name="gender" required>
																<label for="genderFemale">Female </label> <br>
															</div>
														</div>
													</div>
													<div class="input-box">
														<label for="cause_of_death"><strong>Cause of death</strong></label>
														<input type="text" id="cause_of_death" name="cause_of_death" required><br>
													</div>
													<div class="input-box">
														<label for="date_of_death"><strong>Date of death</strong></label>
														<input type="date" name="date_of_death" required><br>
													</div>
													<div class="input-box">
														<label for="date_of_internment"><strong>Date of internment</strong> </label>
														<input type="date" id="date_of_internment" name="date_of_internment" required><br>
													</div>
													<div class="input-box">
														<label for="place_of_cemetery"><strong>Place of cemetery:</strong> </label>
														<input type="text" id="place_of_cemetery" name="place_of_cemetery" required><br>
													</div>
												</div>
												<div class="grid-cont">
													<div>
														<b>Sacrament Received</b>
														<div style="display: flex">
															<div>
																<input type="radio" id="sacramentYes" name="sacrament" required>
																<label for="sacramentYes">Yes </label><br>
															</div>
															<div>
																<input type="radio" id="sacramentNo" name="sacrament" required>
																<label for="sacramentNo">No </label><br>
															</div>
														</div>
													</div>
													<div>
														<b>Casket or urn</b>
														<div style="display: flex">
															<div>
																<input type="radio" id="burialCasket" name="burial" required>
																<label for="burialCasket">Casket </label>
															</div>
															<div>
																<input type="radio" id="burialUrn" name="burial" required>
																<label for="burialUrn">Urn </label>
															</div>
														</div>
													</div>
												</div>
												<div>
													<h2>Soft Copy of Requirements</h2>
												</div>
												<div class="form-grid-cont">
													<div class="input-box">
														<label for="deathcert"><strong>Death Certificate </strong> </label>
														<input type="file" id="deathcert" name="deathcert" required><br>
													</div>
												</div>
												<div class="form-title">
													<h2>Informant's Information</h2>
												</div>
												<div>
													<b>Name</b>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="informantLastName">Last name: </label>
															<input type="text" id="informantLastName" name="informantLastName" required><br>
														</div>
														<div class="input-box">
															<label for="informantFirstName">First name: </label>
															<input type="text" id="informantFirstName" name="informantFirstName" required><br>
														</div>
														<div class="input-box">
														<label for="informantMiddleName">Middle name: </label>
														<input type="text" id="informantMiddleName" name="informantMiddleName"><br>
														</div>
													</div>
												</div>
												<div class="grid-cont">
													<div class="input-box">
														<label for="contactNum"><strong>Contact number</strong></label>
														<input type="tel" id="contactNum" name="informantContactNum" required><br>
													</div>
													<div class="input-box">
														<label for="address"><strong>Present address</strong> </label>
														<input type="text" id="address" name="informantAddress" required><br>
													</div>
												</div>
											</div>
											<div class="lower-form">
												<div class="button-cont">
													<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
													<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
												</div>
											</div>
										</div>
										
										<div class="popupCover" id="clearForm">
											<div class="popupForm">
												<div class="icon-box"></div>
												<div class="headertext-box">
													Are you sure you want to clear?
												</div>
												<div class="form-btnarea">
													<button type="button" onclick="openForm(clearForm)">No</button>
													<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
												</div>
											</div>
										</div>
										<div class="popupCover" id="submitForm">
											<div class="popupForm">
												<div class="icon-box"></div>
												<div class="headertext-box">
													Are you sure you want to submit?
												</div>
												<div class="form-btnarea">
													<button type="button" onclick="openForm(submitForm)">No</button>
													<button type="Submit" name="submitform">Yes</button>
												</div>
											</div>
										</div>
									</form>
									<?php
								}else if($event == "Baptismal Certificate" || $event == "Wedding Certificate" || $event == "Confirmation Certificate"){
									?> 
									<div>
										<div>
										<b> Requirements for : <?php echo $event?> </b>
											<div class="grid-cont">
												<div>> Birth Certificate & 2x2 ID picture</div>		
												<div>> Baptismal Certificate (Original copy)</div>		
												<div>> Confirmation Certificate (original copy)</div>		
												<div>> Publication  of wedding banns</div>				
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > The document should be claimed within the scheduled date </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post">
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<h2>
														<?php 
															if($event == "Baptismal Certificate"){
																echo"<b>Child's</b>";
															}else {
																echo"<b>Requester's</b>";
															}
														?>
														</h2>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last name: </label>
																<input type="text" id="lastName" name="lastName" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First name: </label>
																<input type="text" id="firstName" name="firstName" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle name: </label>
																<input type="text" id="middleName" name="middleName"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Date of birth</strong></label>
															<input type="date" id="dob" name="dob" required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong> Contact number</strong></label>
															<input type="tel" id="contactNum" name="ContactNum" required><br>
														</div>
														<div class="input-box">
															<label for="fname"><strong>Father's Name</strong> </label>
															<input type="text" id="fname" name="fname" required><br>
														</div>
														<div class="input-box">
															<label for="mname"><strong>Mother's Name</strong> </label>
															<input type="text" id="mname" name="mname" required><br>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose</strong> </label>
															<input type="text" id="purpose" name="purpose" required><br>
														</div>
													</div>
													<div class="lower-form">
														<div class="button-cont">
															<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
															<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
														</div>
													</div>
												</div>
											</div>
											<div class="popupCover"  id="clearForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to clear?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(clearForm)">No</button>
														<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
													</div>
												</div>
											</div>
											<div class="popupCover" id="submitForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to submit?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(submitForm)">No</button>
														<button type="Submit" name="submitform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
									<?php
								} else if($event == "Good Moral Certificate"){
								?>
									<div>
										<div>
										<b> Requirements for : <?php echo $event?> </b>
											<div class="grid-cont">
												<div>> Birth Certificate & 2x2 ID picture</div>		
												<div>> Baptismal Certificate (Original copy)</div>		
												<div>> Confirmation Certificate (original copy)</div>		
												<div>> Publication  of wedding banns</div>				
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > The document should be claimed within the scheduled date </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post">
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<h2><b>Requester's</b></h2>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last name: </label>
																<input type="text" id="lastName" name="lastName" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First name: </label>
																<input type="text" id="firstName" name="firstName" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle name: </label>
																<input type="text" id="middleName" name="middleName"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Date of birth</strong></label>
															<input type="date" id="dob" name="dob" required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong> Contact number</strong></label>
															<input type="tel" id="contactNum" name="ContactNum" required><br>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose</strong> </label>
															<input type="text" id="purpose" name="purpose" required><br>
														</div>
													</div>
													<div class="lower-form">
														<div class="button-cont">
															<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
															<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
														</div>
													</div>
												</div>
											</div>
											<div class="popupCover" id="clearForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to clear?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(clearForm)">No</button>
														<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
													</div>
												</div>
											</div>
											<div class="popupCover" id="submitForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to submit?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(submitForm)">No</button>
														<button type="Submit" name="submitform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
								<?php
								} else if($event == "Permit and No Record"){
									?> 
									<div>
										<div>
										<b> Requirements for : <?php echo $event?> </b>
											<div class="grid-cont">
												<div>> Birth Certificate & 2x2 ID picture</div>		
												<div>> Baptismal Certificate (Original copy)</div>		
												<div>> Confirmation Certificate (original copy)</div>		
												<div>> Publication  of wedding banns</div>				
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > The document should be claimed within the scheduled date </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post">
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<h2><b>Requester's</b></h2>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last name: </label>
																<input type="text" id="lastName" name="lastName" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First name: </label>
																<input type="text" id="firstName" name="firstName" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle name: </label>
																<input type="text" id="middleName" name="middleName"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Date of birth</strong></label>
															<input type="date" id="dob" name="dob" required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong> Contact number</strong></label>
															<input type="tel" id="contactNum" name="ContactNum" required><br>
														</div>
														<div class="input-box">
															<label for="address"><strong>Address</strong> </label>
															<input type="text" id="address" name="address" required><br>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose</strong> </label>
															<input type="text" id="purpose" name="purpose" required><br>
														</div>
													</div>
													<div class="lower-form">
														<div class="button-cont">
															<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
															<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
														</div>
													</div>
												</div>
											</div>
											<div class="popupCover" id="clearForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to clear?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(clearForm)">No</button>
														<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
													</div>
												</div>
											</div>
											<div class="popupCover" id="submitForm">
												<div class="popupForm">
													<div class="icon-box"></div>
													<div class="headertext-box">
														Are you sure you want to submit?
													</div>
													<div class="form-btnarea">
														<button type="button" onclick="openForm(submitForm)">No</button>
														<button type="Submit" name="submitform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
									<?php
								} else {
									//do notihing
								}
							}
							else if($type == "Mass Intention"){ 
								?>
								<div class="Event-grid-cont">
									<div><h1> Event: <?php echo $type?></h1></div>
									<div><h1> Date: <?php echo $formated_date?></h1></div>
								</div>
								<?php
								$intention = array("06:00:00","07:00:00","09:00:00","16:30:00","17:00:00", "18:00:00");
								$count_time = 0; ?>
								<form action="page_LANDING.php" method="post">
									<div><b>Time Available: </b></div>
									<div class="rd-cont">
										<?php 
											foreach ($intention as $i){
												if($day != "Sunday"){
													if($i == "18:00:00"){
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
													} 
												} else {
													?><div>
														<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
														<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
													</div>
													<?php
												}
												$count_time++;
											}

										?> 

									</div>
									<b> Notes: </b>
									> Mass Intention Fee: Donation <br>
									
									<div class="form-cont">
										<div class="form-content">
											<div class="grid-cont">
												<div class="input-box">
													<label for="contactNum">Contact number: </label>
													<input type="tel" id="contactNum" name="contactNum" required><br>
												</div>
												<div>
													<b> Purpose: </b>
													<div class="input-box">
														<div>
															<input type="checkbox" name="purposes" id="Thanksgiving" value="Thanksgiving">
															<label for="Thanksgiving">Thanksgiving</label><br>
														</div>
														<div>
															<input type="checkbox" name="purposes" id="Healing" value="Healing/Recovery">
															<label for="Healing">Healing/Recovery</label><br>
														</div>
														<div>
															<input type="checkbox" name="purposes" id="SpecialInt" value="Special Intention">
															<label for="SpecialInt">Special Intention</label><br>
														</div>
														<div>
															<input type="checkbox" name="purposes" id="Soul" value="Soul">
															<label for="Soul">Soul</label><br>
														</div>
													</div>
												</div>
											</div>
											<div>
												<div class="input-box">
													<label for="names">Name/s: </label>
													<textarea name = "names">
														Enter details here...
													</textarea>
												</div>
											</div>
											<br>
											<div class="lower-form">
												<div class="button-cont">
													<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
													<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
												</div>
											</div>
										</div>
									</div>
									
									<div class="popupCover" id="clearForm">
										<div class="popupForm">
											<div class="icon-box"></div>
											<div class="headertext-box">
												Are you sure you want to clear?
											</div>
											<div class="form-btnarea">
												<button type="button" onclick="openForm(clearForm)">No</button>
												<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
											</div>
										</div>
									</div>
									<div class="popupCover" id="submitForm">
										<div class="popupForm">
											<div class="icon-box"></div>
											<div class="headertext-box">
												Are you sure you want to submit?
											</div>
											<div class="form-btnarea">
												<button type="button" onclick="openForm(submitForm)">No</button>
												<button type="Submit" name="submitform">Yes</button>
											</div>
										</div>
									</div>
								</form>
							
								<?php
							} 
										// BLESSINGS FORM
							else if ($type == "Blessing"){
								?> 
								<div class="Event-grid-cont">
									<div><h1> Event: <?php echo $type?></h1></div>
									<div><h1> Date: <?php echo $formated_date?></h1></div>
								</div>
								<form action="page_LANDING.php" method="post">
									<b> Notes: </b>
									> Blessing Fee: Donation <br>
									> Barangay Pembo and Rizal only <br>
									
									<div class="form-cont">
										<div class="form-content">
											<div class="grid-cont">
												<div class="input-box">
													<label for="contactNum">Contact number: </label>
													<input type="tel" id="contactNum" name="contactNum" required><br>
												</div>
												<div>
													<b> Type of Blessing </b>
													<div class="input-box">
														<div>
															<input type="radio" id="HouseBlessing" name="blessingType" value="House Blessing" required>
															<label for="HouseBlessing">House Blessing </label> <br>
														</div>
														<div>
															<input type="radio" id="CarBlessing" name="blessingType" value="Car Blessing" required>
															<label for="CarBlessing">Car Blessing </label> <br>
														</div>
														<div>
															<input type="radio" id="MotorcycleBlessing" name="blessingType" value="Motorcycle Blessing" required>
															<label for="MotorcycleBlessing">Motorcycle Blessing </label> <br>
														</div>
														<div>
															<input type="radio" id="StoreBlessing" name="blessingType" value="Store Blessing" required>
															<label for="StoreBlessing">Store Blessing </label> <br>
														</div>
													</div>
												</div>
											</div>
											<div class="lower-form">
												<div class="button-cont">
													<button type="reset" class="clear" onclick="openForm(clearForm)" id="clear">Clear</button>
													<button type="button" class="submit" onclick="openForm(submitForm)" id="submit">Submit</button>
												</div>
											</div>
										</div>
									</div>
									<div class="popupCover" id="clearForm">
										<div class="popupForm">
											<div class="icon-box"></div>
											<div class="headertext-box">
												Are you sure you want to clear?
											</div>
											<div class="form-btnarea">
												<button type="button" onclick="openForm(clearForm)">No</button>
												<button type="reset" onclick="openForm(clearForm), clearReq()">Yes</button>
											</div>
										</div>
									</div>
									<div class="popupCover" id="submitForm">
										<div class="popupForm">
											<div class="icon-box"></div>
											<div class="headertext-box">
												Are you sure you want to submit?
											</div>
											<div class="form-btnarea">
												<button type="button" onclick="openForm(submitForm)">No</button>
												<button type="Submit" name="submitform">Yes</button>
											</div>
										</div>
									</div>
								</form>
								
									
									<?php
								} 
						} 
						else {
							//do nothing
						}
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
    <script src="jsScheduleevent.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>
