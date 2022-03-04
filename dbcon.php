
<?php
     $host="localhost";
     $dbname="school";
     $user="root";
     $pass="";
                    // Conection of my Database......
    //  $con =mysqli_connect('localhost','root','mysql','school');  //this is procedural  for connection to MYSQL server & Parmeters are: host, username,password,database name
    $con =mysqli_connect($host,$user,$pass,$dbname);
   if($con->connect_error){  
      echo "Conection not established, Error:" .$conn->connect_error;  //if connection failed then tis message will echo
   }
?>
