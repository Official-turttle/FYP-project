<?php
session_start();

include 'connect.php';
// error_reporting (E_ALL ^ E_NOTICE);

echo "<script>console.log('in')</script>";

if(isset($_POST['register_btn'])){

    echo "<script>console.log('".$_POST['supplier_name']."')</script>";

    echo "<script>console.log('out')</script>";

	$supplier_name 		=$_POST['supplier_name'];
	$contact_number	    =$_POST['contact_number'];
	$contact_person		=$_POST['contact_person'];
	$email          	=$_POST['email'];
 
	

				

	 $sql="INSERT INTO `supplier_list` (`supplier_name`, `contact_number`, `email`, `contact_person`, `status`)
      VALUES ('$supplier_name', '$contact_number', '$email', '$contact_person', '1')";

		  mysqli_query($conn,$sql);

        //   echo"$sql";
		echo "<script>window.location.assign('../tools/supplier_table.php');</script>";
		}
	 	else{
	 		echo "<script>alert('Failed to upload the supplier');</script>";
		
	 }
	mysqli_close($conn);

	?>
	