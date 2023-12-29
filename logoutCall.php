<?php
session_start();

unset($_SESSION['isLoggedIn']);
unset($_SESSION['access']);
unset($_SESSION['login_email']);

header('Location:page_HOME.php');

?>