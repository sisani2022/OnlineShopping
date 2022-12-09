<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css">
 	a{
 		color: white;
 		text-decoration: none;
 	}
  #h{
    margin-top:-25px;
    margin-left:400px;
    color:white;
    font-weight:bold;
    font-size: 25px; 
  }
  .glyphicon.glyphicon-home{
    margin-top:10px;
    font-size: 30px;
}
.glyphicon.glyphicon-home:hover{
   margin-top:10px;
    color:white;
}
 </style>
</head>
<body>

<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right">
      <li ><a href="../login/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      <li ><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Searchpage</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div>

</body>
</html>

