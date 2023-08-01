<?php
session_start();
if($_SESSION['user_type'] !== 'admin'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }
require_once "../connection/admin.php";
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
      include('adminheader.php');
      ?>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <?php
      include('adminsidebar.php');
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
              <h4 class="page-title">Add new position</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add Position
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

          <div class="card col-md-7 col-sm-9 m-5">
          <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <?php
            if (count($errors) > 0) { ?>
              <div class="text-danger">
                <?php foreach ($errors as $showerror) {
                  echo $showerror;
                } ?> </div>
            <?php  } else { ?>
              <div class="text-success">
                <?php foreach ($info as $showinfo) {
                  echo $showinfo;
                } ?></div>
            <?php }
            //print_r($positions);
            ?>

            <div class="card-body">
              <div class="form-group row">
                <label for="position_id" class="col-sm-3 text-end control-label col-form-label">Position ID</label>
                <div class="col-sm-9 col-md-6">
                  <input name="position_id" type="number" class="form-control" id="position_id" value="<?php echo count($positions) + 200 ?>" readonly />
                </div>
              </div>
              <div class="form-group row">
                <label for="position" class="col-sm-3 text-end control-label col-form-label">Position Name</label>
                <div class="col-sm-9 col-md-6">
                  <input name="position" type="text" class="form-control" id="position" required placeholder="Position Name Here" />
                </div>
              </div>

            </div>
            <div class="border-top">
              <div class="card-body">
                <button type="submit" name="add_pos" class="btn btn-primary">
                  Create
                </button>
              </div>
            </div>
          </form>
        </div>




        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include('footer.php'); ?>
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
