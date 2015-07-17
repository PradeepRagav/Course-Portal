<?php
session_start();
?>
<!DOCTYPE HTML> 
<html>
<head>

<title>Student home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
        <li class="active"><a href="/courseportal/student_home.php">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/assignment_submission.php">Submit Assignments</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/assignment_view_student.php">Assignment list</a></li>
          </ul>
        </li><li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/ResourceDownload.php">Download course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/student_viewres.php">View course resource</a></li>
          </ul>
        </li>
		<li class="active"><a href="/courseportal/student_listofstudents.php">Student list</a></li>
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
<h3>RESOURCE DOWNLOAD</h3>
<hr>
<?php
echo "Welcome ";
?> 
<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
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
 
<form action = "/courseportal/download.php" method= "POST" >
Resource type:<br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="CoursePPT") echo "checked";?>  value="CoursePPT">CoursePPT
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="QuestionBank") echo "checked";?>  value="QuestionBank">QuestionBank
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="LessonPlan") echo "checked";?>  value="LessonPlan">LessonPlan
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="ModelQuestionPaper") echo "checked";?>  value="ModelQuestionPaper">ModelQuestionPaper
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<br><br>
</div>
</div>
</body>
</html>
