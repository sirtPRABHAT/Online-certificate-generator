<?php
session_start(); // Starting Session
include('../db.php');
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "email or Password is invalid";
}
else{
// Define $email and $password
$email = $_POST['email'];
$password = $_POST['password'];

// mysqli_connect() function opens a new connection to the MySQL server.
// $db = mysqli_connect("localhost", "root", "", "certificatemanagement");

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT * FROM `adminlogin` WHERE email='$email' and password='$password'";
// To protect MySQL injection for Security purpose
 
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$count = mysqli_num_rows($result);
$result = mysqli_fetch_assoc($result);

if ($count == 1){
$_SESSION['logged']=true; 
$_SESSION['login_user'] = $email;
$_SESSION['login_name'] = $result['name'];
// $_SESSION['login_pwd'] = $result['password'];
$msg = 'Login Complete! Thanks';
    echo "<script> window.location.assign('dashboard.php');</script>";

}else{
$_SESSION['logged']=false;
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}
mysqli_close($db); // Closing Connection
}
?>
