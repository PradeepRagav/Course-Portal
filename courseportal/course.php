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
$nameErr = $cidErr = $creditErr  =null;
$name = $cid = $credit  =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; 
  
  $cid = $_POST["cid"];    
  $credit = $_POST["credit"];
	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
		$flag=1;
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $nameErr = "Please enter this field";
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
  

  
  if(!empty($_POST["credit"])){
    if (!preg_match("/^[1-5]$/",$credit)) 
    {
      $creditErr = "Only digit"; 
	  $flag=1;
	  
    }
  }
  else
  {
    $creditErr = "Please enter semester";
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
    	$sql = "insert into course(name,course_id,credits) values('".$name."','".$cid."','".$credit."')";
    	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully<br>";
			echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
			
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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


<h2>Course creation</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	Course Name:<br>
	<input type="text" name="name" value="<?php echo $name;?>">
	<span class="error">* <?php echo $nameErr;?></span>
	<br><br>   
	Course ID: <br>
	<input type="text" name="cid" value="<?php echo $cid;?>">
	<span class="error">* <?php echo $cidErr;?></span>
	<br><br>
	Credits:<br>
	<input type="text" name="credit" value="<?php echo $credit;?>">
	<span class="error">* <?php echo $creditErr;?></span>
	<br><br>
	<input type="submit" name="submit" value="Submit"><br> <br>
</form>
</body>
</html>