<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


	$flag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if($flag==0){
	  
	$rtype = $_POST["rtype"];
	$cid = $_POST["cid"];
	$filename = "resources";
	$dir = "/resources/$cid/$rtype/";
	$file = $_FILES['fileToUpload'];
	
	
	
	if (file_exists($filename)) {
		chdir("resources");
	} else {
		mkdir("resources");
		chdir("resources");
	}
	
	if (file_exists("$cid")) {
		chdir("$cid");
	} else {
		mkdir("$cid");
		chdir("$cid");
	}
	
	if (file_exists($rtype)) {
		chdir("$rtype");
	} else {
		mkdir("$rtype");
		chdir("$rtype");
	}
	
	$target_dir1="";
	$target_file = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	
	
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    if($rtype == "CourseNotes"){
			$sql="insert into resource(course_id,ppt) values('$cid','".$dir."')"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "QuestionBank"){
			$sql="insert into resource(course_id,qbank) values('$cid','".$dir."')"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "LessonPlan"){
			$sql="insert into resource(course_id,lessonplan) values('$cid','".$dir."')"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "ModelQuestionPaper"){
			$sql="insert into resource(course_id,modelq) values('$cid','".$dir."')"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
  }
}
    


?>


<h2>Resource</h2>
<hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	Course ID: <br>
	<select name="cid">
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

			$sql = "SELECT course_id FROM course";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$cid = $row["course_id"];
					echo "<option>
                    $cid
                </option>";
				}
			
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<br><br>
	Resource type: <br>
	<select name="rtype">
		<option>CourseNotes</option>
		<option>QuestionBank</option>
		<option>LessonPlan</option>
		<option>ModelQuestionPaper</option>
		
	</select>
	<br><br>
	Select File to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>