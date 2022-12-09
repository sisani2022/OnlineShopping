
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
    <a id="h1" href="../adminmain.php">
        <span class="glyphicon glyphicon-home" style="position:realtive; left:-15px; top:17px;color:white;font-size:20px;"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-550px;font-size:20px;top:20px; color:white;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right" >
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
    	     <li><a href="../html/adminnot.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    		<li><a href="../login/logout1.php" style="color:white"><span class="glyphicon glyphicon-log-out" style="color:white"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="register.php" style="position:relative; color:white;"><span class="glyphicon glyphicon-user" style="position:relative; color:white;"></span> Sign Up</a></li>
      <li ><a href="login.php" style="position:relative; color:white;"><span class="glyphicon glyphicon-log-in" style="position:relative; color:white;"></span> Logout</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br><br><br>
<div class="h" ><img src="oops.jpg" height=150 width=150 style="margin-top:80px; margin-left:220px"></img><br></br>
<span style="position:center; color:red; font-size:15px; margin-top:10px; margin-left:110px" class="glyphicon glyphicon-alert"></span><label style="position:center; color:red; font-size:20px; "><?php
if(isset($_SESSION['del'])){ 
echo $_SESSION['del'];
}?></label>
</div>
</div>
</div>
</body>
</html>
