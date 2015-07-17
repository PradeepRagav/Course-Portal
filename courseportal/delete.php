<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

		$usn = $_POST["usn"] ;
		$cid = $_POST["cid"] ;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
		if($conn)
		{
			$sql1 = "DELETE FROM studies WHERE usn = '$usn' && course_id = '$cid'";
					if ( $conn->query($sql1) == TRUE ){
						
						header("Location: /listofstudents.php/");
					}
					
		}
		else
		{
			echo "Error";
		}


?>
</body>
</html>