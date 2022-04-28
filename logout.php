<?php
 session_start();

 session_destroy();
 echo ("<script LANGUAGE='JavaScript'>
             window.alert('succesfully logout!!!');
             window.location.href='index.php';
             </script>");
// header('location:index.php');
?>



