<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$staff_idErr = $cidErr = $cnameErr = $usnErr  =null;
$staff_id = $cid = $credit = $cname  =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $staff_id = $_POST["staff_id"]; 
  
  $cid = $_POST["cid"]; 

  $cname = $_POST["cname"]; 
  
	// check if name only contains letters and whitespace
  if(!empty($_POST["cname"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$cname)) 
    {
		$flag=1;
      $cnameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $cnameErr = "Please enter this field";
	$flag=1;
  }
  
  if(!empty($_POST["staff_id"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$staff_id)) 
    {
      $staff_idErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  else
  {
    $staff_idErr = "Please enter usn";
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
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    // mysql inserting a new row
	    //$result = mysql_query("INSERT INTO student(USN,FName,Mname,Lname,Phno,emailid) VALUES('$usn',$Fname', '$Mname','Lname','phno', '$email')");
	 	//$sql="insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$_POST['usn']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['ph']."','".$_POST['email']."')";
    	$sql="select name from course where course_id = '$cid'"; 
		
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$cname1 = $row["name"];
			if($cname != $cname1){
				
					echo "<script type='text/javascript'>alert('Coursename and Courseid Doesnot match!')</script>";
				
			}
			else{
				$sql1="insert into teaches(staff_id,course_id) values('$staff_id','$cid')";
				if( $conn->query($sql1) == TRUE){
					echo "Perfect! <br>";
					echo "<script type='text/javascript'>alert('Registered for the course Successful!')</script>";
					echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				}
			}
		
		} else {
			echo "0 results";
		}
	}
  }
    
}



// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

//?>


<h2>Course registration</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	Staff ID:<br>
	<select name="staff_id">
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

			$sql = "SELECT staff_id FROM staff";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$staff_id = $row["staff_id"];
					echo "<option>
                    $staff_id
                </option>";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error">* <?php echo $staff_idErr;?></span>
	<br><br>
	
	Course Name:<br>
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

			$sql = "SELECT name FROM course";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$cname = $row["name"];
					echo "<option>
                    $cname
                </option>";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error">* <?php echo $cnameErr;?></span>
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
	<input type="submit" name="submit" value="Submit"><br> <br>
	
</form>
</body>
</html>