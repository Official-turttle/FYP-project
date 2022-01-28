<?php

include 'connect.php';

if(isset($_GET['ID'])&&isset($_POST['received'])&&isset($_POST['received_btn'])&&isset($_POST['item_status'])){

  
   $today           =   date("Y-m-d");
   $received        =   $_POST['received'];
   $item_status     =   $_POST['item_status'];
   $DO_ID           =   $_GET['ID'];



    if (is_array($_POST['received'])) {

    for($i = 0; $i < count($received); $i++){

        $sql ="UPDATE `delivery_order_detail` SET `item_status`= '$item_status[$i]' WHERE `barcode`= '$received[$i]' AND `DO_ID`= '$DO_ID'";
         mysqli_query($conn,$sql);

         

        $sql2 ="UPDATE `delivery_order` SET `recieved_date`= '$today',`status` = 2 WHERE `ID`= '$DO_ID'";
        mysqli_query($conn,$sql2);

        // $sql3 = "UPDATE `inventory` SET `quantity`= `quantity` + '$quantity' WHERE `barcode` = '$received[$i]'";
        // mysqli_query($conn,$sql3);

        // echo "<script>console.log('$sql')</script>";
   //your sql
}

  // echo "<script>alert($ID)</script>";
  $sql = "SELECT * FROM delivery_order_detail WHERE DO_ID='$DO_ID'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){

      $barcode        = $row['barcode'];
      $quantity       = $row['quantity'];
      
  
      $sql="UPDATE inventory SET quantity = quantity + '$quantity' WHERE barcode='$barcode'";
      mysqli_query($conn,$sql);

      
      
    
  }



   

        echo"<script>window.location.href = '../tools/masterlist.php';</script>";
       
}
}

?>