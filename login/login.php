
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../style/style.css">
  <!--<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/jquery.js"></script>
  <script src="../bootstrap/js/jquery-ui.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<style type="text/css">
 lable{
    color:green;
  }
  .control-label{
    color:green;
  }
  #contaner{
    box-shadow:10px green;
    width: 500px;
    height: 100%;
    margin-right:500px;
  }
 
 button{
 	margin-right:-100px;
 	width:100px;
 }
 .row{
 	position: relative;
 	right: -100px;
 }
 .h{
 	position: relative;
 	right: -100px;
 	width:600px;
 	height:430px; 
 	box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:300px;
  }

}
</style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main1.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h"style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right" >
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
    	<li><a href="../html/notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br><br><br>
<div >
 <div class="h">
  <h3><lable style="position:relative;right:-200px;color:green;">Login</lable></h3>
 <br><br>
 <?php 
 $status="";
 if(!empty($_GET['status']))
 	$status= "<span class='glyphicon glyphicon-alert'></span>"."wrong username and password";		
 ?>
 <div style="position:relative;right:-200px;color:red;">
 <?php echo $status;?>
 </div>
  <form class="form-horizontal" action="login_action.php" method="post">
    <div class="form-group">
      <label id="m" class="control-label col-sm-2 m" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="email"  placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label id="m" class="control-label col-sm-2 m" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password" placeholder="Enter password">
      </div>
    </div>
  <div class="form-group">
      <div class="row">
      	<div class="col-sm-3">
        	<button type="submit" class="btn btn-success">login</button>
        </div>
      </div>
    </div>
  </form>
  <a href="forgot.php"><button  style="width:120px;position:relative;top:-45px;right:-300px;"class="btn btn-success">forgot Password</button></a>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">Contact-us:navyamasuram137@gmail.com
</div>
</nav>
</body>
</html>
