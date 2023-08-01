<?php
session_start();
if ($_SESSION['user_type'] !== 'sup') { ?>
  <script>
    window.location.href = "http://localhost/myproject/index.php";
  </script>
<?php }
require_once "../connection/root.php";
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
            <h4 class="page-title">All Departments</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="superadminhome.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Departments
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

        <div class="card">
          <div class="card-body">

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

            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>
                      <center> Action</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($departments as $department) {
                  ?>
                    <tr>
                      <td><?php echo $department['dep_id']; ?></td>
                      <td><?php echo $department['department']; ?></td>
                      <td><button class="btn btn-primary mx-lg-4 mx-md-2 px-md-3 editdept" type="button" data-id="<?php echo $department['id']; ?>" data-bs-target="#viewModal" data-bs-toggle="modal">Edit</button>
                        <button class="btn btn-danger" onclick="if(confirm('You are about to delete this department, are you sure?')){window.location.href = '../connection/actions.php?dep=<?php echo $department['id']; ?>';}">Delete</button>
                      </td>
                    </tr>

                    <div class="modal fade" id="viewModal" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"> </i> Edit Department</h5>
                            <button type="button" class="close" data-bs-dismiss="modal">
                              <span>&times;</span>
                            </button>
                          </div>

                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="depUpdate">
                            <div class="modal-body">
                              <div class="container mb-4" id="view">

                                <div class="form-group row">
                                  <label for="department_id" class="col-sm-3 text-end control-label col-form-label">Department ID</label>
                                  <div class="col-sm-9 col-md-6">
                                    <input name="department_id" type="number" class="form-control" id="department_id" value="" readonly />
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="department" class="col-sm-3 text-end control-label col-form-label">Department Name</label>
                                  <div class="col-sm-9 col-md-6">
                                    <input name="department" type="text" class="form-control" id="department" required placeholder="Department Name Here" />
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="update_dep" class="btn btn-primary depUpdate">
                                  Update
                                </button>
                                <input type="hidden" name="depid" id="depid" value="">
                              </div>
                            </div>
                          </form>

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
  <script src="../js/approve_leave.js"></script>
</body>

</html>