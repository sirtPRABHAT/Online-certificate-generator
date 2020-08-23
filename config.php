<?php

include('db.php');


if(isset($_POST['new_user'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];

    
    
    // connect to the database
    // $db = mysqli_connect('localhost', 'root', '', 'certificatemanagement');

    
    // validating presence of an account
    
         $query="SELECT email FROM userlogin WHERE email ='$email'";   
        
        // $email should be in single quotes removes error of mysqli_num_rows() expects parameter 1 to be mysqli_result
        
        $result=mysqli_query($db, $query); 
        $rowcount=mysqli_num_rows($result);
        // echo $rowcount;
        if($rowcount!=0)
        {
            $message = "Email Already Registered Please Login to continue!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    
        else
        {
            $query = "INSERT INTO userlogin(name, email, password, dob, contact) 
            VALUES('$name', '$email',  '$password', '$dob', '$contact')";
    
            $result = mysqli_query($db, $query);
    
            $message = "User registered successfully. Log in to continue!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }



    if(isset($_POST['changeadmin_password'])) {

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_SESSION['login_user'];

        $query = "SELECT * FROM `adminlogin` WHERE email='$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);
        $prev_password=$result['password'];
        // echo $prev_passwrod;

        // connect to the database
        // $db = mysqli_connect('localhost', 'root', '', 'certificatemanagement');

        if($password==$prev_password)
        {
            $message = "New Password cannot be same as Old One.Try New One!";
            echo "<script type='text/javascript'>alert('$message');</script>";
         
        }

        else
        {
            $query = "UPDATE adminlogin SET password='$password' WHERE email='$email'";
            $result = mysqli_query($db, $query);
            $message = "Password Changed Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    

    if(isset($_POST['changeuser_password'])) {

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_SESSION['login_user'];

        $query = "SELECT * FROM `userlogin` WHERE email='$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);
        $prev_password=$result['password'];

        // connect to the database
        // $db = mysqli_connect('localhost', 'root', '', 'certificatemanagement');

        if($password==$prev_password)
        {
            $message = "New Password cannot be same as Old One.Try New One!";
            echo "<script type='text/javascript'>alert('$message');</script>";
         
        }

        else
        {
            $query = "UPDATE userlogin SET password='$password' WHERE email='$email'";
            $result = mysqli_query($db, $query);
            $message = "Password Changed Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }
    }


    if(isset($_POST['viewuser_details'])) {

        $email=$_POST['email'];

        $query = "SELECT * FROM `userlogin` WHERE email='$email'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        
        if($count==1){
            $result = mysqli_fetch_assoc($result);
        }

        else{
        $message = "Email Not Registered.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>location.href='dashboard.php'</script>";
        }

        $query = "SELECT * FROM `certificate_requests` WHERE email='$email'";
        $request = mysqli_query($db, $query);
        $requestcount = mysqli_num_rows($request);

        $query = "SELECT * FROM `certificate_issued` WHERE email='$email'";
        $issued = mysqli_query($db, $query);
        $issuedcount = mysqli_num_rows($issued);

    }

    if(isset($_POST['edituser_details'])){

        $email=$_POST['email'];

        $query = "SELECT * FROM `userlogin` WHERE email='$email'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
         
        if($count==1){
            $result = mysqli_fetch_assoc($result);
        }

        else{
        $message = "Email Not Registered.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>location.href='dashboard.php'</script>";
        }

        $query = "SELECT * FROM `certificate_requests` WHERE email='$email'";
        $request = mysqli_query($db, $query);
        $requestcount = mysqli_num_rows($request);

        $query = "SELECT * FROM `certificate_issued` WHERE email='$email'";
        $issued = mysqli_query($db, $query);
        $issuedcount = mysqli_num_rows($issued);

    }


    if(isset($_POST['update_user'])){

        $name = $_POST['name'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $address = $_POST['address'];

        $query = "UPDATE userlogin SET name='$name', password='$password', dob='$dob', contact='$contact',
        college='$college', course='$course', address='$address' WHERE email='$email'";

        $result = mysqli_query($db, $query);

        $message = "User details updated Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }

    if(isset($_POST['delete_user'])){
        
        $email =$_POST['email'];
        $query = "DELETE FROM userlogin WHERE email='$email'";
        
        $result = mysqli_query($db, $query);
        $message = "User Account has been deleted Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }


    if(isset($_POST['update_profile'])){

        $name = $_POST['name'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $address = $_POST['address'];

    
        if($email==$_SESSION['login_user']){
    
            $query = "UPDATE userlogin SET name='$name', password='$password', dob='$dob', contact='$contact',
            college='$college', course='$course', address='$address' WHERE email='$email'";
    
            $result = mysqli_query($db, $query);
    
            $message = "Your Profile updated Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
            
        }
        
        else{
    
            $query = "UPDATE userlogin SET name='$name',email='$email', password='$password', dob='$dob', contact='$contact',
            college='$college', course='$course', address='$address' WHERE email='$_SESSION[login_user]'";
    
            $result = mysqli_query($db, $query);
    
            $message = "Your Profile has updated Successfully.Please Login Again With New Email as You have changed your email.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            session_destroy();
            echo "<script>location.href='./userlogin.php'</script>";
        }
    
    }
        
    if(isset($_POST['delete_myaccount'])){

        
        
        $query = "DELETE FROM userlogin WHERE email='$_SESSION[login_user]'";

        $result = mysqli_query($db, $query);

        $message = "Your account has been deleted Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
        session_destroy();
        echo "<script>location.href='./userlogin.php'</script>";
     
    }


    if(isset($_POST['internship_form'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $organization = $_POST['organization'];
        $domain = $_POST['domain'];
        $start = $_POST['startdate'];
        $end = $_POST['enddate'];
        // $duration = $_POST['duration'];
        $current_date =(string)date("jS \ F Y");
             
        $query = "INSERT INTO certificate_requests(name, email, contact, type, organization, domain, start_date, end_date, request_date) 
        VALUES('$name', '$email',  '$contact', 'Internship', '$organization', '$domain', '$start', '$end', '$current_date')";     
             
        $result = mysqli_query($db, $query);
            
        if($result){
    
            $message = "Internship Certificate Requested Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
        
        }
        else{
            $message = "Request Failed Please Try Again! Later..";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
       
    else if(isset($_POST['onlinecourse_form'])){
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $organization = $_POST['organization'];
        $course = $_POST['course'];
        $end = $_POST['enddate'];
        $duration = $_POST['duration'];
        $current_date =(string)date("jS \ F Y");
    
        $query = "INSERT INTO certificate_requests(name, email, contact, type, organization, course, end_date, duration, request_date) 
        VALUES('$name', '$email',  '$contact', 'Online Course', '$organization', '$course', '$end', '$duration', '$current_date')";     
             
        $result = mysqli_query($db, $query);
            
        if($result){
    
            $message = "Online Course Certificate Requested Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
        
        }
        else{
            $message = "Request Failed Please Try Again! Later..";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    

    if(isset($_POST['viewrequest_details'])){

        $email = $_POST['email'];
        
    }

///////////////////////////////////////////   Contact Form Submission  ///////////////////////////////////////////////    

    if(isset($_POST['contact_form'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact =$_POST['contact'];
        $subject =$_POST['subject'];
        $message =$_POST['message'];

        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        // $mail->SMTPDebug = 4;                                           // Enable verbose debug output

        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                                 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                         // Enable SMTP authentication
        $mail->Username = 'pkbank2020@gmail.com';        // SMTP username
        $mail->Password = 'Safi@2020';                                 // SMTP password
        $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                              // TCP port to connect to

        $mail->setFrom('pkbank2020@gmail.com');
        $mail->addAddress('pkbank2020@gmail.com');                                      // Add a recipient               
        $mail->addReplyTo('pkbank2020@gmail.com');


        //$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');            // Optional name
        
        $mail->isHTML(true);                                            // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = "<body>$name has dropped a message for you : <br><br> $message <br><br> Reach out to him soon at : <br>Email : $email <br> Contact : $contact </body>";




        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            $message = "Thank You for contacting us We will reach out to you Soon.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        else{
            $message = "Message not reached us. Please check your connection";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
    }

////////////////////////////////////////  Contact form Ends after Details are Mailed to admin ////////////////////////



// if(isset($_POST['view_certificate'])){

//     $cert =$_POST['certificate_number'];


//     echo "<script>location.href='admin/Issued certificates/Aditya Yadav-C31-38712.pdf'</script>";


// }












if(isset($_POST['update_internshiprequest'])){

    $id=$_POST['request_id'];
    $name=$_POST['name'];
    $organization = $_POST['organization'];
    $domain = $_POST['domain'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];
    // $duration = $_POST['duration'];
    $current_date =(string)date("jS \ F Y");
         
    $query = "UPDATE certificate_requests SET name='$name', organization='$organization', domain='$domain', start_date='$start', end_date='$end', request_date='$current_date' WHERE request_id=$id";        
    $result = mysqli_query($db, $query);
        
    if($result){

        $message = "Your Internship Certificate Request Updated Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    
    }
    else{
        $message = "Update Request Failed Please Try Again! Later..";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
   
if(isset($_POST['update_onlinecourserequest'])){

    $id=$_POST['request_id'];
    $name = $_POST['name'];
    $organization = $_POST['organization'];
    $course = $_POST['course'];
    $end = $_POST['enddate'];
    $duration = $_POST['duration'];
    $current_date =(string)date("jS \ F Y");

    $query = "UPDATE certificate_requests SET name='$name', organization='$organization', course='$course', end_date='$end', duration='$duration', request_date='$current_date' WHERE request_id=$id";        
    $result = mysqli_query($db, $query);
        
    if($result){

        $message = "Online Course Certificate Request Updated Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    
    }
    else{
        $message = "Update gggng Request Failed Please Try Again! Later..";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}





?>