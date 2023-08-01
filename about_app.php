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
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo.png" />
</head>

<body>
    <div class="container pb-5">

        <h1 class="bg-dark text-light text-center py-3 my-4"><b>Welcome to Employee Leave Management System</b></h1>

        <h4>About App</h4>
        <hr>

        <ul class="list-unstyled bg-light pb-3" style="font-size:medium ;">
            <h5 class="bg-secondary"><b class="mx-2">Instructions</b></h5>
            <li class="mx-4"><b>Step 1:</b> If you are new here click <strong> Register</strong> button. (Else go to <b>Step 2</b>) </li>
            <li class="mx-4"><b>Step 2:</b> If you have already been registered...
                <ul class="mx-5">
                    <li>On your own click <strong> Login</strong> button to start accessing your account.</li>
                    <li>By admin click <strong> Reset password</strong> button to set your password so that you can log in to your account.</li>
                </ul>

            </li>
        </ul>

    </div>

    <footer class="text-center mt-5">
    <a href="index.php" class="btn btn-secondary mb-3">Back to Home </a><br>
      <small>  This app is developed and designed by <strong>Sara Fedlu</strong>, a Computer Engineering intern from Bahir Dar University</small>
    </footer>
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