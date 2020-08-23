<style>
.navbar li:hover{
    background-color: silver
}
.dropdown-item:hover{background-color: silver}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../assets/img/Cert-App-Logo.png" height="80px" width="80px" alt="Logo not found" style="margin-left: 30px;">
        <div class="container">
        <a class="navbar-brand" style="font-size:24px;text-align:center;" href="#">Certificate Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5">
                    <li class="nav-item active">
                        <a class="nav-link ml-2 " style="font-size:20px;" href="./dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link ml-2"style="font-size:20px;" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-2" style="font-size:20px;" href="#">Contact Us</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" style="font-size:20px;" href="#" id="navbarDropdown" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['login_name'];?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#changepassword" href="#changepassword">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout.php">Logout</a>
                        </div>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>