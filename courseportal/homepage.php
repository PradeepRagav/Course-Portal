
<!DOCTYPE html>
<html lang="en">
<head>
  <title>COURSE RESOURCE MANAGEMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="home.php">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/courseportal/homepage.php/">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up<span class="caret"></span></a>
	<ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/student.php">STUDENT</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/staff.php">STAFF</a></li>
          </ul>
	</li>
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login<span class="caret"></span></a>
	<ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/Student_login.php">STUDENT</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/Staff_login.php">STAFF</a></li>
          </ul>
	</li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <h1 >COURSE RESOURCE MANAGEMENT</h1>           
  </div>
</div>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="F:\punith\6th sem\dbms\Project\ima.jpg" alt="book" class="img-rounded" width="460" height="345">
      </div>

      <div class="item">
        <img src="F:\punith\6th sem\dbms\Project\images.jpg" alt="book" class="img-rounded" width="460" height="345">
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
