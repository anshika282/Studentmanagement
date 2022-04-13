
<?php
include('dbcon.php');
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{
 $stmt ="SELECT sname,uid FROM student Where clid='$cid' order by sname";
 $stmtresult =mysqli_query($con,$stmt);
 ?><option value="">Select Category </option><?php
 if(mysqli_num_rows($stmtresult)>0){
 while($row=mysqli_fetch_array($stmtresult))
 {
  ?>
  <option value="<?php echo htmlentities($row['uid']); ?>"><?php echo htmlentities($row['sname']); ?></option>
  <?php
 }
}
}

}
// Code for Subjects
if(!empty($_POST["classid1"])) 
{
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{

//  $stmt = $con->prepare("SELECT subjname,sbid FROM subject  WHERE c_id= :cid  order by subjname");
//  $stmt->execute(array(':cid' => $cid1));
 $sql1="SELECT subjname,sbid FROM subject  WHERE c_id= '$cid1'  order by subjname";
 $query1=mysqli_query($con,$sql1);
 if(mysqli_num_rows($query1)>0){
 while($row=mysqli_fetch_array($query1))
 {?>
  <p> <?php echo htmlentities($row['subjname']); ?><input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of 100" autocomplete="off"></p>
  
<?php  }}
}
}


?>

<?php

if(!empty($_POST["studclass"])) 
{
 $id= $_POST['studclass'];
 $dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
$query = "SELECT stuid,classid FROM result WHERE stuid='$id1' and classid='$id' " ;
$resultadd=mysqli_query($con,$query);
$cnt=1;
if(mysqli_num_rows($resultadd) > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }


  }?>


