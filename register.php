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
       $cpassword=$_POST['cpsd'];
       $classid=$_POST['classiD'];
       $mob=$_POST['mob']; 
       $gender=$_POST['gender'];
       $dob=$_POST['dob'];
       $sec=$_POST['sec'];
 

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

                     $stuentry = "INSERT INTO `student` (`uid`, `sname`, `email`, `sclass` , `password` , `clid` , `section` , `mno` , `gender` , `dob`) VALUES ('$uid','$name', '$email','$class','$hash','$classid','$sec','$mob','$gender','$dob')";
                     $result = mysqli_query($con, $stuentry);
                     if ($result) {
						//  $showAlert = true;
             echo ("<script LANGUAGE='JavaScript'>
             window.alert('Acc ount created succesfully..now login!');
             window.location.href='index.php';
             </script>");
						//  header("Location:index.php");
						 	  
                     }else{
                      $showError = "Error in SQl ";
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
  body {
	
	background: linear-gradient(90deg, rgba(223,118,138,1) 0%, rgba(235,157,73,0.7063200280112045) 43%, rgba(190,209,163,1) 100%);
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
		data-dismiss="alert" aria-label="Close">
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
<section class="h-100 ">
    <form action="register.php" method="post">
  <div class="container py-5 h-100  ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration bg-transparent  my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img
                src="images/registed.jpg"
                alt="Sample photo"
                class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
              />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>
               
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name="sname" class="form-control form-control-lg" pattern="^([a-zA-Z' ']+)$"
                       title="only character and spaces allowed" required />
                      <label class="form-label" for="form3Example1m">Full name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="number" name="uid"  id="form3Example1n" class="form-control form-control-lg" required />
                      <label class="form-label" for="form3Example1n">UID</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="number" name="classiD" id="form3Example1m1" class="form-control form-control-lg" required/>
                      <label class="form-label" for="form3Example1m1">ClassID</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="tel" name="mob" id="form3Example1n1" class="form-control form-control-lg" pattern="^[0-9]{10}$" 
                      title="Only 10 valid digiits allowed" required/>
                      <label class="form-label" for="form3Example1n1">Mobile No.</label>
                    </div>
                  </div>
                </div>


                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="femaleGender"
                      value="female"
                      required
                    />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="maleGender"
                      value="male"
                    />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="otherGender"
                      value="other"
                    />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      <input type="number" name="sclass" id="sclass" class="form-control form-control-lg" required/>
                      <label class="form-label" for="sclass">class/std</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      <input type="text" name="sec" id="sec" class="form-control form-control-lg" pattern="^[a-zA-Z]$" title="only one alphabet required"  required/>
                      <label class="form-label" for="sec">section</label>
                    </div>

                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="date" name="dob" id="form3Example9" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example9">DOB</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="email" id="form3Example97" class="form-control form-control-lg" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                  title="Must contain a @ and . and right pattern " required/>
                  <label class="form-label" for="form3Example97">Email ID</label>
                </div>
                
                <div class="form-outline mb-4">
                  <input type="password" name="spwd" id="form3Example90" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                  <label class="form-label" for="form3Example90">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="cpsd" id="form3Example99" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                  <label class="form-label" for="form3Example99">Confirm Password</label>
                </div>

                

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-warning btn-lg">Reset all</button>
                  <button type="submit" class="btn btn-success btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
</body>
</html>