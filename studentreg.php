<?php

$showAlert = false; 
$showError = false; 
$exists=false;

session_start();
include 'dbcon.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uid=$_POST['uid'];
	$password =$_POST['spwd'];
       $name=$_POST['sname'];
       $email=$_POST['email'];
       $class=$_POST['sclass'];
       $cpassword=$_POST['cpwd'];
	$stucheck="Select * from student where sname='$name' && email= '$email'";
	$query = mysqli_query($con,$stucheck);

	$stucount=mysqli_num_rows($query);
	if($stucount==0){
              if(($password == $cpassword) && $exists==false) {
    
                         
                     // Password Hashing is used here. 
                     $stuentry = "INSERT INTO `student` ( `sname`, `email`,`password`) VALUES ('$name', 
                         '$password', '$email')";
             
                     $result = mysqli_query($con, $stuentry);
             
                     if ($result) {
                         $showAlert = true; 
                         header("Location:index.php");
                     }
                 } 
                 else { 
                     $showError = "Passwords do not match"; 
                 }      
       }
       if($stucount>0) 
   {
      $exists="Username not available"; 
   } 
    
}     
$con->close();


?>
<!-- //        $namepass=mysqli_fetch_assoc($query);
//        $db_pass=$namepass['spwd'];
//        $_SESSION['username'] = $namepass['sname'];
       
//        	echo "Registration succesful";
//        	header('location:homepg.php'); 
//        }else{
//        echo "login unsuccesful";}
//        }else
// {
// 	echo "Invalid email";
// } -->
