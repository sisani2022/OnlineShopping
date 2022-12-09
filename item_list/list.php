<html>
<head>
<title>Items List</title>
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
$query1=mysql_query("select item_id, item_category, item_name, item_cost, item_measure, item_quantity, item_rating, item_image  from item_list");
echo "<table class='table table-hover table-bordered' style='color:green;'><tr><th>item_id</th><th>item_category</th><th>item_name</th><th>item_cost</th><th>item_measure</th><th>item_quantity</th><th>item_rating</th><th>item_image</th><th>operation1</th><th>operation2</th><th1></th1><th1></th1><th1></th1><th1></th1><th1></th1><th1></th1></tr>";
while($query2=mysql_fetch_array($query1))
{
	echo "<tr><td>".$query2['item_id']."</td>";
	echo "<td>".$query2['item_category']."</td>";
	echo "<td>".$query2['item_name']."</td>";
	echo "<td>".$query2['item_cost']."</td>";
	echo "<td>".$query2['item_measure']."</td>";
	echo "<td>".$query2['item_quantity']."</td>";
	echo "<td>".$query2['item_rating']."</td>";
	echo "<td>".$query2['item_image']."</td>";
	echo "<td><a  href='edit.php?item_id=".$query2['item_id']."'><button  class='btn btn-primary' style='height:30px;' style='width:90px;' style='color:yellow;'>UPDATE</button></a></td>";
	echo "<td ><a href='delete.php?item_id=".$query2['item_id']."'><button class='btn btn-danger' style='height:30px;' style='width:90px;'> REMOVE</button></a></td></tr>";
	
}
 echo "</table>";
?>

<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header" ><center>
	    
       <a href="../adminmain.php"> <span class="glyphicon glyphicon-home" style="position:realtive; left:-130px; top:17px;color:white;"></span></a>
    
      <a id="h" class="navbar-brand" href="main.html" style="position:relative;right:-550px; color:white;">GroceryOutlet</center></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    

      <li ><a href="../logout1.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav><br>
<div>
<center><a href="add.php"><button  class="btn btn-success" style='width:100px;'>
 Add</button></a></center><br>
</div>
<label><?php
session_start();
 if(isset($_SESSION['del'])){ 
echo $_SESSION['del'];
}?></label>
</body>


