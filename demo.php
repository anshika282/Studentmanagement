<?php

session_start();
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student home</title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- custom css -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
          <div class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
            <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row  py-2  sticky-top " id="sidebar">
              <div class="text-center p-3">
                <img src="images/attendence.jpg" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow sizeimg"  />
               <a href="#" class="navbar-brand mx-0 fw-bolder fs-3 text-nowrap"  style="color:coral" >dfg</a>
              </div>
                  <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse order-last align-self-start" id="nav">
              <ul class="nav flex-column mb-0">
      <li class="nav-item  ">
        <a href="homepg.php" class="nav-link text-light bg-dark  fs-4" style="margin-left:2px">  
            <i class="fas fa-school mr-3 text-primary" style="margin:3px 4px 3px 4px;"></i>
            Dashboard
        </a>
      </li>       
      <li class="nav-item  ">
        <a href="#" class="nav-link text-light bg-dark fs-4" style="margin-left:2px">  
            <i class="fas fa-user-circle mr-3 text-secondary" style="margin:3px 4px 3px 4px;"></i>
            Student Details
        </a>
      </li>  
      <li class="nav-item  ">
        <a   href="#" class="nav-link text-light bg-dark  fs-4" style="margin-left:2px">  
            <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;" ></i>
            Result
        </a>
      </li>  
      <li class="nav-item  ">
        <a href="#" class="nav-link text-light bg-dark fw-bold fs-4" style="margin-left:2px">  
            <i class="fas fa-calendar-alt mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
            Attendance
        </a>
      </li> 
      <li class="nav-item  ">
        <a href="add_student.php" class="nav-link text-light bg-dark  fs-4" style="margin-left:2px">  
            <i class="fas fa-th-large mr-3 text-secondary "  style="margin:3px 4px 3px 4px;"></i>
            Add Student
        </a>
      </li> 
      <li class="nav-item  ">
        <a href="#" class="nav-link text-light bg-dark  fs-4 " style="margin-left:2px">  
            <i class="fas fa-book-open mr-3 text-secondary"  style="margin:3px 4px 3px 4px;" ></i>
            E-book
        </a>
      </li> 
      <li class="nav-item  ">
        <a href="logout.php" class="nav-link text-light bg-dark  fs-4" style="margin-left:2px" >  
            <i class="fas fa-sign-out-alt mr-3 text-secondary"  style="margin:3px 4px 3px 4px;"></i>
            Logout
        </a>
      </li> 
    </ul>
              </div>      
            </nav>   
    </div>   
    <main class="col px-0 flex-grow-1">
    <div class="container mt-5">
              <div class="row ">
                  
                  <div class="col-md-3">
                      <div class="card text-center">
                          <div class="card-header bg-primary text-white">
                              <div class="row align-items-center">
                                  <div class="col">
                                      <i class="fas fa-calendar-alt fa-4x"></i>
                                  </div>
                                  <div class="col">
                                      <h3 class="display-3">
                                      <?php
                                      $date=date('d-m-y');
                                            $stsql="Select count(DISTINCT date) as scount from attendence where date='$date' ";
                                            $rstsql=mysqli_query($con,$stsql);
                                            if($rstsql > 0){
                                                
                                                    echo '1'; 
                                                
                                            }else{
                                                echo '0';
                                            }
                                          ?>
                                      </h3>
                                      <h6>Tasks</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <h5>
                                  <a href="attendance.php" class="text-primary">Attendance <i class="fas fa-arrow-alt-circle-right"></i></a>
                              </h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card text-center">
                          <div class="card-header bg-success text-white">
                              <div class="row align-items-center">
                                  <div class="col">
                                      <i class="fas fa-users fa-4x"></i>
                                  </div>
                                  <div class="col">
                                      <h3 class="display-3">
                                      <?php
                                            $stsql="Select count(*) as scount from student where clid in (select cid from class where cteacher ='ramesh kumar') ";
                                            $rstsql=mysqli_query($con,$stsql);
                                            if(mysqli_num_rows($rstsql) > 0){
                                                while($row=mysqli_fetch_array($rstsql)){
                                                    echo $row['scount']; 
                                                }
                                            }
                                          ?>
                                      </h3>
                                      <h6>Tasks</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <h5>
                                  <a href="details_student.php" class="text-primary">Students Total<i class="fas fa-arrow-alt-circle-right"></i></a>
                              </h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card text-center">
                          <div class="card-header bg-warning text-white">
                              <div class="row align-items-center">
                                  <div class="col">
                                      <i class="far fa-file-alt fa-4x"></i>
                                  </div>
                                  <div class="col">
                                      <h3 class="display-3">
                                      <?php
                                            $stsql="Select count(DISTINCT stuid) as scount from result where stuid in (select uid from  student where clid in (select cid from class where cteacher ='ramesh kumar') )  ";
                                            $rstsql=mysqli_query($con,$stsql);
                                            if(mysqli_num_rows($rstsql) > 0){
                                                while($row=mysqli_fetch_array($rstsql)){
                                                    echo $row['scount']; 
                                                }
                                            }
                                          ?>
                                      </h3>
                                      <h6>Tasks</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <h5>
                                  <a href="result_index.php" target="_blank"class="text-primary">Results<i class="fas fa-arrow-alt-circle-right"></i></a>
                              </h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card text-center">
                          <div class="card-header bg-info text-white">
                              <div class="row align-items-center">
                                  <div class="col">
                                      <i class="fas fa-book-open fa-4x"></i>
                                  </div>
                                  <div class="col">
                                      <h3 class="display-3">
                                      <?php
                                            $stsql="Select count(id) as scount from ebook1  ";
                                            $rstsql=mysqli_query($con,$stsql);
                                            if(mysqli_num_rows($rstsql) > 0){
                                                while($row=mysqli_fetch_array($rstsql)){
                                                    echo $row['scount']; 
                                                }
                                            }
                                          ?>
                                      </h3>
                                      <h6>Tasks</h6>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <h5>
                                  <a href="ebook.php" target="_blank" class="text-primary">Ebook<i class="fas fa-arrow-alt-circle-right"></i></a>
                              </h5>
                          </div>
                      </div>
                  </div>
              </div>
         </div>
    </main>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
<!-- custom js -->

</body> 

</html>