<?php
session_start();
if ($_SESSION['user_type'] !== 'sup') { ?>
  <script>
    window.location.href = "http://localhost/myproject/index.php";
  </script>
<?php }
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php
  include('head.php');
  ?>
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
            <h4 class="page-title">View Leave</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="superadminhome.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    View Leave
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="displaymessage text-center text-primary"></div>
        <div class="table-responsive">
        <table class="table col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ml-5" id="datatable">
          <thead class="table-secondary">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Start Date</th>
              <th scope="col">End Date</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-light">

          </tbody>
        </table>
</div>

        <div class="modal fade" id="userViewModal" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-message"></i>View Response</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                  <span>&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="container" id="profile">

                  <div class="col-sm-6 col-md-8">
                    <p>Nothing to view.</p>
                  </div>

                </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

              </div>
            </div>
          </div>
        </div>

      </div>

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
  <script src="../js/apply_leave.js"></script>
</body>

</html>