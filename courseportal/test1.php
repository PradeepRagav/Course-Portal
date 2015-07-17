<!DOCTYPE html>
<html>
<body>

<?php
	echo "Entered";
	$tname = $_POST["tname"];
	$cid = $_POST["cid"];
	$filename = '/assignments';
	$usn = $_POST["usn"];
	
	
	if (file_exists($filename)) {
		chdir("assignments");
	} else {
		mkdir("assignments");
		chdir("assignments");
	}
	
	if (file_exists("$cid")) {
		chdir("$cid");
	} else {
		mkdir("$cid");
		chdir("$cid");
	}
	
	if (file_exists($tname)) {
		chdir("$tname");
	} else {
		mkdir("$tname");
		chdir("$tname");
	}
	
	if (file_exists($usn)) {
		chdir("$usn");
	} else {
		mkdir("$usn");
		chdir("$usn");
	}
	$dir = "assignments/$cid/$tname/$usn";
	//chdir("assignments");
	//mkdir("$cid");
	//chdir("$cid");
	//mkdir("$tname");
	//chdir("$tname");
	$currdir = getcwd();
	echo "$currdir"
	//$myfile = fopen("assignments", "r");

?>


</body>
</html>