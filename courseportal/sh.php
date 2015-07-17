<?php
// Start the session
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
        <li class="active"><a href="/student_home.php/">Home</a></li>
		<li class="active"><a href="/studies.php/">Course Registration </a></li>
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
<div class="jumbotron" >
<?php
#echo  "Welcome ". $_SESSION["usn"] . ".<br>";
?>
<br>
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
<form action = "/student_course_home.php/" method = "POST">
Courses registered:<br><br>
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
			$sql = "SELECT course_id FROM studies WHERE usn = '$usn' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
						$cname = $row["course_id"];
						$sql1 = "SELECT name FROM course WHERE course_id = '$cname' ";
						$result1= $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
								$cname1 = $row1["name"];
							echo "<input type="radio" >
								$cname1
								
								<br>";
							}
						}
						else {
							echo "0 results";
						}
						
				}
					
		} 
			$conn->close();
		?>
	
	<select name="cname">
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
			$sql = "SELECT course_id FROM studies WHERE usn = '$usn' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
						$cname = $row["course_id"];
						$sql1 = "SELECT name FROM course WHERE course_id = '$cname' ";
						$result1= $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
								$cname1 = $row1["name"];
							echo "<option>
								$cname1
								</option>
								<br>";
							}
						}
						else {
							echo "0 results";
						}
						
				}
					
		} 
			$conn->close();
		?>
	</select> 
	
	<input type="submit" value="submit" name="submit">
</form>
<br><br><br><br>
</div>
</div>
</body>
</html>