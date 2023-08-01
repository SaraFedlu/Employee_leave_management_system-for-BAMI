
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
   <!-- bootstrap CSS  -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--link css file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/logo.png"
    />
</head>

<body>
<div class="container">
    
    <h1 class="bg-dark text-light text-center py-3 my-4"><b>Welcome to Employee Leave Management System</b></h1>

    <div class="row col-md-5 offset-3 py-5">
<div class="alert alert-danger bg-secondary opacity-70">
        <!-- form modal -->
        <?php include 'login.php'; ?>
        
<div class="row mb-3 mx-5">
    <a class="btn btn-primary text-dark opacity-90" style="background-color:lavender;" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><b>Login</b></a>
</div>
<div class="row mb-3 mx-5">
    <a class="btn btn-primary text-dark opacity-90" style="background-color:lavender;" href="register.php" role="button"><b>Register</b></a>
</div>
<div class="row mb-3 mx-5">
    <a class="btn btn-primary text-dark opacity-90" style="background-color:lavender;" data-bs-toggle="modal" href="#exampleModalToggle2" role="button"><b>Reset password</b></a>
</div>
<div class="row mb-3 mx-5">
    <a class="btn btn-primary text-dark opacity-90" style="background-color:lavender;" href="about_app.php" role="button"><b>About app</b></a>
</div>
       </div>
</div>
       
    </div>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/jquery.validate.js"></script>
    <!-- bootstap poppup and js -->
    <script src="umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--js file -->
<script src="js/login.js"></script>
     

</body>

</html>