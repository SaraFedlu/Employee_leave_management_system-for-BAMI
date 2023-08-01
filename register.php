<?php require_once "connection/control.php"; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Employee Leave management System Registration Form Wizard</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/logo.png"
    />
    <!-- Custom CSS -->
    <link
      href="public/assets/libs/jquery-steps/jquery.steps.css"
      rel="stylesheet"
    />
    <link href="public/assets/libs/jquery-steps/steps.css" rel="stylesheet" />
    <link href="public/dist/css/style.min.css" rel="stylesheet" />
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- country code link -->
     <link rel="stylesheet" href="css/intlTelInput.css" />
    <script src="js/intlTelInput.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 no-block align-items-center">
              <h4 class="page-title">Registration Form Wizard</h4>
             
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
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="card">
            <div class="card-body wizard-content">
            <h4 class="card-title"></h4>
            <h6 class="card-subtitle">All Fields are Mandatory</h6>



            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" name="regform" id="regform">

            <?php
				if (count($errors) > 0) { ?>
					<div class="text-danger">
					<?php foreach ($errors as $showerror) { ?>
						<li> <?php echo $showerror; ?> </li>
					<?php	} ?> </div>
				<?php  } else { ?>
					<div class="text-success">
						<?php foreach ($info as $showinfo) {
							echo $showinfo;
						} ?></div>
				<?php }
				?>

                <div>
                  <h3>Full Name</h3>
                  <section>
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" name="fname" id="fname" required maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['fname']) ?>">

                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name="lname" id="lname" required maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['lname']) ?>">

                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control" name="mname" id="mname" required maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['mname']) ?>">
                  <input type="hidden" name="username" id="username">

                  </section>
                  <h3>Employee Info</h3>
                  <section>

                  <span><i class="fa-solid fa-envelope"></i></span> <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required maxlength="30" value="<?php echo htmlspecialchars($data['email']) ?>">

                  <label for="photo">photo</label>
                  <input type="file" accept="image/*" class="form-control" name="photo" id="photo" required>

                  <span><i class="fa-solid fa-phone"></i></span> <label for="phone">Phone Number</label><div>
                  <input type="tel" class="form-control" name="phone" id="phoneno" maxlength="13" value="<?php echo htmlspecialchars($data['phone']) ?>">
                  </div>

                  <span><i class="fa-solid fa-user"></i></span> <label for="gender">Gender</label>
                  <div class="gender">
                      <label class="radio-inline"><input type="radio" name="gender" id="male" required value="M" <?php if($data['gender']=="M"){echo 'checked';} ?>> Male</label>
                      <label class="radio-inline"><input type="radio" name="gender" id="female" required value="F" <?php if($data['gender']=="F"){echo 'checked';} ?>>Female</label>
                  </div>

                  <label for="avleave">Available No. of leave days</label>
                  <input type="number" class="form-control" name="avleave" id="avleave" required value="<?php echo htmlspecialchars($data['avleave']) ?>">

                  </section>
                  <h3>Work Info</h3>
                  <section>
                  
                  <span><i class="fa-solid fa-calendar"></i></span> <label for="empyear">Employment Year</label>

                  <select class="form-control" id="empyear" name="empyear" data-component="date" required>
                      <option value=""></option>
                      <?php for ($year = date('Y'); $year >= 1950; $year--) { ?>
                         <option value="<?php echo $year; ?>" <?php if($data['empyear']==$year){echo 'selected';} ?>><?php echo $year; ?></option>
                     <?php } ?>
                  </select>

                  <span><i class="fa-solid fa-hourglass"></i></span> <label for="empstatus">Employment Status</label>

                  <select class="form-control" id="empstatus" name="empstatus" required>
                      <option value=""></option>
                      <option <?php if($data['empstatus']=="Permanent"){echo 'selected';}?>>Permanent</option>
                      <option disabled>contract</option>
                  </select>

                  <span><i class="fa-solid fa-users-gear"></i></span> <label for="department">Department</label>

                  <select class="form-control" id="departmentnm" name="department" required>
                      <option value=""></option>
                      <?php foreach ($departments as $value) { ?>
														<option <?php if ($data['department'] == $value['department']) {
																	echo 'selected';
																} ?> value="<?php echo $value['department']; ?>"><?php echo $value['department']; ?></option> <?php } ?>
                  </select>

                  <label for="position">Position</label>
                  <select class="form-control" name="position" id="position" required>
                    <option value="">--select--</option>
                  </select>

                  </section>
                  <h3>Address</h3>

                  <section>
                  <label for="region">Region</label>
                  <input required type="text" class="form-control" name="region" id="region" maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['region']) ?>">

                  <label for="zone">Zone</label>
                  <input required type="text" class="form-control" name="zone" id="zone" maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['zone']) ?>">

                  <label for="woreda">Woreda</label>
                  <input required type="text" class="form-control" name="woreda" id="woreda" maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['woreda']) ?>">

                  <label for="locality">Locality</label>
                  <input required type="text" class="form-control" name="locality" id="locality" maxlength="30" minlength="2" value="<?php echo htmlspecialchars($data['locality']) ?>">
                  <input type="hidden" name="address" id="address">

                  </section>
                  <h3>Emergency Info</h3>

                  <section>
                  <label for="contactname">Emergency Contact Name</label>
                  <input required type="text" class="form-control" name="contactfname" id="contactfname" maxlength="30" value="<?php echo htmlspecialchars($data['contactfname']) ?>">

                  <label for="contactlname">Emergency Contact Last name</label>
                  <input required type="text" class="form-control" name="contactlname" id="contactlname" maxlength="30" value="<?php echo htmlspecialchars($data['contactlname']) ?>">

                  <span><i class="fa-solid fa-phone"></i></span> <label for="contactphone">Emergency Contact Phone Number</label><div>
                  <input required type="text" class="form-control" name="contactphone" id="contactphoneno" maxlength="13" value="<?php echo htmlspecialchars($data['contactphone']) ?>">
                  </div>
                  <input type="hidden" name="cusername" id="cusername">

                  </section>
                  <h3>Create Account</h3>

                  <section>
                  <span><i class="fa-solid fa-id-card"></i></span> <label for="idno">ID Number</label>
                  <h6 class="card-subtitle">(Use as username)</h6>
                  <input type="text" class="form-control" name="idno" maxlength="6" minlength="6" id="idno" required value="<?php echo htmlspecialchars($data['idno']) ?>">

                  <label for="password">Password</label>
                  <input required type="password" class="form-control" name="password" minlength="5" maxlength="30" id="password">

                  <label for="cpassword">Confirm Password</label>
                  <input required type="password" class="form-control" name="cpassword" id="cpassword">

                  <input type="checkbox" onclick="visibility()"> Show Password

                  </section>
                  <h3>Finish</h3>
                  <section>
                    <div align="center">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit the Form!">
                </div>
                  </section>
                </div>
              </form>
              <a href="index.php" class="btn btn-info px-4">Back to Home </a>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          Developed by
          <a href="mailto:sfedlu28@gmail.com?subject = Feedback&body = Message">Sara Fedlu</a>.
        </footer>
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
    
    <script src="public/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="public/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="public/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="public/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="public/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="js/script.js"></script>
  <script>
      
      // Basic Example with form
      $.validator.addMethod("valphone", function (value, element) {
            return value == validatephone(element);
        }, "Please enter a valid phone number.");

        $.validator.addMethod("valcphone", function (value, element) {
            return value == validatephone(element);
        }, "Please enter a valid phone number.");

      //email validator
      $.validator.addMethod("valemail", function (value, element) {
            return value == ValidateEmail(element);
        }, "Please enter a valid email address.");

        //name validator
        $.validator.addMethod("valname", function (value, element) {
            return validatename(element);
        }, "Please enter a valid name.");

        $.validator.addMethod("val_addname", function (value, element) {
            return validate_addr(element);
        }, "Please enter a valid address.");

        //number validator
        $.validator.addMethod("valNum", function (value, element) {
            return validateNum(element);
        }, "Please enter numbers only.");

      var form = $("#regform");
      form.validate({
        errorPlacement: function errorPlacement(error, element) {
          element.before(error);
        },
        rules: {
                    fname: {
                        valname: true
                    },
                    lname: {
                        valname: true
                    },
                    mname: {
                        valname: true
                    },
                    region: {
                        val_addname: true
                    },
                    zone: {
                        val_addname: true
                    },
                    woreda: {
                        val_addname: true
                    },
                    locality: {
                        val_addname: true
                    },
                    idno: {
                        valNum: true
                    },
                    contactfname: {
                        valname: true
                    },
                    contactlname: {
                        valname: true
                    },
                    phone: {
                        valphone: true
                    },
                    contactphone: {
                        valcphone: true
                    },
                    email: {
                        valemail: true
                    },
                    cpassword: {
                        equalTo: '#password'
                    }
                },
                messages: {
                    cpassword: {
                        equalTo: 'please match it with entered password'
                    }
                },
      });
      form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
        },
        onFinishing: function (event, currentIndex) {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
        },
        onFinished: function (event, currentIndex) {
          alert("Please click Submit button!");
        },
      });
    </script>
  </body>
</html>
