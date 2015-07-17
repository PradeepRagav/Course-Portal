<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

$dir = "C:/wamp/www";

if ($handle = opendir($dir)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo "$entry<br>";
        }
    }

    closedir($handle);
}


?>
</body>
</html>