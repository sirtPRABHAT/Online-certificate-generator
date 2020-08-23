<?php 

    include('db.php');

//////////////////////////////////////  Forgot Password(Admin) Email Sent to Admin ////////////////////////////////////

    if(isset($_POST['forgot_pwdadmin'])) {

    $email=$_POST['email'];

    // connect to the database
    // $db = mysqli_connect('localhost', 'root', '', 'certificatemanagement');

    $query="SELECT * FROM adminlogin WHERE email='$email'";
    $result= mysqli_query($db, $query);

    $count=mysqli_num_rows($result);
    $result = mysqli_fetch_assoc($result);

    $name=$result['name'];
    $password=$result['password'];

    // echo $result['3'];
    // echo $count;

    if($count==1){
    
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
        $mail->addAddress($email);                                      // Add a recipient               
        $mail->addReplyTo('pkbank2020@gmail.com');


        //$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');            // Optional name
        
        $mail->isHTML(true);                                            // Set email format to HTML

        $mail->Subject = 'Password Recovery';
        $mail->Body    = "<body>Dear $name,<br><br>Your Password is : $password .</body>";




        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()){
            $message = "Email not sent Please Check Your Connection.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        else{
                $message = "Password Sent Successfully on your Email.";
                echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }
    
    else{
        $message = "Admin not Registered";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    mysqli_close($db);
}

/////////////////////////////////////// Admin forgot Password Ends ///////////////////////////////////////////////




//////////////////////////////////////  Forgot Password(User) Email Sent to User  ////////////////////////////////

if(isset($_POST['forgot_pwduser'])){

    $email=$_POST['email'];

    // echo $email;  email storing

    // connect to the database
    // $db = mysqli_connect('localhost', 'root', '', 'certificatemanagement');

    $query="SELECT * FROM userlogin WHERE email='$email'";
    $result= mysqli_query($db, $query);
    $count=mysqli_num_rows($result);
    $result = mysqli_fetch_assoc($result);
    $name=$result['name'];
    $password=$result['password'];
    // echo $result['3'];
    // echo $count;

    if($count==1){
    
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        // $mail->SMTPDebug = 4;                                           // Enable verbose debug output

        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                                 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                         // Enable SMTP authentication
        $mail->Username = 'pkbank2020@gmail.com';                     // SMTP username
        $mail->Password = 'Safi@2020';                                 // SMTP password
        $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                              // TCP port to connect to

        $mail->setFrom('pkbank2020@gmail.com');
        $mail->addAddress($email);                                      // Add a recipient               
        $mail->addReplyTo('pkbank2020@gmail.com');


        //$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');            // Optional name
        
        $mail->isHTML(true);                                            // Set email format to HTML

        $mail->Subject = 'Password Recovery';
        $mail->Body    = "<body>Dear $name,<br><br>Your Password is : $password .</body>";




        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()){
            $message = "Email not sent Please Check Your Connection.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        else{
            $message = "Password Sent Successfully on your Email.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }
    
    else{
        $message = "User not Registered";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    mysqli_close($db);
}

////////////////////////////////////////  User Forgot password Ends Email Sent to user ///////////////////////




?>
