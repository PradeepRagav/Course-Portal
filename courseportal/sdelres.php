<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Staff home</title>
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
        <li class="active"><a href="/staff_home.php/">Home</a></li>
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
            <li role="presentation"><a href="/resdownload1.php/">Download course resource </a> </li>
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
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
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
		$password = "";
		$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
		if($conn)
		{
			$sql1 = "SELECT $type FROM resource WHERE course_id = '$cid' ";
			$result1 = $conn->query($sql1);
			
					if ( $result1 == TRUE ){
						$row1 = $result1->fetch_assoc();
						$dir = $row1["$type"];
						if($dir == null){
							echo "The record is already been deleted<br>";
						}
						else{
							$cdrive = "C:/wamp/www";
							$path = $cdrive.$dir;
 							if(file_exists($path)){
								rmdir_recursive($path);
								echo "deleted $type<br>";
								$sql2 = "UPDATE resource SET $type = null WHERE course_id = '$cid' ";
								$result2 = $conn->query($sql2);
								if ( $result2 == TRUE ){
									echo "Record Modified<br>";
								}
								
							}
							else{
								echo "File has been already deleted!!!<br>";
							}
						}
						
				
					}
					else{
						echo "Statement Error<br>";
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
?>
<a href=/resdelete.php/>Delete More files</a>
</div></div>
</body>
</html>