<html>
<head>
<?php session_start();?>
<title>Users List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="style/style.css">
  <!--<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/jquery-ui.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="../style/style.css"></script>
<style type="text/css">
table{
border-color:transparent;
position:absolute;
left:-1px;
top:100px;
}/*
body{background-image:url("wede.jpg");
	background-repeat:no-repeat;
	background-size: cover;
	} */
th{

	background-color:white;
	height:40px;
	text-align:center;
	width:90px;
	left:10px;
}
td{
	background-color:white;
	height:35px;
	text-align:center;
	color:green;
	width:160px;
}
btn{
position:absolute;
left:50px;
top:100px;
background-color:yellow; 
color:yellow;
}

 	#h:hover{
 		color: green;
 		text-decoration: none;
 	}
 	a{
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
    width: 100px;
    height: 100%;
	margin:20px;
	

}
  .h{
  position: relative;
  right: -150px;
  width:700px;
  height:400px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:300px;
	
  }
.container form{
     position: relative;
    right: -50px;
  }

}
</style>
</head><br><br>
<body>
<div>
<?php
include('config.php');
$query1=mysql_query("select user_id, first_name, last_name, password, dob, phone_num, address, age,confirm,isadmin  from user_details");
echo "<table class='table table-hover table-bordered'border=1px;><tr><th>user_id</th><th>first_name</th><th>last_name</th><th>password</th><th>dob</th><th>phone_num</th><th>address</th><th>age</th><th>confirm</th><th>isadmin</th><th>operation1</th><th>operation2</th><th1></th1><th1></th1><th1></th1><th1></th1><th1></th1><th1></th1></tr>";
while($query2=mysql_fetch_array($query1))
{
	echo "<tr><td>".$query2['user_id']."</td>";
	echo "<td>".$query2['first_name']."</td>";
	echo "<td>".$query2['last_name']."</td>";
	echo "<td>".$query2['password']."</td>";
	echo "<td>".$query2['dob']."</td>";
	echo "<td>".$query2['phone_num']."</td>";
	echo "<td>".$query2['address']."</td>";
	echo "<td>".$query2['age']."</td>";
	echo "<td>".$query2['confirm']."</td>";
	echo "<td>".$query2['isadmin']."</td>";
	echo "<td><a  href='edit.php?user_id=".$query2['user_id']."'><button  class='btn btn-primary' style='height:30px;' style='width:90px;' style='color:red;'>UPDATE</button></a></td>";
	echo "<td ><a href='delete.php?user_id=".$query2['user_id']."'><button  class='btn btn-danger' style='height:30px;' style='width:90px;'> REMOVE</button></a></td></tr>";
	
}
 echo "</table>";
?>

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
    	if(isset($_SESSION['id'])){?>
    	     <li><a href="../html/adminnot.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    		<li><a href="../logout1.php" style="color:white"><span class="glyphicon glyphicon-log-out" style="color:white"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="../login/login1.php" style="position:relative; color:white;"><span class="glyphicon glyphicon-log-in" style="position:relative; color:white;"></span> Logout</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br>
<div>
<center><a href="add.php"><button  class="btn btn-success" style='width:100px;'>
 Add</button></a></center><br>
</div>
<label><?php
 if(isset($_SESSION['del'])){ 
echo $_SESSION['del'];
}?></label>
</body>


