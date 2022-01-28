<?php
    include 'bar.php';
?>

<html>



 <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
 <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<head>
    
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead>
                        <!-- <a href="stock_take.php? ID".$row['ID']"><i style="margin-right: 0.2em; color: #000000; font-size:2rem; " class="bi bi-clipboard-data"></i><b>Stock Take</b></a> -->

                            <tr>
                            <th>
                                Product Name
                                </th>
                                <th>
                                Barcode
                                </th>
                                <th>
                                Category
                                </th>
                                <th>
                                Supplier
                                </th>
                                <th>
                                    Rack location
                                </th>
                                <th>
                                   Total Quantity
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../engine/connect.php';
                            if(isset($_GET['ID'])){
                                $ID = (int)$_GET['ID'];

                                $sql = "SELECT * FROM inventory WHERE ID=".$ID;
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()){
                                    $product     = $row['name'];
                                    $barcode     = $row['barcode'];
                                    $category    = $row['category'];
                                    $supplier    = $row['supplier']; 
                                    $rack        = $row['rack'];  
                                    $quantity    = $row['quantity'];
                                }
                                echo"
                                <tr>
                                <td>".$product."</td>
                                <td>".$barcode."</td>
                                <td>".$category."</td>
                                <td>".$supplier."</td>
                                <td>".$rack."</td>
                                <td>".$quantity."</td>
                                <td>"."<a href='stock_take.php? ID=".$ID."'<span class='bi bi-clipboard-data' style='font-size:1rem;'>Stock Take</span>"."</td>
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
        <table class="table table-bordered" id="do_table">
         <thead>
          <tr>
           <th>
            #
           </th>
           <th>
           
           Quantity In
           </th>
           <th>
           Item In Date
           </th>
           <th>
           Quantity Out
           </th>
           <th>
            Item out Date
           </th>
           <th>
              Delivery order number (In)
           </th>
           <th>
               Purchase order number (Out)
           </th>
           <th>
               Stock Take Date
           </th>
           <th>
               Counted Stock
           </th>
           <th>
               Remarks
           </th>
          </tr>
         </thead>
         <tbody>
            <?php
            $i =1;
            include '../engine/connect.php';
        
            if(isset($_GET['ID'])){

                $ID = (int)$_GET['ID'];

                $sql = "SELECT * FROM item_record WHERE barcode=".$barcode;
                
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){

                    $product_name       = $row['product'];
                    $barcode            = $row['barcode'];
                    // $recieved_ammount   = $row['recieved_ammount'];
                    // $delivered_ammount  = $row['delivered_ammount'];
                    // $ct_quantity        = $row['counted_quantity'];
                    $desc               = $row['description'];

                    if ($row["po_ID"] != null) { //po number display
                        $po_ID = $row['po_ID'];
                        # code...
                    } else{
                        $po_ID = "No order number";
                    }

                    if ($row["do_ID"] != null) { //do number display
                        $do_ID = $row['do_ID'];
                        # code...
                    } else{
                        $do_ID = "No order number";
                    }

                    if ($row["recieved_ammount"] != null) { // received ammount display
                        $recieved_ammount = $row['recieved_ammount'];
                        # code...
                    } else{
                        $recieved_ammount = "Nothing";
                    }

                    if ($row["delivered_ammount"] != null) { // Delivered ammount display
                        $delivered_ammount = $row['delivered_ammount'];
                        # code...
                    } else{
                        $delivered_ammount = "Nothing";
                    }

                    if ($row["counted_quantity"] != null) {  // counted quantity display
                        $ct_quantity = $row['counted_quantity'];
                        # code...
                    } else{
                        $ct_quantity = "Not counted";
                    }

                    
                    


                    if ($row["recieved_date"] != null) {  //date display 
                        $received_date = date("d/m/Y",strtotime($row["recieved_date"]));
                            } else {
                            $received_date = "No date";
                            };

                        if ($row["delivered_date"] != null) { //date display 
                            $pickup_date= date("d/m/Y",strtotime($row["delivered_date"]));
                        }        else {
                            $pickup_date = "No date";     
                        };

                        if ($row["stockTake_date"] != null) { //date display 
                            $st_date= date("d/m/Y",strtotime($row["stockTake_date"]));
                        }        else {
                            $st_date = "No date";     
                        };

                    echo "
                <tr>
                <td>".$i++."</td>
                <td>".$recieved_ammount."</td>
                <td>".$received_date."</td>
                <td>".$delivered_ammount."</td>
                <td>".$pickup_date."</td>
                <td>".$do_ID."</td>
                <td>".$po_ID."</td>
                <td>".$st_date."</td>
                <td>".$ct_quantity."</td>
                <td>".$desc."</td>
                

                </tr>";
                }
                
                

                echo "</table>";

            }
            ?>
         </tbody>
        </table>
       </div>
      </div>
      
     </div>
    </div>
</body>
</html>

<script>

$(document).ready( function () {
    $('#do_table').DataTable({

    "bInfo" : false,
    "order":[],
    "pageLength" : 5,
    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
    "columnDefs":[
      {
        "targets":[0,1,2,3,4],
        "orderable":true,
        
      },
    ],
  });
  
} );  
</script>