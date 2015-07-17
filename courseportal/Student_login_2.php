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
$nameErr = $usnErr = $semErr = $passErr =null;
$name = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $usn = $_POST["usn"];     
  $pass = $_POST["pass"];
	
 
  
  if(!empty($_POST["usn"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $usnErr = "Only letters and digit allowed";
	  $flag=1;
    }
  }
  else
  {
    $usnErr = "Please enter usn";
	$flag=1;
  } 
  
   if(!empty($_POST["pass"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
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
 
 
 $servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	    echo "Connection successfull<br>";
    	$sql="select password from student where usn = '$usn'"; 
		$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$pass1 = $row["password"];
		if($pass != $pass1){
			echo "Error";
		}
		else{
			echo "Perfect! <br>";
			echo "<script type='text/javascript'>alert('Login Successful!')</script>";
			echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
		}
		
		} else {
			echo "0 results";
		}
}
$conn->close();

  }
    
}





?>


<h2>Student Login</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
USN: <input type="text" name="usn" value="<?php echo $usn;?>">
<span class="error">* <?php echo $usnErr;?></span>
<br><br>
Password: <input type="password" name="pass" value="<?php echo $pass;?>">
   <span class="error">* <?php  echo $passErr;?></span>
   <br><br>
 <input type="submit" name="submit" value="Submit"><br> <br>
</form>
</body>
</html>