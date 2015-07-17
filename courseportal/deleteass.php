<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

		$topic = $_POST["topic"] ;
		$cid = $_POST["cid"] ;
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
		if($conn)
		{
			$sql1 = "DELETE FROM assignment WHERE topic = '$topic'";
			$sql2 = "DELETE FROM course_assignment WHERE topic = '$topic' && course_id = '$cid'";
			$sql3 = "DELETE FROM assignment_submission WHERE topic = '$topic' && course_id = '$cid'";
					if ( $conn->query($sql1) == TRUE ){
						echo "$topic <br>";
						$path = "/var/www/courseportal/assignments/$cid/$topic";
						if(file_exists($path)){
							rmdir_recursive($path);
						}
						
						header("Location: /courseportal/assignment_manage.php");
					}
					else
						echo"error";
					
		}
		else
		{
			echo "Error";
		}

		function rmdir_recursive($dir) {
								foreach(scandir($dir) as $file) {
									if ('.' === $file || '..' === $file) continue;
									if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
									else unlink("$dir/$file");
								}
								rmdir($dir);
							}
?>
</body>
</html>
