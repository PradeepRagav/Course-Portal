<!DOCTYPE html>
<html>
<body>
<?php
$nameErr = $usnErr = $semErr = $passErr =null;
$name = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; //test_input($_POST["fname"]);
  $usn = $_POST["usn"];     //test_input($_POST["usn"]);
  $sem = $_POST["sem"];
  $pass = $_POST["pass"];
	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $nameErr = "Please enter this field";
  }
  
  if(!empty($_POST["usn"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $usnErr = "Only letters and digit allowed"; 
    }
  }
  else
  {
    $usnErr = "Please enter usn";
  } 
  
   if(!empty($_POST["pass"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$pass)) 
    {
      $usnErr = "Only letters and digit allowed"; 
    }
  }
  else
  {
    $usnErr = "Please enter password";
  } 
  
  if(!empty($_POST["sem"])){
    if (!preg_match("/^[1-8]$/",$usn)) 
    {
      $usnErr = "Only digit"; 
    }
  }
  else
  {
    $usnErr = "Please enter semester";
  } 
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal");
/*
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$db = mysql_select_db("courseportal", $conn);
//if((mysqli_select_db('courseportal')) == FALSE){
//echo "Connected unsuccessfully";

//}
*/
echo "Connected successfully";

	
 	if($conn)
 	{
	    // mysql inserting a new row
	    //$result = mysql_query("INSERT INTO student(USN,FName,Mname,Lname,Phno,emailid) VALUES('$usn',$Fname', '$Mname','Lname','phno', '$email')");
	 	//$sql="insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$_POST['usn']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['ph']."','".$_POST['email']."')";
    	$sql = "insert into student(usn,name,sem,password) values('".$usn."','".$name."','".$sem."','".$password."')";
    	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
    
}
?>
</body>
</html>