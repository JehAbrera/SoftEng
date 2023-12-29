<?php
require 'dbconnect.php';

echo $_POST['eventId'];

/*for ($i = 0; $i <= 60; $i++) {
    $query = "INSERT INTO `record_baptism_details` (`event_date`, `event_time`, `lastName`, `firstName`, `middleName`, `gender`, `dob`, `pob`, `address`, `contactNum`, `fatherName`, `father_pob`, `motherName`, `mother_pob`, `marriage_type`, `godfatherName`, `godfather_address`, `godmotherName`, `godmother_address`) VALUES ('2023-12-20 14:04:53.000000', '2023-12-20 14:04:53.000000', 'john rey', 'abrera', '', '', '2023-12-20 14:04:53.000000', '', '', '', '', '', '', '', '', '', '', '', '')";
    $result = $conn -> query($query);

    if ($result) {
        echo $i;
    }
}

echo "Query Done!";*/

?>