<?php

session_start();

if (isset($_POST['recordSub'])) {
    $_SESSION['recordFilter'] = $_POST['recordSub'];
    header('Location: admin_RECORDS.php');
}

if (isset($_POST['filterSub'])) {
    $filter = $_POST['searchFilter'];
    if ($filter == 'name') {
        $ln = $_POST['findLn'];
        $fn = $_POST['findFn'];
        $_SESSION['searchFilter'] = "byName";
        $_SESSION['findVal'] = array($ln, $fn);
        header('Location: admin_RECORDS.php');
    } else if ($filter == 'bday') {
        $day = $_POST['findBday'];
        $_SESSION['searchFilter'] = "byBday";
        $_SESSION['findVal'] = $day;
        header('Location: admin_RECORDS.php');
    } else if ($filter == 'eday') {
        $day = $_POST['findEday'];
        $_SESSION['searchFilter'] = "byEday";
        $_SESSION['findVal'] = $day;
        header('Location: admin_RECORDS.php');
    }
}

if (isset($_POST['editRec'])) {
    $event = $_POST['event'];
    $eventId = $_POST['eventId'];
    header("Location: edit_RECORDS.php?event=$event&id=$eventId");
}

?>