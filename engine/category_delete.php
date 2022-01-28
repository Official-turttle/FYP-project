<?php
include 'connect.php';

if(isset($_GET['ID'])){
$ID = (int)$_GET['ID'];
$sql ="UPDATE `category` SET `status` = 1 WHERE `ID`= '$ID'";
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    	// echo "<script>alert('Success delete');</script>";

	echo "<script>
	window.location.assign('../tools/category.php');</script>";
    exit;
} else {
    echo "<script>alert('Cannot delete');</script>";
    echo "<script>window.location.assign('../tools/category.php);</script>";
}
}



?>