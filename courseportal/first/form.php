<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<!--<?php/*

$nameErr = $usnErr = $semErr = $passErr =null;
$name = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; 
  echo "$name";//test_input($_POST["fname"]);
  $usn = $_POST["usn"];     //test_input($_POST["usn"]);
  $sem = $_POST["sem"];
  $pass = $_POST["pass"];
	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
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
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
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
 
    
}

// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }
*/
//?>

-->
<h2>Registration</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="connect.php"> 
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>   
USN: <input type="text" name="usn" value="<?php echo $usn;?>">
<span class="error">* <?php echo $usnErr;?></span>
<br><br>
   Semester: <input type="text" name="sem" value="<?php echo $sem;?>">
   <span class="error">* <?php echo $semErr;?></span>
   <br><br>
Password: <input type="password" name="pass" value="<?php echo $pass;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
 <input type="submit" name="submit" value="Submit"><br> <br>
</form>
<form action="management.php"><input type="submit" value="Home" name="sub"></form>
</body>
</html>