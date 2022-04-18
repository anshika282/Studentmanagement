<?php
session_start();
error_reporting(0);
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Result Management</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <link rel="stylesheet" href="loading.css"></link>
        <script src="js/modernizr.min.js"></script>
    </head>
    <style>
         body {
             background: rgb(223,118,138);
             background: linear-gradient(90deg, rgba(223,118,138,1) 0%, rgba(235,157,73,0.7063200280112045) 43%, rgba(190,209,163,1) 100%);
            }
            /* .panel{
            background-color: transparent;
            border: 5px solid white;
        } */
            .page-title-div{
                background-color: transparent;
            }
            .imgcl{
                margin-left:50px;
            }
            
        </style>
    <body>
        <div class=" main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->
                    
                    <div class="main-page">
                       
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12 ">
                                    <h2 class="title" align="center"><strong>Result Portal</strong></h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        
                        <!-- /.container-fluid -->
                           </div>
                           <!-- <div class="bg-transparent"> -->
                        <section class="section bg-transparent">
                            <div class="container-fluid ">

                                <div class="row">
                              
                             

                                    <div class="col-md-12 ">
                                        <div class="panel border border-3">
                                            <div class="panel-heading ">
                                                <div class="panel-title">
<?php

$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT  student.sname,student.uid,student.sid,class.cstd,class.section from student join class on class.cid=student.clid where student.uid='$rollid' and student.clid='$classid' ";
// $stmt = $dbh->prepare($qery);
// $stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
// $stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
// $stmt->execute();
// $resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$searchqery=mysqli_query($con,$qery);

$cnt=1;
if(mysqli_num_rows($searchqery)> 0)
{
while($row=mysqli_fetch_array($searchqery)) 
{   ?>
<div class="text-center">
 <img src="images/s1logo.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow"  />
</div>
<div>
    <div class="row">
   <div class="col-md-2">   
<img src="images/s1img.png" alt="profile picture" class="img-fluid imgcl rounded-circle my-4 d-none d-md-block shadow"  />
</div>
<div class="col-md-4"> 
<p><b>Student Name :</b> <?php echo $row['sname'];?></p>
<p><b>Student Roll Id :</b> <?php echo $row['uid'];?>
<p><b>Student Class:</b> <?php echo $row['cstd'];?>(<?php echo $row['section'];?>)
</div>
</div>
<?php }

    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>    
                                                            <th>Marks</th>
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result
$query ="select t.sname,t.uid,t.clid,t.marks,subject.subjname,t.subid from (select sts.sname,sts.uid,sts.clid,tr.marks,tr.subid from student as sts join result as tr on tr.stuid=sts.uid) as t join subject on subject.sbid=t.subid where (t.uid='$rollid' and t.clid='$classid')";

$squery=mysqli_query($con,$query);
$cnt=1;

if($countrow=mysqli_num_rows($squery)>0)
{ 

while($result=mysqli_fetch_array($squery)){

    ?>

                                                		<tr>
                                                <th scope="row"><?php echo $cnt;?></th>
                                                			<td><?php echo $result['subjname'];?></td>
                                                			<td><?php echo $totalmarks=$result['marks'];?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td><b><?php echo $totlcount ; ?></b> out of <b><?php echo $outof=($cnt-1)*100 ; ?></b></td>
                                                        </tr>
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td><b><?php echo  $totlcount*(100)/$outof ; ?> %</b></td>
                                                             </tr>
<tr>
                                                <!-- <th scope="row" colspan="2">Download Result</th>           
                                                            <td><b><a href="download-result.php">Download </a> </b></td>
                                                             </tr> -->

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Roll Id");
 }
?>
                                        </div>



                                                	</tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <!-- <div class="col-sm-6">
                                                               <a href="result_index.php">Back to Home</a>
                                                            </div> -->
                                                        </div>

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                        <!-- </div> -->
                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <div class="loading">
        <span class="loader" data-text="Loading"></span>
        <span>L</span>
        <span>O</span>
        <span>A</span>
        <span>D</span>
        <span>I</span>
        <span>N</span>
        <span>G</span>
        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/lobipanel.min.js"></script>
        <script src="js/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });
            
        $(document).ready(function(){
            $(document).mouseover(function(){
              $(".loading").fadeOut("slow");
            });
        });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->


    </body>
</html>
