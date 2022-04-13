

<?php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'school');

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($link === false){
            die("Error: Could not connect." . mysqli_connect_error());
        }

       ?>
   <?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$ud=$_POST['workers'];
    // $named='style';
    // $shared='sharing';
    // $d='1';

    $stuentry = "INSERT INTO ebook('new_name') VALUES('$ud')";

                     $result = mysqli_query($link, $stuentry);
                     if ($result) {
                        print("Passwords ") ; 
                    }
                else { 
                    print("Passwords do not match") ; 
                } 
 }

?>
      <form class="" action="tryselect.php" method="post">
         <select name="workers" required="required">
<option value="">Select Class</option>
<?php
 $sql = "select  new_name from ebook";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query)> 0)
{
while($result=mysqli_fetch_array($query))
{   ?>
<option value="<?php echo htmlentities($result['new_name']); ?>"><?php echo htmlentities($result['new_name']); ?></option>
<?php }} ?>
 </select>
        <input type="submit" value="submit"/>
        </form>

       