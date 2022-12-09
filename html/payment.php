
<!DOCTYPE html>
<html lang="en">
<?php 
$conn = mysqli_connect("localhost","root","","first_project");
?>
<head>
  <title>Confirm Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../style/style.css">
  <!--<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/jquery.js"></script>
  <script src="../bootstrap/js/jquery-ui.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<style type="text/css">
 lable{
    color:green;
  }
  .control-label{
    color:green;
  }
  #contaner{
    box-shadow:10px green;
    width: 400px;
    height: 100%;
    margin-right:500px;
  }
  .h{
  position: relative;
  right: -100px;
  width:600px;
  height:550px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:300px;
  }
.container form{
     position: relative;
    right: -100px;
  }
}
</style>
</head>
<body>
<?php
session_start();
?>
<div class="container">
<div id="contaner">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right">
     <?php	if(isset($_SESSION['id']))?>
   <!--  <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>-->
      <li ><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav><br><br>
 <div class="h">
 <br><br>
 <h4 align="center" style="color:green">Payment done successfully.. Items will deliver shortly</h4>
 <div align="center">
 <a href="../main1.php" type="submit" class="btn btn-success">Go to main page</a>
 </div><br><br>
 <div align="center">
 <img src="../img/order-delivery.jpg" width="500px" height="300px" />
 </div>
 <?php
     $que=mysqli_query($conn,"insert into rating(user_id,item_id) values('".$_SESSION['id']."',".$_SESSION['current'].");");
     
     $query=mysqli_query($conn,"delete from cart_list where user_id='".$_SESSION['id']."';");
 ?>
</div>
</div>
</div>
</body>
</html>

