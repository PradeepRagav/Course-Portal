<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Staff home</title>
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
<h2>COURSE RESOURCE MANAGEMENT</h2>
</div></div>

<div class="container">
<div class="jumbotron">
<?php
//echo "Tableakka";
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if($conn)
{
	$cid = $_SESSION["cid"];
	$topic = $_POST["topic"];
	$sql1 = "SELECT usn FROM studies WHERE course_id = '$cid'";
	$sql3 = "SELECT lastdate FROM assignment WHERE topic='$topic'";
			$result1 = $conn->query($sql1);
			$result3 = $conn->query($sql3);
			if ($result1->num_rows > 0 && $result3->num_rows > 0){
				$row3 = $result3->fetch_assoc();
				$ldate = $row3["lastdate"];
				echo "Topic :$topic <br><br>Last Date:$ldate<br><br>";
				echo "<table class=table style=width:100%><tr><td>USN</td><td>Name</td><td>Status</td><td>DateOfSub</td></tr>";
				while($row1 = $result1->fetch_assoc()){
					$usn = $row1["usn"];
					$sql = "SELECT submit_doc, cdate FROM assignment_submission WHERE course_id = '$cid' && usn = '$usn' && topic = '$topic'";
					$sql2 = "SELECT name FROM student WHERE usn='$usn'";
					$result2 = $conn->query($sql2);
					$result = $conn->query($sql);
					if ($result->num_rows > 0 && $result2->num_rows > 0){
						$row = $result->fetch_assoc();
						$row2 = $result2->fetch_assoc();
						$name = $row2["name"];
						$dir = $row["submit_doc"];
						$cdate = $row["cdate"];
						echo "<tr><td>$usn</td><td>$name</td><td><form action =/courseportal/downloada.php method =post><input type=hidden name = dir value =$dir><input type=Submit value = Download></form></td><td>$cdate</td></tr>";
						
					}
					else{
						$row2 = $result2->fetch_assoc();
						$name = $row2["name"];
						echo "<tr><td>$usn</td><td>$name</td><td>Notyet</td></tr>";
					}
				
				}
				
			}
			echo " Course Name:  ".$_SESSION["coursename"]."<br>";
			echo " Course ID:  ".$_SESSION["cid"]."<br>";
			echo "<a href=/courseportal/staff_course_home.php>Course Home</a>";
}
else
{
	echo "ERROR";
}

?>
</div></div>
</body>
</html>
