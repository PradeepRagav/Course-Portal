<?php
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Staff home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$tnameErr = $ldateErr = null;
$tname = $ldate = null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $cid = $_SESSION["cid"];
   
  $tname = $_POST["tname"]; 
  
  $ldate = $_POST["ldate"]; 
  
  $cdate = date("Y-m-d");
  
	// check if name only contains letters and whitespace
  if(!empty($_POST["tname"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$tname)) 
    {
		$flag=1;
      $tnameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $tnameErr = "Please enter this field";
	$flag=1;
  }
  
  if(!empty($_POST["ldate"])){
    if (empty($ldate)) 
    {
      $ldateErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  

  
 
  
  if($flag==0){
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    
    	$sql = "insert into assignment(topic,lastdate,creatdate) values('".$tname."','".$ldate."','".$cdate."')";
		
    	
    	if ($conn->query($sql) == TRUE) {
			
			$sql1 = "insert into course_assignment(course_id,topic) values('".$cid."','".$tname."')";
		
    	
			if ($conn->query($sql1) == TRUE) {
				
					
						
						echo "<script type='text/javascript'>alert('Executed!')</script>";
						header("location:/staff_ass_cr_ack.php/");
						}
						else{
							echo "<script type='text/javascript'>alert('ConnectionErr')</script>";
						}
					
			}
			else{
				echo "<script type='text/javascript'>alert('ConnectionErr')</script>";
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
      <a class="navbar-brand" href="#">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/staff_course_home.php/">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignment<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/assignment_creation.php/">Create Assignment </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/assignment_download.php/">Download Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/assignment_manage.php/">View/Delete Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/modifyass.php/">Change Lastdate</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/ResourceUpoad.php/">Upload course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/resdownload.php/">Download course resource </a> </li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/resdelete.php/">Delete course resource </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/viewres.php/">View course resource </a></li>
          </ul>
        </li>
		<li class="active"><a href="/listofstudents.php/">Manage students</a></li>
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
	  <li class="active"><a href="/logout.php/">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>           
  </div>
</div>
<div class="container">
<div class="jumbotron">
<h2>Assignment</h2>
<hr>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
<form method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	<div class="form-group">
	<label class="control-label col-sm-2" for="topic">Topic:</label> 
	<div class="col-sm-10">
	<input type="text" class="form-control" id="topic" placeholder="Topic" name="tname" value="<?php echo $tname;?>">
	<span class="error"><?php echo $tnameErr;?></span>
	</div></div>
	<div class="form-group">
	<label class="control-label col-sm-2" for="ldate">Last Date:</label> 
	<div class="col-sm-10">
	<input type="date" class="form-control" id="ldate" placeholder="Last Date" name="ldate" value="<?php echo $ldate;?>">
	<span class="error"><?php echo $ldateErr;?></span>
	</div></div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
	<input type="submit" name="submit" value="Submit">
	</div></div>
</form>
</div>
</div>
</body>
</html>