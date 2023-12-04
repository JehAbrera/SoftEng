<?php
	session_start();
	require 'dbconnect.php';
	if(isset($_POST["submitform"])){
		echo "PLease wait 1 to 2 days for schedule approval";
		$Eventtype = $_SESSION['type'];
		$Eventdate = $_SESSION['date'];
		if($Eventtype != "Mass Intention" && $Eventtype != "Blessing" ){
			$Event = $_SESSION['event'];
			echo $Event;
			
			if($Event == "Wedding"){
				
			} else if($Event == "Baptism"){
				
			} else if($Event == "Funeral Mass/Blesssing"){
				
			} else {
				//do nothing
			}
		} else if($Eventtype == "Mass Intention"){
			
		} else if($Eventtype == "Blessing"){
			echo $Eventtype.  " ";
			echo $Eventdate. " ";
			$contactnum = $_POST["contactNum"];
			$blessingtype = $_POST["blessingType"];
			$queryappointment = "INSERT INTO appointment_details VALUE('', 'sample', 'sample@yahoo.com', 'NOW()', 'NOW()', '$Eventdate', '', '', '$Eventtype', 'Pending', '' )";
			$resultappointment = mysqli_query($conn, $queryappointment);
			$queryblessing = "INSERT INTO blessing_details VALUE('1','$contactnum','$Eventdate', '', '$blessingtype', '')";
			$resultblessing = mysqli_query($conn, $queryblessing);
		} else {
			//do nothing
		}
	}else{
		echo "hindi pumasok";
	}
?>