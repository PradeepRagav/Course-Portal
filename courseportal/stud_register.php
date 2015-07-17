<?php
 
/*
* Following code will create a new product row
* All product details are read from HTTP Post Request
*/
 

//if (isset($_POST['Desig']) && isset($_POST['Fname']) && isset($_POST['USN']) && isset($_POST['Mname']) && isset($_POST['Lname'])&& isset($_POST['Phno'])&& isset($_POST['Email'])) {
 
    $Fname = test_input($_POST['fname']);
    $Mname= test_input($_POST['mname']);
    $Lname = test_input($_POST['lname']);
 	$usn = test_input($_POST['usn']);
 	$phno = test_input($_POST['ph']);
 	$email = test_input($_POST['email']);

 	$err="";

 	if (!preg_match("/^[a-zA-Z ]*$/",$Fname)) {
 	  $err .= "Only letters and white space allowed in First Name"; 
	}

	if (!preg_match("/^[a-zA-Z ]*$/",$Mname)) {
 	  $err .= "Only letters and white space allowed in Middle Name"; 
	}

	if (!preg_match("/^[a-zA-Z ]*$/",$Lname)) {
 	  $err .=  "Only letters and white space allowed in Last Name"; 
	}

	if (!preg_match("/^[0-9]*$/",$phno)) {
 	  $err.= "Invalid Phone Number"; 
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	  $err.= "Invalid Email"; 
	}

	if (!preg_match("/^[0-9a-zA-Z]*$/", $usn)) {
 	  $err.= "Invalid USN"; 
	}	



    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 	if($db)
 	{
	    // mysql inserting a new row
	    //$result = mysql_query("INSERT INTO student(USN,FName,Mname,Lname,Phno,emailid) VALUES('$usn',$Fname', '$Mname','Lname','phno', '$email')");
	 	//$sql="insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$_POST['usn']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['ph']."','".$_POST['email']."')";
    	$sql = "insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$usn."','".$Fname."','".$Mname."','".$Lname."','".$phno."','".$email."')";
    	$res = mysql_query($sql);
	    // check if row inserted or not
	    if ($res) 
	    {
	        // successfully inserted into database
	        $response = "Inserted Successfully<br>";//"<script type='text/javascript'>alert('Entry Successful!')</script>";
	 
	        // echoing JSON response
	        echo $response;
	        echo "<form action=form.php><input type=submit value=DONE name=sub></form>";
	        //header("Location:http://localhost/my_files/form.php");
	    } 
	    else 
	    {
	        // failed to insert row
	        $response = "<script type='text/javascript'>alert('Entry Successful')</script>";
	 
	        // echoing JSON response
	        echo $response;
	    }
	
	
	  	//  } else {
	    // required field is missing
	    //$response["success"] = 0;
	    //$response["message"] = "Required field(s) is missing";
	 
	    // echoing JSON response
	    //echo json_encode($response);
		//}
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>