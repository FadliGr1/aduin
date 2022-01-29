<?php
session_start();
unset($_SESSION["ID"]); 
unset($_SESSION["c_id"]); 
header("Location:login.php");
?>