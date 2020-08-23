<?php
session_start();
include '../config.php';

if(isset($_GET['delete_myrequest'])){
    echo 'hello delete button pressed';
}

$query = "SELECT * FROM `userlogin` WHERE email='$_SESSION[login_user]'";
$result = mysqli_query($db, $query);
$result = mysqli_fetch_assoc($result);

$image = $result['profilepicture'];
if($image==''){
    $img='http://placehold.it/150x150';
}
else{
    $img='../user/'.$image;
}


$query = "SELECT * FROM `certificate_requests` WHERE email='$_SESSION[login_user]'";
$request = mysqli_query($db, $query);
$requestcount = mysqli_num_rows($request);


$query = "SELECT * FROM `certificate_issued` WHERE email='$_SESSION[login_user]'";
$issued = mysqli_query($db, $query);
$issuedcount = mysqli_num_rows($issued);


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
        .carousel-item img{
            max-height: 350px;
        }
        .carousel{
            box-shadow: 0px 0px 5px black;
        }
        .subheading{
            font-size: 20px;
            font-weight: 600;
        }
        ul li{
            padding: 5px 0px;
        }
        ul:nth-child(1){
            padding-top: 10px;
        }
        .panel-body{
            box-shadow: 0px 0px 10px rgba(104, 100, 100, 0.5);
            border-radius:5px;
        }
        .btn:hover{
            box-shadow: 0px 0px 10px black;
        }

    </style>


</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>

<div class="container">
    <div class="heading">
        <!-- <h4 class="header-line">ADMIN DASHBOARD</h4> -->
    </div>
    
    <div class="row" style="margin: 30px 0px;">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="user_details" style="text-align: center;">
                <div class="image-container">
                    <img src="<?php echo $img ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                </div>
                <br/>    
                <div class="userData">
                    <h2 class="d-block" style="font-size: 2.0rem; font-weight: 600;"><a href="javascript:void(0);"><?php echo $result['name']?></a></h2>         
                    <!-- <br/> -->
                    <p class="d-block"><a href="javascript:void(0)"><?php echo $issuedcount ?></a> Certificates Issued 
                    <br/>
                    <a href="javascript:void(0)"><?php echo $requestcount?></a> Certificates Requested</p>
                </div>
                <div class="view_certificates">
                <a href="#issued_certificates"><button class="btn btn-outline-primary w-75" style="padding: 10px 0px;margin-bottom:20px;border-radius:20px;">View my Certificates</button></a>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-6 col-sm-12">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../assets/img/internship2.webp" alt="First slide">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            </h5>Get your Certificate verified online easily</h5>
                            <p>...</p>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../assets/img/course.webp" alt="Second slide">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>...</h5>
                            <p>...</p>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../assets/img/certi1.jpg" alt="Third slide">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>...</h5>
                            <p>...</p>
                        </div> -->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>    

        <h2 class="heading py-2" style=" text-align: center;text-transform:uppercase;font-family:cursive;">Request New Certificate</h2>
        
        <div class="row"> 
            <div class="col-md-4 col-12">            
                <ul>
                    <li><span class="subheading">Internship Certificate</span>
                        <ul class="list-elements">
                            <li>Web Development</li>
                            <li>Machine Learning</li>
                            <li>Android</li>
                            <li>Data Analytics</li>
                            <li>Software Testing  etc..</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-12">
                <ul>
                    <li><span class="subheading">Online Course</span>
                        <ul class="list-elements">
                            <li>Web Development</li>
                            <li>Android</li>
                            <li>Competitive Programming</li>
                            <li>Javascript</li>
                            <li>Java etc..</li>
                        </ul>
                    </li>
                </ul>
            </div>     

            <div class="col-md-4 col-12">

                
                <a href="./newrequest.php"><button class="btn btn-outline-primary w-75" style="padding: 20px 0px; margin:20px 0px; border-radius:40px;">Request New Certificate</button></a>
                

                <a href="#my_requests"><button class="btn btn-outline-primary w-75" style="padding: 20px 0px; margin:20px 0px; border-radius:40px;">Manage Requests</button></a>
            
            </div>
        </div>











        <div class="my_requests" id="my_requests" style="margin:30px 0px;">

            <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center; margin:20px 0;"><h1>My Requests</h1></div>
                <div class="panel-body">
                    <div class="table-responsive" style="padding: 20px;">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Request Id</th>
                                    <th>Request Date</th>
                                    <th>Organization</th>
                                    <th>Type</th></th>
                                    <th>Edit Request</th>                                
                                    <th>Delete Request</th>   
                                </tr>
                            </thead>
                            
                            <tbody>

                                <?php
                                while($my_requests = mysqli_fetch_assoc($request))
                                {?> 
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $my_requests['request_id'];?></td>
                                        <td class="center"><?php echo $my_requests['request_date'];?></td>
                                        <td class="center"><?php echo $my_requests['organization'];?></td>
                                        <td class="center"><?php echo $my_requests['type'];?></td>
                                        <td class="center">
                                            <a href="./editrequest.php?request_id=<?php echo $my_requests['request_id'];?>&action=editrequest&type=<?Php echo $my_requests['type'];?>"><button class="btn btn-primary w-75">Edit</button></a>
                                        </td>
                                        <td class="center">
                                            <a href="./editrequest.php?request_id=<?php echo $my_requests['request_id'];?>&action=deleterequest&type=<?Php echo $my_requests['type'];?>"><button class="btn btn-danger w-75" name="delete_myrequest">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php }?>                               
                            </tbody>
                        </table>
                    </div>            
                </div>
            </div>

        </div>

        <div class="my_certifictes" id="issued_certificates" style="margin:30px 0px;">
            <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center; margin:20px 0;"><h1>My Certificates</h1></div>
                <div class="panel-body">
                    <div class="table-responsive" style="padding: 20px;">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Request Date</th>
                                    <th>Certificate Number</th>
                                    <th>Oragnization</th>
                                    <th>Type</th></th>
                                    <th>Issued Date</th>                                
                                    <th>Action</th>   
                                </tr>
                            </thead>
                            
                            <tbody>

                                <?php
                                while($my_certificates = mysqli_fetch_assoc($issued))
                                {?> 
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $my_certificates['request_date'];?></td>
                                        <td class="center"><?php echo $my_certificates['certificate_number'];?></td>
                                        <td class="center"><?php echo $my_certificates['organization'];?></td>
                                        <td class="center"><?php echo $my_certificates['type'];?></td>
                                        <td class="center"><?php echo $my_certificates['issued_date'];?></td>
                                        <td class="center">
                                            <a target="_blank" href="../admin/<?php echo $my_certificates['location']?>"><button class="btn btn-success w-75">View</button></a>
                                        </td>
                                    </tr>
                                <?php }?>                               
                            </tbody>
                        </table>
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