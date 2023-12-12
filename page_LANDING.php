<?php
	session_start();
	require 'dbconnect.php';
	if(isset($_POST["submitform"])){
		$Eventtype = $_SESSION['type'];
		$Eventdate = $_SESSION['date'];
        date_default_timezone_set('Asia/Manila');
        $dateappointed = date("Y-m-d");
        $timeappointed = date("H:i:s");
		if($Eventtype == "Special Event"){
            $rdtime =  $_POST["rdtime"];
            $time = explode(" ", $rdtime);
			$Event = $_SESSION['event'];
			
			if($Event == "Wedding"){
                $gLastName = $_POST["groom_lastName"];
                $gFirstName = $_POST["groom_firstName"];
                $gMiddleName = $_POST["groom_middleName"];
                $gContactNum = $_POST["groom_contactNum"];
                $gDob = $_POST["groom_dob"];
                $gPob = $_POST["groom_pob"];
                $gAddress = $_POST["groom_address"];
                $gFather = $_POST["groom_fatherName"];
                $gMother = $_POST["groom_motherName"];
                $gReligion = $_POST["groom_religion"];
                $gid = $_POST["groom_idpic"];
                $gpsa = $_POST["groom_psa"];
                $gcenomar = $_POST["groom_cenomar"];
                $gbaptismal = $_POST["groom_baptismal"];
                $gconfirmation = $_POST["groom_confirmation"];

                $bLastName = $_POST["bride_lastName"];
                $bFirstName = $_POST["bride_firstName"];
                $bMiddleName = $_POST["bride_middleName"];
                $bContactNum = $_POST["bride_contactNum"];
                $bDob = $_POST["bride_dob"];
                $bPob = $_POST["bride_pob"];
                $bAddress = $_POST["bride_address"];
                $bFather = $_POST["bride_fatherName"];
                $bMother = $_POST["bride_motherName"];
                $bReligion = $_POST["bride_religion"];
                $bid = $_POST["bride_idpic"];
                $bpsa = $_POST["bride_psa"];
                $bcenomar = $_POST["bride_cenomar"];
                $bbaptismal = $_POST["bride_baptismal"];
                $bconfirmation = $_POST["bride_confirmation"];

                $ccontract = $_POST["couple_contract"];

                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleWEDDING', 'sampleWEDDING@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', '$time[0]', '$time[1]', '$Event', 'Pending', '' )";
			    $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $Id = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $Id = $row[0];
                }
                echo $Id;
                
                $queryWedding = "INSERT INTO wedding_details VALUE('','$Id','$Eventdate', '$time[0]', '$time[1]', '$gLastName', '$gFirstName', '$gMiddleName', '$gContactNum', '$gDob', '$gPob', '$gAddress', '$gFather', '$gMother', '$gReligion','$gid','$gpsa', '$gcenomar','$gbaptismal','$gconfirmation','$bLastName', '$bFirstName', '$bMiddleName', '$bContactNum', '$bDob', '$bPob', '$bAddress', '$bFather', '$bMother', '$bReligion','$bid','$bpsa', '$bcenomar','$bbaptismal','$bconfirmation','$ccontract')";
			    $resultWedding = mysqli_query($conn, $queryWedding);

                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
                
			} else if($Event == "Baptism"){
				
                //echo $time[0].", ".$time[1];

                $bapLastName = $_POST["lastName"];
                $bapFirstName = $_POST["firstName"];
                $bapMiddleName = $_POST["middleName"];
                $bapGender = $_POST["gender"];
                $bapDob = $_POST["dob"];
                $bapPob = $_POST["pob"];
                $bapAddress = $_POST["address"];
                $bapContactNum = $_POST["contactNum"];
                $bapFather = $_POST["fatherName"];
                $bapFatherPob = $_POST["fatherPob"];
                $bapMother = $_POST["motherName"];
                $bapMotherPob = $_POST["motherPob"];
                $bapMarriage = $_POST["marriage_type"];
                $bapGodf = $_POST["godfatherName"];
                $bapGodfAddress = $_POST["godfatherAddress"];
                $bapGodm = $_POST["godmotherName"];
                $bapGodmAddress = $_POST["godmotherAddress"];
                $bappsa = $_POST["psa"];
                $bapcontract = $_POST["marriage_contract"];

                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleBAPTISM', 'sampleBAPTISM@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', '$time[0]', '$time[1]', '$Event', 'Pending', '' )";
			    $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $foreignId = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $foreignId = $row[0];
                }
    
                $queryBaptism = "INSERT INTO baptism_details VALUE('','$foreignId','$Eventdate', '$time[0]', '$time[1]','$bapLastName','$bapFirstName','$bapMiddleName','$bapGender','$bapDob','$bapPob','$bapAddress','$bapContactNum','$bapFather','$bapFatherPob','$bapMother','$bapMotherPob','$bapMarriage','$bapGodf','$bapGodfAddress','$bapGodm','$bapGodmAddress', '$bappsa', '$bapcontract')";
			    $resultBaptism = mysqli_query($conn, $queryBaptism);
                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
                
			} else if($Event == "Funeral Mass/Blessing"){

                //echo $time[0];

                $deadLastName = $_POST["lastName"];
                $deadFirstName = $_POST["firstName"];
                $deadMiddleName = $_POST["middleName"];
                $deadAge = $_POST["age"];
                $deadGender = $_POST["gender"];
                $deadDod = $_POST["date_of_death"];
                $deadDoi = $_POST["date_of_internment"];
                $deadCemetery = $_POST["place_of_cemetery"];
                $deadCause = $_POST["cause_of_death"];
                $deadSacrament = $_POST["sacrament"];
                $deadBurial = $_POST["burial"];
                $deathcert = $_POST["deathcert"];

                $infName = $_POST["informantLastName"].",".$_POST["informantFirstName"]." ". $_POST["informantMiddleName"];
                $infContactNum = $_POST["informantContactNum"];
                $infAddress = $_POST["informantAddress"];

                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleFUNERAL', 'sampleFUNERAL@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', '$time[0]', '', '$Event', 'Pending', '' )";
			    $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $foreignId = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $foreignId = $row[0];
                }

                $queryFuneral = "INSERT INTO funeral_details VALUE('','$foreignId','$Eventdate', '$time[0]', '','$deadLastName','$deadFirstName','$deadMiddleName','$deadGender','$deadDod','$deadAge','$deadCause','$deadDoi','$deadCemetery','$infName','$infContactNum','$infAddress','$deadSacrament','$deadBurial', '$deathcert')";
			    $resultFuneral= mysqli_query($conn, $queryFuneral);

                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;

			} else {
                //do nothing
			}
		} else if($Eventtype == "Mass Intention"){
            $rdtime =  $_POST["rdtime"];
            $time = explode(" ", $rdtime);
            $contactnum = $_POST["contactNum"];
            $rdpurpose = $_POST["purposes"];
            $names = $_POST["names"];
            $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleiNTENTIN', 'sampleINTENTION@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', '$time[0]', '', 'Mass Intention', 'Pending', '' )";
			$resultappointment = mysqli_query($conn, $queryappointment);
            //getting the appointments id to save as foreign key in wedding details
            $foreignId = 0;
            $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
            $resultid = mysqli_query($conn, $queryid);
            while($row = mysqli_fetch_array($resultid)) {
                $foreignId = $row[0];
            }

            $queryIntention = "INSERT INTO mass_intention_details VALUE('','$foreignId','$contactnum','$Eventdate', '$time[0]', '$rdpurpose', '$names')";
			$resultIntention = mysqli_query($conn, $queryIntention);
           // echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;

		} else if($Eventtype == "Blessing"){
			$contactnum = $_POST["contactNum"];
			$blessingtype = $_POST["blessingType"];
			$queryappointment = "INSERT INTO appointment_details VALUE('', 'sample2', 'sample2@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', '', '', '$blessingtype', 'Pending', '' )";
			$resultappointment = mysqli_query($conn, $queryappointment);
            //getting the appointments id to save as foreign key in wedding details
            $foreignId = 0;
            $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
            $resultid = mysqli_query($conn, $queryid);
            while($row = mysqli_fetch_array($resultid)) {
                $foreignId = $row[0];
            }
			$queryblessing = "INSERT INTO blessing_details VALUE('0','$foreignId','$contactnum','$Eventdate', '', '$blessingtype', '')";
			$resultblessing = mysqli_query($conn, $queryblessing);
            //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
		} else if($Eventtype == "Document Request"){
            $Event = $_SESSION['event'];
			//common inputs
            $lname = $_POST["lastName"];
            $fname = $_POST["firstName"];
            $mname = $_POST["middleName"];
            $contactnum = $_POST["ContactNum"];
            if($Event == "Baptismal Certificate" || $Event == "Wedding Certificate" || $Event == "Confirmation Certificate"){
                $dob = $_POST["dob"];
                $fathersname = $_POST["fname"];
                $mothersname = $_POST["mname"];
                $purpose = $_POST["purpose"];

                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', ' ', '', '$Event', 'Pending', '' )";
                $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $foreignId = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $foreignId = $row[0];
                }
                $queryDocument = "INSERT INTO document_request_details VALUE('','$foreignId','$Eventdate','$Event', '$fname', '$mname', '$lname', '$dob', '$fathersname', '$mothersname', '$contactnum', '$purpose', '')";
                $resultDocument = mysqli_query($conn, $queryDocument);
                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
            } else if($Event == "Good Moral Certificate"){
                $dob = $_POST["dob"];
                $purpose = $_POST["purpose"];
                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', ' ', '', '$Event', 'Pending', '' )";
                $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $foreignId = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $foreignId = $row[0];
                }
                $queryDocument = "INSERT INTO document_request_details VALUE('','$foreignId','$Eventdate','$Event', '$fname', '$mname', '$lname', '$dob', '', '', '$contactnum', '$purpose', '')";
                $resultDocument = mysqli_query($conn, $queryDocument);
                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
            } else if($Event == "Permit and No Record") {
                $dob = $_POST["dob"];
                $purpose = $_POST["purpose"];
                $address = $_POST["address"];
                $queryappointment = "INSERT INTO appointment_details VALUE('', 'sampleDOCUMENT', 'sampleDOCUMENT@yahoo.com', '$dateappointed', '$timeappointed', '$Eventdate', ' ', '', '$Event', 'Pending', '' )";
                $resultappointment = mysqli_query($conn, $queryappointment);
                //getting the appointments id to save as foreign key in wedding details
                $foreignId = 0;
                $queryid = "SELECT appointment_id FROM appointment_details WHERE appointment_id = LAST_INSERT_ID()";
                $resultid = mysqli_query($conn, $queryid);
                while($row = mysqli_fetch_array($resultid)) {
                    $foreignId = $row[0];
                }
                $queryDocument = "INSERT INTO document_request_details VALUE('','$foreignId','$Eventdate','$Event', '$fname', '$mname', '$lname', '$dob', '', '', '$contactnum', '$purpose', '$address')";
                $resultDocument = mysqli_query($conn, $queryDocument);
                //echo "Please wait 1 to 2 days for schedule approval in ". $Eventtype ;
            }

		}
	}else{
		echo "Appointment not saved :(";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLANDING.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Landing page</title>
</head>
<body>
    <div class="popupCover">
        <div class="popupMessage">
                <div> <i class="fa fa-check-circle" style="font-size: 4rem"></i> </div>
                <div class="title-cont"> <h2>Your Request has been submitted </h2> </div>
                <div class="desc-cont"> Please wait 2 to 3 days to approve your schedule <?php echo $Eventtype?> </div>
                <div class="button-cont">  <button type="button" onclick="Appointments.php"> <b>View Appointments</b></button> </div>
        </div>
        
    </div>
</body>
</html>
