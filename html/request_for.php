<!DOCTYPE html>
<html lang="en">
<head>
  <title>Request Item</title>
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
    width: 100px;
    height: 50%;
    margin-right:400px;
  }
  .h{
  position: relative;
 bottom:-50px;
  right: -10px;
  width:400px;
  height:500px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 #h3{
  position: relative;
 top:-450px;
  right: -700px;
  width:400px;
  height:500px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:70px;
  }
.container form{
     position: relative;
    right: 10px;
  }
  ul{
  position:relative;
  right:-50px;
  list-style:none;
  }
  li{
    position:relative;
  right:-50px;
  }
}
</style>
</head>
<body>
<div class="container">
<div id="contaner" >
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main1.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav " style="postion:relative;right:-900px;">
    <?php
    	session_start();
      unset($_SESSION['req1']);
    	if(isset($_SESSION['id'])){?>
    	             <li><a href="notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    		<li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="../login/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li ><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br>
<?php
global $x;
$x=0;
if($_SERVER['REQUEST_METHOD']=="POST")
{
   
    $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$c=$_POST['request'];
	$y=$_SESSION['id'];
	 $q="insert into notifications values('$y','a','$c')";
	  if($result1=mysqli_query($con,$q)){
	   $x++;
	  }  
}
}
?>

 <div class="h" style="width:800px;">
 <?php if($x==0){?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <button class="btn btn-success" style="width:150px;position:fixed;top:100px;left:200px;">RequestForItem</button>
<textarea rows="5"  cols="50" style="position:fixed;top:150px;left:200px;"placeholder="write your request here...." name="request"></textarea>
<button type="submit"class="btn btn-danger" style="width:150px;position:fixed;top:300px;left:200px;">send</button>
</form>
<?php }
else {  ?>
  <lable style="position:relative;top:200px;left:200px;font-size:20px;">You Request has been sent..  <span class="glyphicon glyphicon-ok" style="width:100px;"></span></lable>
<?php } ?>
</div>
</div>
</div>

<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">Contact-Us:navvymasuram137@gmail.com
</div>
</nav>
</body>
</html>

