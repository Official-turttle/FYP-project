<?php
session_start();

//error_reporting(0);


include 'connect.php';

if(isset($_POST['register_btn'])){
	$supplier		=$_POST['supplier'];
	$barcode		=$_POST['barcode'];
	$product_name	=$_POST['product_name'];
	$quantity   	=$_POST['quantity'];
    $price          =$_POST['price'];
    $total          =$_POST['total'];
    $sub_total      =$_POST['sub_total'];
    $tax            =$_POST['tax'];
    $tax_amount     =$_POST['tax_amount'];
    $grand_total    =$_POST['total_ammount'];


    // echo "<table>";
    // foreach ($_POST as $key => $value) {
    //     echo "<tr>";
    //     echo "<td>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     // echo $value;
    //     echo "</td>";
    //     echo "</tr>";
    // }
    // echo "</table>"; <- debug tool


	
	$do_date = date("Y-m-d");
    $sql1="INSERT INTO `purchase_order`(`po_date`, `supplier`, `sub_total`, `tax`, `tax_total`, `total` , `status`) 
           VALUES ('$do_date','$supplier','$sub_total','$tax','$tax_amount','$grand_total', '1')";

	

		if (mysqli_query($conn,$sql1)) {
			$last_id = mysqli_insert_id($conn);
			for ($i=0; $i <count($product_name) ; $i++) {
				$code=$barcode[$i];
            $sql2="INSERT INTO `purchase_order_detail`(`po_ID`, `barcode`, `product`, `quantity`,`price`,`total_price`)
                    VALUES ('$last_id','$code','$product_name[$i]','$quantity[$i]', '$price[$i]', '$total[$i]')";

            $sql3 = "UPDATE `inventory` SET `quantity`= `quantity` - '$quantity[$i]' WHERE `barcode` = '$code'";
            
            $sql4 = "INSERT INTO `item_record`(`product`, `barcode`, `delivered_ammount`, `delivered_date`, `po_ID`)
                     VALUES ('$product_name[$i]','$code','$quantity[$i]','$do_date','$last_id')";
                     
			mysqli_query($conn,$sql2);
			mysqli_query($conn,$sql3);
            mysqli_query($conn,$sql4);

			echo "<script>alert('Purchase Order has been created');</script>";
			echo "<script>window.location.assign('../tools/test_purchase_order_list.php');</script>";
		}
		
	}
	 	else{
	 		echo "<script>alert('Failed ');</script>";
		 }
		
	 }
	mysqli_close($conn);
 ?>
