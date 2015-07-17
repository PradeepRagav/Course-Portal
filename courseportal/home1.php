<!DOCTYPE html>
<html lang="en">
<head>
<title>Course Resource Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$utype = $_POST["utype"];
			if($utype == "Student")
				header("Location: /Student_login.php/");
			if($utype == "Faculty")
				header("Location: /Staff_login.php/");
		}
	?>
	<h1>Course Resource Management</h1>
	<form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	   <select name="utype">
	   <option>Student</option>
	   <option>Faculty</option>
	   </select>
	   <input type="submit" name="submit" value="Submit"> 
	</form>
</body>
</html>