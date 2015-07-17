<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body> 


<?php

$nameErr= $phnoErr = $usnErr = $emailErr=null;
//$fname = $mname = $lname = $phno = $email = $usn =null ;
$usn = $name = $phno = $email = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  // $fname = $_POST["fname"]; //test_input($_POST["fname"]);
  // $mname = $_POST["mname"]; //test_input($_POST["mname"]);
  // $lname = $_POST["lname"]; //test_input($_POST["lname"]);
  
  $usn = $_POST["usn"];     //test_input($_POST["usn"]);
  $name =$_POST["name"];
  $phno = $_POST["ph"];
  $email = $_POST["email"];


	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $fnameErr = "Please enter this field";
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
  if (!preg_match("/^[0-9]*$/",$phno)) 
  {
    $phnoErr = "Only numbers allowed"; 
  }
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = $_POST["email"];//test_input($_POST["email"]);
     // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format"; 
    }
  }   
}

// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

?>

<h2>Registration</h2>

<form method="post" action="stud_register.php"> 
  USN:  <input type="text" name="usn" value="<?php echo $usn;?>">
<span class="error">* <?php echo $usnErr;?></span>
<br><br>

  Name: <input type="text" name="fname" value="<?php echo $fname;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>

   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>

    Ph No.: <input type="text" name="ph" value="<?php echo $phno;?>">
   <span class="error">* <?php echo $phnoErr;?></span>
   <br><br>
   <p><span class="error">* required field.</span></p>
 <input type="submit" name="submit" value="Submit"><br> <br>
</form>
<form action="management.php"><input type="submit" value="Home" name="sub"></form>
</body>
</html>
