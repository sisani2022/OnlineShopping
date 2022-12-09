<!DOCTYPE html>
<html lang="en">
<head>
  <title>Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
  <script src="../bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
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
  right: -300px;
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
  display:inline;
  }
  .lii{
  padding:10px;
  }
  .lii1 {
  padding:40px;  
  }
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
     <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav "style="postion:relative;right:-900px;" >
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){ ?>
    	     <li><a href="html/notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    	     <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li ><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="../login/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      <li ><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
<div class="h" style="width:800px">
  <h3><lable style='position:relative;left:150px;' >Items List</lable></h3><br>
  <div>
 <?php 
 $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$s=$_GET['gn'];
	$itname=array();
	$qu2="select item_id,item_image,item_name from item_list where item_category='".$s."';";
	$result="<ul>";$index=0; $count=0;
	 if($result1=mysqli_query($con,$qu2)){
	               
	 while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
               			  //$result.="<li style='position:relative;left:100px;'><a class='week' href='item_desc.php?id=".$row['item_id']."'><img src='../img/". $row['item_image']."' width='100' height='100' /></a></li><br>";
                       
               	 $result.="<li class='lii1'><a class='week' href='item_desc.php?id=".$row['item_id']."'> <img style='2px solid black' src='../img/". $row['item_image']."' width='120' height='120' /></a></li>";
               	     //$itname[$index++];
               	
               	        $count++; 
               	if($count==3) { 
               	//$result="<br>";
               	//$result.="<li class='lii'>".$itname[$index-2]."></li><li class='lii'>".$itname[$index-1]."></li><li class='lii'>".$itname[$index]."></li><br>";
               	}             		                     	    
	 }
	}
	$result.="</ul>";
	echo $result;
	} 	
 ?>
  </div>
</div>
</body>
</html>

