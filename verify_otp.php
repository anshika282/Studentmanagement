<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
    
    ?>
 
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        body{
background: linear-gradient(90deg, rgba(223,118,138,1) 0%, rgba(235,157,73,0.7063200280112045) 43%, rgba(190,209,163,1) 100%);
padding-top: 25vh;
}
/* set form background colour*/
form{
background: #fff;
}
/* set padding and size of th form */
.form-container{
border-radius: 10px;
padding: 30px;
}
        </style>
    
<body>
    
    <?php
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> OTP succesfully sent to your email!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
?>  
    <section class="container-fluid">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
    
        <form class="form-container" method="post" action="otp_check.php">  
            <div class="text-center">
                            <h3 class="text-primary">OTP Login</h3>
                        </div>
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary">
                                      <i class="fas fa-key text-white"></i>
                                    </span>
                                    <input type="text" class="form-control" name="user_otp" id="OTP " aria-describedby="emailHelp" placeholder="Enter OTP" required>
                                </div>
                                <button type="submit"  class="btn btn-primary text-center  mt-2" id="verify-otp" name="save">Verify OTP and Login </button>
                            </div>
        </form>
      </section>
    </section>
  </section>
<!-- scripts for bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
</body>
</html>