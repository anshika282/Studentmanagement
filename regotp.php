<?php
 
 session_start();
 $rdno=rand(100000,999999);
$message=urlencode($rdno);
$to_email = $_SESSION['email'];
$subject = "One time password for registration";
$headers = "From: anshioned2002@gmail.com";

if (mail($to_email, $subject, $message, $headers)) {
    echo "OTP : $message ";
    // if(isset($_POST['btn-save']))
// {
// $_SESSION['name']=$_POST['name'];
// $_SESSION['email']=$_POST['email'];
// $_SESSION['phone']=$_POST['phone'];
$_SESSION['otp']=$rdno;
header("Location:verify_otp.php");
//  }
    
} else {
    echo "Email sending failed...";
}
?>