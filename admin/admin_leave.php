<?php
session_start();
if($_SESSION['user_type'] !== 'admin'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }
require_once "../connection/leave_control.php";
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
              <h4 class="page-title">Apply Leave</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Apply Leave
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">

        <?php
    if (count($errors) > 0) { ?>
<div class="text-danger"> 
<?php foreach ($errors as $showerror) { ?>
						<li> <?php echo $showerror; ?> </li>
					<?php	} ?> </div>
  <?php  } else { ?>
    <div class="text-success">
     <?php   foreach ($info as $showinfo) {
            echo $showinfo;
        } ?></div>
   <?php }
    ?>

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ml-5">
<div class="card h-100">
	<div class="card-body">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

    <div class="row gutters">

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="from">From:</label>
            <input type="date" class="form-control" id="from" name="from" required>
            </div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="form-group">
            <label for="to">To:</label>
            <input type="date" class="form-control" id="to" name="to" required>
            </div>
			</div>
    </div>

    <div class="row gutters">

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" class="form-control" id="total" name="total" value="" placeholder="Amount of days" readonly>
          </div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="form-group">
            <label for="avleave">Available leave days:</label>
            <input type="text" class="form-control" id="avleave" name="avleave" value="<?php echo $_SESSION['avleave']; ?>" placeholder="Amount of days" readonly>
          </div>
			</div>
    </div>

    <div class="row gutters">


			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
            <label for="leavetype">Leave Type:</label>
          <select class="form-control" id="leavetype" name="leavetype" required>
            <option value="">Select leave type</option>
            <option>Casual leave</option>
            <option>Medical leave</option>
            <option value="other">Other...</option>
          </select>
        </div>

        <div class="collapse" id="collapseExample">
          <div class="form-floating">
            <textarea class="form-control" placeholder=" " maxlength="50" id="comment" name="comment" style="height: 100px; width: 300px;"></textarea>
            <label for="comment">Description</label>
          </div>
        </div>

	    </div>
	</div>

    <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <input type="submit" class="btn btn-success" name="apply" value="Apply">

			</div>
		</div>
    </form>
    </div>
</div>
</div>

        </div>

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
    <script src="../js/apply_leave.js"></script>
  </body>
</html>
