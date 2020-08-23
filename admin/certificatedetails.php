<?php
session_start();
include '../db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | Certificate Details</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

      <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,600,700,700italic' rel='stylesheet' type='text/css'>


    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="js/script.js"></script>


    <style type="text/css"> 
	
        .search{  
            margin: 20px 25%;
            border-radius:5px;
            padding:25px; 
            background-color:#FDFEFE;
            box-shadow: 0px 0px 5px rgba(104, 100, 100, 0.5);
        }    
        .details{
            margin: 20px auto;
            border-radius:5px;
            padding:25px;
            background-color:#FDFEFE;
            box-shadow: 0px 0px 5px rgba(104, 100, 100, 0.5);
        }
        label{
            font-weight: 600;
        }
        .btn:hover{
            box-shadow: 0px 0px 5px grey;
        }
        .nav .nav-link.active{
            box-shadow: 0px 0px 1px black;
            
        }
        .errors{
            min-height: 25vh;
        }
    </style>

</head>
<body>

<?php include '../nav.php'?>
<?php include './changepassword.php'?>

<div class="container">
    <div class="search">
        <form action="certificatedetails.php" method="POST">
            <div class="form-group row">
                <label for="inputnumber" class="col-sm-4 col-form-label">Certificate Number:</label>
                <div class="col-sm-8">
                    <input type="text" name="certificate_number" class="form-control" id="inputnumber" placeholder="Certificate Number" required >
                </div>
            </div>
            <button type="submit" id="submit" class="btn btn-primary btn-lg" name="view_details">View Details</button>
        </form>
    </div>       
</div>

<hr style="height:2px;">


<?php

if(isset($_REQUEST['view_details'])){
	
	$no=$_REQUEST['certificate_number'];
	
        $query ="SELECT*  FROM certificate_issued WHERE certificate_number='$no'";
        $result = mysqli_query($db, $query);
        $count=mysqli_num_rows($result);

        if ($count==1) {
        $row = mysqli_fetch_assoc($result); 

          	$request_id= $row['request_id'];
            $certificate_number=$row['certificate_number'];
            $name=$row['name'];
            $email=$row['email'];
            $contact=$row['contact'];
            $type=$row['type'];
            $organization=$row['organization'];
            $domain=$row['domain'];
            $course=$row['course'];
            $start_date=$row['start_date'];
            $end_date=$row['end_date'];
            $duration=$row['duration'];
            $request_date=$row['request_date'];
            $issued_date=$row['issued_date'];
            $location=$row['location'];

?>


<div class="container">
    <div class="details">    
    <div class="row" style="margin:30px 0;">

        <div class="col-md-3 col-sm-12">  
            <div class="certificate_download">
                <form target="_blank" action="<?php echo $location ?>" method="POST">

                    <h2 class="d-block" style="font-size: 2.0rem; font-weight: 600;"><a href="javascript:void(0);"><?php echo $certificate_number?></a></h2>
                    <label for="requestid">Request Id : <?php echo $request_id?></label>
                    <label for="requestdate">Request Date : <?php echo $request_date?></label>
                    <label for="certificate_number">Certificate Number : <?php echo $certificate_number?></label>
                    <label for="issueddate">Issued Date : <?php echo $issued_date?></label>
                    <button type="submit" id="submit" class="btn btn-primary btn-lg w-75 mt-2 mb-4" name="view_certificate">View Certificate</button> 
                </form>
            </div>
        </div>    
            
            
        <div class="col-md-9 col-sm-12">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personalInfo-tab" data-toggle="tab" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="true">Personal Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="certificateInfo-tab" data-toggle="tab" href="#certificateInfo" role="tab" aria-controls="certificateInfo" aria-selected="false">Certificate Info</a>
                </li>
            </ul>
            <div class="tab-content ml-1" id="myTabContent">
                <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Name :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <?php echo $name;?>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Email :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <?php echo $email;?>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Contact :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <?php echo '+91' .$contact;?>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="certificateInfo" role="tabpanel" aria-labelledby="certifictaeInfo-tab">

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Organization :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $organization;?>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Domain :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $domain;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Course :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $course;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Start Date :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $start_date;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>End Date :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $end_date;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Duration :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <?php echo $duration;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-------------------------html code ends after button clicks ends------------------------------------------>
<?php

    }elseif ($count>1){?>

        <div class="errors">
            <h1 style="text-align: center;margin:50px 0px;color:red">Error Occured Please contact Admin.</h1>
        </div>
        
    <?php 

    }else{?>

        <div class="errors">
            <h2 style="text-align: center;margin:50px 0px;color:red">No Details Found. Invalid Certifciate Number.</h2>
        </div>

    <?php }

    }else{ ?>

        <div class="errors">
        	<h3 style="text-align: center;margin:50px 0px;color:green">Please Enter the Certificate number to view.</h3>
        </div>

<?php }

include '../footer.php';

?>



</body>
</html>

<?php






