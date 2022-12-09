<html>
<head>
 <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="../style/style.css"></script>
 <style type="text/css">
 .btn{
position:absolute;
left:70px;
top:300px;
background-color:green; 
color:white
}
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
<?php
global $query2;
include('config.php');
if(isset($_GET['user_id']))
{
$user_id=$_GET['user_id'];
$query1=mysql_query("select *from user_details where user_id='$user_id'");
$query2=mysql_fetch_array($query1);
}
if(isset($_POST['submit']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$phone_num=$_POST['phone_num'];
$address=$_POST['address'];
$age=$_POST['age'];
$confirm=$_POST['confirm'];
$isadmin=$_POST['isadmin'];
if(!(empty($_POST['first_name'])||empty($_POST['last_name'])||empty($_POST['password'])||empty($_POST['dob'])||empty($_POST['phone_num'])||empty($_POST['address'])||empty($_POST['age'])||empty($_POST['confirm'])||empty($_POST['isadmin'])))	
{
$query3=mysql_query("update user_details set first_name='$first_name',last_name='$last_name', password='$password', dob='$dob',phone_num=$phone_num, address='$address',age=$age,confirm='$confirm',isadmin='$isadmin' where user_id='$user_id';");
if($query3)
{
header('location:list.php');
}
else{
$result="wrong results";
}
}
}
$query1=mysql_query("select * from user_details where user_id='$user_id'");
$query2=mysql_fetch_array($query1);
?>
<style type="text/css">
 lable{
    color:green;
  }
  .control-label{
    color:green;
  }
  body{ background-color: white; }
  #contaner{
    box-shadow:10px green;
    width: 400px;
    height: 40%;
    margin-right:500px;
  }
  .h{
  position: relative;
  right: -100px;
  width:500px;
  height:450px; 
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
<br><br><br>
<body>
<fieldset style="width:300px;">
<div class="container">
<div id="contaner">
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
 <div class="h">
 <center>
 <br></br>
  <h3><lable>Enter correct details</lable></h3>
<label><?php if(!empty($result)) 
{
echo "<span class='glyphicon glyphicon-alert'></span>".$result;
}?>
</label>
<form method="post" action="">
<center><table><tr><td>
user_id: </td><td><input type="text" value="<?php echo $query2['user_id']?>" name="user_id"></td></tr><tr><td>
first_name : </td><td><input type="text"value="<?php echo $query2['first_name']?>" name="first_name"></td></tr><td>
last_name : </td><td><input type="text" value="<?php echo $query2['last_name']?>" name="last_name"></td></tr><td>
password : </td><td><input type="text" value="<?php echo $query2['password']?>" name="password"></td></tr><td>
dob : </td><td><input type="text" value="<?php echo $query2['dob']?>" name="dob"></td></tr><td>
phone_num : </td><td><input type="text" value="<?php echo $query2['phone_num']?>" name="phone_num"></td></tr><td>
address : </td><td><input type="text" value="<?php echo $query2['address']?>" name="address"></td></tr><td>
age : </td><td><input type="text" value="<?php echo $query2['age']?>" name="age"></td></tr><td>
confirm : </td><td><input type="text" value="<?php echo $query2['confirm']?>" name="confirm"></td></tr><td>
isadmin : </td><td><input type="text" value="<?php echo $query2['isadmin']?>" name="isadmin"></td></tr><td>
<br></br>
<input type="submit" class=btn name="submit" value="update" >
</form>
</body>
</html>

