<?php
session_start();

include 'connect.php';
error_reporting (E_ALL ^ E_NOTICE);

if(isset($_POST['register_btn'])){
	$name           =$_POST['name'];
	$description    =$_POST['description'];
	
				
$type = mysqli_real_escape_string($conn,$_POST['name']);
$check_select = mysqli_query($conn,"SELECT * FROM `category` WHERE name = '$name'"); 

$numrows=mysqli_num_rows($check_select);

if($numrows > 0){

echo "<script>alert('Item Exist');</script>";
echo "<script>window.location.assign('../tools/category.php'');</script>";

}

else{

	$sql="INSERT INTO `category`(`name`, `description`,`status`)
			VALUES ('$name','$description',0)";
			 mysqli_query($conn,$sql);

		echo "<script>alert('Item created');</script>";
		echo "<script>window.location.assign('../tools/category.php');</script>";

		


}
	

}
			//echo $sql;
			//echo $unit;
		
	mysqli_close($conn);

	?>
