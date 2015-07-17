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
			$cid = "12IS123";
			$sql2 = "INSERT INTO resource(course_id) VALUES ('$cid')";
			if($conn->query($sql2)==TRUE){
				echo "Very good";
			}
			else
			{
				echo "Very bad";
			}
?>