<?php

 include 'dbcon.php';
 session_start();
 if(isset($_POST['input'])){
     $input=$_POST['input'];
     $name=$_SESSION['name'];
     $query="select * from student where sname LIKE '{$input}%'  ";
     $result= mysqli_query($con,$query);
     if (mysqli_num_rows($result)>0){   ?>
             <table class="table" id="myTable">
        <thead>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>class</th>
                <!-- <th>Attendance</th> -->
            </tr>
        </thead>
        <tbody>
            <?php  while($show =mysqli_fetch_array($result)){
            
            ?>
            <tr>
            <td><?php echo $show['uid']; ?></td>
            <td><?php echo $show['sname']; ?></td>
            <td><?php echo $show['sclass']; ?></td>
            <!-- <td>
               Present<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Present"  required > 
               Absent<input type="radio" name="attendance[<?php echo $show['uid']; ?>]" value="Absent"  >
            </td> -->
              </tr>
         <?php 
     } ?>
        </tbody>
        </table>
    <?php  }else{
        echo "no data found";
        }
        echo "eror";

    }?>
