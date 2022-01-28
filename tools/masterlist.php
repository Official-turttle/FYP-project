<?php

include "bar.php";

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masterlist</title>

    
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>	

		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
				integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
				crossorigin="anonymous"></script>
		 
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        



</head>
<body>

<div class="container-fluid">
		<h2>Deliver Order Master List</h2>
		
		<div class="card shadow mb-4">
             <a href="../PDF_files/do_masterlist_PDF.php"><i style="margin-right: 0.2em; color: #000000; font-size:2rem; " class="bi bi-file-pdf  "></i> <b>PDF</b></a>
			<div class="card-header py-3">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="do_table" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DO Date</th>
                                    <th>DO ID</th>
                                    <th>Item Code</th>
                                    <th>Product Name</th>
                                    <th>Completion Status</th>
                                    <th>Item Condition</th>
                                    <th>Receive Date</th>
                                </tr>
                                <tbody>
                                <?php
                                    include '../engine/connect.php';
                                    $i = 1;
                                    
                                    $sql = "SELECT *, delivery_order.ID 
                                            FROM delivery_order 
                                            INNER JOIN delivery_order_detail
                                            ON delivery_order.ID = delivery_order_detail.DO_ID
                                            ORDER BY delivery_order.ID
                                            DESC";


                                    


                                    $result = $conn -> query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        
                                    // $id          = $row['ID'];  
                                    $DO_ID       = $row['DO_ID'];
                                    $do_date     = date("d/m/Y",strtotime($row["do_date"]));
                                    $supplier    = $row['supplier'];
                                    $barcode     = $row['barcode'];
                                    $product     = $row['product']; 
                                    $quantity    = $row['quantity'];




                                

                                      if ($row["status"] == 1) {
                                            $shake = "Preparing";                
                                            }
                                        elseif ($row["status"] == 2) {
                                            $shake = "Completed";
                                            # code...
                                        }

                                    

                                        for ($k=0; $k <1 ; $k++) { 

                                            if ($row["item_status"] >= $k) {
                                            
                                                $shake_your_didi = "Complete";
                                                # code...
                                            }
                                            else {
                                                $shake_your_didi = "Incomplete";
                                            }
                        
                                        }

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
                                        elseif ($row["item_status"] == 4) {
                                            $sout = "Wrong Amount";
                                            # code...
                                        }

                                         //end

                                           if ($row["recieved_date"] != null) {
				                        	$receive_date = date("d/m/Y",strtotime($row["recieved_date"]));
                                                } else {
                                                $receive_date = "No Receive Date";
                                                };

                                            if ($row["do_date"] != null) {
                                                $do_date = date("d/m/Y",strtotime($row["do_date"]));
                                                    } else {
                                                    $do_date = "No Date";
                                                    };
                        

                                            

                                        echo "
                                        <tr>
                                        <td>    ".$i++."</td> 
                                        <td>    ".$do_date."</td>
                                        <td>    ".$DO_ID."</td>
                                        <td>    ".$barcode."</td>
                                        <td>    ".$product."</td>
                                        <td>    ".$shake."</td>
                                        <td>    ".$sout."</td>  
                                        <td>    ".$receive_date."</td>";
                                        
                                        
                                        "</tr>";
                                         

                                    }
                                    echo "</table>";
                                 ?>
                                </tbody>
                            </thead> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
<script>

$(document).ready( function () {
  var table =  $('#do_table').DataTable({

        
		"bInfo" : false,
        "showNEntries":true,
		"order":[],
		"columnDefs":[
			{
				"targets":[0,1,2,3,4,5,6],
				"orderable":true,
                
            
                
			},
		],
         language: {
                search: "_INPUT_",
        searchPlaceholder: "Search records"
    }
	});
    
    $('#source').on('change',function(){

        table
        .column(8)
        .search(this.value)
        .draw();
    })
    $('#destination').on('change',function(){

        table
        .column(9)
        .search(this.value)
        .draw();

    })
    //$('#date').datepicker({"dateFormat":"d/m/yy"});
    $('#date').on('change',function(){

        table
        .column(1)
        .search(this.value)
        .draw();

    })

    
	
} );

</script>