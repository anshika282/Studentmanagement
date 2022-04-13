<?php
session_start();
error_reporting(0);
include('dbcon.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find result</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/blue.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <link rel="stylesheet" href="loading.css"></link>
        <script src="js/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-black-300">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4>Student Result Portal</h4>
                                </div>
                            </div>
                            <div class="panel-body p-20">

                           

                                <form action="result.php" method="post">
                                	<div class="form-group">
                                		<label for="rollid">Enter your Roll Id</label>
                                        <input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid">
                                	</div>
                               <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php 
$sql = "SELECT * from class";
$checksql=mysqli_query($con,$sql);

// $query = $dbh->prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
if(mysqli_num_rows($checksql) > 0)
{
while($result=mysqli_fetch_array($checksql))
{   ?>
<option value="<?php echo $result['cid']; ?>"><?php echo $result['cstd']; ?>&nbsp; Section-<?php echo $result['section']; ?></option>
<?php }} ?>
 </select>
</div>

    
                                    <div class="form-group mt-20">
                                        <div class="">
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Search<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                       <div class="col-sm-6">
                                                               <a href="">Back to Home</a>
                                                            </div>
                                </form>

                                <hr>

                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center"><small>Copyright © 2020 SRMS</small></p>
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

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
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/lobipanel.min.js"></script>
        <script src="js/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
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
