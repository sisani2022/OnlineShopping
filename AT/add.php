<html>

<body>
<?php
include('config.php');
if(isset($_POST['submit']))
{
$id=mysql_real_escape_string($_POST['id']);
$name=mysql_real_escape_string($_POST['name']);
$age=mysql_real_escape_string($_POST['age']);
$query1=mysql_query("insert into addd values('$id','$name','$age')");
echo "insert into addd values('$id','$name','$age')";
if($query1)
{
header("location:list.php");
}
}
?>
<style type="text/css">
.btn{
position:absolute;
left:70px;
top:150px;
background-color:green; 
color:white
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
  
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
   
  </div>
</nav>
 <div class="h">
 <center>
 <br></br>
  <h3><lable>Enter correct details</lable></h3>
  <br>
<form class="form-horizontal" method="post" action="">
<div class="form-group">
<center><table><tr><td>
Id: </td><td><input type="text" name="id"></td></tr><tr><td>
Name: </td><td><input type="text" name="name"></td></tr><td>
Age: </td><td><input type="text" name="age"></td></tr><td>
<br></br>
<input type="submit" class=btn name="submit" value="Add Student"></td>
</table>
</center>
</form>
</fieldset>
</body>
</html>
