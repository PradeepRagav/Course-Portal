<?php
session_start();
?>
<!DOCTYPE HTML> 
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
<div class="jumbotron" >
<h3>Change Last Date</h3>
<hr>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
Topic name: <br>
<?php $topic = $_POST["topic"]; echo "$topic<br>"; $_SESSION["topic"] = "$topic";?>
Current LastDate:
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
			$cname = $_SESSION["coursename"];
			$cid =$_SESSION["cid"];
			$topic = $_SESSION["topic"];
				//echo "<input type = hidden name = cid value = $cid>";
				$sql = "SELECT lastdate FROM assignment WHERE topic = '$topic'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
						// output data of each row
						$row = $result->fetch_assoc();
						$ldate = $row["lastdate"];
						echo "$ldate<br>";
						}
				
				 else {
						echo "0 results";
				}

			
			$conn->close();
		?>
	
	<br><br>
<form method="post" action="/insertdate.php/"> 
	Last Date:<br>
	<input type="date" name="ldate" >
	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>

</div></div>

</body>
</html>