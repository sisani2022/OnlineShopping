
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
 .h lable{
  color:green;
  font-size: 20px;
  position: relative;
  top:-100px;
  right: -100px;
  }
   .h{
  position: relative;
  top:-100px;
  right: -100px;
  width:600px;
  height:300px; 
 text-align:center;
  box-shadow: 5px 5px 5px 5px green;
 }
  </style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header">
    <a id="h1" href="../main.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right">
        <li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<?php if(!empty($_GET['user_id'])) { ?>
<div class="h">
<img src="../img/confirm.jpeg" width="200" height="200"/>
<a style="color:green;position:relative;top:100px;right:200px;" href="link.php?user_id=<?php echo $_GET['user_id'];?>">click here confirm</a>
</div>
  <?php }
else{ ?>
<div class="h">
<img src="../img/oops.jpg" width="200" height="200"/> <br><br>
<label style="color:red;"> <?php echo "oops!...your haven't yet registered" ; ?></label>
</div>
<?php } ?>
</div>

</body>
</html>
