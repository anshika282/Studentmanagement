<?php
session_start();
include "dbcon.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// $uid=$_POST['uid'];
       $class=$_POST['std'];
       $section=$_POST['sec'];

    if($class=="2"){
       if($section=="a"){
         header('location:timetable_10a.html');    
       } else{
        header('location:timetable_10B.html');
    } 
}

    if($class=="3"){
        if($section=="a"){
          header('location:timetable_12A.html');   
        }else{
         header('location:timetable_12B.html');
     } 
    
    }
    
}else{
        echo "wrong code!!!";
    }

 $con->close(); 


?>