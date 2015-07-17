<?php
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Staff home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>

</style>
</head>

<body>

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
        <li class="active"><a href="/courseportal/staff_home.php">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignment<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/assignment_creation.php">Create Assignment </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/assignment_download.php">Download Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/assignment_manage.php">View/Delete Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/modifyass.php">Change Lastdate</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/ResourceUpoad.php">Upload course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/resdownload1.php">Download course resource </a> </li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/resdelete.php">Delete course resource </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/viewres.php">View course resource </a></li>
          </ul>
        </li>
		<li class="active"><a href="/courseportal/listofstudents.php">Manage students</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/about.html">About website</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/contact.html">Contact info</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li class="active"><a href="/courseportal/logout.php">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>   
		
  </div>
</div>

<div class="container">
<div class="jumbotron" >
<h3>Assignment </h3>
<hr>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if($conn)
{
	$cid = $_SESSION["cid"];
	$sql1 = "SELECT topic FROM course_assignment WHERE course_id = '$cid'";
	
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				echo "<table class=table  style=width:100% ><thead><tr><th><center>Topic</center></th><th><center>LastDate</center></th><th><center>CreateDate</center></th><th><center>Delete</center></th></tr><thead>";
				while($row1 = $result1->fetch_assoc()){
					$topic = $row1["topic"];
					$sql2 = "SELECT lastdate ,creatdate FROM assignment WHERE topic='$topic'";
					$result2 = $conn->query($sql2);
					if ( $result2->num_rows > 0){
						$row2 = $result2->fetch_assoc();
						$ldate = $row2["lastdate"];
						$cdate = $row2["creatdate"];
						echo "<tbody><tr><td><center>$topic</center></td>
								<td><center>$ldate</center></td>
								<td><center>$cdate</center></td>
								<td><center><form action=/courseportal/deleteass.php method=POST>
									<input type= hidden name = topic value= $topic>
									<input type= hidden name = cid value= $cid>
									<input type=submit value = delete name= value>
									</form></center></td>
				
								</tr></tbody>";
						
					}
					
				
				}
				
			}
			else{
				Echo "<br>No students registered<br>";
			}
			echo " Course Name:  ".$_SESSION["coursename"]."<br>";
			echo " Course ID:  ".$_SESSION["cid"]."<br>";
}
else
{
}

?>
</div></div>
</body>
</html>
