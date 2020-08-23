<?php
session_start();
include '../db.php';
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | <?php echo $_SESSION['login_name']?> Dashboard</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">


    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/script.js"></script>

    <style>

        /* .navbar li:hover{
            background-color: silver
        }
        .dropdown-item:hover{background-color: silver} */
        h5{
            text-align: center;
        }
        ul{
            list-style:square;
        }
        ul li{
            margin: 10px 0px;
        }
        .btn:hover{
            box-shadow: 0px 0px 5px black;
        }
        .alert{
            box-shadow: 0px 0px 5px black;
        }

    </style>


</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>


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
<!----------------------- Create New User Admin Panel Modal---------------------------->
            <div class="modal-body">
                <form action="./dashboard.php" method="post">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" pattern="[A-Za-z].{2,}" class="form-control" id="inputName" placeholder="Your Name" required >
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
                            <input type="password" name="password" pattern="{.4,}" class="form-control" id="password" placeholder="Password" required>   
                        </div>
                    </div>

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
            </div>
<!------------------------------------------- Modal footer ---------------------------------------->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-----------------------------------------Modal Ends------------------------------------------------>



<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="editbyemail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">Enter User Email Address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form action="edituserdetails.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">User Email</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="edituser_details">Submit</button>
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


<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="viewbyemail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">Enter User Email Address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form action="viewuserdetails.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">User Email:</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="viewuser_details">Submit</button>
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


<!--------------------------Modal starts-------------------------------->
<div class="modal fade text-left" id="viewrequest">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!-------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title">View Request Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
            <div class="modal-body">
                <form action="./viewrequest.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Enter Email:</label>
                        <div class="col-sm-8">
                            <input type="email"  name="email" class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg" name="viewrequest_details">Submit</button>
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




<!--------------------------Modal starts---------------------------->
<div class="modal fade text-left" id="editRequest">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
<!------------------------- Modal Header ------------------------------->
            <div class="modal-header">
                <h4 class="modal-title text-center`">Enter Request Id</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

<!------------------------------ Modal body ------------------------------->
<!----------------------- Change Password Modal---------------------------->
<div class="modal-body">
                <form action="./editRequest.php" method="post">
                    <div class="form-group row">
                        <label for="Request_Id" class="col-sm-5 col-form-label">Request_ID :</label>
                        <div class="col-sm-7">
                            <input type="text"  name="id" class="form-control" id="inputCertificateNumber" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg" name="editRequest">Edit Request</button></a>
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


<div class="container">
    <div class="heading">
        <!-- <h4 class="header-line">ADMIN DASHBOARD</h4> -->
    </div>
    
    <div class="row" style="margin: 30px 0px;">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="alert alert-success back-widget-set text-center">
                <i class="fa fa-book fa-5x"></i>
                    <?php 
                        $query="SELECT * FROM certificate_types";
                        $result=mysqli_query($db, $query); 
                        $count=mysqli_num_rows($result);
                    ?>
                
                <h3><?php echo $count;?></h3>Certificate Types
            </div>
            <div class="quick-links">
                <h5>Manage Types</h5>
                <div class="item">
                    <ul>
                        <li style="margin-top:30px;"><a href="#">New Certificate Type</a></li>
                        <li><a href="#">Edit Certificate Type</a></li>
                        <li><a href="#">View Certificate Type</a></li>
                        <li><a href="#">List Certificate Types</a></li>
                    </ul>
                </div>
            </div>

        </div>

           
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="alert alert-info back-widget-set text-center">
                <i class="fa fa-bars fa-5x"></i>
                    <?php 
                        $query="SELECT * FROM certificate_requests";
                        $result=mysqli_query($db, $query); 
                        $count=mysqli_num_rows($result);
                    ?>

                 <h3><?php echo $count;?> </h3>Certificates Requested
            </div>
            <div class="quick-links">
                <h5>Manage Requests</h5>
                <div class="item">
                    <ul>
                        <li style="margin-top:30px;"><a href="./newrequest.php">New Request</a></li>
                        <li><a  data-toggle="modal" data-target="#editRequest" href="./editrequest.php">Edit Requests</a></li>
                        <li><a data-toggle="modal" data-target="#viewrequest" href="#">View Request</a></li>
                        <li><a href="./requestlist.php">List All Requests</a></li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="alert alert-warning back-widget-set text-center">
                <i class="fa fa-recycle fa-5x"></i>
                    <?php 
                        $query="SELECT * FROM certificate_issued";
                        $result=mysqli_query($db, $query); 
                        $count=mysqli_num_rows($result);
                    ?>
                <h3><?php echo $count;?></h3>Certificates Issued
            </div>
            <div class="quick-links">
            <h5>Manage Certificates</h5>
                <div class="item">
                    <ul>
                        <li style="margin-top:30px;"><a href="./issuenew.php">Issue New Certificate</a></li>
                        <li><a href="#">Edit Certificate</a></li>
                        <li><a href="./certificatedetails.php">View Certificate Details</a></li>
                        <li><a href="./issuedlist.php">List Issued Certificates</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="alert alert-danger back-widget-set text-center">
                <i class="fa fa-users fa-5x"></i>
                    <?php 
                        $query="SELECT * FROM userlogin";
                        $result=mysqli_query($db, $query); 
                        $count=mysqli_num_rows($result);
                    ?>
                <h3><?php echo $count;?></h3>Registered Users
            </div>

            <div class="quick-links">
            <h5>Manage Users</h5>
                <div class="item">
                    <ul>
                        <li style="margin-top:30px;"><a data-toggle="modal" data-target="#newuser" href="#newuser">New System Users</a></li>
                        <li><a data-toggle="modal" data-target="#editbyemail" href="./edituserdetails.php">Edit System Users</a></li>
                        <li><a data-toggle="modal" data-target="#viewbyemail" href="./viewuserdetails.php">View User Deatils</a></li>
                        <li><a href="./userslist.php">List all Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>










</div>

<!-- FOOTER -->

<?php include '../footer.php'?>

<!-- Footer Ends Here -->


</body>
</html>