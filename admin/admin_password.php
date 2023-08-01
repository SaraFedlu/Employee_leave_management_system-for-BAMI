<?php
session_start();
if($_SESSION['user_type'] !== 'admin'){?>
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
              <h4 class="page-title">Change Password</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Update Password
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
        ?>

        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 ml-5">
          <div class="card">
            <div class="card-body">


              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="change_pw" id="change_pw" method="post">
                <div class="form-group">
                  <label for="opw">Old Password</label>
                  <input type="password" class="form-control" id="opw" name="opw" placeholder="password" required>
                </div>
                <div class="form-group">
                  <label for="npw">New Password</label>
                  <input type="password" class="form-control" id="npw" name="npw" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="cpw">Confirm Password</label>
                  <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Password" required>
                </div>
                <div class="d-grid d-md-flex py-2 justify-content-md-end">
                  <input type="submit" class="btn btn-success" value="Change" name="change">
                </div>
              </form>

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
