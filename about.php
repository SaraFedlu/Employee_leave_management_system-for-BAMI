<?php
session_start();
if($_SESSION['user_type'] !== 'emp'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }

?>

<!DOCTYPE html>
<html>
<head>
<?php include('uhead.php'); ?>
<title> About Page</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
<?php include('header.php'); ?>
        <h5 class="mb-4"><b>About the Application</b></h5>
        <hr>

        <p width="20px"> This web application is intended for simplifying the process of application for leave.
            It enables users to apply for leave and track the process wherever they are. It also shows remaining
            leave days, user leave history and user profile. Users can edit their profile and change their password,
            if they forget their password they can easily recover using the email they provided during registration.


        </p>

        <br>
        <h5 class="mb-4"><b>About the Developer</b></h5>
        <hr>

        <p width="40px"> This web application is developed by <strong>Sara Fedlu</strong>, an intern from Bahir Dar University Institute
             of Technology, 4th year Computer Engineering student during 4 month internship program in Bishoftu Automotive
             Manufacturing Industry under ICT department from <strong>08/06/2022</strong> upto <strong>10/10/2022</strong>.


        </p>

        </div>
</div>
<?php
include('js/sidebarscript.php');
?>

</body>
</html>