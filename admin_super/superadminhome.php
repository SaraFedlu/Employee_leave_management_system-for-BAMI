<?php
session_start();
if($_SESSION['user_type'] !== 'sup'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
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
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
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
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="superadminhome.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
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
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="bg-dark p-10 text-white text-center">
                  <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                  <h5 class="mb-0 mt-1"><?php echo $employee_no; ?></h5>
                  <small class="font-light">Total Employees</small>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
              <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-plus fs-3 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $c; ?></h5>
                            <small class="font-light">On Leave</small>
                          </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
              <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $total_leaves; ?></h5>
                            <small class="font-light">Total Requests</small>
                          </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
              <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $onprogress_leaves; ?></h5>
                            <small class="font-light">Pending Requests</small>
                          </div>
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
  </body>
</html>
