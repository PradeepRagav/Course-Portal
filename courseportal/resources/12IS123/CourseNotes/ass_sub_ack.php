<?php
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Student home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<head/>
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
        <li class="active"><a href="/student_home.php/">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/assignment_submission.php/">Submit Assignments</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/assignment_view_student.php/">Assignment list</a></li>
          </ul>
        </li><li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/ResourceDownload.php/">Download course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/student_viewres.php/">View course resource</a></li>
          </ul>
        </li>
		<li class="active"><a href="/student_listofstudents.php/">Student list</a></li>
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

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$cname = $_POST["cname"];
	$_SESSION["coursename"] = $cname;
	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "courseportal";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			//$cname = $_SESSION["coursename"];
			$sql1 = "SELECT course_id FROM course WHERE name = '$cname'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				$cid = $row1["course_id"];
				$_SESSION["cid"] = $cid;
			}
	//echo "Course name : $cname";
	//$_SESSION["coursename"] = $cname;
	//echo"<a href="/assignment.php/">Submit Assignments </a> <br>";
	//echo"<a href="/ResourceDownload.php/">Download course resource </a> <br>";
}

?>

<div class="container">
<div class="jumbotron" >
<?php
echo "Welcome ";
?> 
<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "courseportal";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$usn = $_SESSION["usn"];
			$sql = "SELECT name FROM student WHERE usn = '$usn' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
								$name1 = $row["name"];
							echo "<strong> $name1 </strong>";
							}
			}				



?>
<br>
 <br>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>

Assignment Submitted!!<br>
<a href = "/student_course_home.php/">Course Home</a>
<br><br><br>

</div>
</div>
</body>
</html>