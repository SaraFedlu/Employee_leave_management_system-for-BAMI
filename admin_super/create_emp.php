<?php
session_start();
if($_SESSION['user_type'] !== 'sup'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
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
    <link
      rel="stylesheet"
      type="text/css"
      href="../public/assets/libs/select2/dist/css/select2.min.css"
    />

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
              <?php if(!empty($_GET['id']) || !empty($_POST['id'])) {echo '
              <h4 class="page-title">Update Employee</h4>';} 
              else { echo '<h4 class="page-title">Add New Employee</h4>';}?>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="superadminhome.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add Employee
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
				?>
                
                <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >First Name</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="fname"  
                        value="<?php echo htmlentities($data['fname']); ?>"
                        type="text"
                          class="form-control"
                          id="fname"
                          required
                          placeholder="First Name Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Last Name</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="lname"  
                        value="<?php echo htmlentities($data['lname']); ?>"
                        type="text"
                          class="form-control"
                          id="lname"
                          required
                          placeholder="Last Name Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="mname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Middle Name</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="mname"  
                        value="<?php echo htmlentities($data['mname']); ?>"
                        type="text"
                          class="form-control"
                          id="mname"
                          required
                          placeholder="Middle Name Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label">User Type</label>

                    <div class="col-md-9">
                      <select
                        name="user_type"
                        class="select2 form-select shadow-none"
                        required
                      >
                        <option value="">Select</option>
                        <option <?php if($data['user_type'] =='emp'){echo 'selected';} ?> value="emp">Employee</option>
                        <option <?php if($data['user_type'] =='admin'){echo 'selected';} ?> value="admin">Department Supervisor</option>
                        <option <?php if($data['user_type'] =='sup'){echo 'selected';} ?> value="sup">Super Admin</option>
                       </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label">Gender</label>
                    <div class="col-md-9">
                      <div class="form-check">
                        <input
                          type="radio"
                          <?php if($data['gender'] =='M'){echo 'checked';} ?>
                          class="form-check-input"
                          id="customControlValidation1"
                          name="gender"
                          value="M"
                          required
                        />
                        <label
                          class="form-check-label mb-0"
                          for="customControlValidation1"
                          >Male</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          type="radio"
                          <?php if($data['gender'] =='F'){echo 'checked';} ?>
                          class="form-check-input"
                          id="customControlValidation2"
                          name="gender"
                          value="F"
                          required
                        />
                        <label
                          class="form-check-label mb-0"
                          for="customControlValidation2"
                          >Female</label
                        >
                      </div>

                    </div>
                  </div>

                    <div class="form-group row">
                      <label
                        for="idno"
                        class="col-sm-3 text-end control-label col-form-label"
                        >ID NO.</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="idno"
                        value="<?php echo htmlentities($data['idno']); ?>"
                        type="number"
                          class="form-control"
                          id="idno"
                          required
                          maxlength="6"
                          minlength="6"
                          placeholder="ID NO. Here"
                          <?php if(!empty($_GET['id']) || !empty($_POST['id'])){ echo 'readonly'; }?>
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="email"
                        value="<?php echo htmlentities($data['email']); ?>"
                        type="email"
                          class="form-control"
                          id="email"
                          required
                          placeholder="Email Address Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="phone"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Contact No</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="phone"
                        value="<?php echo htmlentities($data['phone']); ?>"
                        type="tel"
                          class="form-control"
                          id="phone"
                          required
                          placeholder="Contact No Here"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label">Employment Year</label>

                    <div class="col-md-9">
                      <select
                        name="empyear"
                        class="select2 form-select shadow-none"
                        required
                      >
                        <option value="">Select</option>
                        <?php for ($year = date('Y'); $year >= 1950; $year--) { ?>
                         <option <?php if($data['empyear']==$year){echo 'selected';} ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
                     <?php } ?>
                       </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label">Department</label>

                    <div class="col-md-9">
                      <select
                        name="department"
                        class="select2 form-select shadow-none"
                        required
                      >
                        <option value="">Select</option>
                        <?php foreach ($departments as $department) { ?>
						<option <?php if ($data['department'] == $department['department']) {
																	echo 'selected';
																} ?> value="<?php echo $department['department']; ?>"><?php echo $department['department']; ?></option> <?php } ?>
                       </select>
                    </div>
                  </div>

                  <div class="form-group row">
                      <label
                        for="avleave"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Available Leave Days</label
                      >
                      <div class="col-sm-9">
                        <input
                        name="avleave"
                        value="<?php echo htmlentities($data['avleave']); ?>"
                        type="number"
                          class="form-control"
                          id="avleave"
                          placeholder="Available Days Here"
                          required
                        />
                      </div>
                    </div>

                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" name="add_emp" class="btn btn-primary">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        Submit
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
    <!-- This Page JS -->
    <script src="../public/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../public/assets/libs/select2/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2();
    </script>
  </body>
</html>
