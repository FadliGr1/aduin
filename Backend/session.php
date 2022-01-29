<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
	if(isset($_SESSION["ID"])){
	   $ID = $_SESSION["ID"];
	}
	
   if(!isset($_SESSION['ID']))
   {
      header("location:login.php");
      die();
   }
?>