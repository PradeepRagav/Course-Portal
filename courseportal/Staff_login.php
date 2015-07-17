<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<head>

<title>Staff login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
$password = "root";


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
				header("Location: /courseportal/staff_home.php");
			}
		
		} else {
			echo "0 results";
		}
}
$conn->close();

  }
    
}





?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/courseportal/homepage.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/about.html/">About website</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/contact.html/">Contact info</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up<span class="caret"></span></a>
	<ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/student.php">STUDENT</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/staff.php">STAFF</a></li>
          </ul>
	</li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
<div class="container">
<div class="jumbotron">
<h2 >COURSE RESOURCE MANAGEMENT</h2>
</div>
</div>
<div class="container">
<div class="jumbotron">
<h3>STAFF LOGIN</h3>
<hr>
<div class="row">
    <div class="col-md-6">
<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
	<div class="form-group">
	<label class="control-label col-sm-2" for="sid">Staff ID:</label> 
	<div class="col-sm-10">
	<input class="form-control" id="sid" placeholder="Staff id" type="text" name="staff_id" value="<?php echo $staff_id;?>">
	<span class="error"><?php echo $staff_idErr;?></span>
	</div>
    </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label> 
      <div class="col-sm-10">  
	<input type="password" class="form-control" id="pwd" placeholder="Password" name="pass" value="<?php echo $pass;?>">
	   <span class="error"><?php  echo $passErr;?></span>
	   </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
	 <input type="submit" name="submit" value="Submit">
	 <br>
	 </div> </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
