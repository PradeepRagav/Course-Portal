<!DOCTYPE html>
<html>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$dir1 = $_POST["dir"];
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

?>
</body>
</html>