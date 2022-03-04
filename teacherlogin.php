<?php
include 'dbcon.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tid = $_POST['tid'];
        $passwrd = $_POST['tpwd'];    
        $tidsearch="select * from teacher where tid='$tid' &&  password='$passwrd'";
        $query = mysqli_query($con,$tidsearch);
    
        $tidcount=mysqli_num_rows($query);
        if($tidcount){
           $tidpass=mysqli_fetch_assoc($query);
           $db_pass=$tidpass['spwd'];
           $_SESSION['name'] = $tidpass['tname'];
           echo '<script type="text/javascript">';
           echo ' alert("login succesful")';  //not showing an alert box.
           echo '</script>';
               echo "login succesful";
               header('location:teacherdash.php');
    }
    else{
      //echo "The record could not be inserted successfully because of this error".mysqli_error($conn);
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Account does not exist! <a href="contactus.html">Contact</a> college for more details
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }


}

?>