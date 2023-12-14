<?php
session_start();
require 'dbconnect.php';

$title = $_SESSION['title'] = $_POST['title'];
$date = $_SESSION['date'] = $_POST['date'];
$desc = $_SESSION['desc'] = $_POST['desc'];

$dir = "post/";


if (empty($_FILES['image']['name'])) {
    $query = "INSERT INTO announcement_details VALUES ('','default.jpg','$title','$date','time(NOW())','$desc')";
    $res = mysqli_query($conn, $query);
} else {
    $fileName = basename($_FILES['image']['name']);
    $targetFilePath = $dir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'jfif');
    if (!in_array($fileType, $allowTypes)) {
        $_SESSION['invalidImage'] = true;
        header('Location: add_ANNOUNCEMENT.php');
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        $query = "INSERT INTO announcement_details VALUES ('','$fileName','$title','$date','time(NOW())','$desc')";
        $res = mysqli_query($conn, $query);
    }
}
