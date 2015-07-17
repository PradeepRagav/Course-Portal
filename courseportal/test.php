<!DOCTYPE html>
<html>
<body>

<?php


$flag=0;
$tnameErr = $cidErr = $creditErr = $usnErr  =null;
$tname = $cid = $credit = $usn  =$fname =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $tname = $_POST["tname"]; 
  
  $cid = $_POST["cid"]; 

  $usn = $_POST["usn"]; 
  
	// check if name only contains letters and whitespace
  if(!empty($_POST["tname"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$tname)) 
    {
		$flag=1;
      $tnameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $tnameErr = "Please enter this field";
	$flag=1;
  }
  
  if(!empty($_POST["usn"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $usnErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  else
  {
    $usnErr = "Please enter usn";
	$flag=1;
  } 
  
  if(!empty($_POST["cid"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$cid)) 
    {
      $cidErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  else
  {
    $cidErr = "Please enter usn";
	$flag=1;
  } 
  

  
 
  
  if($flag==0){
	  
	$tname = $_POST["tname"];
	$cid = $_POST["cid"];
	$filename = '/assignments';
	$usn = $_POST["usn"];
	$dir = "assignments/$cid/$tname/$usn";
	
	
	if (file_exists($filename)) {
		chdir("assignments");
	} else {
		mkdir("assignments");
		chdir("assignments");
	}
	
	if (file_exists("$cid")) {
		chdir("$cid");
	} else {
		mkdir("$cid");
		chdir("$cid");
	}
	
	if (file_exists($tname)) {
		chdir("$tname");
	} else {
		mkdir("$tname");
		chdir("$tname");
	}
	
	if (file_exists($usn)) {
		chdir("$usn");
	} else {
		mkdir("$usn");
		chdir("$usn");
	}
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    
    	$sql="insert into assignment_submission(usn,course_id,topic,submit_doc) values('$usn','$cid','$tname','$dir')"; 
		$result = $conn->query($sql);
    	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully<br>";
			echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
			
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
  }
    
}

?>
<h2>Assignment Submission</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	USN:<br>
	<select name="usn">
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

			$sql = "SELECT usn FROM student";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$usn = $row["usn"];
					echo "<option>
                    $usn
                </option>";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error">* <?php echo $usnErr;?></span>
	<br><br>
	Topic name: <br>
	<select name="tname">
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

			$sql = "SELECT topic FROM assignment";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$tname = $row["topic"];
					echo "<option>
                    $tname
                </option>";
				}
			
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error">* <?php echo $tnameErr;?></span>
	<br><br>
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
	<span class="error">* <?php echo $cidErr;?></span>
	<br><br>
	Select File to upload:<br>
    <input type="file" name="fname" id="fname">
	<br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>