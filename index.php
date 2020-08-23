<?php
 include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Management System</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,600,700,700italic' rel='stylesheet' type='text/css'>


    <!-- Plugin CSS -->
    <link href="css/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <!-- <link href="css/creative.css" rel="stylesheet"> -->



    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="js/script.js"></script>

    <style>
        .btn:hover{
            box-shadow: 0px 0px 10px whitesmoke;
        }
        #mainNav {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  background-color: #fff;
  transition: background-color 0.2s ease;
} 

#mainNav .navbar-brand {
  font-family: "Merriweather Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-weight: 700;
  color: #212529;
}

#mainNav .navbar-nav .nav-item .nav-link {
  color: #6c757d;
  font-family: "Merriweather Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-weight: 700;
  font-size: 0.9rem;
  /* padding: 0.75rem 0; */
}

#mainNav .navbar-nav .nav-item .nav-link:hover, #mainNav .navbar-nav .nav-item .nav-link:active {
  color: #f4623a;
}

#mainNav .navbar-nav .nav-item .nav-link.active {
  color: #f4623a !important;
}

@media (min-width: 992px) {
  #mainNav {
    box-shadow: none;
    background-color: transparent;
  }
  #mainNav .navbar-brand {
    color: rgba(255, 255, 255, 0.7);
  }
  #mainNav .navbar-brand:hover {
    color: #fff;
  }
  #mainNav .navbar-nav .nav-item .nav-link {
    color: rgba(255, 255, 255, 0.7);
    /* padding: 0 1rem; */
  }
  #mainNav .navbar-nav .nav-item .nav-link:hover {
    color: #fff;
  }
  #mainNav .navbar-nav .nav-item:last-child .nav-link {
    padding-right: 0;
  }
  #mainNav.navbar-scrolled {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    background-color: #fff;
  }
  #mainNav.navbar-scrolled .navbar-brand {
    color: #212529;
  }
  #mainNav.navbar-scrolled .navbar-brand:hover {
    color: #f4623a;
  }
  #mainNav.navbar-scrolled .navbar-nav .nav-item .nav-link {
    color: #212529;
  }
  #mainNav.navbar-scrolled .navbar-nav .nav-item .nav-link:hover {
    color: #f4623a;
  }
}

header.masthead {
  padding-top: 10rem;
  padding-bottom: calc(10rem - 72px);
  background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("assets/img/bg-masthead.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
}

header.masthead h1 {
  font-size: 2.25rem;
}

@media (min-width: 992px) {
  header.masthead {
    height: 100vh;
    min-height: 40rem;
    padding-top: 72px;
    padding-bottom: 0;
  }
  header.masthead p {
    font-size: 1.15rem;
  }
  header.masthead h1 {
    font-size: 3rem;
  }
}

@media (min-width: 1200px) {
  header.masthead h1 {
    font-size: 3.5rem;
  }
}


    </style>


</head>
<body id="pagetop">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">    
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" style="font-size:22px;text-align:center;" href="#"><img src="assets/img/logo.png" height="46px" width="50px" alt="Logo not found" style="margin-left: 30px;">&nbsp Certificate Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto ml-5">
                    <li class="nav-item active">
                        <a class="nav-link js-scroll-trigger" style="font-size:20px;" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"style="font-size:20px;" href="#aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"style="font-size:20px;" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" style="font-size:20px;" href="#contactus">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-5 mr-5">
                    <li class="nav-item dropdown js-scroll-trigger">
                        <a class="nav-link dropdown" style="font-size:20px;" href="#" id="navbarDropdown" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Login</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin/adminlogin.php">Admin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="user/userlogin.php">User</a>
                        </div>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>


<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
          <div class="col-lg-10 align-self-end">
              <h1 class="text-uppercase text-white font-weight-bold hoverable">Start fullfiling your dreams with us.</h1>
              <hr class="divider my-4">
          </div>
        <div class="col-lg-8 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Get easy certifications of your work with us. Online verifictaion of your certificate details by barcode 100% secure. </p>
            <a class="btn btn-primary btn-lg js-scroll-trigger w-50" style="padding: 20px;border-radius: 50px;" href="./verifycertificate.php">Verify Your Certificate</a>
        </div>
    </div>
</header>


<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="verifycertificate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">Enter Certificate Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form target="" action="" method="post">
                    <div class="form-group row">
                        <label for="inputCertificateNumber" class="col-sm-5 col-form-label">Certificate Number :</label>
                        <div class="col-sm-7">
                            <input type="text"  name="certificate_number" class="form-control" id="inputCertificateNumber" required>
                        </div>
                    </div>
                    <a href=""><button type="submit" id="submit" class="btn btn-primary btn-lg" name="verify_certificate">View Certificate</button></a>
                </form>
            </div>
<!------------------------------------------- Modal footer ---------------------------------------->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-----------------------------------------Modal Ends------------------------------------------------>


<?php include 'services.php'?>
<?php include 'aboutus.php'?>
<?php include 'contactus.php'?>

<!-- FOOTER -->

<?php include 'footer.php'?> 

<!-- Footer Ends Here -->
  <!-- Plugin JavaScript -->
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.js"></script>
  <script type="text/javascript" src="js/jquery.magnific-popup.js"></script>

  <!-- Custom scripts for this template -->
  <script type="text/javascript" src="js/creative.js"></script>


</body>
</html>