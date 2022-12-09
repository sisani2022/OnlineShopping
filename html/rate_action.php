<!DOCTYPE html>
<html lang="en">
<head>
 <title>Item Description</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
  <script src="../bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css">
 	#h:hover{
 		color: white;
 		text-decoration: none;
 	}
 	a{
 		color: white;
 		text-decoration: none;
 	}

 </style>
</head>
<body>
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <a id="h" class="navbar-brand" href="main.php">GroceryOutlet</a>
    </div>
  </div>
</nav>
<style type="text/css">
 lable{
    color:green;
  }
  .control-label{
    color:green;
  }
  #contaner{
    box-shadow:10px green;
    width: 400px;
    height: 40%;
    margin-right:500px;
  }
  .h{
  position: relative;
  right: -90px;
  width:400px;
  height:530px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:200px;
  }
.container form{
     position: relative;
    right: -6px;
  }
}
</style>
<script>
function fun()
{
     var d=document.f.quantit.value;
     //alert(d);
     var re=/^[1-9]$/;
 
     if(d.match(re)) {
          window.location.assign("cart.php?action=add&item="+d);          
     }
     else
          alert("enter quantity");
}
</script>
</head>
<br><br><br>
<body>
<div class="container">
<div id="contaner">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
   <span id="h" style="position:relative;right:-200px;">GroceryOutlet</span>
  <ul class="nav navbar-nav " style="position:relative;right:-1000px;">
    <?php
    	session_start();
    	//$_SESSION["l"];
    	if(isset($_SESSION['id'])){?>
    	     <li><a href="notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
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
 <div class="h">
 <?php
 $row="";
 $row1="";
 $rating=0;
   $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$a=[];
	$c=0;
	while($c<$_SESSION['count2'])
	{
		$a[$c++]=$_POST['ch'.$c];
	}
	$c=0;
	$c1=0;
	$qu1="select *from rating where user_id='".$_SESSION['id']."';";
	$result1=mysqli_query($con,$qu1);
	while($row=mysqli_fetch_assoc($result1))
	{
		
		$qu3="select item_rating from item_list where item_id=".$row['item_id'].";";
		if($result3=mysqli_query($con,$qu3))
		{
			if($row1=mysqli_fetch_assoc($result3))
				$rating=$row1['item_rating'];
		}
		$avg=($rating+$a[$c])/2;
		$qu2="update item_list set item_rating=".$avg." where item_id=".$row['item_id'].";";
		$c++;
		 if($result2=mysqli_query($con,$qu2)) {
		 	$c1++;
			 }
	}
	if($_SESSION['count2']<=$c1)
	{
		header("Location:thank.php");
	}
	} 
	//echo "<br><br><br><br><br><br><br><br><br>".$row1;<?php $_SERVER['PHP_SELF'];
 mysqli_close($con);
   ?>
      </div>
    </div>
</div>
</body>
</center>
</html>

