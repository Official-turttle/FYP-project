<?php

include 'connect.php';

    echo"<script>console.log('ddas')</script>";
    echo"<script>console.log(".isset($_GET['ID']).")</script>";
    echo"<script>console.log(".isset($_POST['rack']).")</script>";
    echo"<script>console.log(".isset($_POST['received_btn']).")</script>";
    echo"<script>console.log(".isset($_POST['quanti']).")</script>";
    echo"<script>console.log(".isset($_POST['descrition']).")</script>";

if(isset($_GET['ID'])&&isset($_POST['received_btn'])&&isset($_POST['rack'])&&isset($_POST['quanti'])&&isset($_POST['descrition'])){

  
   $today           =   date("Y-m-d");
   $rack            =   $_POST['rack'];
   $quantity        =   $_POST['quanti'];
   $desc            =   $_POST['descrition'];
   $ID              =   $_GET['ID'];



    

        $sql ="UPDATE `inventory` SET `rack`= '$rack' , `quantity` = '$quantity' WHERE `ID`= '$ID'";
         mysqli_query($conn,$sql);

         


  // echo "<script>alert($ID)</script>";
  $sql1 = "SELECT * FROM inventory WHERE ID='$ID'";
  $result = $conn->query($sql1);
  while($row = $result->fetch_assoc()){

      $barcode        = $row['barcode'];
      $quantity       = $row['quantity'];
      $product        = $row['name'];
      
  
      $sql2="INSERT INTO `item_record`(`stockTake_date`, `counted_quantity`, `description`,`barcode`,`product`)
             VALUES ('$today','$quantity','$desc','$barcode','$product')";
      mysqli_query($conn,$sql2);

      
      
    
  }
}
else {
    echo"Help mem";
}



   

        echo"<script>window.location.href = '../tools/product_view.php?ID=".$ID."';</script>";
  

?>