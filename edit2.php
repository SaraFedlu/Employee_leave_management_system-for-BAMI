<?php
session_start();
if ($_SESSION['user_type'] !== 'emp') { ?>
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
	<title> Edit User Profile</title>
	<!--link css file -->
	<link rel="stylesheet" href="css/editprofile.css" />
</head>

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

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" name="updateform" id="updateform" method="post">

					<div class="row gutters">
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
							<div class="card h-20">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-profile">
											<div class="user-avatar">
												<img src="uploads/<?php echo $_SESSION['photo']; ?>" alt="">
											</div>
											<label class="btn btn-secondary" for="imageUpload">Change Profile</label>
											<input id="imageUpload" type="file" accept="image/*" name="photo" style="display:none">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<h6 class="mb-2 text-primary">Personal Details</h6>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlentities($_SESSION['firstname']) ?>" placeholder="Enter first name" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlentities($_SESSION['lastname']) ?>" placeholder="Enter last name" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="mname">Middle Name</label>
												<input type="text" class="form-control" id="mname" name="mname" value="<?php echo htmlentities($_SESSION['middlename']) ?>" placeholder="Enter middle name" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($_SESSION['email']) ?>" placeholder="Enter Email address" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="phone">Phone</label>
												<input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlentities($_SESSION['phone']) ?>" placeholder="Enter Phone" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="department">Department</label>

												<select class="form-control" id="department" name="department" required>
													<?php foreach ($departments as $value) { ?>
														<option <?php if ($_SESSION['department'] == $value['department']) {
																	echo 'selected';
																} ?> value="<?php echo $value['department']; ?>"><?php echo $value['department']; ?></option> <?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<h6 class="mt-3 mb-2 text-primary">Address</h6>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="region">Region</label>
												<input type="text" class="form-control" id="region" name="region" value="<?php echo htmlentities($_SESSION['region']) ?>" placeholder="Enter region" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="zone">Zone</label>
												<input type="text" class="form-control" id="zone" name="zone" value="<?php echo htmlentities($_SESSION['zone']) ?>" placeholder="Enter zone" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="woreda">Woreda</label>
												<input type="text" class="form-control" id="woreda" name="woreda" value="<?php echo htmlentities($_SESSION['woreda']) ?>" placeholder="Enter woreda" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="locality">Locality</label>
												<input type="text" class="form-control" id="locality" name="locality" value="<?php echo htmlentities($_SESSION['locality']) ?>" placeholder="Enter locality" required>
											</div>
										</div>
									</div>

									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<h6 class="mt-3 mb-2 text-primary">Emergency Contact</h6>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="contactfname">Contact First Name</label>
												<input type="text" class="form-control" id="contactfname" name="contactfname" value="<?php echo htmlentities($_SESSION['emergencyfirstname']) ?>" placeholder="Enter First name" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="contactlname">Contact Last Name</label>
												<input type="text" class="form-control" id="contactlname" name="contactlname" value="<?php echo htmlentities($_SESSION['emergencylastname']) ?>" placeholder="Enter Last name" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="contactphone">Phone Number</label>
												<input type="tel" class="form-control" id="contactphone" name="contactphone" value="<?php echo htmlentities($_SESSION['emergencyCon_phone']) ?>" placeholder="Enter phone number" required>
											</div>
										</div>
									</div>

									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="text-right">
												<input type="submit" class="btn btn-primary" value="Update" name="update">
												<input type="reset" class="btn btn-secondary">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>


		</div>
	</div>
	<?php
	include('js/sidebarscript.php');
	?>

</body>

</html>