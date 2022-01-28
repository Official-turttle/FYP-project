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

</head>
<body>

   <div class="container-fluid">

          <!-- Page Heading -->
          <h2>Category</h2>

          <div align="right">

          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Category
</button> </div><br>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-group row">
          <form method="POST" action="../engine/category_insert.php" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Type</label>
      <!-- <input type="text" class="form-control" id="type" placeholder="GA,GB" name="type" required="" value=""> -->
      <input oninput="this.value = this.value.toUpperCase()" class="form-control" id="name" placeholder="GA,GB" name="name" required=""/>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Description</label>
      <input type="text" class="form-control" id="description" placeholder="description"
      name="description" value="">
    </div>
</div>
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
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Item type</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
  <table class="table table-bordered" id="do_table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Type</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


    <?php
              include '../engine/connect.php';
              $i=1;

          // $sql = "SELECT * FROM `itemtype` ORDER BY `itemtype`.`ID` DESC";
          $sql = "SELECT * FROM `category` WHERE 1 ORDER BY `category`.`ID` ASC";
          $result = $conn->query($sql);
             while ($row = $result-> fetch_assoc()) {

              if ($row["status"] == 0) {
                $status = "Active";
                # code...
              }
              else {
                $status = "Inactive";
              }

             if ($row["status"] == 0) {
                $action = "<td>

                <div inline>

                <button class='btn btn-danger' style='align:left'>

                <a class='text-white' style='text-decoration: none;' href='../engine/category_delete.php?ID=".$row["ID"]."'>Inactive</a>
                </button>

                </td></div>";
                # code...
              }
              elseif ($row["status"] == 1) {
                $action = "<td>

                <div inline>

                
                <button class='btn btn-primary' style='align:left'>
                
                <a class='text-white' style='text-decoration: none;' href='category.php?ID=".$row["ID"]."'>Activate</a></button></td> </div>";
                # code...
              }
            echo "<tr>
            <td>".$i++."</td>
            <td>".$row["name"]."</td>
            <td>".$row["description"]."</td>
            <td>".$status."</td>
                  $action
           


            </tr>";
          }
          echo "</table>";
          

          ?>

  </tbody>
</table>            
  </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>

  



</body>
</html>

<?php
include '../engine/connect.php';

if(isset($_GET['ID'])){
$ID = (int)$_GET['ID'];
$sql ="UPDATE `category` SET `status` = 0 WHERE `ID`= '$ID'";
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
      // echo "<script>alert('Success delete');</script>";

  echo "<script>
  window.location.assign('category.php');</script>";
    exit;
} else {
    echo "<script>alert('Cannot ACtive');</script>";
    echo "<script>window.location.assign('category.php);</script>";
}
}

?>

<script>

    $(document).ready( function () {
    $('#do_table').DataTable({

    "bInfo" : false,
    "order":[],
    "columnDefs":[
      {
        "targets":[0,1,2],
        "orderable":false,
      },
    ],
  });
  
} );
</script>


