<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buy</title>
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
   <script>
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true ,//this option for allowing user to select from year range
     yearRange: '2017:2040'
    });
    });
    
    function fun()
    {
          var confirm=0;
          var c=document.f.card.value;
          var r1=/^[0-9]{16}$/;
          var m=document.f.mo.value;
          var y=document.f.ye.value;
          var p=document.f.cvv.value;
          var r2=/^[0-9]{3}$/;
          if(c.match(r1) && m && y && p.match(r2))
          {
               window.location.assign("payment.php");
               //window.location.href = "payment.php";
          }
          else
          {
               alert("enter details correctly");
          }
    }
</script>
<?php
session_start();	
$_SESSION['itid'];	
//echo $_SESSION['id'];?>
<div class="container">
<div id="contaner">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <a href="../main.php"><span class="glyphicon glyphicon-home"></span></a>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right">
      <?php	if(isset($_SESSION['id']))?>
      <li><a href="html/notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li ><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav><br>
<div class="h">
  <h3><lable>Pay Amount</lable></h3>
 <br><br>
 
  <form class="form-horizontal" name="f" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">E-mail:</label>
      <div class="col-sm-10">
        <?php echo $_SESSION['id']; ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">CardNumber:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="card" placeholder="Enter card number">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">ExpiryDate:</label>
      <div class="col-sm-10">          
        <select name="mo"><option>Month</option>
        <option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select>
        <select name="ye"><option>Year</option>
        <option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option></select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">CVV:</label>
      <div class="col-sm-10">          
        <input type="text" size="5px" class="form-control" name="cvv" placeholder="Enter cvv">
      </div>
    </div>
  <div class="form-group">
      <div class="row">
        	<div>
        	<button type="button" class="btn btn-success" onclick="fun()">Pay Amount</button>
          </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</body>
</html>
