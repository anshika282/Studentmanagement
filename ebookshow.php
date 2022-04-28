<?php
include 'dbcon.php';
 session_start();
 if(!isset($_SESSION['username']))
  {
   echo "logged out";  
 header('location:index.php'); }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | ebook/title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <!-- custom css -->
    <link rel="stylesheet" href="profile.css"></link>
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
      width:60%;
      height:100px;
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
            <img src="images/s1logo.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1  d-none d-md-block shadow "  />
           <a href="#" class="navbar-brand mx-0 fw-bolder fs-3 text-nowrap"  style="color:coral" > <?php  echo  $_SESSION['username'] ?> </a>
          </div>
              <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse order-last align-self-start" id="nav">
          <ul class="nav flex-column mb-0">
  <li class="nav-item  ">
    <a href="homepg.php" class="nav-link text-light bg-dark  fs-4" >  
        <i class="fas fa-school mr-3 text-secondary" ></i>
        Dashboard
    </a>
  </li>       
  <li class="nav-item  ">
    <a href="student_profile.php" class="nav-link text-light bg-dark fs-4" >  
        <i class="fas fa-th-large mr-3 text-secondary"></i>
        Profile
    </a>
  </li>  
  <li class="nav-item  ">
    <a   href="find_result.php" target="_blank"  class="nav-link text-light bg-dark  fs-4" >  
        <i class="fas fa-th-large mr-3 text-secondary "></i>
        Result
    </a>
  </li>  
  <li class="nav-item  ">
    <a href="student_attendance.php" class="nav-link text-light bg-dark  fs-4" >  
        <i class="fas fa-calendar-alt mr-3 text-secondary "></i>
        Attendance
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="timetable.php" target="_blank" class="nav-link text-light bg-dark  fs-4" >  
        <i class="fas fa-th-large mr-3 text-secondary "></i>
        Timetable
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="ebookshow.php" class="nav-link text-light bg-dark fw-bold  fs-4 " >  
        <i class="fas fa-book-open mr-3 text-primary"></i>
        E-book
    </a>
  </li> 
  <li class="nav-item  ">
    <a href="logout.php" class="nav-link text-light bg-dark  fs-4" >  
        <i class="fas fa-sign-out-alt mr-3 text-secondary"></i>
        Logout
    </a>
  </li> 
</ul>
          </div>      
        </nav>   
</div>   

  <main class="col px-0 flex-grow-1">
 <section>
  <!-- <div class="container "> -->
  <div class="panel panel-default px-2 ">
      <div class="panel-heading px-4 ">
        <h1 style="text-align: center; margin-top:20px;">Download Files</h1>                
      </div>
      <div class="panel-body table-responsive py-4 ">  
<table class="table table-responsive table-bordered px-2 py-4 bg-white table-shadow" >
              <thead class="bg-secondary text-white"> 
                  <tr>
                      <th >FileName</th>
                      <th>DownloadlINK</th>
                  </tr>
              </thead>
              <tbody>
    <?php
$sql="SELECT * FROM ebook1";
$result=mysqli_query($con,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<tr>
                  <td><?php echo $rows['name']; ?></td>
                  <td><a href="<?php echo $rows['share']; ?>"><?php echo $rows['new_name']; ?> </a></td>
                    </tr>
</section>
<?php 
// close while loop 
}
?>
</tbody>
</table>
</div>
    <div class="panel-footer">
          
    </div>
   </div>
<!-- </div> -->
</main>
    </div>
</div>

    
 


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    <!-- custom js -->
   
</body>

</html>

                