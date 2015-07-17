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
$tnameErr = $ldateErr = null;
$tname = $ldate = null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $tname = $_POST["tname"]; 
  
  $ldate = $_POST["ldate"]; 
  
  $cdate = date("Y-m-d");
  
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
  
  if(!empty($_POST["ldate"])){
    if (empty($ldate)) 
    {
      $ldateErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  

  
 
  
  if($flag==0){
 
 
 $servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    
    	$sql = "insert into assignment(topic,lastdate,creatdate) values('".$tname."','".$ldate."','".$cdate."')";
		
    	
    	if ($conn->query($sql) == TRUE) {
			
				
					
					echo "<script type='text/javascript'>alert('Executed!')</script>";
					echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
		}
		else{
			echo "<script type='text/javascript'>alert('ConnectionErr')</script>";
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


<h2>Assignment</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	Topic:<br>
	<input type="text" name="tname" value="<?php echo $tname;?>">
	<span class="error">* <?php echo $tnameErr;?></span>
	<br><br>
	Last Date:<br>
	<input type="date" name="ldate" value="<?php echo $ldate;?>">
	<span class="error">* <?php echo $ldateErr;?></span>
	<br><br>
	<input type="submit" name="submit" value="Submit"><br> <br>
	
</form>
</body>
</html>