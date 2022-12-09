<html>
<head>
<title> list </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">



.btn{
position:absolute;
left:70px;
top:300px;
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
<nav class="navbar navbar-fixed-center" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header" ><center>
 <a href="../adminmain.php"><span class="glyphicon glyphicon-home" style="position:realtive; left:-130px; top:17px;color:white;"></span></a>
    
      <a id="h" class="navbar-brand" href="main.html" style="position:relative;right:-550px; color:white;">GroceryOutlet</center></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    

      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
$offer_no=mysql_real_escape_string($_POST['offer_no']);
$item_id=mysql_real_escape_string($_POST['item_id']);
$item1=mysql_real_escape_string($_POST['item1']);
$item2=mysql_real_escape_string($_POST['item2']);
$item3=mysql_real_escape_string($_POST['item3']);

$query1=mysql_query("insert into offers_list values('$offer_no','$item_id','$item1','$item2','$item3')");
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
 <div class="h">
 <center>
 <br></br>
  <h3><lable>Enter correct details</lable></h3>
  <br>
<form class="form-horizontal" method="post" action="">
<div class="form-group">
<br>
<label><?php if(!empty($result)) {
echo "<span class='glyphicon glyphicon-alert'></span>".$result;
}?>
</label>
<br>
<center><table><tr><td>
offer_no: </td><td><input type="text" name="offer_no"></td></tr><tr><td>
item_id : </td><td><input type="text" name="item_id"></td></tr><td>
item1 : </td><td><input type="text" name="item1"></td></tr><td>
item2 : </td><td><input type="text" name="item2"></td></tr><td>
item3 : </td><td><input type="text" name="item3"></td></tr><td>

<br></br><br>
<input type="submit" class=btn name="submit" value="Add "></td>
</table>
</center>
</form>
</fieldset>
</head>

<br><br><br><br>

</body>
</html>

