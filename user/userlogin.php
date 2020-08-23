<?php

    include('usercon.php'); 
    if(isset($_SESSION['login_user'])){
    header("location: dashboard.php");
    }

    include('../config.php');
    include('../mail.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | User Login</title>
    

    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">



    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="../js/script.js"></script>

    <style>
        .navbar li:hover{
            background-color: silver
        }
        .dropdown-item:hover{background-color: silver}
        #login_form{
            margin: auto;
            width:450px;
            border-radius:10px;
            
            padding:10px 40px 5px;
            background-color:#F2F4F4;
             box-shadow: 0px 5px 10px rgba(104, 100, 100, 0.5);
        }
        input[type=email],input[type=password]{
            width:96.5%;
            padding:10px;
            margin-top:8px;
            border:1px solid #ccc;
            padding-left:5px;
            font-size:20px;
        }
        input[type=submit]{
            width:40%;
            background-color:#2f90ff;
            color:#fff;
            border:2px solid white;
            padding:10px;
            font-size:20px;
            cursor:pointer;
            border-radius:10px;
        } 

       

    </style>


</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../assets/img/Cert-App-Logo.png" height="80px" width="80px" alt="Logo not found" style=" margin-left: 20px;">
        <div class="container">
        <a class="navbar-brand" style="font-size:24px;text-align:center;" href="#">Certificate Management<br>System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5">
                    <li class="nav-item active">
                        <a class="nav-link ml-2 " style="font-size:20px;" href="../index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-2"style="font-size:20px;" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-2" style="font-size:20px;" href="#">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" style="font-size:20px;" href="#" id="navbarDropdown" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Login</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../admin/adminlogin.php">Admin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="userlogin.php">User</a>
                        </div>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>


<div class="container">
   <div class="bord">
    <div id="login_form" style="margin-top:50px;">
        <h2 style="text-align:center;">User Login</h2>
        <form action="" method="post">
            <label class="user mt-3">Email :</label>
            <input id="email" name="email" placeholder="Email" type="email" autocomplete="off" required>
            
            <label class="pass mt-3">Password :</label>
            <input name="password" placeholder="**********" type="password" autocomplete="off" required><br><br>
            <p class="forgotpassword float-right p-2"><a data-toggle="modal" data-target="#forgotpassword" href="#forgotpassword">Forgot Password?</a></p>
            <input name="submit" type="submit" value=" Login ">
            <p class="new-user pt-1"><a href="#newuser" data-toggle="modal" data-target="#newuser">New Users Register Here!</a></p>
        </form>
    </div>



    <!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="newuser">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">New User Registration</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form action="userlogin.php" method="post">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" pattern="[A-Za-z].{4,}" class="form-control" id="inputName" placeholder="Your Name" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" placeholder="Your Email" required>
                        </div>
                    </div>
                

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" onkeyup='check();' pattern="{.4,}" class="form-control" id="password" placeholder="Password" required>   
                        </div>
                    </div>


                    <!-- <div class="form-group row">
                        <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="confirm_password" onkeyup='check();' pattern="{.4,}" class="form-control" id="confirm_password" placeholder="Confirm Password" required>   
                            <span id='message'></span>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="inputDob" class="col-sm-4 col-form-label">Date Of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" name="dob" class="form-control" id="inputDob" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputContactno" class="col-sm-4 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="contact" pattern="[0-9]{10}" class="form-control" id="inputContactno" placeholder="XX XXXX XXXX" required >
                        </div>
                    </div>

                    <!-- Extension further with Photo and Sign Validation -->

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">I Agree to <a href="#">Terms and Conditions</a></label>
                        </div>
                    </div>

                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="new_user">Resister</button>
                </form>                
            </div></div>
<!------------------------------------------- Modal footer ---------------------------------------->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-----------------------------------------Modal Ends------------------------------------------------>




<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="forgotpassword">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">Recover Your Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Forgot Password Modal---------------------------->
            <div class="modal-body">
                <form action="userlogin.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Registered Email:</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="forgot_pwduser">Submit</button>
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

















</div>

<!-- FOOTER -->

<!-- <?php include 'footer.php'?> -->

<!-- Footer Ends Here -->
</body>
</html>