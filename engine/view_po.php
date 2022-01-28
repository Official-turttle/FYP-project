<?php
    include '../tools/bar.php';
?>

<html>
<head>
    
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                Purchase Order Number
                                </th>
                                <th>
                                Purchase Order Date
                                </th>
                                <th>
                                SUpplier
                                </th>
                                <th>
                                Status 
                                </th>
                                <th>
                                Grand Total 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';
                            if(isset($_GET['ID'])){
                                $ID = (int)$_GET['ID'];

                                $sql = "SELECT * FROM purchase_order WHERE ID=".$ID;
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()){
                                    $po_ID = $row['ID'];
                                    $po_date = date("d/m/Y",strtotime($row["po_date"]));
                                    $supplier = $row['supplier'];
                                    // $status = $row['status']; 
                                    $grand_total = $row['total'];  

                                    if ($row['status'] == 2) {
                                        $stat = "Paid";
                                        # code...
                                    }
                                    else {
                                        $stat = "Pending payment";
                                        # code...
                                    }
                                }
                                echo"
                                <tr>
                                <td>".$po_ID."</td>
                                <td>".$po_date."</td>
                                <td>".$supplier."</td>
                                <td>".$stat."</td>
                                <td>"."RM"." ".$grand_total."</td>
                                </tr>";

                            }
                            echo"</table>";
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
        <table class="table table-bordered">
         <thead>
          <tr>
           <th>
            #
           </th>
           <th>
           Product Name
           </th>
           <th>
           Quantity
           </th>
           <th>
           Price
           </th>
          </tr>
         </thead>
         <tbody>
            <?php
            $i =1;
            include 'connect.php';
        
            if(isset($_GET['ID'])){

                $ID = (int)$_GET['ID'];

                $sql = "SELECT * FROM purchase_order 
                INNER JOIN purchase_order_detail ON purchase_order_detail.po_ID = purchase_order.ID WHERE purchase_order_detail.po_ID=".$ID;
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){

                    $product_name = $row['product'];
                    $quantity = $row['quantity'];
                    $price = $row['price'];
                    $status = $row['status'];

                    echo "
                <tr>
                <td>".$i++."</td>
                <td>".$product_name."</td>
                <td>".$quantity."</td>
                <td>"."RM"." ".$price."</td>
                </tr>";
                }
                
                

                echo "</table>";

            }
            ?>
         </tbody>
        </table>
       </div>
        <div class="modal-footer" >
        <?php
            if($status == '2'){
        ?>
         <a href="../engine/transfer_item.php?ID=<?php echo $ID; ?>"><button class="btn btn-primary" disabled>Item received</button></a>
         <?php
            }
            else{
         ?>
         <a href="../engine/transfer_item.php?ID=<?php echo $ID; ?>"><button class="btn btn-primary">Paid</button></a>
         <?php
            }
         ?>
      </div>
      </div>
      
     </div>
    </div>
</body>
</html>