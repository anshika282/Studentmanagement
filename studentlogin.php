<?php
session_start();
include 'dbcon.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// $uid=$_POST['uid'];
	$password =$_POST['spwd'];
       $name=$_POST['sname'];
       $semail=$_POST['email'];
       
       // $verify = password_verify($password, $hash);
	$namesearch="select * from student where sname='$name' and email='$semail' ";
	$query = mysqli_query($con,$namesearch);

	$namecount=mysqli_num_rows($query);
	if($namecount){
      
       $namepass=mysqli_fetch_assoc($query);  
       if (password_verify($password, $namepass['password'])){ 
               $db_pass=$namepass['spwd'];
       $_SESSION['username'] = $namepass['sname'];
       $_SESSION['email']=$namepass['email'];
        	echo "login succesful";
       	header('location:homepg.php'); 
          }else{
               
             echo '<script type ="text/JavaScript">';  
             echo 'alert("Wrong password")';  
             echo '</script>';  
              // header('location:index.php'); 
              // header('location:index.php?error=Wrong password !!'); 
          }
      
       }else{
       echo "Entered wrong name!!";}
       }else{
	echo "Invalid email";
        }
 $con->close(); 
?>
 <!-- action="<php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" -->