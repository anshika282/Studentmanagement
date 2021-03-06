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
	    $tpassword =$_POST['tpwd'];
      $tname=$_POST['tname'];
      $temail=$_POST['email'];
     

	//    used for preventing sql injections
	//    $tname = stripcslashes($tname);  
	//    $tpassword = stripcslashes($tpassword);  
	//    $temail=stripcslashes($temail);
	   

	//    $tname = mysqli_real_escape_string($con, $tname);  
	//    $tpassword= mysqli_real_escape_string($con, $tpassword);
	//    $temail= mysqli_real_escape_string($con, $temail);
			$stucheck1="Select * from teacher where tname='$tname' or email='$temail' ";
          $query1 = mysqli_query($con,$stucheck1);
        	$stucount1=mysqli_num_rows($query1);              
	          if($stucount1==0){
          //            Password Hashing is used here. 
					//  The hash of the password that
					//  can be stored in the database
         
					          $hash = password_hash($tpassword, PASSWORD_DEFAULT);
                     $stuentry = "INSERT INTO `teacher` (`tid`, `tname`, `email`, `password`) VALUES (NULL, '$tname', '$temail', '$hash')";

                     $result = mysqli_query($con, $stuentry);
                     if ($result) {
						            $showAlert = true;	 	  
                     }else{
                      //  $showError = "";
                       echo '<script type ="text/JavaScript">';  
                       echo 'alert("Some error in updating database!")';  
                       echo '</script>';
                     }
                 }     
         
       if($stucount1>0) 
   {
      // $exists=""; 
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Teacher name or email already exists!")';  
      echo '</script>';
   } 
	
	
  
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Add teacher</title>
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
    <a href="add_student.php" class="nav-link text-light bg-dark   fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
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
    <a href="add_teacher.php" class="nav-link text-light bg-dark fw-bold fs-5" style="margin-left:2px">  
        <i class="fas fa-th-large mr-3 text-primary "  style="margin:3px 4px 3px 4px;"></i>
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
    <a href="ebook.php" target="_blank" class="nav-link text-light bg-dark  fs-5 " style="margin-left:2px">  
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

		<strong>Success!</strong> Teacher Account account is 
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
       <form action="add_teacher.php" method="post">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration bg-transparent border border-3 my-4">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Teacher registration form</h3>
                <div class="row">
                  <div class="col-md- 12 mb-4">
                    <div class="form-outline">
                      <input type="text" id="tname" name="tname" class="form-control form-control-lg"  pattern="^([a-zA-Z' ']+)$"
                       title="only character and spaces allowed" required/>
                      <label class="form-label" for="form3Example1n">Teacher Name</label>
                    </div>
                  </div>
                </div> 

                <div class="row">
                  <div class="col-md-12 mb-4">
                    <div class="form-outline">
                      <input type="password" id="tpwd" name="tpwd" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                      <label class="form-label" for="form3Example1n1">Password</label>
                    </div>
                  </div>
                </div>


                <!-- <div class="row">
                 
                </div> -->
                <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" class="form-control form-control-lg" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                  title="Must contain a @ and . and right pattern " required/>
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
</form>
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






