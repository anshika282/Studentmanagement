<?php
session_start();
include 'dbcon.php';

// if(isset($_GET['error'])){
// 	$showError= $_GET['error'];
// 	echo $showError; 
// }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// $uid=$_POST['uid'];
	$password =$_POST['spwd'];
       $name=$_POST['sname'];
       $semail=$_POST['email'];
	   //to prevent sql injection
	   $name = stripcslashes($name);  
        $password = stripcslashes($password);  
        $name = mysqli_real_escape_string($con, $name);  
        $password= mysqli_real_escape_string($con, $password);  
       
       // $verify = password_verify($password, $hash);
	$namesearch="select * from student where sname='$name' and email='$semail' ";
	$query = mysqli_query($con,$namesearch);

	$namecount=mysqli_num_rows($query);
	if($namecount){
      
       $namepass=mysqli_fetch_assoc($query);  
       if (password_verify($password, $namepass['password'])){ 
            //    $db_pass=$namepass['spwd'];
       $_SESSION['username'] = $namepass['sname'];
       $_SESSION['email']=$namepass['email'];
	   echo ("<script LANGUAGE='JavaScript'>
	   window.alert(' Proceeding to OTP Login !!');
	   window.location.href='regotp.php';
	   </script>"); 
          }else{
               
             echo '<script type ="text/JavaScript">';  
             echo 'alert("Wrong password")';  
             echo '</script>';  
              // header('location:index.php'); 
              // header('location:index.php?error=Wrong password !!'); 
          }
      
       }else{
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Wrong Credentials")';  
		echo '</script>';}
       }
 $con->close(); 
?>

 <!DOCTYPE html>
<html lang="en" >
<head>
	<title>Login</title>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="style1.css"/>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
	input, select {
 
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ff3333;
  border-radius: 4px;

}
p{
 color:blue;
}
a{
    margin: -15px;
}

	</style>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<h1>Student Sign in </h1>
			<div class="social-container">
				<a href="https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
			    <a href="https://www.linkedin.com/login" class="social" ><i class="fab fa-google"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>	
			<span class="center">or</span>
			
			<input type="text" class="input-field" placeholder="Name" name="sname" pattern="^([a-zA-Z' ']+)$"
                       title="only character and spaces allowed" required/>
			<input type="text" class="input-field" placeholder="Email" name="email" 
			pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                  title="Must contain a @ and . and right pattern " required/>
			<!-- <input type="password"  placeholder="Password" name= "spwd" /> -->
			<!-- <input type="checkbox" onclick="myFunction()"><h6> show password</h6><br><br> -->	
            <input id="pass" class="input-field"  placeholder="Password" type="password" class="input" name= "spwd"  required>
	
	        
		  	   <button type ="submit">Sign In</button> 
		  <a href="register.php"><p>Not Registered?Create Account</p></a>            
		</form>
	</div>
	<div class="form-container sign-in-container ">
		<form action="teacherlogin.php" method="POST">
			<h1>Teacher Sign in</h1>
			<div class="social-container">
				<a href="https://www.facebook.com/"  class="social" ><i class="fab fa-facebook-f"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab  fa-google"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span  class="center">or</span>
			<input type="text" placeholder="Name" name="tname" id="tname" pattern="^([a-zA-Z' ']+)$"
                       title="only character and spaces allowed" required/>
            <input type="number" placeholder="TID" name="tid" id="tid" required/>
          <input   placeholder="password" type="Password" class="input" name= "tpwd" id= "tpwd"  required>
			<button type="submit">Sign In</button> 
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Teacher Login</h1>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Student login</h1>
				<button class="ghost" id="signUp">Sign In</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>



