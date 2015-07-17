<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Student viewdir</title>
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
  <div class="jumbotron">
<?php
		$rtype = $_POST["rtype"];
		if($rtype == "CoursePPT")
			$type ="ppt";
		else if($rtype == "QuestionBank")
			$type = "qbank";
		else if($rtype == "LessonPlan")
			$type = "lessonplan";
		else if($rtype == "ModelQuestionPaper")
			$type = "modelq";
		else if($rtype == "LabManual")
			$type = "labm";
	
	
		$cid = $_SESSION["cid"] ;
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
		if($conn)
		{
			$sql1 = "SELECT $type FROM resource WHERE course_id = '$cid' ";
			$result1 = $conn->query($sql1);
			
					if ( $result1 == TRUE ){
						$row1 = $result1->fetch_assoc();
						$dir = $row1["$type"];
						if($dir == null){
							echo "The resource has not been uploaded<br>";
							echo "<br><a href = /courseportal/student_viewres.php/>Back</a><br>" ;
						}
						else{
							$cdrive = "/var/www/courseportal";
							$path = $cdrive.$dir;
 							if(file_exists($path)){
								if ($handle = opendir($path)) {

										while (false !== ($entry = readdir($handle))) {

											if ($entry != "." && $entry != "..") {

												echo "$entry<br>";
											}
										}

										closedir($handle);
										echo "<br><a href = /courseportal/student_viewres.php>Back</a><br>" ;
								}
								
							}
							else{
								echo "The resource has not been uploaded<br>";
							}
						}
						
				
					}
					else{
						echo "Statement Error<br>";
						echo "<br><a href = /courseportal/student_viewres.php>Back</a><br>" ;
					}
					
		}
		else
		{
			echo "Error";
		}

		function rmdir_recursive($dir) {
								foreach(scandir($dir) as $file) {
									if ('.' === $file || '..' === $file) continue;
									if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
									else unlink("$dir/$file");
								}
								rmdir($dir);
							}
?> </div>
</div>
</body>
</html>
