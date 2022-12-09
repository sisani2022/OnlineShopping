<html>
<head>
<title> list </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="../style/style.css"></script>
<style type="text/css">



.btn{
position:absolute;
left:70px;
top:340px;
background-color:green; 
color:white
}

 	#h:hover{
 		color: green;
 		text-decoration: none;
 	}
 	a{
		position:center;
 		color: white;
 		text-decoration: none;
 	}

 lable{
    color:green;
  }
  .control-label{
    color:green;
  }
  body{ background-color: white; }
  #contaner{
    box-shadow:10px green;
    width: 150px;
    height: 50%;
    margin-right:500px;
  }
  .h{
  position: center;
  right: -90px;
  width:500px;
  height:500px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 #h3{
  position: center;
 top:-450px;
  right: -500px;
  width:100px;
  height:500px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:200px;
  }
.container form{
     position: relative;
    right: -50px;
  }
 
}
</style>
</head>
<?php  $result="";?>
<body>
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../adminmain.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="color:white;font-size:20px;position:relative;right:-400px;">GroceryOutlet</span>
 <ul class=" nav navbar-nav navbar-right">
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
    	             <li><a href="adminnot.php"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span></a></li>
    		<li><a href="../login/logout1.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="../login/login1.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
<fieldset style="width:300px;">
<div class="container">
<div id="contaner">
<?php
include('config.php');
try{
if(isset($_POST['submit']))
{
$user_id=mysql_real_escape_string($_POST['user_id']);
$first_name=mysql_real_escape_string($_POST['first_name']);
$last_name=mysql_real_escape_string($_POST['last_name']);
$password=mysql_real_escape_string($_POST['password']);
$dob=mysql_real_escape_string($_POST['dob']);
$phone_num=mysql_real_escape_string($_POST['phone_num']);
$address=mysql_real_escape_string($_POST['address']);
$age=mysql_real_escape_string($_POST['age']);
$confirm=mysql_real_escape_string($_POST['confirm']);
$isadmin=mysql_real_escape_string($_POST['isadmin']);

$query1=mysql_query("insert into item_list values('$user_id','$first_name','$last_name','$password','$dob',$phone_num,'$address',$age,'$confirm','$isadmin')");
if($query1)
{
header("location:list.php");
}
else{
$result="wrong results";
}
}
}
catch(Exception $e)
        {
         $result=$e;
        }
?>
 <div class="h" style="position:relative;top:100px;">
 <center>
  <h3><lable>Enter correct details</lable></h3>
  <br>
<form class="form-horizontal" method="post" action="">
<div class="form-group">
<br>
<label><?php if(!empty($result)) {
echo "<span class='glyphicon glyphicon-alert'></span>".$result;
}?>
</label>
<center><table><tr><td>
user_id: </td><td><input type="text" name="user_id"></td></tr><tr><td>
first_name : </td><td><input type="text" name="first_name"></td></tr><td>
last_name : </td><td><input type="text" name="last_name"></td></tr><td>
password : </td><td><input type="text" name="password"></td></tr><td>
dob : </td><td><input type="text" name="dob"></td></tr><td>
phone_num : </td><td><input type="text" name="phone_num"></td></tr><td>
address: </td><td><input type="text" name="address"></td></tr><td>
age: </td><td><input type="text" name="age"></td></tr><td>
confirm: </td><td><input type="text" name="confirm"></td></tr><td>
isadmin: </td><td><input type="text" name="isadmin"></td></tr><td>
<br></br><br>
<input type="submit" style="position:relative;top:-60px;"class=btn name="submit" value="Add "></td>
</table>
</center>
</form>
</fieldset>
</head>

<br><br><br><br>

</body>
</html>

