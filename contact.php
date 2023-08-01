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
<title> Contact Page</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
<?php include('header.php'); ?>
        <h4 class="mb-4"><b>Contact Information</b></h4>
        <hr>
        <ul class="list-unstyled mx-4">
            <li><i class="fa-solid fa-phone text-dark"></i> 000-000-0000</li>
            <li><i class="fa-solid fa-envelope text-dark"></i> name@example.com</li>
        </ul>

        </div>
</div>
<?php
include('js/sidebarscript.php');
?>

</body>
</html>