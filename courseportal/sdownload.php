<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//$dir1 = $_POST["dir"];
	$rtype = $_POST["rtype"];
	if($rtype == "CoursePPT")
		$dir ="ppt";
	else if($rtype == "QuestionBank")
		$dir = "qbank";
	else if($rtype == "LessonPlan")
		$dir = "lessonplan";
	else if($rtype == "ModelQuestionPaper")
		$dir = "modelq";
	else if($rtype == "LabManual")
		$dir = "labm";
	
	
	
	$cdrive = "C:\wamp\www";
	$cid = $_SESSION["cid"];
	echo "$cid<br><br><br>";
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
			//$cname = $_SESSION["coursename"];
			$sql1 = "SELECT $dir FROM resource WHERE course_id = '$cid'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				print_r ($row1);
				$dir2 = $row1["$dir"];
				if($dir2 == null){
					echo "Empty folder!<br>";
					header("Location: /ResourceDownload.php/");
					
				}
				echo "$dir2<br><br><br>";
				$dir1 = $cdrive.$dir2 ;
				echo "$dir1<br><br><br>";
				$zip = new ZipArchive;
				$rar = "zipfile.zip";
				$rardir = $dir1.$rar;
				echo "$rardir<br><br><br>";
				//$file = "chumma.php";
				//$afile = $dir1.$file;
				//echo "$afile<br>";
				if ($zip->open("$rardir",ZIPARCHIVE::CREATE) === TRUE) {
					if ($dh = opendir($dir1)){
					
						while (($file = readdir($dh)) !== false){
							if ($file == '.' ) 
								continue;
							else if ($file == '..' ) 
								continue;
							else if ($file == $rar ) 
								continue;
							$afile = $dir1.$file;
							echo "$afile<br>";
							$zip->addFile("$afile","$file");
						}
					}
					
					$zip->close();
					
					
					echo 'ok';
				} else {
					echo 'failed';
				}
				chdir("$dir1");
				if (file_exists($rar)) {
						header('Content-Description: File Transfer');
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename='.basename($rar));
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						header('Content-Length: ' . filesize($rar));
						header('Content-type: application/zip');
						readfile($rar);
						exit;
					}
				
				
				
			}
			else{
				echo "The Folder is Empty<br>";
				echo "<a href=/resdownload.php/>Back</a>";
				
			}
	
	
	
	
	
	
	
	//$dir1 = $_POST["dir"];
	//echo"$dir1<br><br><br><br>";
	
}

?>
</body>
</html>