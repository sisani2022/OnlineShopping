<!DOCTYPE html>
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
<?php
$images=array('1.jpeg','2.jpeg','3.jpeg','4.jpeg','5.jpeg');
$groups=array('fruits','vegetables','books','soaps','pens');
global $result;
$result="<ul>"."<li style='position:relative;right:200px;'><a class='week' href='html/item.php?gn=".$groups[0]."'><img src='img/group/". $images[0]."' width='200' height='100'/></a></li><br>".
"<li ><a class='week' href='html/item.php?gn=".$groups[1]."' ><img src='img/group/". $images[1]."' width='200' height='100'/></a></li><br>".
"<li ><a class='week' href='html/item.php?gn=".$groups[2]."'><img src='img/group/". $images[2]. "'  width='200'  height='100' /></a></li><br>"."<li ><a class='week' href='html/item.php?gn=".$groups[3]."'><img src='img/group/". $images[3]. "'  width='200'  height='100' /></a></li><br>"."<li ><a class='week' href='html/item.php?gn=".$groups[4]."'><img src='img/group/". $images[4]. "'  width='200'  height='100' /></a></li><br></ul>";
if($_SERVER['REQUEST_METHOD']=="POST")
{
   if(!empty($_POST['st'])){
   	$s=$_POST['st'];
   	$k=array_search($s, $groups);
	if($k>=0)
	{
	     $result="<ul><li style='position:relative;right:200px;'><a class='week' href='html/item.php?gn=".$s."'><img src='img/group/". $images[$k]."' width='200' height='100'</a></li><br></ul>";
	}
	else{
	$con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$qu2="select *from item_list where item_name='".$s."';";
	 if($result1=mysqli_query($con,$qu2)){
	 $row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
               			 if(mysqli_num_rows($result1)>0){
               			  $result="<ul ><li style='position:relative;right:200px;'><a class='week' href='html/item_desc.php?id=".$row['item_id']."'><img src='img/group/". $row['item_image']."' width='200' height='100'</a></li><br></ul>";
	 }
	}
	} 	
}
}
}?>
<body>
<div class="container">
<div id="contaner" >
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav " style="postion:relative;right:-900px;">
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
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
<br><br>
<div style="background: url('img/2.jpg') no-repeat center center fixed;background-size:cover;width:1315px;height:555px;position:relative;top:-30px;right:90px;">
<div class="h" id="not" style="overflow: scroll; overflow-x: hidden;">
<div class="container" >
<div class="col-md-3">
  <form class="navbar-form" method="post" role="search" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="st" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
<br>
<br>
</div>
<br>
<br>
<br>
<br>
<?php 
//$_SESSION['id']='navyamasuram137@gmail.com';
 //echo "<br><br><br><br>".$_SESSION['id'];
echo $result;
?>		
</div>< end container>
</div>
<?php
if(isset($_SESSION['id'])){?>
<div id="h3">
<?php
$con=mysqli_connect("localhost","root","","first_project");
$result="";
$count=0;
	if($con){
	$result="<table style='width:300px;position: relative;top:80px;right: -30px;'class='table table-hover'> <thead><tr> <th>Notifications</th></tr></thead><tbody>";
	$qu2="select *from notifications where user_type='u';";
	 if($result1=mysqli_query($con,$qu2)){
	while( $row=mysqli_fetch_array($result1,MYSQLI_ASSOC))
               		  $result.="<tr><td>".++$count."</td><td>". $row['notification']."</td></tr>";
	 }
	 $result.="</tbody></table>";
	}
echo $result;
?>
</div>
<?php  } ?>
</div>
</div>
</div>
<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">navya
</div>
</nav>
</body>
</html>
