<?php
session_start();
include '../config.php';

$query = "SELECT * FROM `userlogin` WHERE email='$_SESSION[login_user]'";
$result = mysqli_query($db, $query);
$result = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | New Request</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">



    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="../js/script.js"></script>

    <style>
        .newrequest{
            padding: 20px 0px;
            margin: 30px 0px;
            /* box-shadow: 0px 0px 10px black; */
            box-shadow: 0px 0px 10px rgba(104, 100, 100, 0.7);
        }
        .nav .nav-link.active{
            /* box-shadow: 0px 0px 2px black; */
            box-shadow: 0px 0px 10px rgba(104, 100, 100, 0.5);
            background-color: whitesmoke;

        }

    </style>


</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>

<div class="container">
    <div class="newrequest">
        <div class="col-12 my-4 px-5">

            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="internshipForm-tab" data-toggle="tab" href="#internshipForm" role="tab" aria-controls="internshipForm" aria-selected="true">Internship Certificate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="onlinecourseForm-tab" data-toggle="tab" href="#onlinecourseForm" role="tab" aria-controls="onlinecourseForm" aria-selected="false">Online Course Certificate</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="Form-tab" data-toggle="tab" href="#Form" role="tab" aria-controls="Form" aria-selected="false">Certificate</a>
                </li> -->
            </ul>

            <div class="tab-content" id="myTabContent">
<!------------------------Form of Internship tab starts ---------------------------------------------->
            <div class="tab-pane fade show active" id="internshipForm" role="tabpanel" aria-labelledby="internshipForm-tab">

                <form action="./dashboard.php" method="POST">

                    <div class="form-group row">
                        <label for="inputName" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Name :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="name" readonly class="form-control" id="inputName" value="<?php echo $result['name']?>" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Email :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="email"  name="email" readonly class="form-control" id="inputEmail" value="<?php echo $result['email']?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputContactno" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Contact :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="contact" readonly pattern="[0-9]{10}" class="form-control" id="inputContactno" value="<?php echo $result['contact']?>" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputOrganization" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Organization :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="organization" class="form-control" id="inputOrganization" placeholder="Organization Name" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDomain" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Domain :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="domain" class="form-control" id="inputDomain" placeholder="Internship In Domain" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputStart" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Start Date :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="date" name="startdate" class="form-control" id="inputStart" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEnd" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">End Date :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="date" name="enddate" class="form-control" id="inputEnd" required>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="inputDuration" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Duration :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="duration" class="form-control" id="inputDuration" placeholder="Duration In Days" required >
                        </div>
                    </div> -->

                    <button type="submit" id="submit" class="w-100 btn btn-success btn-lg" name="internship_form">Request Internship Certificate</button>

                </form>
            </div>
<!------------------------ Form of Internship Tab Ends ---------------------------------------------->

<!------------------------ Form of Online Course Tab Starts ---------------------------------------------->
            <div class="tab-pane fade" id="onlinecourseForm" role="tabpanel" aria-labelledby="onlinecourseForm-tab">

                <form action="./dashboard.php" method="POST">

                    <div class="form-group row">
                        <label for="inputName" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Name :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="name" readonly class="form-control" id="inputName" value="<?php echo $result['name']?>" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Email :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="email"  name="email" readonly class="form-control" id="inputEmail" value="<?php echo $result['email']?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputContactno" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Contact :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="contact" readonly pattern="[0-9]{10}" class="form-control" id="inputContactno" value="<?php echo $result['contact']?>" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputOrganization" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Organization :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="organization" class="form-control" id="inputOrganization" placeholder="Organization Name" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputCourse" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Course :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="course" class="form-control" id="inputCourse" placeholder="Course of Certification" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEnd" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Completion Date :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="date" name="enddate" class="form-control" id="inputEnd" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDuration" class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-form-label">Duration :</label>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <input type="text" name="duration" class="form-control" id="inputDuration" placeholder="Course Duration In Hours" required >
                        </div>
                    </div>

                    <button type="submit" id="submit" class="w-100 btn btn-success btn-lg" name="onlinecourse_form">Request Online Course Certificate</button>
                </form>
            </div>       
<!------------------------ Form of Online Course tab ends ---------------------------------------------->

<!------------------------ Form of new Tab Starts ---------------------------------------------->
        
            <!-- <div class="tab-pane fade" id="Form" role="tabpanel" aria-labelledby="Form-tab">

                <form action="" method="Post">


                </form>
            </div> -->
<!------------------------ Form of new tab ends ---------------------------------------------->
            </div>
        </div>
    </div>    
</div>




<!-- FOOTER -->

<?php include '../footer.php'?>

<!-- Footer Ends Here -->


</body>
</html>