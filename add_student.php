<?php 

$showAlert = false; 
$showError = false; 
$exists=  false;

session_start();
include "dbcon.php";
if(!isset($_SESSION['name']))
{
 echo "logged out";  
header('location:index.php'); }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$uid=$_POST['uid'];
	    $password =$_POST['spwd'];
      $name=$_POST['sname'];
      $email=$_POST['email'];
      $class=$_POST['sclass'];
      $classid=$_POST['classid'];
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
        
          // $classcheck="Select * from class where section='$sec' && cstd='$class' ";
          // $classquery = mysqli_query($con,$classcheck);
        	// // $classcount=mysqli_num_rows($classquery);
          // while($resultclass=mysqli_fetch_array($classquery)){
          //    $rest=$resultclass['cid'];
          
          //     }         
         
	          if($stucount==0){

              if($classid!='201' || $classid!='202'|| $classid!='203'|| $classid!='204') {  
                     // Password Hashing is used here. 
					 // The hash of the password that
					 // can be stored in the database
         
					          $hash = password_hash($password, PASSWORD_DEFAULT);
                     $stuentry = "INSERT INTO `student` (`uid`, `sname`, `email`, `sclass` , `password` , `clid` , `section` , `mno` , `gender` , `dob`) VALUES ('$uid','$name', '$email','$class','$hash','$classid','$sec','$mob','$gender','$dob')";

                     $result = mysqli_query($con, $stuentry);
                     if ($result) {
						            $showAlert = true;
						 
						 	  
                     }else{
                       $showError = "Some error in updating database";
                     }
                 } 
                 else { 
                     $showError = "Class Id  do not match"; 
                 }      
       }   
       if($stucount>0) 
   {
      $exists="Student already exists "; 
   } 
	
	
  
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | add student </title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <!-- custom css -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
  body {
  background: rgb(223,118,138);
background: linear-gradient(90deg, rgba(223,118,138,1) 0%, rgba(235,157,73,0.7063200280112045) 43%, rgba(190,209,163,1) 100%);
  min-height: 100vh;
  overflow-x: hidden;
}
 
  .card{
          margin: auto;
          width: 70%;
          border: 1px ;
          padding: 5px;
        }
       

.nav-item::after {
     content: '';
     display: block;
     width: 0px;
     height: 2px;
     background: #fec400;
     transition: 0.4s
 }

 .nav-item:hover::after {
     width: 100%;
 }
 .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
  }
  .card-registration .select-arrow {
    top: 13px;
  }
</style>
<body>

<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
      <div class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
        <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row  py-2  sticky-top " id="sidebar">
          <div class="text-center p-3">
            <img src="images/s1logo.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow"  />
           <a href="#" class="navbar-brand mx-0 fw-bolder fs-3 text-nowrap"  style="color:coral" ><?php echo $_SESSION['name'];?></a>
          </div>
              <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse order-last align-self-start" id="nav">
          <ul class="nav flex-column mb-0">
  <li class="nav-item  ">
    <a href="teacherdash.php" class="nav-link text-light bg-dark fs-5" style="margin-left:2px">  
        <i class="fas fa-school mr-3 text-secondary" style="margin:3px 4px 3px 4px;"></i>
        Dashboard
    </a>
  </li>       
  <li class="nav-item  ">
    <a href="details_student.php" class="nav-link text-light bg-dark fs-5" style="margin-left:2px">  
        <i class="fas fa-user-circle mr-3 text-secondary" style="margin:3px 4px 3px 4px;"></i>
        Student Details
    </a>
  </li>  
  <li class="nav-item  ">
    <a   href="result_index.php" target="_blank"  class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;" ></i>
        Result
    </a>
  </li>  
  <li class="nav-item  ">
    <a href="attendance.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-calendar-alt mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
        Attendance
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="add_student.php" class="nav-link text-light bg-dark fw-bold  fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3  text-primary"  style="margin:3px 4px 3px 4px;"></i>
        Add Student
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="add_subject.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
        Add Subject
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="add_teacher.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
        Add Teacher
    </a>
  </li>
  <li class="nav-item  ">
    <a href="add_class.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
        Add Class
    </a>
  </li>
  <li class="nav-item  ">
    <a href="ebook.php" target="_blank" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
        <i class="fas fa-book-open mr-3 text-secondary"  style="margin:3px 4px 3px 4px;" ></i>
        E-book
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="logout.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px" >  
        <i class="fas fa-sign-out-alt mr-3 text-secondary"  style="margin:3px 4px 3px 4px;"></i>
        Logout
    </a>
  </li> 
</ul>
          </div>      
        </nav>   
</div>   

  <main class="col px-0 flex-grow-1">
<?php
if($showAlert) {
    
	echo ' <div class="alert alert-success 
		alert-dismissible fade show" role="alert">

		<strong>Success!</strong> Student  account is 
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
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration bg-transparent border border-3  my-4">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>

                <div class="row">
                  <form class="" action="" method="post">
                  
                    <div class="form-outline">
                      <input type="text" id="sname" name="sname" class="form-control form-control-lg" pattern="^([a-zA-Z' ']+)$"
                       title="only character and spaces allowed" required/>
                      <label class="form-label" for="form3Example1m">Full Name</label>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="uid" name="uid" class="form-control form-control-lg"  pattern="\b(1[0-9][0-9][0-9]|25[0-5])" 
                   title="should start with 1... and 4 digit only" required/>
                      <label class="form-label" for="form3Example1n">UID</label>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <input type="text" id="classid" name="classid" class="form-control form-control-lg" placeholder="ex:201,204" pattern="\b(2[0-9][0-9]|25[0-5])" 
                   title="should start with 2.. and 3 digit only" required/>
                  <label class="form-label" for="email">ClassId</label>
                 </div> 
                </div>
                </div> 

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="tel" id="mob" name="mob"  class="form-control form-control-lg" pattern="^[0-9]{10}$" 
                      title="Only 10 valid digiits allowed" required/>
                      <label class="form-label" for="form3Example1m1">Mobile No.</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="password" id="passs" name="spwd" class="form-control form-control-lg"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                      <label class="form-label" for="form3Example1n1">Password</label>
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

                <!-- <div class="row">
                 
                </div> -->

                <div class="form-outline mb-4">
                  <input type="date" id="dob" name="dob" class="form-control form-control-lg" />
                  <label class="form-label" for="dob">DOB</label>
                </div>
                <div class="row">
                 <div class="col-md-6 mb-4">

                    <select class="select" name="sclass" required>
                      <option value="1">Standard</option>
                      <option value="10">10</option>
                      <option value="12">12</option>
                      <!-- <option value="4">Option 3</option> -->
                    </select>

                  </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
<h6 class="mb-0 me-4"> Section: </h6>

<div class="form-check form-check-inline mb-0 me-4">
  <input
    class="form-check-input"
    type="radio"
    name="sec"
    id="seca"
    value="a"
    required
  />
  <label class="form-check-label" for="seca">A</label>
</div>

<div class="form-check form-check-inline mb-0 me-4">
  <input
    class="form-check-input"
    type="radio"
    name="sec"
    id="secb"
    value="b"
  />
  <label class="form-check-label" for="secb">B</label>
</div>
</div>
</div>

                

                <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" class="form-control form-control-lg" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                  title="Must contain a @ and . and right pattern "  required/>
                  <label class="form-label" for="email">Email ID</label>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-primary btn-lg ">Reset all</button>
                  <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
         </form>
        </div>
      </div>
    </div>
  </div>
</section>

  
</main>
    </div>
</div>
    
 


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    <!-- custom js -->
   
</body>

</html>






