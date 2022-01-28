<?php
  include 'bar.php';
  include '../engine/connect.php';
  include '../engine/restriction.php';
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>

	 <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">SUPLLIERS</h1>
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Supplier
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      	<div class="form-group">
      		<form method="POST" action="../engine/add_supplier.php" id="myForm" class="finalpost" data-flag="0">
  
    <div class="form-group">
      <label for="inputEmail4">Company Name</label>

      <input oninput="this.value = this.value.toUpperCase()" class="form-control" id="s_name" placeholder="Name" name="supplier_name" required="" />
    </div>

    <!-- <div class="form-group col-md-6">
      <label for="inputPassword4">Supplier ID</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Supplier ID"
      name="supplier_ID" required="" value="">
    </div> -->
  
  <div class="form-group">
    <label for="inputAddress">Phone Number</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="0123456789" name="contact_number" required="" value="" data-filter='[0-9|+|-]*' maxlength="13">
  </div>
  
  <div class="form-group">
    <label for="inputAddress2">Contact Person</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="John" name="contact_person" required="" value="">
  </div>

    <div class="form-group">
      <label for="inputCity">Email</label>
      <input type="email" class="form-control" id="inputCity" placeholder="ABC@gmail.com" name="email" required="" value="">
    </div>
    	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="register_btn" id="btn-submit">Insert</button>
      </div>
    </div>
  </div>
</div>
</form>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Supplier List</h6>
              <div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="myTable" >
                        <div>
                        <!-- <input type="text" id="source"  placeholder="Search Source">
                        <input type="text" id="destination"  placeholder="Search destination">
                        <input type="text" id="date"  placeholder="Search date"> -->
                        </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Supplier</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>contact person</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                <tbody>
                                <?php
                                  include '../engine/connect.php';
                                    $i = 1;
                                    
                                    $sql = "SELECT * FROM supplier_list";

                                    $result = $conn -> query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                      
                                    $supplier_name     = $row['supplier_name'];
                                    $contact_number    = $row['contact_number'];
                                    $email             = $row['email']; 
                                    $contact_person    = $row['contact_person'];                            

                                      if ($row["status"] == 1) {
                                            $shake = "Still trading";                
                                            }
                                        elseif ($row["status"] == 0) {
                                            $shake = "No More Trading";
                                            }
    
                                        echo "
                                        <tr>
                                        <td>    ".$i++."</td> 
                                        <td>    ".$supplier_name."</td>
                                        <td>    ".$contact_number."</td>
                                        <td>    ".$email."</td>
                                        <td>    ".$contact_person."</td>
                                        <td>    ".$shake."</td>
                                        <td>"."<a  href='../engine/delete.php? ID=".$row["ID"] ."'<span class='material-icons-outlined'></span> Delete</a>"."</td>";

                                        
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
  </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<script>

$(document).ready( function () {
  var table =  $('#myTable').DataTable({

        
		"bInfo" : false,
        "showNEntries":true,
		"order":[],
		"columnDefs":[
			{
				"targets":[0,1,2,3,4],
				"orderable":true,
                
            
                
			},
		],
         language: {
                search: "_INPUT_",
        searchPlaceholder: "Search records"
    }
	});
    
  
    //$('#date').datepicker({"dateFormat":"d/m/yy"});


    
	
} );

let inputs = document.querySelectorAll('input[data-filter]');

for (let input of inputs) {
  let state = {
    value: input.value,
    start: input.selectionStart,
    end: input.selectionEnd,
    pattern: RegExp('^' + input.dataset.filter + '$')
  };
  
  input.addEventListener('input', event => {
    if (state.pattern.test(input.value)) {
      state.value = input.value;
    } else {
      input.value = state.value;
      input.setSelectionRange(state.start, state.end);
    }
  });

  input.addEventListener('keydown', event => {
    state.start = input.selectionStart;
    state.end = input.selectionEnd;
  });
}

</script>