<?php
session_start();
if($_SESSION['user_type'] !== 'emp'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }
//require_once "connection/control.php";
?>

<!DOCTYPE html>
<html>
<head>
<?php include('uhead.php'); ?>
<title> User Home Page</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
<?php include('header.php'); ?>
        <h2 class="mb-4">Home</h2>


        <div class="row gy-4 mt-5 justify-content-center">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box text-center">
            <h6><a href="edit2.php" class="btn btn-secondary" style="width: 120px; height: 100px">
          <i class="fa fa-user text-light fa-4x"></i><br>View Profile</a></h6>
           
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box text-center">
            <h6><a href="apply_leave2.php" class="btn btn-secondary" style="width: 120px; height: 100px">
            <i class="fa-solid fa-file text-light fa-4x"></i><br>
            Apply Leave</a></h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box text-center">
            <h6><a href="leave_history2.php" class="btn btn-secondary" style="width: 120px; height: 100px">
            <i class="fa-solid fa-eye text-light fa-4x text-center"></i><br>
            View Leave</a></h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box text-center">
            <h6><a href="" class="btn btn-secondary dropdown-toggle" style="width: 120px; height: 100px" data-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-gear text-light fa-4x"></i><br>
            Settings</a>
              <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="change_password2.php">Change Password</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" onclick="if(confirm('Are you sure you wanna log out?')){window.location.href='logout.php';}">Log Out</a></li>
   </ul></h6>
          </div>
        </div>


      </div>
    </div>
</div>
<?php
include('js/sidebarscript.php');
?>

</body>
</html>