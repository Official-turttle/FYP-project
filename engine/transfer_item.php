<?php
    require "connect.php";
    if(isset($_GET['ID'])){ // get value from database via ID

        $ID = $_GET['ID'];
        // echo "<script>alert($ID)</script>";
        $sql = "SELECT * FROM purchase_order_detail WHERE po_ID='$ID'";
        $result = $conn->query($sql);
        $do_date = date("Y-m-d");
        while($row = $result->fetch_assoc()){

            $product_name   = $row['product'];
            $quantity       = $row['quantity'];
            
            $po_ID = $row['po_ID'];
        //  $result1 = $conn->query("SELECT ID FROM inventory WHERE name =".$product_name);
        //  if(result1.length>0)
            // $sql="UPDATE inventory SET quantity = quantity + '$quantity' WHERE name='$product_name'";
            //echo($product_name);
            // mysqli_query($conn,$sql);

            $sql="UPDATE purchase_order SET `status` = '2', `completation_date` = '$do_date'  WHERE ID =".$ID;
            mysqli_query($conn,$sql);
            
            
            // echo "<script>alert('product Updated')</script>";
        }

        echo "<script>window.location.assign('../tools/po_masterlist.php');</script>";

    }
?>

