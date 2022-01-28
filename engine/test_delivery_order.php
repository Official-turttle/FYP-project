<?php
session_start();

//error_reporting(0);


include 'connect.php';

if(isset($_POST['register_btn'])){
	$supplier		=$_POST['supplier'];
	$barcode		=$_POST['barcode'];
	$product_name	=$_POST['product_name'];
	$quantity   	=$_POST['quantity'];

	// echo "<script>console.log('$barcode')</script>";

	
	$do_date = date("Y-m-d");
    $sql1="INSERT INTO `delivery_order`(`supplier`, `do_date`, `status`) VALUES ('$supplier','$do_date','1')";

	

		if (mysqli_query($conn,$sql1)) {
			$last_id = mysqli_insert_id($conn);
			for ($i=0; $i <count($product_name) ; $i++) {
				$code=$barcode[$i];
            $sql2="INSERT INTO `delivery_order_detail`(`DO_ID`, `barcode`, `product`, `quantity`)
                    VALUES ('$last_id','$code','$product_name[$i]','$quantity[$i]')";


			$sql4 = "INSERT INTO `item_record`(`product`, `barcode`, `recieved_ammount`, `recieved_date`, `DO_ID`)
			VALUES ('$product_name[$i]','$code','$quantity[$i]','$do_date','$last_id')";

			mysqli_query($conn,$sql2);
			mysqli_query($conn,$sql4);
			
			
			// echo "<script>alert('DO has been created');</script>";
			echo "<script>window.location.assign('../tools/delivery_order.php');</script>";
		}
		
	}
	 	else{
	 		echo "<script>alert('Failed to upload the product');</script>";
		 }
		
	 }
	mysqli_close($conn);
 ?>
