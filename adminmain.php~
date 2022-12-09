
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="style/style.css">
  <!--<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/jquery-ui.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
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
 
 
 .row{
 	position: relative;
 	right: -20px;
 }
 .h{
 	position: relative;
	
 	right: -20px;
 	width:500px;
 	height:430px; 
 	box-shadow: 5px 3px 5px 5px green;
 }
.i{
 	position:relative;
 	right: -20px;
 	width:600px;
 	height:430px; 
 	box-shadow: 5px 3px 5px 5px green;
 }
 .container input{
    width:100px;
  }

}
</style>
</head>
<body>
<fieldset style="width:700px;">
<div class="container">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="adminmain.php">
        <span class="glyphicon glyphicon-home" style="position:realtive; left:-15px; top:17px;color:white;font-size:20px;"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-550px;font-size:20px;top:20px; color:white;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right" >
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
    	     <li><a href="html/adminnot.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    		<li><a href="logout1.php" style="color:white"><span class="glyphicon glyphicon-log-out" style="color:white"></span> Logout</a></li>
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

<div >
<br>
 <div class="row">
	<div class="col-xs-6">
		<div class="h" style="background: url('') no-repeat center center fixed;background-size:cover;width:500px;height:450px;">
<br><br>
<img src="img/ad.jpg" height=400 width=400  style="align:center"></img>
</div>
</div>
	
	<div class="col-xs-6">
		<div class="h" style="background: url('') no-repeat center center fixed;background-size:cover;width:500px;height:450px;">
			<br>
			<center>
			
			<a href="item_list/list.php"><button type="button" class="btn btn-success" value="success">item_list</button></a><br><br>
		<a href="notifications/list.php"><button type="button" class="btn btn-success" value="success">notifications</button></a><br><br>
			<a href="offer_list/list.php"><button type="button" class="btn btn-success" value="success">offer_list</button></a><br><br>
		<a href="user_details/list.php"><button type="button" class="btn btn-success" value="success">user_details</button></a><br><br>
			
	
			</center>
			
		</div>
		
	</div>
 
</div>
</div>
</div>
</div>
<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">
</div>
</nav>
</body>
</html>
