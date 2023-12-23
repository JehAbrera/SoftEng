<?php
session_start();
require 'dbconnect.php';

$email = $_SESSION['login_email'];

$userquery = "SELECT * FROM login_userinfo WHERE email='$email'";
$userRes = mysqli_query($conn, $userquery);
if (mysqli_num_rows($userRes) > 0) {
    $userRow = mysqli_fetch_assoc($userRes);
}

if($_POST['submit'] == 'edit' ) {
    $_SESSION['profPage'] = 'edit';
    header('Location: page_PROFILE.php');
} else if($_POST['submit'] == 'changePass' ) {
    $_SESSION['profPage'] = 'change';
    header('Location: page_PROFILE.php');
}else if($_POST['submit'] == 'delete' ) {
    $_SESSION['profPage'] = 'delete';
    header('Location: page_PROFILE.php');
}
else if($_POST['submit'] == 'view' ) {
    unset($_SESSION['profPage']);
    header('Location: page_HOME.php');
}else if($_POST['submit'] == 'cancel' ) {
    unset($_SESSION['profPage']);
    header('Location: page_PROFILE.php');
} else if($_POST['submit'] == 'change' ) {
    if ($_POST['isChanging'] == "ChangeInfo") {
        $newfn = $_POST['newfn'];
        $newln = $_POST['newln'];
        $phone = $_POST['phone1'].$_POST['phone2'];
        
        $query = "UPDATE login_userinfo SET firstName='$newfn', lastName='$newln', contactNum='$phone' WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        header('Location: page_PROFILE.php');
    } else if ($_POST['isChanging'] == "ChangePass") {
        $oldPass = hash('sha256', $_POST['oldPass']);
        $newPass = hash('sha256', $_POST['newPass']);

        if ($oldPass != $userRow['user_password']) {
            $_SESSION['invalidOld'] = true;
            $_SESSION['profPage'] = 'change';
            header('Location: page_PROFILE.php');           
        } else {
            $query = "UPDATE login_userinfo SET user_password='$newPAss' WHERE email='$email'";
            echo "Password Updated";
        }
    } else if ($_POST['isChanging'] == "deleteAcc") {
            $query = "DELETE FROM login_userinfo WHERE email='$email'";
            unset($_SESSION['isLoggedIn']);
            unset($_SESSION['login_email']);
            unset($_SESSION['profPage']);
            header('Location: page_HOME.php');
    }
}

?>