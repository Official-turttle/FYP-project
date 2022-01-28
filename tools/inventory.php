<?php 
  include 'bar.php';
  include '../engine/connect.php';
  include '../engine/restriction.php';

  $sql = "SELECT * FROM `category` WHERE status ='0'";
  $result = $conn -> query($sql);
 ?>
<!DOCTYPE html>
<html>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <!-- <link rel="stylesheet" href="https://maxcdn.boots">  -->
  
  <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.11.3/datatables.min.css"/> -->
 
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.11.3/datatables.min.js"></script> -->

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>  

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<head>

</head>
<body>
	 <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Inventory</h1>
          <!-- Button trigger modal -->
<div style="padding-bottom: 1%">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Product
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      	<div class="form-group row">
      		<form method="POST" action="../engine/add product.php" enctype="multipart/form-data" >

  <div class="form-group" style="padding-left: 2%">
    <label for="inputAddress">Barcode</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="0123456789" name="barcode" required="" value="" data-filter='[0-9|]*' maxlength="13">
  </div>

  <div class="form-row" style="padding-left:2% ">

    <div class="form-group col-md-6">
      <label for="inputEmail4">Product Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="product name" name="name" required="" value="">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Product Category</label>
      <!-- <input type="text" class="form-control" id="inputPassword4" placeholder="type"
      name="category" required="" value=""> -->

      <select class="form-control" name="category">
                        <?php while ($row = $result->fetch_assoc()) {
                          $name=$row['name'];?>
                          <option value="<?php echo $name ?>"><?php echo $name;?></option>
                        <?php } ?>
                      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputSupplier4">Supplier</label>
      <!-- <input type="text" class="form-control" id="inputSupplier" placeholder="Mr Muthu" name="supplier" required="" value=""> -->
      <input oninput="this.value = this.value.toUpperCase()" class="form-control" id="inputSupplier" placeholder="Name" name="supplier" required=""/>
    </div>

    <div class="form-group col-md-6">
      <label for="inputSupplier4">Quantity</label>
      <!-- <input type="text" class="form-control" id="inputSupplier" placeholder="Mr Muthu" name="supplier" required="" value=""> -->
      <input type="text" class="form-control" id="inputAddress" placeholder=" " name="quantity" required="" value="" data-filter='[0-9|]*' maxlength="3">
    </div>

    <div class="form-group col-md-6">
      <label for="inputSupplier4">Racking location</label>
      <!-- <input type="text" class="form-control" id="inputSupplier" placeholder="Mr Muthu" name="supplier" required="" value=""> -->
      <input type="text" class="form-control" id="inputAddress" placeholder=" " name="rack" required="" value="" maxlength="3" oninput="this.value = this.value.toUpperCase()">
    </div>

  </div>
  <div class="form-group" style="padding-left: 2%">
    <label for="inputAddress">Date Received</label>
    <input type="date" class="form-control" id="datepicker" placeholder="dd-mm-yyyy" name="date" required="" data-date-format="dd-mm-yyyy">
  </div>

  <!-- <div class="form-row" style="padding-left: 2%">
  	<div class="form-group col-md-6">
  		<input type="file" name="fileToUpload">
  	</div>
  </div> -->
    	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="register_btn">Insert</button>
      </div>
    </div>
  </div>
</div>
</form>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Inventory</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <table class="table table-bordered" id="do_table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Barcode</th>
      <th scope="col">product Name</th>
      <th scope="col">Date Received</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php

    include '../engine/connect.php';
    $i = 1;
    $j = 2;

    $sql    = "SELECT * FROM inventory";
    $result = $conn -> query($sql);
      while ($row = $result -> fetch_assoc()) {

        $name     = $row['name'];
        $barcode  = $row['barcode'];
        $category = $row['category'];
        $date     = date("d/m/Y",strtotime($row["date"]));
        $supplier = $row['supplier'];
        $quantity = $row['quantity'];
        # code...


        echo"
        <tr>
        <td>  ".$i++."</td>
        <td>  ".$barcode."</td>
        <td>  ".$name."</td>
        <td>  ".$date."</td>
        <td>  ".$quantity."</td>
        <td>  ".$category."</td>
        <td>"."<a  href='product_view.php? ID=".$row["ID"] ."'<span class='material-icons-outlined'></span> View</a>"."</td>";

        "</tr>";
      }
      echo "</table>"

?>


 
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
    "columnDefs":[
      {
        "targets":[0,1,2,3,4,5,6],
        "orderable":true,
      },
    ],
  });
  
} );  

$('#inputSupplier').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch_supplier.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(supplier_data){
     result($.map(supplier_data, function(supplier){
      return supplier;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });


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


$(function(){
		$("#datepicker").datepicker({
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'dd/mm/yyyy'
		}).datepicker('update', new Date());
	});





</script>