<?php
include 'dbcon.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tid = $_POST['tid'];
        $passwrd = $_POST['tpwd'];    
        $tidsearch="select * from teacher where tid='$tid' &&  tid='$tid'";
        $query = mysqli_query($con,$tidsearch);
    
        $tidcount=mysqli_num_rows($query);
        if($tidcount){
          $namepass=mysqli_fetch_assoc($query);
          if (password_verify($passwrd, $namepass['password'])){ 
          //  $tidpass=mysqli_fetch_assoc($query);
          //  $db_pass=$tidpass['spwd'];
           $_SESSION['name'] = $namepass['tname'];
          //  echo '<script type="text/javascript">';
          //  echo ' alert("login succesful")';  //not showing an alert box.
          //  echo '</script>';
          //      echo "login succesful";
          //      header('location:teacherdash.php');
               echo ("<script LANGUAGE='JavaScript'>
               window.alert('login succesful');
               window.location.href='teacherdash.php';
               </script>");
              }else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Wrong password,try again.');
                window.location.href='index.php';
                </script>");
               }
    }
    else{
      //echo "The record could not be inserted successfully because of this error".mysqli_error($conn);
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('credentials wrong,try again.');
      window.location.href='index.php';
      </script>");
           
    }


}

?>