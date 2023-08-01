<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalToggleLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="collapse" id="collapseExample1">
                <div class="card card-body">
                    
                </div>
            </div>

            <form method="POST" name="loginform" id="loginform">
                <div class="modal-body">


                    <label for="empid">Your id</label>
                    <input class="form-control" type="text" name="empid" id="empid" placeholder="Enter your ID" maxlength="6" required>

                    <label for="pwd">Your password</label>
                    <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Enter your password" required>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#exampleModalToggle2" data-bs-toggle="modal">Forgot password</a>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                    <input type="hidden" name="log" id="log" value="logged">
                </div>

            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">We will send a password reset code to your email address.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="verform" id="verform">
            <div class="modal-body">
                
            <label for="verid">Insert Your id Number</label>
            <div class="input-group mb-3">
             <input type="text" class="form-control" name="codereqid" id="codereqid" maxlength="6" placeholder="Enter id" required>
               <button class="btn btn-outline-primary" type="submit" name="codereq"  id="codereq">Request code</button>
               <input type="hidden" name="request" id="request" value="sent">
            </div>

            
            </div>
        </form>
         <div class="collapse" id="collapseExample">
        <div class="card card-body">
               Did you get the code? insert it below to reset your password.
               </div>
           
       
            <form action="" method="post" name="vercode" id="vercode">
            <div class="card card-body">     
            <div class="input-group mb-3">
             <input type="text" class="form-control" name="rstcode" id="rstcode" maxlength="6" placeholder="Enter code" required>
             <button class="btn btn-outline-primary" type="submit" name="resetpw" id="resetpw">Reset password</button>
             <input type="hidden" name="verify" id="verify" value="">
            </div>
            </div>

            <div class="modal-footer">
           
            </div>
            </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel3">Change your password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="chngform" id="chngform">
            <div class="modal-body">
                
            <label for="chngpw">New password</label>
                    <input class="form-control" type="password" name="chngpw" id="chngpw" placeholder="Enter new password">

                    <label for="confpw">confirm password</label>
                    <input class="form-control" type="password" name="confpw" id="confpw" placeholder="Confirm new password">

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="chg">Submit</button>
                <input type="hidden" name="recover" id="recover" value="">
            </div>
            </form>
        </div>
    </div>
</div>
