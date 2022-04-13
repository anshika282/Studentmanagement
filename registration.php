 <?php

$showAlert = false; 
$showError = false; 
$exists=  false;

session_start();
include 'dbcon.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uid=$_POST['uid'];
	$password =$_POST['spwd'];
       $name=$_POST['sname'];
       $email=$_POST['email'];
       $class=$_POST['sclass'];
       $cpassword=$_POST['cpwd'];

	//    used for preventing sql injections
	   $uid=stripcslashes($uid);
	   $name = stripcslashes($name);  
	   $password = stripcslashes($password);  
	   $email=stripcslashes($email);
	   $class=stripcslashes($class);

	   $name = mysqli_real_escape_string($con, $name);  
	   $password= mysqli_real_escape_string($con, $password);
	   $email= mysqli_real_escape_string($con, $email);
	   $class= mysqli_real_escape_string($con, $class);
	   $uid= mysqli_real_escape_string($con, $uid);

			$stucheck="Select * from student where sname='$name' && email='$email' ";
            	$query = mysqli_query($con,$stucheck);
        	$stucount=mysqli_num_rows($query);
	          if($stucount==0){
              if(($password == $cpassword) && $exists==false) {  
                     // Password Hashing is used here. 
					 // The hash of the password that
					 // can be stored in the database
					 $hash = password_hash($password, 
							 PASSWORD_DEFAULT);
                     $stuentry = "INSERT INTO `student` (`uid`, `sname`, `email`, `sclass`,`password`) VALUES ('$uid','$name', '$email','$class','$hash')";

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
      $exists=" Account already exists "; 
   } 
	
	
  
}  
$con->close();

?> 
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="regstyle.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
	input, select {
 
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ff3333;
  border-radius: 4px;

}
p{
 color:blue;
}
a{
    margin: -15px;
}
</style>
<body>
	<?php
if($showAlert) {
    
	echo ' <div class="alert alert-success 
		alert-dismissible fade show" role="alert">

		<strong>Success!</strong> Your account is 
		now created and you can login. 
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close"> 
			<span aria-hidden="true">&times;</span> 
		</button> 
	</div> '; 
}

if($showError) {

	echo ' <div class="alert alert-danger 
		alert-dismissible fade show" role="alert"> 
	<strong>Error!</strong> '. $showError.'

   <button type="button" class="close" 
		data-dismiss="alert aria-label="Close">
		<span aria-hidden="true">&times;</span> 
   </button> 
 </div> '; 
}
	
if($exists) {
	echo ' <div class="alert alert-danger 
		alert-dismissible fade show" role="alert">

	<strong>Error!</strong> '. $exists.'
	<button type="button" class="close" 
		data-dismiss="alert" aria-label="Close"> 
		<span aria-hidden="true">&times;</span> 
	</button>
   </div> '; 
 }

?>
<div class="container" id="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<h1>Student Sign Up </h1>
			<div class="social-container">
				<a href="#" class="social" style="color: #333;font-size: 14px;text-decoration: none;margin: 15px 0;"><i class="fab fa-linkedin-in"></i></a>
			    <a href="#" class="social" style="color: #333;font-size: 14px;text-decoration: none;margin: 15px 0;"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social" style="color: #333;font-size: 14px;text-decoration: none;margin: 15px 0;"><i class="fab fa-google"></i></a>
            </div>
			<span class="center">or</span>
			<input type="text" placeholder="Name" name="sname" pattern="^([a-zA-Z' ']+)$" title="only character and spaces allowed" required/>
			<input type="number" placeholder="UID" name="uid" required/>
			<input type="number"  placeholder="Class" name= "sclass" required />
            <input type="email"  placeholder="Email" name= "email" required/>
			<div class="row"> 
			<select  name="sclass">
                      <option value="1">Standard</option>
                      <option value="10">10</option>
                      <option value="12">12</option>
                  
                    </select>
					<select  name="gender">
                      <option value="1">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
					  <option value="Others">Others</option>
                  
                    </select>
</div >



			<!-- <input type="checkbox" onclick="myFunction()"><h6> show password</h6><br><br> -->
            <input id="pass"   placeholder="Password" type="password" class="input" name= "spwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
			<input id="cpass"   placeholder="Confirm password" type="password" class="input" name= "cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  required />
		  <button type ="submit">Sign Up</button>     
          <a href="index.php"><p>Already Registered?Sign In</p></a>
		</form>
</div>
 
</body>
<script>
	
</script>

</html>