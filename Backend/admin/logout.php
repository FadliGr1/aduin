<?php
session_start();
unset($_SESSION["admin_ID"]);  
header("Location:login.php");
?>