<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$staff_idErr = $usnErr = $semErr = $passErr =null;
$staff_id = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $staff_id = $_POST["staff_id"];     
  $pass = $_POST["pass"];
	
 
  
  if(!empty($_POST["staff_id"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$staff_id)) 
    {
      $staff_idErr = "Only letters and digit allowed";
	  $flag=1;
    }
  }
  else
  {
    $staff_idErr = "Please enter staff_id";
	$flag=1;
  } 
  
   if(!empty($_POST["pass"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$pass)) 
    {
      $passErr = "Only letters and digit allowed"; 
	  $flag=1;
    }
  }
  else
  {
    $passErr = "Please enter password";
	$flag=1;
  } 
  
  
  if($flag==0){
	$_SESSION["staffid"] = $staff_id;
 
 $servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	    //echo "Connection successfull<br>";
    	$sql="select password from staff where staff_id = '$staff_id'"; 
		$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$pass1 = $row["password"];
			if($pass != $pass1){
				echo "<script type='text/javascript'>alert('Error!')</script>";
			}
			else{
				echo "Perfect! <br>";
				echo "<script type='text/javascript'>alert('Login Successful!')</script>";
				header("Location: /staff_home.php/");
			}
		
		} else {
			echo "0 results";
		}
}
$conn->close();

  }
    
}





?>



<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
<fieldset>
<legend>Faculty Login:</legend>
	Staff ID:<br>
	<input type="text" name="staff_id" value="<?php echo $staff_id;?>">
	<span class="error">* <?php echo $staff_idErr;?></span>
	<br><br>
	Password:<br>
	<input type="password" name="pass" value="<?php echo $pass;?>">
	   <span class="error">* <?php  echo $passErr;?></span>
	   <br><br>
	 <input type="submit" name="submit" value="Submit"><br> <br>
	 <a href="/staff.php/">Not yet Registered?</a>
</fieldset>
</form>
</body>
</html>