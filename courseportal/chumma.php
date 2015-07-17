<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
<?php

$string = "C:\wamp\www\resources\12HSM61\CoursePPT";
$patterns = array();
$patterns[0] = '/:/';
$replacements = array();
$replacements[0] = '\\';

$string1 =  preg_replace($patterns, $replacements, $string);

echo "$string1";
?>

?>
</body>
</html>