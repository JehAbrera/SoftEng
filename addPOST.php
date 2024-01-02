<?php
session_start();
require 'dbconnect.php';

if (isset($_POST['submitReg'])) {
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
}
if (isset($_POST['delPost'])) {
    $id = $_POST['toDelete'];
    $dir = "post/";
    $img = "SELECT * FROM announcement_details WHERE post_id='$id'";
    $que = $conn->query($img);
    if ($que->num_rows > 0) {
        while($row = $que->fetch_assoc()) {
            if ($row['announce_image'] != "default.jpg") {
                $dirHandler = opendir($dir);
                $delete = $dir.$row['announce_image'];
                unlink($delete);
                closedir($dirHandler);
            }
        }
    }
    $sql = "DELETE FROM announcement_details WHERE post_id='$id'";
    $query = $conn->query($sql);
    header('Location: admin_ANNOUNCEMENT.php');
}
