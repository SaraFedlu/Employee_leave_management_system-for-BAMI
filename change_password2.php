<?php
session_start();
if($_SESSION['user_type'] !== 'emp') { ?>
  <script>
    window.location.href = "http://localhost/myproject/index.php";
  </script>
<?php }
require_once "connection/control.php";
?>

<!DOCTYPE html>
<html>

<head>
  <?php include('uhead.php'); ?>
  <title> Change Password</title></head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php include('sidebar.php'); ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
      <?php include('header.php'); ?>


      <div class="container">
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

        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 ml-5">
          <div class="card">
            <div class="card-body">

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="text-primary text-center">Change Password</h6>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="change_pw" id="change_pw" method="post">
                <div class="form-group">
                  <label for="opw">Old Password</label>
                  <input type="password" class="form-control" id="opw" name="opw" placeholder="password" required>
                </div>
                <div class="form-group">
                  <label for="npw">New Password</label>
                  <input type="password" class="form-control" id="npw" name="npw" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="cpw">Confirm Password</label>
                  <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Password" required>
                </div>
                <div class="d-grid d-md-flex py-2 justify-content-md-end">
                  <input type="submit" class="btn btn-success" value="Change" name="change">
                </div>
              </form>

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