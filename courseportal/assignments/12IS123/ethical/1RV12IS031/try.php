<?php
mysql_connect("localhost","root","root");
$con=mysql_select_db("exam");
if($con)
echo "hello";
if(isset($_POST['pass']) && isset($_POST['name']) && isset($_POST['purpose']) && isset($_POST['address']))
{
	echo"try";

	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$purpose=$_POST['purpose'];
	$address=$_POST['address'];
	if($pass=="security100")
	{
		echo"trying";
		$sql="Insert into visitor set value ('$name','$purpose','$address')";
		$result=mysql_query($sql);	
		echo $result;
	}
}/*
	else
	{
		echo "YOU ARE NOT AUTHORIZED TO ENTER THE VISTOR DETAILS";
		header("location: test.html");
	}
}
else
{
	echo "PLEASE ENTER ALL THE DETAILS";
	header("location: test.html");
}

echo "DETAILS OF ALL THE VISITORS TILL NOW :</br>";
echo "<table><tr><th>NAME</th><th>PURPOSE OF VISIT</th><th>ADDRESS</th></tr></table>";
$sql="select * from visitor";
$result=mysql_query($sql);
while($res1=mysql_fetch_array($result,MYSQL_ASSOC)
{
	echo "<tr><td>".$res1['name']."</td><td>".$res1['purpose']."</td><td>".$res1['address']."</td></tr>";
}*/
?>
