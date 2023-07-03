<?php
session_start();
unset($_SESSION['ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_EMAIL']);
unset($_SESSION['USER_MOBILE']);
header("Location: login.php");
die();
?>
