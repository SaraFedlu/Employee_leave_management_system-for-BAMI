<?php
session_start();
if($_SESSION['user_type'] !== 'emp'){?>
  <script>
   window.location.href="http://localhost/myproject/index.php";
  </script>
<?php }
//require_once "connection/leave_control.php";
?>

<!DOCTYPE html>
<html>
<head>
<?php include('uhead.php'); ?>
<title> Show Leave Page</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
<?php include('header.php'); ?>

<div class="displaymessage text-center text-info"></div>
<center><table class="table col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ml-5" id="datatable">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-light">

            </tbody>
</table></center>

<div class="modal fade" id="userViewModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Response</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">
                            <div class="container" id="profile">
                            <div class="col-sm-6 col-md-10">
                        <h6 class="text-primary"><b>Department Supervisor feedback:</b></h6>
                        <p id="employee">

                        </p>
                    </div>
                    <div class="col-sm-6 col-md-10">
                        <h6 class="text-primary"><b>Super Admin feedback:</b></h6>
                        <p id="admin">

                        </p>
                    </div>
                            </div>
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