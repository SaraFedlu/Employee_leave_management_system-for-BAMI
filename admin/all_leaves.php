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
  <!-- Custom CSS -->
  <link href="../public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
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
            <h4 class="page-title">All Leave Requests</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    All Leaves
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
                    <th>Name</th>
                    <th>Position</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($leaves as $leave) {
                    if ($leave['idno'] != $_SESSION['idno']) {
                  ?>
                      <tr>
                        <td><?php echo $leave['firstname'] . " " . $leave['lastname']; ?></td>
                        <td><?php echo $leave['position']; ?></td>
                        <td><?php echo $leave['start_date']; ?></td>
                        <td><?php echo $leave['end_date']; ?></td>
                        <td><?php echo $leave['total']; ?></td>
                        <td><?php echo $leave['status']; ?></td>
                        <td><button class="btn btn-primary reply" <?php if($leave['status'] !== 'pending'){echo 'disabled';}?> type="button" data-id="<?php echo $leave['id']; ?>" data-bs-target="#viewModal" data-bs-toggle="modal">Reply</button></td>
                      </tr>

                      <div class="modal fade" id="viewModal" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-pen"></i> Reply</h5>
                              <button type="button" class="close" data-bs-dismiss="modal">
                                <span>&times;</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              <div class="container" id="reply">

                                <form action="../connection/leave_control.php" method="post">

                                  <div class="form-floating">
                                    <textarea class="form-control"  required placeholder=" " maxlength="50" id="response1" name="response1"></textarea>
                                    <label for="response1">Comment</label>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="hidden" name="idno" id="idno" value="">
                                    <input type="hidden" name="total" id="total" value="">
                                    <input type="hidden" name="userid" id="userid" value="">
                                    <input type="submit" class="btn btn-success px-3" name="approve1" value="Approve">
                                    <input type="submit" class="btn btn-danger" name="reject1" value="Reject">
                                  </div>

                                </form>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                  <?php }
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