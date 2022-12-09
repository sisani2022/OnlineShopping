<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
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
    width: 100px;
    height: 50%;
    margin-right:400px;
  }
  .h{
  position: relative;
 bottom:-40px;
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
  right:-30px;
  list-style:none;
  }
  li{
    position:relative;
  right:-30px;
  display:inline;
  }
  .lii{
  padding:90px;
  }
  .lii1 {
  padding:10px;
  }
</style>
</head>
<body>
<div class="container" >
<div id="contaner" >
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-200px;">GroceryOutlet</span>
    <ul class="nav navbar-nav " style="postion:relative;right:-900px;">
    <?php
    	session_start();
    	if(isset($_SESSION['id'])&&isset($_SESSION['user_type'])&&$_SESSION['user_type']=='no'){?>
    	             <li><a href="html/notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
 <li><a href="html/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else 
    	{
    	?>
      <li ><a href="login/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li ><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br>
<?php
$images=array('','1.jpeg','2.jpeg','3.jpeg','4.jpeg','5.jpeg');
$groups=array('','fruits','vegetables','books','soaps','pens');
global $result,$co;
$co=0;
$result="<ul><li class='lii1'><a class='week' href='html/item.php?gn=".$groups[1]."'> <img src='img/group/". $images[1]."' style='border:2px solid black' width='200' height='200'/></a></li>" . 
"<li class='lii1'><a class='week' href='html/item.php?gn=".$groups[2]."' > <img src='img/group/". $images[2]."' style='border:2px solid black' width='200' height='200'/></a></li>".
"<li class='lii1'><a class='week' href='html/item.php?gn=".$groups[3]."'> <img src='img/group/". $images[3]."' style='border:2px solid black' width='200' height='200' /></a></li></ul>
<ul><li class='lii'>$groups[1]</li><li class='lii'>$groups[2]</li><li class='lii'>$groups[3]</li></ul>
<ul><br>".
"<li class='lii1'><a class='week' href='html/item.php?gn=".$groups[4]."'> <img src='img/group/". $images[4]. "' style='border:2px solid black' width='200'  height='200' /></a></li>".
"<li class='lii1'><a class='week' href='html/item.php?gn=".$groups[5]."'> <img src='img/group/". $images[5]. "' style='border:2px solid black' width='200'  height='200' /></a></li></ul>
<ul><li class='lii'>$groups[4]</li><li class='lii'>$groups[5]</li></ul><br>";

if($_SERVER['REQUEST_METHOD']=="POST")
{
$n=0;
   if(!empty($_POST['st'])){
   	$s=strtolower($_POST['st']);
   	$k=array_search($s, $groups);
   	
	if(!empty($k))
	{
	     $result="<a class='week' href='html/item.php?gn=".$s."'><img src='img/group/". $images[$k]."' width='200' height='100'</a>";
	}
	else{
	$con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$qu2="select *from item_list where item_name='".$s."';";
	 if($result1=mysqli_query($con,$qu2)){
	 
	 $row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
               			 if(mysqli_num_rows($result1)>0){
               			  $result="<ul><li class='lii1'><a class='week' href='html/item_desc.php?id=".$row['item_id']."'> <img style='border:2px solid black' src='img/group/". $row['item_image']."' width='300' height='200' /></a></li></ul><br>".
"<ul><li class='lii'>'".$row['item_name']."'</li></ul>";
	 }
	 	else{
	 	
	 		$result="<img src='img/oops.jpg' width='300' height='200'/><br><br><lable style='font-size:20px;'><span right:-300px; class='glyphicon glyphicon-alert'>   </span>.resuls not found</lable>";
	 		
	 	}
	}
	} 	
}
}
//mysqli_close($con);
}?>
 <div style="width:800px;">
<div class="container" style="position:relative;right:-100px;" >
<div class="col-md-3" >
  <form class="navbar-form" method="post" role="search" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="input-group add-on" style="position:fixed;top:100px;left:300px;">
      <input class="form-control" placeholder="Search" name="st" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
  <?php 
  function check()
  {
  	$con1=mysqli_connect("localhost","root","","first_project");
	if($con1){
		$qu5="select *from rating  where user_id= '".$_SESSION['id']."' ;";
		$r=mysqli_query($con1,$qu5);
		 if($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
		 		//mysqli_close($con1);
		    		return true;
		 }
		 else{
		 	//echo "navya1";
		 	//mysqli_close($con1);
		 	return false;
		 	}
		}
	//mysqli_close($con1);
	return false;
  }
  if(isset($_SESSION['id'])){
  $co++;
  ?>
   <div>
  <a href="html/link.php"><button class="btn btn-success" style="width:150px;position:fixed;top:100px;left:700px;">RequestForItem</button></a>
<br>
  	<?php if(check()){ ?>
 <img src="img/rate.jpeg" width="100" height="100"style="width:150px;position:fixed;top:200px;left:1100px;" />
  <a href="html/rate_on.php"><button class="btn btn-success" style="width:150px;position:fixed;top:300px;left:1100px;">RateOnProduct</button></a>
<br>
<br>
<?php } }?>
</div>
</div>
<br>
<br>
<br>
<br><br>
<?php if($co==0) { ?>
<div style="position:relative;height:660px;top:50px;right:-100px;">
<?php } else { ?>
<div style="position:relative;height:660px;top:50px;right:250px;">
<?php } ?>
<?php 
//$_SESSION['id']='navyamasuram137@gmail.com';
 //echo "<br><br><br><br>".$_SESSION['id'];
echo $result;
?>		
</div><!-- end container-->
</div>
</div>
</div>

<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">Contact-Us:navvymasuram137@gmail.com
</div>
</nav>
</body>
</html>
