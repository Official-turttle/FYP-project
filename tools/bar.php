<?php  
  
  include '../engine/connect.php';
  include '../engine/restriction.php';

?>
<!DOCTYPE html>
<html>
<head>

    <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>

    <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <div class="sidebar-brand-text mx-3">Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="supplier_table.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i> -->
          <span>Supplier</span></a>


          <li class="nav-item">
        <a class="nav-link" href="category.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>Category</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>Inventory</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="delivery_order.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>Deliver Order Table</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="test_purchase_order_list.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>Purchase Order Table</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="masterlist.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>DO Masterlist</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="po_masterlist.php">
          <!-- <i class="fas fa-fw fa-chart-area"></i>  its same with sales order if i want i will get it from here-->
          <span>PO Masterlist</span></a>
      </li>
   


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     <!--  <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <!-- <i class="fas fa-fw fa-folder"></i> -->
          <span>Craete stuff</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stuff:</h6>
            <!-- <a class="collapse-item" href="supplier_add.php">Add Supplier
            </a> -->
           <!--  <a class="collapse-item" href="register.html">Add Product</a> -->
            <a class="collapse-item" href="test_purchase_order.php">Create Purchase Order
            </a>
            <!-- <a class="collapse-item" href="test_purchase_order_list.php">Purchase Order table
            </a> -->
            <a class="collapse-item" href="test_delivery_order.php">Create Delivery Order
            </a>
            <!-- <a class="collapse-item" href="delivery_order.php">Delivery Order table
            </a> -->

            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>

      <!-- Divider -->
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-900 big">
                  <?php echo $_SESSION["username"]; ?> 
                   
                  </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  logout
                  
                </a>
              </div>
            </li>

          </ul>

        </nav>
<!--         <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total Inventory Price</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT COUNT('price') FROM inventory";echo "$sql";
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bye !</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../engine/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!-- Javascript -->
   <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>


</body>
</html>