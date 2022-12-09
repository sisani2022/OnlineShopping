<html>
<head>
 <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css">
 .btn{
position:absolute;
left:70px;
top:260px;
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
if(isset($_GET['item_id']))
{
$item_id=$_GET['item_id'];
$query1=mysql_query("select * from item_list where item_id='$item_id'");
$query2=mysql_fetch_array($query1);}
if(isset($_POST['submit']))
{
$item_category=$_POST['item_category'];
$item_name=$_POST['item_name'];
$item_cost=$_POST['item_cost'];
$item_measure=$_POST['item_measure'];
$item_quantity=$_POST['item_quantity'];
$item_rate=$_POST['item_rating'];
$item_image=$_POST['item_image'];
if(!(empty($_POST['item_category'])||empty($_POST['item_name'])||empty($_POST['item_cost'])||empty($_POST['item_measure'])||empty($_POST['item_quantity'])||empty($_POST['item_image'])))	{
$query3=mysql_query("update item_list set item_category='$item_category', item_name='$item_name', item_cost=$item_cost, item_measure='$item_measure' , item_quantity=$item_quantity, item_image='$item_image' where item_id=$item_id");
if($query3)
{
header('location:list.php');
}
else{
$result="wrong results";
}
}
}
$query1=mysql_query("select * from item_list where item_id='$item_id'");
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
  height:400px; 
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
    <div class="navbar-header" >
<a href="../adminmain.php"><span class="glyphicon glyphicon-home" style="position:realtive; left:-130px; top:17px;color:white;"></span></a>
      <a id="h" class="navbar-brand" href="main.html" color="white"style="position:relative;right:-550px; color:white;">GroceryOutlet</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    	<li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 <div class="h">
 <center>
 <br></br>
  <h3><lable>Enter correct details</lable></h3>
<label><?php if(!empty($result)) {
echo "<span class='glyphicon glyphicon-alert'></span>".$result;
}?>
</label>
<form method="post" action="">
<center><table><tr><td>
item_id: </td><td><input type="text" value="<?php echo $query2['item_id']?>" name="item_id"></td></tr><tr><td>
item_category : </td><td><input type="text"value="<?php echo $query2['item_category']?>" name="item_category"></td></tr><td>
item_name : </td><td><input type="text" value="<?php echo $query2['item_name']?>" name="item_name"></td></tr><td>
item_cost : </td><td><input type="text" value="<?php echo $query2['item_cost']?>" name="item_cost"></td></tr><td>
item_measure : </td><td><input type="text" value="<?php echo $query2['item_measure']?>" name="item_measure"></td></tr><td>
item_quantity : </td><td><input type="text" value="<?php echo $query2['item_quantity']?>" name="item_quantity"></td></tr><td>

item_image : </td><td><input type="text" value="<?php echo $query2['item_image']?>" name="item_image"></td></tr><td>
<br></br>
<input type="submit" class=btn name="submit" value="update" >
</form>
</body>
</html>

