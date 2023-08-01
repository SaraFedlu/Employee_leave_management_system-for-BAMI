<?php
session_start();
if ($_SESSION['user_type'] !== 'admin') { ?>
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
  <link href="../public/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
  <link href="../public/dist/css/style.min.css" rel="stylesheet" />
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
            <h4 class="page-title">Employees in <?php echo $_SESSION['department']; ?> Department</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
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

        <div class="row el-element-overlay">
          <?php
          foreach ($employees as $employee) {
          ?>
            <div class="col-lg-3 col-md-6 px-4" style="width: 250px;">
              <div class="card">
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1">
                    <img src="../uploads/<?php echo $employee['photo']; ?>" alt="user" style="width: 200px; height: 150px;" />

                    <div class="el-overlay">
                      <ul class="list-style-none el-info">
                        <li class="el-item">
                          <a class="btn default btn-outline el-link changepos" type="button" data-id="<?php echo $employee['id']; ?>" data-bs-target="#editModal" data-bs-toggle="modal"><i class="mdi mdi-settings">Change Position</i></a>
                        </li>
                      </ul>
                    </div>

                    <div class="modal fade" id="editModal" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-settings"></i> Change Position</h5>
                            <button type="button" class="close" data-bs-dismiss="modal">
                              <span>&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <div class="container" id="change">

                              <form action="../connection/admin.php" method="post">

                                <div class="form-floating">

                                  <select class="form-control" id="position" name="position" required>
                                  <option value="">--Select--</option>
                                    <?php foreach ($positions as $position) { ?>
                                      <option value="<?php echo $position['position']; ?>"><?php echo $position['position']; ?></option> <?php } ?>
                                  </select>
                                  <label for="position">Select Position for <b id="username"></b></label>
                                </div>

                                <div class="modal-footer">
                                  <input type="hidden" name="idno" id="idno" value="">
                                  <input type="hidden" name="userid" id="userid" value="">
                                  <input type="submit" class="btn btn-success px-3" name="change_pos" value="Change">
                                </div>

                              </form>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="el-card-content">
                    <h4 class="mb-0"><?php echo $employee['firstname'] . " " . $employee['lastname']; ?></h4>
                    <span class="text-muted"><?php echo $employee['position']; ?></span><br>
                    <span class="text-muted"><?php foreach ($onleave as $value) {
                                                if ($employee['idno'] == $value['idno']) {
                                                  echo 'on leave' . ' ' . '<i class="mdi mdi-sleep"></i>';
                                                }
                                              }  ?></span>
                  </div>
                </div>
              </div>
            </div>

          <?php }
          ?>
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
  <!-- this page js -->
  <script src="../public/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
  <script src="../public/assets/libs/magnific-popup/meg.init.js"></script>
  <script src="../js/approve_leave.js"></script>
</body>

</html>