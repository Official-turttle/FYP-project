<?php
include 'connect.php';

if(isset($_GET['ID'])){
$ID = (int)$_GET['ID'];
$sql = "DELETE FROM `inventory` WHERE ID =".$ID;
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    	// echo "<script>alert('Success delete');</script>";

	echo "<script>
	window.location.assign('../tools/inventory.php');
	alert('Deleted Successfully')</script>";
    exit;
} else {
    echo "<script>alert('Cannot delete');</script>";
    echo "<script>window.location.assign('../tools/inventory.php);</script>";
}
}



?>