<?php 
if(empty($_SESSION)) 
   session_start();

if(!isset($_SESSION['username'])) { 
   header("Location:login.php");
   exit;
}
?>