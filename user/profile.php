<?php
session_start();
include '../config.php';

$query = "SELECT * FROM `userlogin` WHERE email='$_SESSION[login_user]'";
$result = mysqli_query($db, $query);
$result = mysqli_fetch_assoc($result);
$profilePic=$result['profilepicture'];


$query = "SELECT * FROM `certificate_requests` WHERE email='$_SESSION[login_user]'";
$request = mysqli_query($db, $query);
$requestcount = mysqli_num_rows($request);

$query = "SELECT * FROM `certificate_issued` WHERE email='$_SESSION[login_user]'";
$issued = mysqli_query($db, $query);
$issuedcount = mysqli_num_rows($issued);


?>

<?php

if(isset($_REQUEST['imageDelete'])){
  $query="UPDATE userlogin SET profilepicture=''  WHERE email='$_SESSION[login_user]'";
$resultDelete = mysqli_query($db, $query);
if ($resultDelete) {
    echo "<script>location.href='profile.php'</script>";
}}





if(isset($_REQUEST['upload'])){
//---------
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="userUploads/".$filename;
move_uploaded_file($tempname,$folder);

$query="UPDATE userlogin SET profilepicture='$folder'  WHERE email='$_SESSION[login_user]'";
$results = mysqli_query($db, $query);
if ($results) {
    echo "<script>location.href='profile.php'</script>";
}else{
    echo 'image not inserted';
    //js alert and redirect to profile.php
}

}else {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | <?php echo $_SESSION['login_name']?> Profile</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">



    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="../js/script.js"></script>

    <style>

        .tab-content{
            font-size: 20px;
        }
       .tab-content label{
            font-weight: 600;
        }
        .nav .nav-link.active{
            box-shadow: 0px 0px 1px black;
            /* box-shadow: 0px 0px 10px rgba(104, 100, 100, 0.5); */
            /* background-color: whitesmoke; */
        }
        .btn:hover{
            box-shadow: 0px 0px 10px black;
        }
        .profile{
            padding: 10px 0px;
            margin: 20px 0px;
            box-shadow: 0px 0px 10px rgba(104, 100, 100, 0.7);
        }
        
    </style>
</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>

<div class="container">
    <div class="profile">
   <!-------->
	<div class="row" style="margin: 30px 0px;">
        <!-- left column -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            
   <!---------------------upload button starts--------------------------------------->  
                <?php if ($profilePic=='') { ?>
                <div class="image-container">
                    <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                    <input class=" btn btn-primary mt-2 w-70" type="submit" data-toggle="modal" data-target="#myModal" value="Upload Image">
                </div>
                <?php }else { 
                     ?>
                       <img src="<?php echo $profilePic;?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" /> 
                     <input class=" btn btn-primary mt-2 w-70" type="submit" data-toggle="modal" data-target="#myModal" value="Change Image">
                 <?php 
             } 
              ?>
          
 <!-----------------------upload Button-ends---------------------------------------------->               
            
            <br/>   
            <div class="userData">
                <h2 class="d-block" style="font-size: 2.0rem; font-weight: 600;"><a href="javascript:void(0);"><?php echo $result['name']?></a></h2>         
                <!-- <br/> -->
                <p class="d-block"><a href="javascript:void(0)"><?php echo $issuedcount ?></a> Certificates Issued 
                <br/>
                <a href="javascript:void(0)"><?php echo $requestcount ?></a> Certificates Requested</p>
            </div>

<!----------------------Delete Image button starts---------------------------------------->           
            <?php if ($profilePic!='') { ?>
                     <div class="mb-auto">
                        <form action="profile.php"  method="POST">
                    <input class=" btn btn-danger w-75" type="submit" value="Delete my Image" name="imageDelete"></form>
            </div>
            <br>
                    <?php } 
                     ?>

          </form>
<!----------------------Delete Image button ends----------------------------------------> 
           <form action="./dashboard.php" method="post">
            <div class="mb-auto">
                <button type="submit" class="btn btn-danger w-75" name="delete_myaccount">Delete my Account</button>
            </div>
            <br>
                   
            <div class="mb-auto">
                 
                <button type="submit" class="btn btn-success w-75" name="update_profile">Update my Profile</button>
            </div>
            <br>
             
        </div>


        <div class="col-lg-9 col-md-8 col-sm-12">

            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="educationInfo-tab" data-toggle="tab" href="#educationInfo" role="tab" aria-controls="educationInfo" aria-selected="false">Education Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="addressInfo-tab" data-toggle="tab" href="#addressInfo" role="tab" aria-controls="addressInfo" aria-selected="false">Address Info</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Name :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <input type="text" name="name" pattern="[A-Za-z].{2,}" class="form-control" value="<?php echo $result['name'];?>" required>       
                        </div>
                    </div>
                 
                    <hr>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Email :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <input type="email"  name="email" class="form-control" value="<?php echo $result['email'];?>" required >
                            
                        </div>
                    </div>
                  
                    <hr style="height:2px">

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Contact :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <input type="text" name="contact" pattern="[0-9]{10}" class="form-control" value="<?php echo $result['contact'];?>" required>                          
                        </div>
                    </div>
                  
                    <hr>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Date of Birth :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <input type="date" name="dob" class="form-control" value="<?php echo $result['dob'];?>" required>
                        </div>
                    </div>
                 
                    <hr>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                            <label>Password :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-6">
                            <input type="password" name="password" readonly pattern="{.4,}" class="form-control" value="<?php echo $result['password'];?>" required>
                        </div>
                    </div>
                 
                </div>

                <div class="tab-pane fade" id="educationInfo" role="tabpanel" aria-labelledby="educationInfo-tab">
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>College :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <input type="text" name="college" class="form-control" value="<?php echo $result['college'];?>">    
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Course :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <input type="text" name="course" class="form-control" value="<?php echo $result['course'];?>">
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="addressInfo" role="tabpanel" aria-labelledby="addressInfo-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label>Address :</label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6">
                            <input type="text" name="address" class="form-control" value="<?php echo $result['address'];?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </form>
    </div>
</div>

<!--------------------------Modal starts----------------------------------------------->
    <div class="modal fade text-left" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Profile Picture</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!----------------------- Modal body --------------------------------------------------->
        <!-----------------------User Modal---------------------------------------------------->
        <div class="modal-body">
          <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <label for="lname">Upload Image :(Recomended Image Size is 150x150)</label><br>
                    <input type="file" name="uploadfile" value="KKKKKKKKK" required /><br><br>
                    <input class="btn btn-success" type="submit" value="Upload" name="upload">
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



<!-- FOOTER -->

<?php include '../footer.php'?>

<!-- Footer Ends Here -->


</body>
</html>

<?php
}

?>