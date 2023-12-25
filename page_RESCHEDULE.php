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
    <title>SJCP | Rechedule Event</title>
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
                <div class="nav-item">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">View Services</div>
                        <div class="nav-item">Schedule Event</div>
                        <div class="nav-item">View Schedules</div>
                        <div class="nav-item">Search Record</div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Events <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">View Announcements</div>
                        <div class="nav-item">View Available Time Slots</div>
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
				<h1 class="main-content-title">Schedule Event</h1>
			</section>
            <section class="main-content">
                <!--<div class="main-header">
                    <span><strong>Set Schedules</strong></span>
                </div>-->
                <div class="schedule-container">
                    <div class="events-preference">
				
						<!-- SELECT EVENT AND DATE FORM -->
						<form action="page_LANDING.php" method="post">
							<div class="select-cont">
								<?php
								$id = $_SESSION["id"];
									if(!isset($_SESSION['abcde'])) {
											// Query the database for form data
											$sql = "SELECT * FROM appointment_details WHERE appointment_id='$id'";
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
											$app_type = $row["appointment_type"];
											
											$evVal = "hotdog";
											if ($app_type == "Wedding" || $app_type == "Baptism" || $app_type == "Funeral Mass/Blessing") {
												$evVal = "Special Event";
											} else if ($app_type == "Mass Intention") {
												$evVal = "Mass Intention";
											} else if($app_type == "House Blessing" || $app_type == "Car Blessing" || $app_type == "Motorcycle Blessing" || $app_type == "Store Blessing") {
												$evVal = "Blessing";
											} else {
												$evVal = "Document Request";
											}?> 
									        <div class="events-select-container" id="events-select-container">
												<label for="ddEvent"><strong> Select to Appoint: </strong></label>
												<input type="text" id="ddEvent" name="ddEvent" value="<?php echo $evVal;?>" readonly>
											</div>
											<?php
										if ($evVal == "Special Event") {
											$specVal = $app_type; ?>
											<div class="events-select-container" id="specificSpecial">
												<label for="ddSpecialEvent"><strong>Select Special Event:</strong></label>
												<input type="text" id="ddSpecialEvent" name="Event" value="<?php echo $specVal; ?>" readonly>
											</div>
											<?php
											if ($app_type == "Wedding"){
											//display wedding calendar 
											?>
												<div class="events-select-container" id="chooseCalWed" style="<?php echo $wedCal; ?>">
													<div class="cal-container">
														<label for="calDateWed"><strong>Select WedDate:</strong></label>
														<input type="date" id="calDateWed" name="cal" title="You must schedule your wedding 1-6 months in advance." min="<?= date('Y-m-d', strtotime('+1 month')); ?>" max="<?= date('Y-m-d', strtotime('+6 months')); ?>" required>
													</div>
												</div>
											<?php
											}
											if ($app_type == "Baptism"){
											//display baptism calendar
											?>
												<div class="events-select-container" id="chooseCalBap">
													<div class="cal-container">
														<label for="calDateBap"><strong>Select Date:</strong></label>
														<input type="date" id="calDateBap" name="calDateBap" title="You must schedule your baptism at least 1 week before the event." min="<?= date('Y-m-d', strtotime('+1 week')); ?>" max="<?= date('Y-m-d', strtotime('+6 months')); ?>" required>
													</div>
												</div>
											<?php
											}
											if ($app_type == "Funeral Mass/Blessing"){
											//display funeral calendar
											?>
												<div class="events-select-container" id="chooseCalIntBless">
													<div class="cal-container">
														<label for="calDateIntBless"><strong>Select IBDate:</strong></label>
														<input type="date" id="calDateIntBless" name="cal" min="<//?= date('Y-m-d', strtotime('+1 day')); ?>" max="<?= date('Y-m-d', strtotime('+6 months')); ?>" required >
													</div>
												</div>
											<?php
											}
										}
										if ($evVal == "Document Request") {
											 ?>
											<div class="events-select-container" id="specificDocument">
													<label for="ddDocument"><strong>Select Document </strong></label>
													<input type="text" id="ddDocument" name="Event" value="<?php echo $app_type;?>" readonly>
											</div>
											<?php
										} 
										if($evVal != "Special Event"){
											?>
											<div class="events-select-container" id="chooseCalIntBless">
												<div class="cal-container">
													<label for="calDateIntBless"><strong>Select IBDate:</strong></label>
													<input type="date" id="calDateIntBless" name="cal" min="<//?= date('Y-m-d', strtotime('+1 day')); ?>" max="<?= date('Y-m-d', strtotime('+6 months')); ?>" required>
												</div>
											</div>
											<?php
										}
										?>
										<div class="events-select-container" id="submitButton">
											<button type="submit" value="submit" name="submitlog" id="submitlog">View Available Time</button>
										</div>
									<?php 
									} 
									?>
							</div>
						</form>
						
						<?php
							if(isset($_SESSION['abcde'])){
								?>
								<div class="back-icon-cont" onclick="location.href = 'page_RESCHEDULE.php'">
									<i class="fa-solid fa-arrow-left"> Back </i>
								</div>
								<?php
							}
						?>
                    </div>
                </div>
				<div class="form-container">
					<?php
						if(isset($_SESSION['abcde'])){
							unset($_SESSION['abcde']);
							$type = $_SESSION['type'];
							$event = $_SESSION['event'];
							$date = $_SESSION['date'];
							//$id = $_SESSION['id'];
							
							
							$day = date('l', strtotime($date));
							//change date format from yyyy-mm-dd to month day, year
							$formated_date = date('F d, Y', strtotime($date));
							
							if($type != "Mass Intention" && $type != "Blessing"){
								//$event = $_POST["Event"];
								//$_SESSION['event'] = $event;
								?> 
								
								<div class="Event-grid-cont">
									<div><h1> Event: <?php echo $event?></h1></div>
									<div><h1> Date: <?php echo $formated_date?></h1></div>
								</div>
								<?php	
								// WEDDING FORM
								if($event == "Wedding"){
									echo $id;
									$sqlWed = "SELECT * FROM wedding_details WHERE foreign_id='$id'";
									$resultWed = $conn->query($sqlWed);
									if($resultWed->num_rows > 0){
										$rowWed = mysqli_fetch_assoc($resultWed);
									} else {
										echo "No available data!";
									}

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
									<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
										<div> <strong> Select Available Time:</strong> </div>
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
												$gRel = $rowWed["groom_religion"];
												$bRel = $rowWed["bride_religion"];
												function checkReligion($relig) {
													if ($relig == "Roman Catholic") {
														echo " selected";
													} if ($relig == "Catholic") {
														echo " selected";
													} if ($relig == "Protestant") {
														echo " selected";
													} if ($relig == "Iglesia ni Cristo") {
														echo " selected";
													} if ($relig == "Jehovah&lsquo;s Witness") {
														echo " selected";
													} if ($relig == "Seventh Day Adventist") {
														echo " selected";
													} if ($relig == "Islam") {
														echo " selected";
													}
												}
												
												$gNumb = $rowWed["groom_conNum"];
												$gNumb = substr($gNumb, 3);
												$bNumb = $rowWed["bride_conNum"];
												$bNumb = substr($bNumb, 3);
											?> 
										</div>
										
										<div class="contents-cont">
											<div class="req-cont">
												<b> Requirements: </b>
												<div class="Event-grid-cont">
													<ul> PSA Birth Certificate </ul>
													<ul> 2x2 ID picture</ul>		
													<ul> Baptismal Certificate (Original copy)</ul>		
													<ul> Confirmation Certificate (Original copy)</ul>		
													<ul> CENOMAR (Certificate of No Marriage - photocopy) </ul>
													<ul> Publication of Wedding Banns</ul>
													<ul> Pre-Cana Seminar </ul>		
													<ul> Marriage License or Live-In License (article 34) or Marriage Contract (Civil Marriage) </ul>
													<ul> Wedding Interview </ul>
													<ul> Confession </ul>
													<ul> Long Brown Envelope </ul>	
												</div>
												
												<b> Notes: </b>
												<div class="Event-grid-cont">
													<ul> The couple must submit and accomplish all the requirements before the date of the event. </ul>
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
																	<label for="groom_lastName"><strong>Last Name* </strong></label>
																	<input type="text" id="groom_lastName" name="groom_lastName" value="<?php echo $rowWed["groom_lName"]; ?>" placeholder="Dela Cruz" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
																</div>
																<div class="input-box">
																	<label for="groom_firstName"><strong>First Name* </strong></label>
																	<input type="text" id="groom_firstName" name="groom_firstName" value="<?php echo $rowWed["groom_fName"]; ?>" placeholder="Juan" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
																</div>
																<div class="input-box">
																	<label for="groom_middleName"><strong>Middle Name </strong></label>
																	<input type="text" id="groom_middleName" name="groom_middleName" value="<?php echo $rowWed["groom_midName"]; ?>" placeholder="Tomas" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
																</div>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_contactNum"><strong>Contact Number* </strong></label>
																<div class="contactnum">
																	<input type="text" name ="mobile1" value="+63" id="" disabled>
																	<input type="tel" id="groom_contactNum" name="groom_contactNum" value="<?php echo $gNumb; ?>" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="10" pattern="[9]{1}[0-9]{9}" required><br>
																</div>
															</div>
															<div class="input-box">
																<label for="groom_dob"><strong>Birth Date* </strong></label>
																<input type="date" id="groom_dob" name="groom_dob" value="<?php echo $rowWed["groom_dob"]; ?>" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" required><br>
															</div>
															<div class="input-box">
																<label for="groom_pob"><strong>Birth Place* </strong> </label>
																<input type="text" id="groom_pob" name="groom_pob" value="<?php echo $rowWed["groom_pob"]; ?>" placeholder="Taguig City" maxlength="120" required><br>
															</div>
														</div>
														<div>
															<div class="input-box">
																<label for="groom_address"><strong>Present Address* </strong> </label>
																<input type="text" id="groom_address" name="groom_address" value="<?php echo $rowWed["groom_address"]; ?>" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_fatherName"><strong>Father's Name* </strong> </label>
																<input type="text" id="groom_fatherName" name="groom_fatherName" value="<?php echo $rowWed["groom_father"]; ?>" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box"> 
																<label for="groom_motherName"><strong>Mother's Maiden Name* </strong> </label>
																<input type="text" id="groom_motherName" name="groom_motherName" value="<?php echo $rowWed["groom_mother"]; ?>" placeholder="Maria Tomas" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="groom_religion"><strong>Religion* </strong> </label>
																<select id="groom_religion" name="groom_religion">
																	<option value="" disabled hidden>Select Religion</option>
																	<option value="Roman Catholic" <?php checkReligion($gRel); ?>>Roman Catholic</option>
																	<option value="Catholic" <?php checkReligion($gRel); ?>>Catholic</option>	
																	<option value="Protestant" <?php checkReligion($gRel); ?>>Protestant</option>
																	<option value="Iglesia ni Cristo" <?php checkReligion($gRel); ?>>Iglesia ni Cristo</option>											
																	<option value="Jehovah&lsquo;s Witness" <?php checkReligion($gRel); ?>>Jehovah&lsquo;s Witness</option>
																	<option value="Seventh Day Adventist" <?php checkReligion($gRel); ?>>Seventh Day Adventist</option>											
																	<option value="Islam" <?php checkReligion($gRel); ?>>Islam</option>
																</select>
															</div>
														</div>
														<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="groom_idpic"><strong>2x2 ID Picture* </strong> </label>
																<input type="file" id="groom_idpic" name="groom_idpic" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="groom_psa"><strong>PSA Birth Certificate* </strong> </label>
																<input type="file" id="groom_psa" name="groom_psa" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="groom_cenomar"><strong>CENOMAR (Certificate of No Marriage)* </strong> </label>
																<input type="file" id="groom_cenomar" name="groom_cenomar" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="groom_baptismal"><strong>Baptismal Certificate* </strong> </label>
																<input type="file" id="groom_baptismal" name="groom_baptismal" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="groom_confirmation"><strong>Confirmation Certificate* </strong> </label>
																<input type="file" id="groom_confirmation" name="groom_confirmation" accept="image/*" onchange="validateFileType(this.id)" required><br>
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
																	<label for="bride_lastName"><strong>Last Name* </strong></label>
																	<input type="text" id="bride_lastName" name="bride_lastName" value="<?php echo $rowWed["bride_lName"]; ?>" placeholder="San Pedro" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
																</div>
																<div class="input-box">
																	<label for="bride_firstName"><strong>First Name* </strong></label>
																	<input type="text" id="bride_firstName" name="bride_firstName" value="<?php echo $rowWed["bride_fName"]; ?>" placeholder="Juana" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
																</div>
																<div class="input-box">
																	<label for="bride_middleName"><strong>Middle Name </strong></label>
																	<input type="text" id="bride_middleName" name="bride_middleName" value="<?php echo $rowWed["bride_midName"]; ?>" placeholder="Agustin" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
																</div>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_contactNum"><strong>Contact Number* </strong></label>
																<div class="contactnum">
																	<input type="text" name ="mobile1" value="+63" id="" disabled>
																	<input type="tel" id="bride_contactNum" name="bride_contactNum" value="<?php echo $bNumb; ?>" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="10" pattern="[9]{1}[0-9]{9}" required><br>
																</div>
															</div>
															<div class="input-box">
																<label for="bride_dob"><strong>Birth Date* </strong></label>
																<input type="date" id="bride_dob" name="bride_dob" value="<?php echo $rowWed["bride_dob"]; ?>" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" required><br>
															</div>
															<div class="input-box">
																<label for="bride_pob"><strong>Birth Place* </strong> </label>
																<input type="text" id="bride_pob" name="bride_pob" maxlength="120" value="<?php echo $rowWed["bride_pob"]; ?>" placeholder="Taguig City" required><br>
															</div>
														</div>
														<div>
															<div class="input-box">
																<label for="bride_address"><strong>Present Address* </strong> </label>
																<input type="text" id="bride_address" name="bride_address" value="<?php echo $rowWed["bride_address"]; ?>" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
															</div>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_fatherName"><strong>Father's Name* </strong> </label>
																<input type="text" id="bride_fatherName" name="bride_fatherName" value="<?php echo $rowWed["bride_father"]; ?>" placeholder="Francis San Pedro" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box"> 
																<label for="bride_motherName"><strong>Mother's Maiden Name* </strong> </label>
																<input type="text" id="bride_motherName" name="bride_motherName" value="<?php echo $rowWed["bride_mother"]; ?>" placeholder="Teresa Agustin" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="bride_religion"><strong>Religion* </strong> </label>
																<select id="bride_religion" name="bride_religion">
																	<option value="" disabled selected hidden>Select Religion</option>
																	<option value="Roman Catholic" <?php checkReligion($bRel); ?>>Roman Catholic</option>											
																	<option value="Protestant" <?php checkReligion($bRel); ?>>Protestant</option>
																	<option value="Iglesia ni Cristo" <?php checkReligion($bRel); ?>>Iglesia ni Cristo</option>											
																	<option value="Jehovah&lsquo;s Witness" <?php checkReligion($bRel); ?>>Jehovah&lsquo;s Witness</option>
																	<option value="Seventh Day Adventist" <?php checkReligion($bRel); ?>>Seventh Day Adventist</option>											
																	<option value="Islam" <?php checkReligion($bRel); ?>>Islam</option>
																</select>
															</div>
														</div>
														<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="bride_idpic"><strong>2x2 ID Picture* </strong> </label>
																<input type="file" id="bride_idpic" name="bride_idpic" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="bride_psa"><strong>PSA Birth Certificate* </strong> </label>
																<input type="file" id="bride_psa" name="bride_psa" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="bride_cenomar"><strong>CENOMAR (Certificate of No Marriage)* </strong> </label>
																<input type="file" id="bride_cenomar" name="bride_cenomar" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="bride_baptismal"><strong>Baptismal Certificate* </strong> </label>
																<input type="file" id="bride_baptismal" name="bride_baptismal" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="bride_confirmation"><strong>Confirmation Certificate* </strong> </label>
																<input type="file" id="bride_confirmation" name="bride_confirmation" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
														</div>
													</div>
													<div class="form-content">
														<div class="form-title">
															<h2>For Couple</h2>
														</div>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="couple_contract"><strong>Marriage License or Live-In License (Article 34) or Marriage Contract (Civil Marriage)* </strong> </label>
																<input type="file" id="couple_contract" name="couple_contract" title="Please submit only one (1) of the listed documents." accept="image/*" onchange="validateFileType(this.id)" required><br>
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
													<button type="Submit" name="updateform">Yes</button>
												</div>
											</div>
										</div>
									</form>
									
									<?php
									
								}
								
								// BAPTISM FORM
								else if($event == "Baptism"){ 
								 
										$sqlBap = "SELECT * FROM baptism_details WHERE foreign_id='$id'";
										$resultBap = $conn->query($sqlBap);
										$rowBap = mysqli_fetch_assoc($resultBap);

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
										<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
											<div> <strong> Select Available Time:</strong> </div>
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
													
													$contnum = $rowBap["contNum"];
													$contnum = substr($contnum, 3);
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
															> The Godfather (Ninong) and Godmother (Ninang) must be at least 18 years of age. <br>
															> Only baptized Catholics are eligible to be chosen as Godfathers (Ninong) and Godmothers (Ninang). <br>
													</div>
												<br>
											</div>
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<b>To be baptized's information</b>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last Name* </label>
																<input type="text" id="lastName" name="lastName" maxlength="40" value="<?php echo $rowBap["lastName"]; ?>" placeholder="Dela Cruz" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First Name* </label>
																<input type="text" id="firstName" name="firstName" maxlength="40" value="<?php echo $rowBap["firstName"]; ?>" placeholder="Juan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle Name </label>
																<input type="text" id="middleName" name="middleName" maxlength="40" value="<?php echo $rowBap["midName"]; ?>" placeholder="Tomas" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
															</div>
														</div>
													</div>
													<div class="form-grid-cont">
														<div>
															<b>Gender*</b>
															<div style="display: flex">
																<div>
																	<input type="radio" id="genderMale" name="gender" value="Male" required>
																	<label for="genderMale">Male </label> <br>
																</div>
																<div>
																	<input type="radio" id="genderFemale" name="gender" value="Female" required>
																	<label for="genderFemale">Female </label> <br>
																</div>
															</div>
														</div>
														<div class="input-box">
															<label for="dob"><strong>Birth Date*</strong> </label>
															<input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" required><br>
														</div>
														<div class="input-box">
															<label for="pob"><strong>Birth Place*</strong> </label>
															<input type="text" id="pob" name="pob" maxlength="120" value="<?php echo $rowBap["pob"]; ?>" placeholder="Taguig City" required><br>
														</div>
													</div>
													<div>
														<div class="input-box">
															<label for="address"><strong>Present Address*</strong> </label>
															<input type="text" id="address" name="address" maxlength="120" value="<?php echo $rowBap["address"]; ?>" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="fatherName"><strong>Father's Name*</strong> </label>
															<input type="text" id="fatherName" name="fatherName" maxlength="100" value="<?php echo $rowBap["fatherName"]; ?>" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="fatherPob"><strong>Father's Birth Place*</strong> </label>
															<input type="text" id="fatherPob" name="fatherPob" maxlength="120" value="<?php echo $rowBap["fatherPob"]; ?>" placeholder="Taguig City" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="motherName"><strong>Mother's Maiden Name*</strong> </label>
															<input type="text" id="motherName" name="motherName" maxlength="100" value="<?php echo $rowBap["motherName"]; ?>" placeholder="Maria Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="motherPob"><strong>Mother's Birth Place*</strong> </label>
															<input type="text" id="motherPob" name="motherPob" maxlength="120" value="<?php echo $rowBap["motherPob"]; ?>" placeholder="Makati City" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="contactNum"><strong>Parent/Guardian's Contact Number*</strong></label>
															<div class="contactnum">
																<input type="text" name ="mobile1" value="+63" id="" disabled>
																<input type="tel" id="contactNum" name="contactNum" value="<?php echo $contnum; ?>" maxlength="10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="9123456789" pattern="[9]{1}[0-9]{9}" required><br>
															</div>
														</div>
														<div class="input-box">
															<label for="marriage_type"><strong>Parents' Type of Marriage*</strong> </label>
															<select id="marriage_type" name="marriage_type">
																<option value="default" disabled selected hidden></option>
																<option value="Catholic Marriage" title="Catholic Marriage = married in church and officiated by a priest">Catholic Marriage</option>											
																<option value="Civil Marriage" title="Civil Marriage = married in court and officiated by a lawyer">Civil Marriage</option>
															</select>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="godfatherName"><strong>Godfather's Name*</strong> </label>
															<input type="text" id="godfatherName" name="godfatherName" value="<?php echo $rowBap["godfathName"]; ?>" placeholder="Francis Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="godfatherAddress"><strong>Godfather's Address*</strong> </label>
															<input type="text" id="godfatherAddress" name="godfatherAddress" value="<?php echo $rowBap["godfathAddress"]; ?>" placeholder="Taguig City" maxlength="120" required><br>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="godmotherName"><strong>Godmother's Name*</strong></label>
															<input type="text" id="godmotherName" name="godmotherName" value="<?php echo $rowBap["godmothName"]; ?>" maxlength="100" placeholder="Teresa Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="godmotherAddress"><strong>Godmother's Address*</strong></label>
															<input type="text" id="godmotherAddress" name="godmotherAddress" value="<?php echo $rowBap["godmothAddress"]; ?>" placeholder="Makati City" maxlength="120" required><br>
														</div>
													</div>
													<div>
															<h2>Soft Copy of Requirements</h2>
														</div>
														<div class="grid-cont">
															<div class="input-box">
																<label for="psa"><strong>Child's PSA Birth Certificate*</strong> </label>
																<input type="file" id="psa" name="psa" accept="image/*" onchange="validateFileType(this.id)" required><br>
															</div>
															<div class="input-box">
																<label for="marriage_contract"><strong>Marriage Contract of Parents* </strong> </label>
																<input type="file" id="marriage_contract" name="marriage_contract" accept="image/*" onchange="validateFileType(this.id)" required><br>
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
														<button type="Submit" name="updateform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									<?php
								}
								
								// FUNERAL MASS AND BLESSING FORM
								else if($event == "Funeral Mass/Blessing"){
									?>
									<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
										
										<?php
											$sqlFun = "SELECT * FROM funeral_details WHERE foreign_id='$id'";
											$resultFun = $conn->query($sqlFun);
											$rowFun = mysqli_fetch_assoc($resultFun);

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
											<div> <strong> Select Available Time:</strong> </div>
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
															<label for="lastName">Last Name* </label>
															<input type="text" id="lastName" name="lastName" maxlength="40" value="<?php echo $rowFun["lastName"]; ?>" placeholder="Dela Cruz" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="firstName">First Name* </label>
															<input type="text" id="firstName" name="firstName" maxlength="40" value="<?php echo $rowFun["firstName"]; ?>" placeholder="Juan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="middleName">Middle Name </label>
															<input type="text" id="middleName" name="middleName" maxlength="40" value="<?php echo $rowFun["middleName"]; ?>" placeholder="Tomas" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
														</div>
													</div>
												</div>
												<div class="form-grid-cont">
													<div class="input-box">
														<label for="age"><strong>Age*</strong> </label>
														<input type="num" id="age" name="age" min="0" placeholder="30" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" max="120" maxlength="3" required><br>
													</div>
													<div>
														<b>Gender*</b>
														<div style="display: flex">
															<div>
																<input type="radio" id="genderMale" name="gender" value="Male" required>
																<label for="genderMale">Male </label> <br>
															</div>
															<div>
																<input type="radio" id="genderFemale" name="gender" value="Female" required>
																<label for="genderFemale">Female </label> <br>
															</div>
														</div>
													</div>
													<div class="input-box">
														<label for="cause_of_death"><strong>Cause of Death*</strong></label>
														<input type="text" id="cause_of_death" name="cause_of_death" value="<?php echo $rowFun["deathCause"]; ?>" placeholder="Ischaemic heart disease" title="Please indicate the cause stated on the deceased's death certificate." maxlength="120" required><br>
													</div>
													<div class="input-box">
														<label for="date_of_death"><strong>Date of Death*</strong></label>
														<input type="date" name="date_of_death" min="<?= date('Y-m-d', strtotime('-1 month')); ?>" max="<?php echo date("Y-m-d"); ?>" required><br>
													</div>
													<div class="input-box">
														<label for="date_of_internment"><strong>Date of Internment*</strong> </label>
														<input type="date" id="date_of_internment" name="date_of_internment" min="<?php echo date("Y-m-d"); ?>" max="<?= date('Y-m-d', strtotime('+1 month')); ?>" required><br>
													</div>
													<div class="input-box">
														<label for="place_of_cemetery"><strong>Place of Cemetery*</strong> </label>
														<input type="text" id="place_of_cemetery" name="place_of_cemetery" value="<?php echo $rowFun["cemeteryPlace"]; ?>" placeholder="Manila American Cemetery and Memorial" maxlength="120" required><br>
													</div>
												</div>
												<div class="grid-cont">
													<div>
														<b>Sacrament Received*</b>
														<div style="display: flex">
															<div>
																<input type="radio" id="sacramentYes" name="sacrament" value="Yes" required>
																<label for="sacramentYes">Yes </label><br>
															</div>
															<div>
																<input type="radio" id="sacramentNo" name="sacrament" value="No" required>
																<label for="sacramentNo">No </label><br>
															</div>
														</div>
													</div>
													<div>
														<b>Casket or Urn*</b>
														<div style="display: flex" title="Casket is for funeral masses while Urn is for funeral blessings">
															<div>
																<input type="radio" id="burialCasket" name="burial" value="Casket" title="Funeral Mass" required>
																<label for="burialCasket">Casket </label>
															</div>
															<div>
																<input type="radio" id="burialUrn" name="burial" value="Urn" title="Funeral Blessing" required>
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
														<label for="deathcert"><strong>Death Certificate* </strong> </label>
														<input type="file" id="deathcert" name="deathcert" accept="image/*" onchange="validateFileType(this.id)" required><br>
													</div>
												</div>
												<div class="form-title">
													<h2 title="Informant = person who gave the deceased's death certificate information to the church">Informant's Information</h2>
												</div>
												<div>
													<b>Name</b>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="informantLastName">Last Name* </label>
															<input type="text" id="informantLastName" name="informantLastName" value="<?php echo $rowFun["informLast"]; ?>" placeholder="San Pedro" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="informantFirstName">First Name* </label>
															<input type="text" id="informantFirstName" name="informantFirstName" value="<?php echo $rowFun["informFirst"]; ?>" placeholder="Juana" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
														<label for="informantMiddleName">Middle Name </label>
														<input type="text" id="informantMiddleName" name="informantMiddleName" value="<?php echo $rowFun["informMid"]; ?>" placeholder="Agustin" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
														</div>
													</div>
												</div>
												<div class="grid-cont">
													<div class="input-box">
														<label for="contactNum"><strong>Contact Number*</strong></label>
														<div class="contactnum">
															<input type="text" name ="mobile1" value="+63" id="" disabled>
															<input type="tel" id="contactNum" name="informantContactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
														</div>
													</div>
													<div class="input-box">
														<label for="address"><strong>Present Address*</strong> </label>
														<input type="text" id="address" name="informantAddress" value="<?php echo $rowFun["address"]; ?>" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
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
													<button type="Submit" name="updateform">Yes</button>
												</div>
											</div>
										</div>
									</form>
									<?php
								}else if($event == "Baptismal Certificate" || $event == "Wedding Certificate" || $event == "Confirmation Certificate"){

									$sqlDoc = "SELECT * FROM document_request_details WHERE foreign_id='$id'";
									$resultDoc = $conn->query($sqlDoc);
									$rowDoc = mysqli_fetch_assoc($resultDoc);
									?> 
									<div>
										<div>
										<b> Requirements for <?php echo $event?>: </b>
											<div class="grid-cont">
												<div>> Birth Certificate</div>		
												<div>> Php 100.00</div>		
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > Another person may claim your document as long as they have a copy of your valid ID and an authorization letter. </div>
												<div> > The document must be claimed during office hours within the scheduled date. </div>
												<div> > Office hours: </div>
												<div> &nbsp&nbsp&nbsp Tuesday-Saturday: 8:00 - 11:30 AM || 1:30 - 5:00 PM </div>
												<div> &nbsp&nbsp&nbsp Sunday: 8:00 - 12:00 NN </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
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
																<label for="lastName">Last Name* </label>
																<input type="text" id="lastName" name="lastName" maxlength="40" value="<?php echo $rowDoc["lastName"]; ?>" placeholder="Dela Cruz" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First Name* </label>
																<input type="text" id="firstName" name="firstName" maxlength="40" value="<?php echo $rowDoc["firstName"]; ?>" placeholder="Juan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle Name </label>
																<input type="text" id="middleName" name="middleName" maxlength="40" value="<?php echo $rowDoc["middleName"]; ?>" placeholder="Tomas" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Birth Date*</strong></label>
															<input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong>Contact Number*</strong></label>
															<div class="contactnum">
																<input type="text" name ="mobile1" value="+63" id="" disabled>
																<input type="tel" id="contactNum" name="ContactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
															</div>
														</div>
														<div class="input-box">
															<label for="fname"><strong>Father's Name*</strong> </label>
															<input type="text" id="fname" name="fname" maxlength="100" value="<?php echo $rowDoc["fatherName"]; ?>" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="mname"><strong>Mother's Name*</strong> </label>
															<input type="text" id="mname" name="mname" maxlength="100" value="<?php echo $rowDoc["motherName"]; ?>" placeholder="Maria Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose*</strong> </label>
															<input type="text" id="purpose" name="purpose" value="<?php echo $rowDoc["purpose"]; ?>" placeholder="Wedding Requirement" maxlength="120" required><br>
														</div>
													</div>
													<div>
														<h2>Soft Copy of Requirements</h2>
													</div>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="birthcert"><strong>Birth Certificate* </strong> </label>
															<input type="file" id="birthcert" name="birthcert" accept="image/*" onchange="validateFileType(this.id)" required><br>
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
														<button type="Submit" name="updateform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
									<?php
								} else if($event == "Good Moral Certificate"){
									$sqlDoc = "SELECT * FROM document_request_details WHERE foreign_id='$id'";
									$resultDoc = $conn->query($sqlDoc);
									$rowDoc = mysqli_fetch_assoc($resultDoc);
								?>
									<div>
										<div>
										<b> Requirements for <?php echo $event?>: </b>
											<div class="grid-cont">
												<div>> Birth Certificate</div>		
												<div>> Barangay Certificate</div>		
												<div>> Kawan Certificate</div>		
												<div>> Php 100.00</div>				
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > Another person may claim your document as long as they have a copy of your valid ID and an authorization letter. </div>
												<div> > The document must be claimed during office hours within the scheduled date. </div>
												<div> > Office hours: </div>
												<div> &nbsp&nbsp&nbsp Tuesday-Saturday: 8:00 - 11:30 AM || 1:30 - 5:00 PM </div>
												<div> &nbsp&nbsp&nbsp Sunday: 8:00 - 12:00 NN </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<h2><b>Requester's</b></h2>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last Name* </label>
																<input type="text" id="lastName" name="lastName" value="<?php echo $rowDoc["lastName"]; ?>" placeholder="Dela Cruz" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First Name* </label>
																<input type="text" id="firstName" name="firstName" value="<?php echo $rowDoc["firstName"]; ?>" placeholder="Juan" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle Name </label>
																<input type="text" id="middleName" name="middleName" value="<?php echo $rowDoc["middleName"]; ?>" placeholder="Tomas" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Birth Date*</strong></label>
															<input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong>Contact Number*</strong></label>
															<div class="contactnum">
																<input type="text" name ="mobile1" value="+63" id="" disabled>
																<input type="tel" id="contactNum" name="ContactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
															</div>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose*</strong> </label>
															<input type="text" id="purpose" name="purpose" value="<?php echo $rowDoc["purpose"]; ?>" placeholder="Board Exam Requirement" maxlength="100" required><br>
														</div>
													</div>
													<div>
														<h2>Soft Copy of Requirements</h2>
													</div>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="birthcert"><strong>Birth Certificate* </strong> </label>
															<input type="file" id="birthcert" name="birthcert" accept="image/*" onchange="validateFileType(this.id)" required><br>
														</div>
														<div class="input-box">
															<label for="barangaycert"><strong>Barangay Certificate* </strong> </label>
															<input type="file" id="barangaycert" name="barangaycert" accept="image/*" onchange="validateFileType(this.id)" required><br>
														</div>
														<div class="input-box">
															<label for="kawancert"><strong>Kawan Certificate* </strong> </label>
															<input type="file" id="kawancert" name="kawancert" accept="image/*" onchange="validateFileType(this.id)" required><br>
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
														<button type="Submit" name="updateform">Yes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
								<?php
								} else if($event == "Permit and No Record"){
									$sqlDoc = "SELECT * FROM document_request_details WHERE foreign_id='$id'";
									$resultDoc = $conn->query($sqlDoc);
									$rowDoc = mysqli_fetch_assoc($resultDoc);
									?> 
									<div>
										<div>
										<b> Requirements for <?php echo $event?>: </b>
											<div class="grid-cont">
												<div>> Birth Certificate</div>		
												<div>> Php 100.00</div>			
											</div>
											<b> Notes: </b>
											<div class="grid-cont">
												<div> > Another person may claim your document as long as they have a copy of your valid ID and an authorization letter. </div>
												<div> > The document must be claimed during office hours within the scheduled date. </div>
												<div> > Office hours: </div>
												<div> &nbsp&nbsp&nbsp Tuesday-Saturday: 8:00 - 11:30 AM || 1:30 - 5:00 PM </div>
												<div> &nbsp&nbsp&nbsp Sunday: 8:00 - 12:00 NN </div>
											</div>
										</div>
										<form action="page_LANDING.php" method="post" enctype="multipart/form-data">
											<div class="form-cont">
												<div class="form-content">
													<div class="form-title">
														<h2><b>Requester's</b></h2>
													</div>
													<div>
														<b>Name</b>
														<div class="form-grid-cont">
															<div class="input-box">
																<label for="lastName">Last Name* </label>
																<input type="text" id="lastName" name="lastName" value="<?php echo $rowDoc["lastName"]; ?>"placeholder="Dela Cruz" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="firstName">First Name* </label>
																<input type="text" id="firstName" name="firstName" value="<?php echo $rowDoc["firstName"]; ?>" placeholder="Juan" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
															</div>
															<div class="input-box">
																<label for="middleName">Middle Name </label>
																<input type="text" id="middleName" name="middleName" value="<?php echo $rowDoc["middleName"]; ?>" placeholder="Tomas" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
															</div>
														</div>
													</div>
													<div class="grid-cont">
														<div class="input-box">
															<label for="dob"><strong>Birth Date*</strong></label>
															<input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" value="<?php echo $rowDoc["dob"]; ?>"required> <br>
														</div>
														<div class="input-box">
															<label for="contactNum"><strong>Contact Number*</strong></label>
															<div class="contactnum">
																<input type="text" name ="mobile1" value="+63" id="" disabled>
																<input type="tel" id="contactNum" name="ContactNum" value="<?php echo $rowDoc["contactNum"]; ?>"  maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
															</div>
														</div>
														<div class="input-box">
															<label for="address"><strong>Present Address*</strong> </label>
															<input type="text" id="address" name="address" value="<?php echo $rowDoc["address"]; ?>" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="150" required><br>
														</div>
														<div class="input-box">
															<label for="purpose"><strong>Purpose*</strong> </label>
															<input type="text" id="purpose" name="purpose" value="<?php echo $rowDoc["purpose"]; ?>" placeholder="Baptism at another church" maxlength="120" required><br>
														</div>
													</div>
													<div>
														<h2>Soft Copy of Requirements</h2>
													</div>
													<div class="form-grid-cont">
														<div class="input-box">
															<label for="birthcert"><strong>Birth Certificate* </strong> </label>
															<input type="file" id="birthcert" name="birthcert" accept="image/*" onchange="validateFileType(this.id)" required><br>
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
														<button type="Submit" name="updateform">Yes</button>
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
								$sqlMint = "SELECT * FROM mass_intention_details WHERE foreign_id='$id'";
								$resultMint = $conn->query($sqlMint);
								$rowMint = mysqli_fetch_assoc($resultMint);
								?>
								<div class="Event-grid-cont">
									<div><h1> Event: <?php echo $type?></h1></div>
									<div><h1> Date: <?php echo $formated_date?></h1></div>
								</div>
								<?php
								$intention = array("06:00:00","07:30:00","09:00:00","16:30:00","17:00:00", "18:00:00","18:10:00","19:15:00");
								$count_time = 0; ?>
								<form action="page_LANDING.php" method="post">
									<div><b>Time Available: </b></div>
									<div class="rd-cont">
										<?php 
											foreach ($intention as $i){
												if($day != "Sunday" && $day != "Saturday"){
													if($i == "18:00:00"){
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
													} 
												} else if($day == "Saturday"){
													if($i == "06:00:00" || $i == "17:00:00" || $i == "18:10:00" || $i == "19:15:00" ){
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
													} 
												} else if($day == "Sunday"){
													if($i != "18:10:00" && $i != "19:15:00" ){
														?><div>
															<input type="radio" id="<?php echo 'rtime'.$count_time ?>" name="rdtime" value="<?php echo $i?>">
															<label for="<?php echo 'rtime'.$count_time ?>"><?php echo date("h:ia", strtotime($i)) ?></label><br>
														</div>
														<?php
													} 
												} else {
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
													<label for="contactNum"><strong>Contact Number*</strong></label>
													<div class="contactnum">
														<input type="text" name ="mobile1" value="+63" id="" disabled>
														<input type="tel" id="contactNum" name="contactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
													</div>
												</div>
												<div>
													<b> Purpose* </b>
													<div class="input-box">
														<div>
															<input type="radio" name="purposes" id="Thanksgiving" value="Thanksgiving">
															<label for="Thanksgiving">Thanksgiving</label><br>
														</div>
														<div>
															<input type="radio" name="purposes" id="Healing" value="Healing/Recovery">
															<label for="Healing">Healing/Recovery</label><br>
														</div>
														<div>
															<input type="radio" name="purposes" id="SpecialInt" value="Special Intention">
															<label for="SpecialInt">Special Intention</label><br>
														</div>
														<div>
															<input type="radio" name="purposes" id="Soul" value="Soul">
															<label for="Soul">Soul</label><br>
														</div>
													</div>
												</div>
											</div>
											<div>
												<div class="input-box">
													<label for="names"><strong>Name/s</strong></label>
													<textarea name="names" rows="3" style="resize: none" value="<?php echo $rowMint["name"]; ?>" placeholder="Name/s of for whom the mass intention is for"></textarea>
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
												<button type="Submit" name="updateform">Yes</button>
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
									> Since blessings are based on the priest's schedule, the church will contact you on the final time of your blessing. <br>
									> If scheduling a Car or Motorcycle Blessing, please bring your vehicle to the church at the agreed upon time. <br>
									> Blessing Fee: Donation <br>
									
									<div class="form-cont">
										<div class="form-content">
											<div class="grid-cont">
												<div class="input-box">
													<label for="contactNum"><strong>Contact Number*</strong></label>
													<div class="contactnum">
														<input type="text" name ="mobile1" value="+63" id="" disabled>
														<input type="tel" id="contactNum" name="contactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
													</div>
												</div>
											</div>
											<br>
											<div>
												<b> Type of Blessing* </b>
												<div class="grid-cont-four">
													<div class="input-box">
														<div>
															<input type="radio" id="HouseBlessing" name="blessingType" value="House Blessing" onclick="showDiv()" required>
															<label for="HouseBlessing">House Blessing </label> <br>
														</div>
													</div>
													<div class="input-box">
														<div>
															<input type="radio" id="CarBlessing" name="blessingType" value="Car Blessing" onclick="showDiv()" required>
															<label for="CarBlessing">Car Blessing </label> <br>
														</div>
													</div>
													<div class="input-box">
														<div>
															<input type="radio" id="MotorcycleBlessing" name="blessingType" value="Motorcycle Blessing" onclick="showDiv()" required>
															<label for="MotorcycleBlessing">Motorcycle Blessing </label> <br>
														</div>
													</div>
													<div class="input-box">
														<div>
															<input type="radio" id="StoreBlessing" name="blessingType" value="Store Blessing" onclick="showDiv()" required>
															<label for="StoreBlessing">Store Blessing </label> <br>
														</div>
													</div>
												</div>
												<div class="grid-cont-four">
													<div class="input-box" id="houseAddDiv" style="display: none">
														<div>
															<label for="address">House Address* </label> <br>
															<textarea id="addressHouse" rows="3" cols="30" style="resize: none" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" name="address" required></textarea>
														</div>
													</div>
													<div class="input-box" id="emptyDiv1" style="display: none">
														<div>
														</div>
													</div>
													<div class="input-box" id="emptyDiv2" style="display: none">
														<div>
														</div>
													</div>
													<div class="input-box" id="emptyDiv3" style="display: none">
														<div>
														</div>
													</div>
													<div class="input-box" id="storeAddDiv"style="display: none">
														<div>
															<label for="address">Store Address* </label> <br>
															<textarea id="addressStore" rows="3" cols="30" style="resize: none" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" name="address" required></textarea>
														</div>
													</div>
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
												<button type="Submit" name="updateform">Yes</button>
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
    <script src="jsResched.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>