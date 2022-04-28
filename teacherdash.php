
<?php
  session_start(); 
  include 'dbcon.php';
   if(!isset($_SESSION['name']))
  {
   echo "logged out";  
 header('location:index.php'); }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher dashboard</title>
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
  .sizeimg{
      width:90%;
      height:100px;
      margin:2px 1px 2px 1px;
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
    <a href="teacherdash.php" class="nav-link text-light bg-dark fw-bold fs-5" style="margin-left:2px">  
        <i class="fas fa-school mr-3 text-primary" style="margin:3px 4px 3px 4px;"></i>
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
    <a   href="result_index.php" target="_blank" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
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
    <a href="add_student.php" class="nav-link text-light bg-dark  fs-5" style="margin-left:2px">  
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
// echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
// <strong>Success!</strong> You have logged in successfully!     
// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//   <span aria-hidden="true">&times;</span>
// </button>
// </div>';
?>
   <div class="container py-3"> 
 
     <div class="row">
     <div class="row row-cols-1 row-cols-md-4 g-1">
  <div class="col">
    <div class="card bg-transparent border border-dark h-100">
     <a href="attendance.php"><img src="images/att.png" class="center card-img-top" alt="..."></a> 
      <div class="card-body ">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:medium;font-size:25px;text-align:center;" class="card-tittle"><b>Attendance</b></p>  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent border border-dark h-100">
    <a href="result_index.php" target="_blank"><img src="images/res.png" class="card-img-top" alt="..."></a>
      <div class="card-body">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:medium;font-size:25px;text-align:center;" class="card-tittle"><b>Result</b></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent border border-dark h-100">
    <a href="add_student.php"><img src="images/addst.png" class="card-img-top" alt="..."></a>
      <div class="card-body">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:medium;font-size:25px;text-align:center;" class="card-tittle"><b>Add Student</b></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent border border-dark h-100" style="max-width: 18rem;">
    <a href="ebook.php" target="_blank"><img src="images/ebk.png" class="card-img-top" alt="..."></a>
      <div class="card-body">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:medium;font-size:25px;text-align:center;" class="card-tittle"><b>E-book</b></p>
      </div>
    </div>
  </div>
</div>
</div>
</div>

</main>
    </div>
</div>

    
 


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    <!-- custom js -->
   
</body>

</html>

