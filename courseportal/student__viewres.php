<?php
session_start();
?>
<!DOCTYPE HTML> 
<html>
<head>
<title>Staff home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/student_course_home.php/">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/assignment_submission.php/">Submit Assignments</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/assignment_view_student.php/">Assignment list</a></li>
          </ul>
        </li><li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/ResourceDownload.php/">Download course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/student_viewres.php/">View course resource</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/about.html/">About website</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/contact.html/">Contact info</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li class="active"><a href="/logout.php/">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>   
		
  </div>
</div>

<div class="container">
<div class="jumbotron" >
<h3>Course Resource</h3>
<hr>

 
<form action = "/viewdir.php/" method= "POST" >
<strong>Resource type:</strong><br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="CoursePPT") echo "checked";?>  value="CoursePPT">CoursePPT
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="QuestionBank") echo "checked";?>  value="QuestionBank">QuestionBank
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="LessonPlan") echo "checked";?>  value="LessonPlan">LessonPlan
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="ModelQuestionPaper") echo "checked";?>  value="ModelQuestionPaper">ModelQuestionPaper
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<br><br>
</div></div>
</body>
</html>