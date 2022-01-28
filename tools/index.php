<?php
  include 'bar.php';
  include '../engine/connect.php';
  include '../engine/restriction.php';
  $a=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Incomplete delivery order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      
                      $sql = "SELECT COUNT(ID) AS total FROM delivery_order WHERE status =0 OR status =1";
                      $result = $conn->query($sql);
                      $row = $result -> fetch_array(MYSQLI_ASSOC);
                      $a = $row;
                      echo ($row['total']);
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-product-hunt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total incomplete Purchase Order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      $sql = "SELECT COUNT(ID) AS total FROM purchase_order WHERE status =0 OR status =1";

                      $result = $conn->query($sql);
                      $row = $result -> fetch_array(MYSQLI_ASSOC);
					            $a = $row;
                      echo ($row['total']);
                          // echo "place holder";
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total numbers of Delivery order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      $sql = "SELECT COUNT(ID) AS total FROM delivery_order WHERE status =1 OR 2
                      ";
                      $result = $conn->query($sql);
                      $row = $result -> fetch_array(MYSQLI_ASSOC);
                      $a = $row;
                      echo ($row['total']);
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total numbers of Purchase order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      $sql = "SELECT COUNT(ID) AS total FROM purchase_order WHERE status = 2 OR status =1";

                      $result = $conn->query($sql);
                      $row = $result -> fetch_array(MYSQLI_ASSOC);
				          	  $a = $row;
                      echo ($row['total']);
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-s-3 col-md-6 mb-4">
								<div class="h5 mb-0 font-weight-bold text-gray-800">
                <div class="card-header py-3">
										 <div class="table-responsive">
                    <table class="table table-bordered">
						<thead>
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Incomplete Delivery Order</h6>
            </div> -->
						<tr>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Incomplete Delivery Order</h6>
            </div>
							<th>DO Number</th>
							<th>Age</th>
						</tr>
						</thead>
						<tbody>


									
									<?php 
									 $sql = "SELECT * , NOW( ) AS today, DATEDIFF( NOW( ) , do_date ) AS age
											 FROM delivery_order
											 WHERE STATUS = '0'
											 OR STATUS = '1'";
											 
											 $result = $conn->query($sql);
											 while($row = $result -> fetch_array()){
												   $age    =  $row['age'];
												   $DO_ID  =  $row['ID'];
												   
												   echo "<tr>
												   		 <td>	 ".$DO_ID."			 </td>
														 <td>    ".$age." Days           </td> 
															</tr>";
												}

												echo "</table>";
																				
									 ?>
									 </tbody>
								
									<!-- <hr class="sidebar-divider my-0" /> -->
								</table>
											</div>
								</div>
                </div>
            </div>
            <div class="col-s-3 col-md-6 mb-4">
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <div class="card-header py-3">
										 <div class="table-responsive">
                    <table class="table table-bordered">
						<thead>
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Incomplete Delivery Order</h6>
            </div> -->
						<tr>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Incomplete Purchase Order</h6>
            </div>
							<th>DO Number</th>
							<th>Age</th>
						</tr>
						</thead>
						<tbody>


									
									<?php 
									 $sql = "SELECT * , NOW( ) AS today, DATEDIFF( NOW( ) , po_date ) AS age
											 FROM purchase_order
											 WHERE STATUS = '0'
											 OR STATUS = '1'";
											 
											 $result = $conn->query($sql);
											 while($row = $result -> fetch_array()){
												   $age    =  $row['age'];
												   $DO_ID  =  $row['ID'];
												   
												   echo "<tr>
												   		 <td>	 ".$DO_ID."			 </td>
														 <td>    ".$age." Days           </td> 
															</tr>";
												}

												echo "</table>";
																				
									 ?>
									 </tbody>
								
									<!-- <hr class="sidebar-divider my-0" /> -->
								</table>
											</div>
								</div>
                </div>
            </div>

		</div>
	</div>

	<?php
	//  $sql = "SELECT SUM(price*quantity) AS total FROM inventory";
	//  $result = $conn->query($sql);
	//  $row = $result -> fetch_array(MYSQLI_ASSOC);
 
 	// $dataPoints = array( 
	//  array("y" => 14,"label" => "Total Product" ),
	//  array("y" => 98.00,"label" => "total Sold Ammount"),
	//  array("y" => 7,"label" => "Total Member" ),
	//  array("y" => 4320,"label" => "Total Value of Inventory" )
 	// );
  
		?>
		
		<body>
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</body>
		</html> 

		<script>
		
		</script>