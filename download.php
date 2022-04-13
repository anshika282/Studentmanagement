<?php 

include 'dbcon.php';
$base_url = "http://localhost/project/"; // Website url


$id = $_GET['id']; // Get id from url bar

if (!$id) {
    header("Location: ebook.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="ebook.css">

	<title>File Upload</title>
</head>
<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-download fa-2x"></i><span><span>down</span>load</span></p>			
		</div>
		<form class="body">
			<div class="download">
                 <table class="table table-responsive table-bordered px-2" id="myTable">
              <thead> 
                  <?php 
                    
                $sql = "SELECT * FROM ebook1 where id='$id' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_assoc($result)) {
                ?>
              
                <a href="uploads/<?php echo $row['new_name']; ?>" download="<?php echo $row['name']; ?>" class="download_link"><?php echo $row['name']; ?></a>
                <?php
                    }
                }
                
                ?>
                 </tbody>
            </div>
		</form>
	</div>
</body>
</html>

                  
                    