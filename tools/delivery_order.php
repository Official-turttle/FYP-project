<?php 
	include 'bar.php';

 ?>
<!DOCTYPE html>
<html>
<head>

		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>	

		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
				integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
				crossorigin="anonymous"></script>
		 
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

	<title>
		
	</title>
</head>
<body>
	<div class="container-fluid">
		<h1>List Of Delivery Order</h1>
		
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="do_table" >
							<thead>
								<tr>
									<th>
										#
									</th>
									<th width="1%">
										DO Number
									</th>
									<th>
                                        Supplier
									</th>
									<th>
										DO date
									</th>
									<th>
										Status
									</th>
									<th width="15%">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								 <?php 

                                 $i=0;
								//  include 'connect.php';
	
                                 $sql = "SELECT * FROM `delivery_order` WHERE `status` = 1 ORDER BY `delivery_order`.`ID` DESC";
								//  $quantity = "SELECT COUNT(`product`) AS total FROM `delivery_order_detail` WHERE `DID`";
								 $result = $conn->query($sql);
								//  $result1 = $conn->query($quantity);
								//  $row1 = $result1 -> fetch_array(MYSQLI_ASSOC);
                      			// 	$a = $row1;
								 while ($row = $result->fetch_assoc()) {

								 	echo "<tr>
								 	<td>".++$i."</td>
								 	<td>".$row["ID"]."</td>
								 	<td>".$row["supplier"]."</td>
									<td>".date("d/m/Y",strtotime($row["do_date"]))."</td>
									<td>";
									if ($row["status"] == 0) {
                                            echo "Preparing";                
                                            }
                                        elseif ($row["status"] == 1) {
                                            echo "preparing";
                                            }
                                        elseif ($row["status"] == 2) {
                                            echo "Completed";
                                            # code...
                                        }
                                    echo "</td>
									<td><a class='text-white btn btn-primary' style='text-decoration: none;' href='delivery_order_view.php?ID=".$row["ID"]."'>View</a>
									</td>";
								 	echo "</tr>";
								 	# code...
								 }
								 echo "</table>";
								 ?>
							</tbody>
							
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</body>
</html>

<script>

$(document).ready( function () {
    $('#do_table').DataTable({

		"bInfo" : false,
		"order":[],
		"columnDefs":[
			{
				"targets":[0,2,3,4,5],
				"orderable":false,
			},
		],
	});
	
} );
</script>