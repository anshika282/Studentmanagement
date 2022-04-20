<?php
session_start();
error_reporting(0);
include('dbcon.php');
// if(strlen($_SESSION['alogin'])=="")
   $msg="";
   $error="";

$stid=intval($_GET['sbid']);
if(isset($_POST['submit']))
{

$rowid=$_POST['id'];
// $marks=$_POST['marks']; 
// foreach($rowid as $count => $id){
// $mrks=$marks[$count];
// $iid=$rowid[$count];
// for($i=0;$i<=$count;$i++) {
$sql="delete from subject where sbid='$rowid' ";
$upresult=mysqli_query($con,$sql);
if($upresult){
    $msg="Subject info updated successfully";
}
else{
    $error="wrong";
}

// }
// }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student result</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Result Info</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Result Info</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Delete the Subject </h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<?php 

$ret = "select * from  subject where  sbid='$sbid' ";
$upret=mysqli_query($con,$ret);
$cnt=1;
// if($stmt->rowCount() > 0)
if(mysqli_num_rows($upret) > 0)
{
while($row=mysqli_fetch_array($upret))
{  ?>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Subject Name</label>
<div class="col-sm-10">
<?php echo $row['subjname'];?>
</div>
</div>
<?php } }?>



<?php 
$sql = "select * from  subject where sbid='$sbid'";

$upsql=mysqli_query($con,$sql);

$cnt=1;
if(mysqli_num_rows($upsql) > 0)
{
while($result=mysqli_fetch_array($upsql))
{  ?>



<div class="form-group">
<label for="default" class="col-sm-2 control-label"><?php echo $result['subjname']?></label>
<div class="col-sm-10">
<input type="hidden" name="id[]" value="<?php echo $result['sbid']?>" placehoder="<?php echo $result['sbid']?>" readonly>
</div>
</div>




<?php }} ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">delete</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
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
