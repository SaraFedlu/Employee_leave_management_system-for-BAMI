<?php
session_start();
if ($_SESSION['user_type'] !== 'sup') { ?>
  <script>
    window.location.href = "http://localhost/myproject/index.php";
  </script>
<?php }
require_once "../connection/control.php";
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php
  include('head.php');
  ?>
  <!-- Custom CSS -->
  <link href="../public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php
    include('superadmin_header.php');
    ?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php
    include('superadmin_sidebar.php');
    ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">All Employees</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="superadminhome.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Employees
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>
                      <center> Action</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($employees as $employee) {
                  ?>
                    <tr>
                      <td><?php echo $employee['idno']; ?></td>
                      <td><?php echo $employee['firstname'] . " " . $employee['lastname'];
                          if ($employee['user_type'] == 'admin') {
                            echo ' (Admin)';
                          } ?></td>
                      <td><?php echo $employee['department']; ?></td>
                      <td><?php 
                            if (array_search($employee['idno'], array_column($onleave, 'idno')) !== false) {
                              echo 'On leave' . ' ' . '<i class="mdi mdi-sleep"></i>';
                            }
                           else {
                            echo 'Available';
                          }
                          ?></td>
                      <td><button class="btn btn-info mx-lg-4 mx-md-2 view" type="button" data-id="<?php echo $employee['id']; ?>" data-bs-target="#viewModal" data-bs-toggle="modal">View</button>
                        <button class="btn btn-danger" onclick="if(confirm('You are about to delete this employee, are you sure?')){window.location.href = '../connection/actions.php?del=<?php echo $employee['idno']; ?>';}">Delete</button>
                      </td>
                    </tr>

                    <div class="modal fade" id="viewModal" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-address-card"></i>user profie</h5>
                            <button type="button" class="close" data-bs-dismiss="modal">
                              <span>&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <div class="container mb-4" id="view">


                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>


      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <?php include('../admin/footer.php'); ?>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php
  include('js_files.php');
  ?>
  <!-- this page js -->
  <script src="../public/assets/extra-libs/DataTables/datatables.min.js"></script>
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
  </script>
  <script src="../js/emp_info.js"></script>
</body>

</html>