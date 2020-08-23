<?php
session_start();
include '../db.php';

if(isset($_REQUEST['updateIntern'])){

$Request_id=(int)$_POST['request_id'];	
$contact=$_POST['contact'];
// $type=$POST['type'];
$organization=$_POST['organization'];
$domain=$_POST['domain'];
// $course=$POST['course'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
// $duration=$POST['duration'];

	$updateQuerry="UPDATE certificate_requests SET
    contact='$contact', organization='$organization', domain='$domain', start_date='$start_date', end_date='$end_date' WHERE Request_id=$Request_id";

    $results = mysqli_query($db, $updateQuerry);
    if($results) {
    	echo "<script>location.href='./dashboard.php'</script>";
    }
}elseif(isset($_REQUEST['updateCourse'])) {
	
	$Request_id=(int)$_POST['request_id'];	
$contact=$_POST['contact'];
// $type=$POST['type'];
$organization=$_POST['organization'];
// $domain=$_POST['domain'];
$course=$_POST['course'];
// $start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$duration=$_POST['duration'];
   
   $updateQuerry="UPDATE certificate_requests SET
    contact='$contact', organization='$organization', course='$course', duration='$duration', end_date='$end_date' WHERE request_id=$Request_id";
         $results = mysqli_query($db, $updateQuerry);
         if($results){
    	echo "<script>location.href='./dashboard.php'</script>";
    }

}else{

$id=(int)$_REQUEST['id'];
// echo $id;

$queryRequest ="SELECT * FROM certificate_requests WHERE request_id = $id";
$resultRequest = mysqli_query($db, $queryRequest) or die(mysqli_error($db));
$countRequest = mysqli_num_rows($resultRequest);
if ($countRequest==0) {
    $message = "No Request Found for given request id.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>location.href='./dashboard.php'</script>";
}else {
$rowRequest = mysqli_fetch_assoc($resultRequest);

$request_id=$rowRequest['request_id'];
$name=$rowRequest['name'];
$email=$rowRequest['email'];
$contact=$rowRequest['contact'];
$type=$rowRequest['type'];
$organization=$rowRequest['organization'];
$domain=$rowRequest['domain'];
$course=$rowRequest['course'];
$start_date=$rowRequest['start_date'];
$end_date=$rowRequest['end_date'];
$duration=$rowRequest['duration'];
if ($type=="Internship") {
	$flag=true;
}else {
	$flag=false;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS |Edit certificate request</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">


    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/script.js"></script>

    <style>
        label{
            font-weight:600;
            letter-spacing:1px;
        }
        .edit_request{
            box-shadow: 0px 0px 5px rgba(104, 100, 100, 0.5);
            margin: 20px 0px;
            padding: 10px;
        }
        .btn:hover{
            box-shadow: 0px 0px 5px grey;
        }
    </style>


</head>
<body>

<?php include '../nav.php'?>;
<?php include './changepassword.php'?>


<div class="container">
<div class="edit_request">
<div class="form px-5 my-3">
    <h2 class="text-center text-success font font-weight-bold text-capitalize pb-2">Edit Request</h2>
    <form action="./editrequest.php" method="post">

         <div class="form-group row">
            <label for="inputrequest_id" class="col-sm-4 col-form-label">Request Id :</label>
            <div class="col-sm-8">
                <input type="text" name="request_id" readonly class="form-control" id="inputrequest_id" value="<?php echo $request_id ?>" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputrequest_id" class="col-sm-4 col-form-label">Name :</label>
            <div class="col-sm-8">
                <input type="text" name="name" readonly class="form-control" id="inputrequest_id" value="<?php echo $name ?>" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputCert_number" class="col-sm-4 col-form-label">Email :</label>
            <div class="col-sm-8">
                <input type="text" name="email" readonly class="form-control" id="inputCert_number" value="<?php echo $email ?>" required-disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label">Contact:</label>
            <div class="col-sm-8">
                <input type="text" name="contact" class="form-control" id="inputName" value="<?php echo $contact; ?>" required >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputOrganisation" class="col-sm-4 col-form-label">Type :</label>
            <div class="col-sm-8">
                <input type="text"  name="type" readonly class="form-control" id="inputOrganization" value="<?php echo $type; ?>" required-disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">Organization :</label>
            <div class="col-sm-8">
                <input type="text" name="organization" class="form-control" id="inputEnd" value="<?php echo $organization ?>" required>
            </div>
        </div>

        

 
         
         <?php if (!$flag) {
         	
         ?>
        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">Course :</label>
            <div class="col-sm-8">
                <input type="text" name="course" class="form-control" id="inputEnd" value="<?php echo $course ?>" required>
            </div>
        </div>

          <?php }

          if ($flag) {
            ?>
        <div class="form-group row">
            <label for="inputDomain" class="col-sm-4 col-form-label">Domain :</label>
            <div class="col-sm-8">
                <input type="text" name="domain"  class="form-control" id="inputDomain" value="<?php echo $domain ?>" required>   
            </div>
        </div>
           <?php }

           if ($flag) {
            ?>
        <div class="form-group row">
            <label for="inputStart" class="col-sm-4 col-form-label">Start Date :</label>
            <div class="col-sm-8">
          <input type="date" name="start_date" class="form-control" id="inputStart" value="<?php echo $start_date; ?>" required>
            </div>
        </div>
         
         <?php }
         
            ?>

        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">End Date :</label>
            <div class="col-sm-8">
                <input type="date" name="end_date" class="form-control" id="inputEnd" value="<?php echo $end_date ?>" required>
            </div>
        </div>
        
     <?php 
     if (!$flag) {
     ?>
        <div class="form-group row">
            <label for="inputEnd" class="col-sm-4 col-form-label">Duration :</label>
            <div class="col-sm-8">
                <input type="text" name="duration" class="form-control" id="inputEnd" value="<?php echo $duration ?>" required>
            </div>
        </div>
         <?php } ?>
<?php if ($flag) {  ?>
	

        <button type="submit" id="submit" class="btn btn-primary btn-lg" name="updateIntern">Update Certificate Request</button>
    <?php }else { ?>
    	<button type="submit" id="submit" class="btn btn-primary btn-lg" name="updateCourse">Update Certificate Request</button>
   <?php  } ?>
    </form>
</div>
</div>
</div>
</body></html>

<?php  

}
}
?>