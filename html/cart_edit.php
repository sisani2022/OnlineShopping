<!DOCTYPE html>
<html lang="en">
<?php 
$conn = mysqli_connect("localhost","root","","first_project");
session_start();
$log=$_SESSION["l"];
?>
<head>
  <title>Cart</title>
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
  overflow-y:scroll;
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
          <li><a href="html/notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li ><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav><br>
<div class="h">
  <h3><lable>Edit Item Quantity</lable></h3>
 <?php 
 //echo 'hi';
  if(!empty($_GET["item"])) {
				//echo $_GET["itid"];
		?>
     <form class="form-horizontal" action="cart.php?action=update&item=<?php echo $_GET['item'];?>" method="post">
    <div class="form-group">
      <label id="m" class="control-label col-sm-2 m">Enter Quantity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="qua"  placeholder="Enter quantity">
      </div>
    </div>
    <div class="form-group">
      <div class="row">
      	<div class="col-sm-3">
        	<button type="submit" class="btn btn-success">Update</button>
        </div>
       </div>
     </div>
    </form>
    
		
	     <?php		  
		}														
	?>
	
</div>
</div>
</div>
</body>
</html>
