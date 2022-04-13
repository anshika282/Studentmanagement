

<?php 
session_start();
include 'dbcon.php';
$base_url = "http://localhost/project/"; // Website url

$link = "";
$link_status = "display: none;";
$showAlert="";

if (isset($_POST['submit'])) { // If isset upload button or not
	  $links=$_POST['links'];
      $filename=$_SESSION['filen'];
    //   $sql="insert into ebook(share) values('$link') where name=;
      $sql = "UPDATE `ebook1` SET `share` = '$links' WHERE `name`='$filename'" ;
      $result=mysqli_query($con,$sql);
      if($result){
          $showAlert="done";
      }else{
        echo"<script>alert('some error in uploading')</script>";
      }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="ebook.css">

	<title>Teacher|Upload</title>
</head>
<style>

	</style>
<body style=" background-color: rgb(223,118,138);  background: linear-gradient(90deg, rgba(223,118,138,1) 0%, rgba(235,157,73,0.7063200280112045) 43%, rgba(190,209,163,1) 100%);" >
<?php if($showAlert) {
    
	echo ' <div class="alert alert-success 
		alert-dismissible fade show" role="alert">

		<strong>Success!</strong> Your account is 
		now created and you can login. 
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close"> 
			<span aria-hidden="true">&times;</span> 
		</button> 
	</div> '; 
} ?>
<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">
			<!-- Sharable Link Code -->
			<input type="text" name="links" placeholder="paste link" required> 
            <button name="submit" class="btn">SHARE</button>
		</form>
	</div>
</body>
</html>