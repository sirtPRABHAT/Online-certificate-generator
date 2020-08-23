<?php
session_start();
include '../config.php';

$id=(int)$_GET['request_id'];
$type=$_GET['type'];
// echo $id;

$action=$_GET['action'];
if($action=='deleterequest'){
    $delete="DELETE FROM certificate_requests WHERE  request_id = $id";
    $deleted= mysqli_query($db ,$delete);
    echo "<script>location.href='./dashboard.php'</script>";
}
else{

$query ="SELECT * FROM certificate_requests WHERE request_id = $id";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | Edit Your Request</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">



    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    
    <script type="text/javascript" src="../js/script.js"></script>


</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>

<?php if($type=="Internship"){ 

    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $organization = $row['organization'];
    $domain = $row['domain'];
    $startdate = $row['start_date'];
    $enddate = $row['end_date'];

?>

<div class="container">
    <div class="form px-5 my-4">
    <h1 class="text-center text-success font font-weight-bold text-capitalize pt-2">Details</h1>
    <form action="./dashboard.php" method="post">

        <div class="form-group row">
            <label for="inputrequest_id" class="col-sm-4 col-form-label">Request Id :</label>
            <div class="col-sm-8">
                <input type="text" name="request_id" readonly class="form-control" id="inputrequest_id" value="<?php echo $id ?>" required >
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="inputCert_number" class="col-sm-4 col-form-label">Certificate Number :</label>
            <div class="col-sm-8">
                <input type="text" name="certificate_number" readonly class="form-control" id="inputCert_number" value="<?php echo $certificate_number ?>" required >
            </div>
        </div> -->

        <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label">Name :</label>
            <div class="col-sm-8">
                <input type="text" name="name" readonly class="form-control" id="inputName" value="<?php echo $name ?>" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputOrganisation" class="col-sm-4 col-form-label">Organisation :</label>
            <div class="col-sm-8">
                <input type="text"  name="organization" class="form-control" id="inputOrganization" value="<?php echo $organization ?>" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="inputDomain" class="col-sm-4 col-form-label">Domain :</label>
            <div class="col-sm-8">
                <input type="text" name="domain"  class="form-control" id="inputDomain" value="<?php echo $domain ?>" required>   
            </div>
        </div>

        <div class="form-group row">
            <label for="inputStart" class="col-sm-4 col-form-label">Start Date :</label>
            <div class="col-sm-8">
                <input type="date" name="startdate" class="form-control" id="inputStart" value="<?php echo $startdate ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">End Date :</label>
            <div class="col-sm-8">
                <input type="date" name="enddate" class="form-control" id="inputEnd" value="<?php echo $enddate ?>" required>
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="inputDuration" class="col-sm-4 col-form-label">Duration :</label>
            <div class="col-sm-8">
                <input type="text" name="duration"  class="form-control" id="inputDuration" value="" required >
            </div>
        </div> -->


        <button type="submit" id="submit" class="btn btn-primary btn-lg" name="update_internshiprequest">Update Internship Request</button>
    </form>
    </div>
</div>

<?php }else if ($type=="Online Course"){


    $row = mysqli_fetch_assoc($result);

    $name= $row['name'];
    $organization = $row['organization'];
    $course = $row['course'];
    $enddate = $row['end_date'];
    $duration = $row['duration'];

?>

<div class="container">
    <div class="form px-5 my-4">
    <h1 class="text-center text-success font font-weight-bold text-capitalize pt-2">Details</h1>
    <form action="./dashboard.php" method="post">

        <div class="form-group row">
            <label for="inputrequest_id" class="col-sm-4 col-form-label">Request Id :</label>
            <div class="col-sm-8">
                <input type="text" name="request_id" readonly class="form-control" id="inputrequest_id" value="<?php echo $id ?>" required >
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="inputCert_number" class="col-sm-4 col-form-label">Certificate Number :</label>
            <div class="col-sm-8">
                <input type="text" name="certificate_number" readonly class="form-control" id="inputCert_number" value="<?php echo $certificate_number ?>" required >
            </div>
        </div> -->

        <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label">Name :</label>
            <div class="col-sm-8">
                <input type="text" name="name" readonly class="form-control" id="inputName" value="<?php echo $name ?>" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputOrganisation" class="col-sm-4 col-form-label">Organisation :</label>
            <div class="col-sm-8">
                <input type="text"  name="organization" class="form-control" id="inputOrganization" value="<?php echo $organization ?>" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="inputCourse" class="col-sm-4 col-form-label">Course :</label>
            <div class="col-sm-8">
                <input type="text" name="course"  class="form-control" id="inputCourse" value="<?php echo $course ?>" required>   
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="inputStart" class="col-sm-4 col-form-label">Start Date :</label>
            <div class="col-sm-8">
                <input type="date" name="startdate" class="form-control" id="inputStart" value="<?php echo $startdate ?>" required>
            </div>
        </div> -->

        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">End Date :</label>
            <div class="col-sm-8">
                <input type="date" name="enddate" class="form-control" id="inputEnd" value="<?php echo $enddate ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputDuration" class="col-sm-4 col-form-label">Duration :</label>
            <div class="col-sm-8">
                <input type="text" name="duration"  class="form-control" id="inputDuration" value="<?php echo $duration ?>" required >
            </div>
        </div>

        <button type="submit" id="submit" class="btn btn-primary btn-lg" name="update_onlinecourserequest">Update Online Course Request</button>

    </form>
    </div>
</div>

<?php }?>



<!-- FOOTER -->

<?php include '../footer.php'?>

<!-- Footer Ends Here -->


</body>
</html>

<?php }?>