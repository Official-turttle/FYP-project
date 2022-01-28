<?php
    include 'bar.php';
?>

<html>
<head>
</head>

<body>

    <div class="container-fluid">

      <h2>Receive Order</h2><br>
      

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                Delivery Order Number
                                </th>
                                <th>
                                Delivery Order Date
                                </th>
                                <th>
                                supplier
                                </th>
                                <th>
                                Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../engine/connect.php';
                            if(isset($_GET['ID'])){
                                $ID = $_GET['ID'];

                                $sql = "SELECT * FROM delivery_order WHERE ID=".$ID;
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()){
                                    $ID          = $row['ID'];
                                    $do_date     = date("d/m/Y",strtotime($row["do_date"]));
                                    $supplier    = $row['supplier'];


                                      if ($row["status"] == 1) {
                                            $shake = "in process";                
                                            }
                                        elseif ($row["status"] == 2) {
                                            $shake = "Completed";
                                            # code...
                                        }


                                    
                                }
                                    echo"
                                    <tr>
                                    <td>".$ID."</td>
                                    <td>".$do_date."</td>
                                    <td>".$supplier."</td>
                                    <td>".$shake."</td>
                                    
                                    
                                    </tr>";
                                 // echo $sql;

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
            <?php
            $i =1;
            include '../engine/connect.php';
            
            if(isset($_GET['ID'])){

                $ID =(int) $_GET['ID'];

                $sql = "SELECT * FROM delivery_order INNER JOIN delivery_order_detail 
                        ON delivery_order_detail.DO_ID = delivery_order.ID 
                        WHERE delivery_order_detail.DO_ID=".$ID;    

                echo"
                <table class='table table-bordered'>
        <form action='../engine/delivery_order_receive.php?ID=".$ID."' method='POST'>
         <thead>
          <tr>
           <th width = 1%>
            #
           </th>
           <th width=10%>
           Tick Box
           </th>
           <th>
           Item Code
           </th>
           <th>
           Product Name
           </th>
           <th>
           quantity
           </th>
           <th>
           Item Status
           </th>
           <th>
            status
           </th>
          </tr>
         </thead>
         <tbody>
                ";
                
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    $barcode     = $row['barcode'];
                    $product     = $row['product'];
                    $quantity    = $row['quantity'];

                    //to display the item status
                    for ($k=1; $k <2 ; $k++) { 

                        if ($row["item_status"] >= $k) {
                        
                            $shake_your_didi = "Complete";
                            # code...
                        }
                        else {
                            $shake_your_didi = "Incomplete";
                        }
                        # code...
                    }
                    // end

                    //start of display the drop down choice
                    
                     if ($row["item_status"] == 0) {
                         $sout = "Pending";                
                         }
                     elseif ($row["item_status"] == 1) {
                         $sout = "Good";
                        }
                    elseif ($row["item_status"] == 2) {
                        $sout = "Damaged";
                        # code...
                    }
                    elseif ($row["item_status"] == 3) {
                        $sout = "Missing";
                        # code...
                    }

                    //end
                    
                //for Check box
                    if ($row["item_status"] == 0) {
                    $shake1 ="<td><input type='checkbox'  name='received[]' value='".$barcode."'/>";
                    # code...
                }
                else {
                    $shake1 ="<td><input type='checkbox'  name='received[]' value='".$barcode."' disabled/>";
                }
                // End for Check box

                // disabling the drop down and enable it
                for ($m=1; $m <2 ; $m++) { 
                    if ($row["item_status"] >= $m) {

                       $sout= "<td disabled><select class='form-control' name='item_status[]' disabled>
                                <option>".$sout."</option>
                                <option value='1'>Good</option>
                                <option value='2'>Damaged</option>
                                <option value='3'>Missing</option>
                                <option value='4'>Wrong Amount</option>
                                </select></td>";
                        # code...
                    }
                    else {
                        $sout="<td><select class='form-control' name='item_status[]'>
                                
                                <option> </option>
                                <option value='1'>Good</option>
                                <option value='2'>Damaged</option>
                                <option value='3'>Missing</option>
                                <option value='4'>Wrong Amount</option>
                                </select></td>";
                    }
                    # code...
                }

                //end of it 
                

                echo "
                <tr>
                <td>    ".$i++."            </td> 
                        ".$shake1."
                <td>    ".$barcode."        </td>
                <td>    ".$product."        </td>
                <td>    ".$quantity."       </td>
                        ".$sout."
                <td>    ".$shake_your_didi."</td>";
                
                
                "</tr>";

                
                }
                // echo "$sql";
                

                echo "</table>";

            }
            ?>
                
               <button type="submit" class="btn btn-primary" name="received_btn">Received Item</button>
                   

         </tbody>
         </form>
        </table>
       </div>
      </div>
     </div>
    </div>
</body>
</html>



<script type="text/javascript">
    $stat=document.getElementById("button").innerText;
    if ($stat=="Completed") {
        document.getElementById("received").style.display="none";
    }
</script>
