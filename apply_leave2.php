<?php
session_start();
if($_SESSION['user_type'] !== 'emp'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }
require_once "connection/leave_control.php";
?>

<!DOCTYPE html>
<html>
<head>
<?php include('uhead.php'); ?>
<title> Apply Leave</title>
</head>
<body>
<div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
<?php include('header.php'); ?>

<div class="container">
<?php
    if (count($errors) > 0) { ?>
<div class="text-danger">
<?php foreach ($errors as $showerror) { ?>
						<li> <?php echo $showerror; ?> </li>
					<?php	} ?></div>
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
</div>
</div>
<?php
include('js/sidebarscript.php');
?>
<!--js file -->
<script src="js/apply_leave.js"></script>
</body>
</html>