<?php
include 'connect.php';

if(isset($_GET['ID'])){
$ID = (int)$_GET['ID'];
$sql = "DELETE FROM `supplier_list` WHERE ID =".$ID;
$sql1 = " ALTER TABLE `supplier_list` AUTO_INCREMENT =1";
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
   
        # code...
        echo "<script>
	window.location.assign('../tools/supplier_table.php');
	</script>";
    exit;
    
    	// echo "<script>alert('Success delete');</script>";

	echo "<script>
	window.location.assign('../tools/supplier_table.php');
	</script>";
    exit;
} else {
    echo "<script>alert('Cannot delete');</script>";
    echo "<script>window.location.assign('../tools/supplier_table.php);</script>";
}
}



?>