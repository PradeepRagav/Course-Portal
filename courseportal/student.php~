<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Student signup</title>
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
$nameErr = $usnErr = $semErr = $passErr =null;
$name = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; 
  //test_input($_POST["name"]);
  $usn = $_POST["usn"];     //test_input($_POST["usn"]);
  $sem = $_POST["sem"];
  $pass = $_POST["pass"];
	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
		$flag=1;
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $nameErr = "Please enter this field";
	$flag=1;
  }
  
  if(!empty($_POST["usn"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $usnErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
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
  
  if(!empty($_POST["sem"])){
    if (!preg_match("/^[1-8]$/",$sem)) 
    {
      $semErr = "Only digit"; 
	  $flag=1;
	  
    }
  }
  else
  {
    $semErr = "Please enter semester";
	$flag=1;
  } 
  
  if($flag==0){
 
 
 $servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    
    	$sql = "insert into student(usn,name,sem,password) values('".$usn."','".$name."','".$sem."','".$pass."')";
    	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully<br>";
			echo "<script type='text/javascript'>alert('New record created successfully!')</script>";
			header("Location: /courseportal/Student_login.php");
			exit;
			
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
  }
    
}



// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

//?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/courseportal/homepage.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          
      <ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login<span class="caret"></span></a>
	<ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/Student_login.php">STUDENT</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/Staff_login.php">STAFF</a></li>
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
<h3>Student registration</h3>
<hr>
<div class="row">
    <div class="col-md-6">
<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<div class="form-group">
		<label class="control-label col-sm-2" for="name">Name:</label> 
		<div class="col-sm-10">
		<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name;?>">
		<span class="error"><?php echo $nameErr;?></span>
		</div></div>  
		<div class="form-group">
		<label class="control-label col-sm-2" for="usn">USN:</label> 
		<div class="col-sm-10">	
		<input type="text" class="form-control" id="usn" placeholder="USN" name="usn" value="<?php echo $usn;?>">
		<span class="error"><?php echo $usnErr;?></span>
		</div></div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="sem">Semester:</label> 
		<div class="col-sm-10">	
		<input type="text" class="form-control" id="sem" placeholder="Semester" name="sem" value="<?php echo $sem;?>">
		<span class="error"><?php echo $semErr;?></span>
		</div></div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="pass">Password:</label> 
		<div class="col-sm-10">	
		<input type="password" class="form-control" id="pass" placeholder="Password" name="pass" value="<?php echo $pass;?>">
		<span class="error"><?php  echo $passErr;?></span>
		</div></div>
		<br>
		<div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="submit" value="Submit">
		</div> </div>

</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
