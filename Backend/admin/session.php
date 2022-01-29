<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
	if(isset($_SESSION["admin_ID"])){
	   $admin_ID = $_SESSION["admin_ID"];
	}
	
   if(!isset($_SESSION['admin_ID']))
   {
      header("location:login.php");
      die();
   }
?>