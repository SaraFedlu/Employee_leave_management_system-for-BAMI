<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a id="sidebarCollapse" class="btn text-light">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </a>
                <h3 style="color:dodgerblue ;"><a class="navbar-brand pl-4"><img src="img/logo.png" alt="logo"><b>Ethio Engineering Group</b></a></h3>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="if(confirm('Are you sure you wanna log out?')){window.location.href='logout.php';}">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>