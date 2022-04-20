
<?php

session_start();
// error_reporting(0);
include('dbcon.php');
$msg="";
$error="";
if(false)
    {   
    header("Location: index.php"); 
    }
    else{

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SRMS Admin| Result </title>
        <link rel="stylesheet" href=" css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr.min.js"></script>
        <script>
</script>


    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Result Dashboard</h2>
                                
                                </div>
                                
 
     <div class="row">
     <!-- <div class="row row-cols-1 row-cols-md-4 g-4"> -->
  <div class="col">
    <div class="card bg-transparent border border-dark h-100">
     <a href="student_attendance.php"><img src="images/att.png" class="card-img-top" alt="..."></a> 
      <div class="card-body">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:25px;text-align:center;" class="card-tittle"><b>Attendance</b></p>  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card bg-transparent border border-dark h-100">
    <a href="find_result.php" target="_blank"><img src="images/res.png" class="card-img-top" alt="..."></a>
      <div class="card-body">
      <p style=" color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px green;font-size:25px;text-align:center;" class="card-tittle"><b>Result</b></p>
      </div>
    </div>
  </div> 
</div>
</div>
                                <!-- /.col-md-6 text-right -->
                            
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/lobipanel.min.js"></script>
        <script src="js/iscroll.js"></script> 
        <script src="js/prism.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<!-- <PHP } ?> -->
