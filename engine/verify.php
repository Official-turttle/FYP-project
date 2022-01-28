<?php

include 'connect.php';

 session_start();
 $username = "";

 // $conn = new mysqli('localhost', 'rooot', '','farm');

 if (isset($_POST['login_btn'])) {
 	$username = $_POST['username'];
 	$password = $_POST['password'];
 	
 	$password = md5($password);
 	$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
 		$result = $conn ->query($sql);

 if ($result->num_rows > 0) {
 	while ($row = $result->fetch_assoc()) {
 		$_SESSION["username"] = $username;

 		echo "<script>alert('you are logged in');</script>";
 		# code...
 		 	echo"<script>window.location.assign('../tools/index.php')</script>";
 	}

 }else{
 	echo "<script>alert('invalid account');</script>";
 	echo "<script>window.location.assign('../login.html')</script>";
 }

 }

 
?>