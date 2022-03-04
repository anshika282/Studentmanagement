<?php
        session_start();
     
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        $rno=$_SESSION['otp'];
        $urno=$_POST['user_otp'];
        if(!strcmp($rno,$urno))
        {
        // $name=$_SESSION['name'];
        header("Location:homepg.php");
        //For admin if he want to know who is register
        }else{
        echo "<p>Invalid OTP</p>";
        }
        }
    ?>