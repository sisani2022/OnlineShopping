<!DOCTYPE html>
<html lang="en">
<head>
 <title>Rate On Product</title>
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
   <span id="h" style="position:relative;right:-150px;">GroceryOutlet</span>
  <ul class="nav navbar-nav  " style="position:relative;right:-900px;">
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
 global $result1,$d,$c;
 $row="";
 $row1="";
 $result1="";
 $c=0;
 $d=0;
   $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$qu2="select * from rating where user_id='".$_SESSION['id']."';";
	
	 if($result1=mysqli_query($con,$qu2)) {
	 
	 		$c++;  
			 }
	} 
	//echo "<br><br><br><br><br><br><br><br><br>".$row1;<?php $_SERVER['PHP_SELF'];
 mysqli_close($con);
   ?>
 <form class="form-horizontal" method="post" name="f" action="rate_action.php">
  <h3><lable>Rating</lable></h3>
  <table class="table table-hover table bordered">
  <?php if($c==1)
  	{ 
  	while($row1=mysqli_fetch_assoc($result1))
  	{   		
  ?>
    <tr>
    <td>
    <label class="control-label col-sm-5"><?php
     $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$qu3="select item_name from item_list where item_id=".$row1['item_id'].";";
	 if($result2=mysqli_query($con,$qu3)) {
	 		$row2=mysqli_fetch_assoc($result2);
	 		echo $row2['item_name'];
			 } }?></label>
    </td>
    <td>
      <select name="ch<?php echo ++$d;?>"><option>Rate</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
    </td>
    </tr>
    <?php  }
    $_SESSION['count2']=$d;
     }?>
    </table>
  <center>  <div class="row">
  <div class="col-sm-4">
   <button type="submit" name="rate" class="btn btn-success col-sm-4" style="width:100px;padding:10px;">Submit</button>
    </div>
    </div>
   </center>
      </div>
    </div>
  </form>
      </div>
    </div>
</div>
</body>
</center>
</html>

