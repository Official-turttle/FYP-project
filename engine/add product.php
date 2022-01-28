<?php
session_start();

include 'connect.php';
error_reporting (E_ALL ^ E_NOTICE);

if(isset($_POST['register_btn'])){

	$name		=$_POST['name'];
	$category	=$_POST['category'];
	$date		=$_POST['date'];
	$barcode	=$_POST['barcode'];	
	$supplier 	=$_POST['supplier'];
	$quantity 	=$_POST['quantity'];
	$rack		=$_POST['rack'];
	// $unit=$_POST['unit'];
	// $price=$_POST['price'];
    // $pic 		=$_POST['fileToUpload'];
	
	// $target_dir = "../image/";
    // $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  	// move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 	//  $image = basename($_FILES["fileToUpload"]["name"]);
	
				

	 $sql="INSERT INTO `inventory`(`name`, `category`, `date`,`barcode`,`supplier`,`quantity`,`rack`) 
	 	VALUES ('$name','$category','$date','$barcode','$supplier','$quantity','$rack')";


			//echo $sql;
			//echo $unit;
		  mysqli_query($conn,$sql);

		// echo "<script>alert('Product created');</script>";
		
		echo "<script>window.location.assign('../tools/inventory.php');</script>";
		}
	 	else{
	 		echo "<script>alert('Failed to upload the product');</script>";
	 		echo "<script>window.location.assign('../tools/inventory.php');</script>";
		
	 }
	mysqli_close($conn);

	?>
	