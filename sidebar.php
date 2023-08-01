<nav id="sidebar">
        <div class="p-4 pt-5">
            <a href="edit2.php" class="img logo rounded-circle mb-5" style="background-image: url(http://localhost/myproject/uploads/<?php echo $_SESSION['photo']; ?>);"></a>
            <ul class="list-unstyled components mb-5 text-light">
                <li class="active">
                    <a href="#"><h3 style="color: orange;"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h3></a>
                </li>
                <li>
                    <a href="#"><h6><i class="fa-solid fa-id-card"></i> <?php echo $_SESSION['idno']; ?></h6></a>
                </li>

                <li>
                    <a href="#"><h6><i class="fa-solid fa-envelope"></i> <?php echo $_SESSION['email']; ?></h6></a>
                </li>
            </ul>
          </div>
            <div class="footer">
                <p class="py-5">
                    Developed by - <a href="mailto:sfedlu28@gmail.com?subject = Feedback&body = Message">Sara Fedlu</a> in 2022.
                </p>
            </div>
        
    </nav>