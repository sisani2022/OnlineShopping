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
if(isset($_GET['offer_no']))
{
$offer_no=$_GET['offer_no'];
$query1=mysql_query("select * from offers_list where offer_no=$offer_no");
$query2=mysql_fetch_array($query1);}
if(isset($_POST['submit']))
{
$item_id=$_POST['item_id'];
$item1=$_POST['item1'];
$item2=$_POST['item2'];
$item3=$_POST['item3'];

if(!(empty($_POST['item_id'])||empty($_POST['item1'])||empty($_POST['item2'])||empty($_POST['item3'])))	{
$query3=mysql_query("update offers_list set item_id=$item_id, item1=$item1, item2=$item2, item3=$item3  where offer_no=$offer_no");
if($query3)
{
header('location:list.php');
}
else{
$result="wrong results";
}
}
}
$query1=mysql_query("select * from offers_list where offer_no=$offer_no");
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
offer_no: </td><td><input type="text" value="<?php echo $query2['offer_no']?>" name="offer_no"></td></tr><tr><td>
item_id : </td><td><input type="text"value="<?php echo $query2['item_id']?>" name="item_id"></td></tr><td>
item1 : </td><td><input type="text" value="<?php echo $query2['item1']?>" name="item1"></td></tr><td>
item2: </td><td><input type="text" value="<?php echo $query2['item2']?>" name="item2"></td></tr><td>
item3 : </td><td><input type="text" value="<?php echo $query2['item3']?>" name="item3"></td></tr><td>

<br></br>
<input type="submit" class=btn name="submit" value="update" >
</form>
</body>
</html>

