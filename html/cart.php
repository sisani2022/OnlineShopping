<!DOCTYPE html>
<html lang="en">
<?php 
$conn = mysqli_connect("localhost","root","","first_project");
session_start();
$log=$_SESSION["l"];
$q=0;
?>
<head>
  <title>Cart List</title>
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
    <?php	if(!isset($_SESSION['id'])) {
    	     header("Location: link1.php");
    	     //echo window.location.assign("link1.php");
      } else { ?>
          <li><a href="notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li ><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="h">
  <h3><a type="submit" class="btn btn-success" href="../main1.php">GoToProductsPage</a></h3>
  <h3><lable>Cart List</lable></h3>
  
  <?php 
 // echo $_SESSION['itid'];
if(!empty($_GET["action"])) {

     if($_GET["action"]=="add")
     {
          $_POST["quantit"]=$_GET["item"];
		if(!empty($_POST["quantit"])) {
		//echo $_POST['quantit'];
				
		
		$iq=$_SESSION["count"]-$_POST["quantit"];

          $totalprice=$_SESSION["price"]*$_POST["quantit"];
		     $qu=mysqli_query($conn,"insert into cart_list(user_id,item_id,quantity,cost) values('".$_SESSION['id']."',".$_SESSION['current'].",".$_POST['quantit'].",".$totalprice.");");
		     
		     $qu1=mysqli_query($conn,"update item_list set item_quantity=".$iq." where item_id=".$_SESSION["current"].";");
		         
		          echo "item added to cart";
		}  }   
	else if($_GET["action"]=="update")
	{
	          $q=$_POST["qua"];
	          $_SESSION["quant"]=$q;
	          $iq=$_SESSION["count"]-$_POST["qua"];
	          $totpri=$_SESSION["price"]*$q;
	          
			$qu2=mysqli_query($conn,"update cart_list set quantity=".$q.", cost=".$totpri." where item_id=".$_GET["item"].";");
			$qu3=mysqli_query($conn,"update item_list set item_quantity=".$iq." where item_id=".$_SESSION["current"].";");

				echo "item quantiy updated in cart list";
	}
	}	
		 ?>    
			
		<table class="table table-hover">
          <thead>
          <th>ItemId</th>
          <th>ItemQuantity</th>
          <th>ItemCost</th>
          <th></th>
          <th></th>
          </thead>
     <tbody>
      <?php
      $total_cost=0;
    $cartitem=mysqli_query($conn,"select * from cart_list;");
	?>
          
        <?php    while($row=mysqli_fetch_assoc($cartitem)) {
               
             ?> 
    <tr>
    <td><?php echo $row["item_id"];?></td>
    <td><?php echo $row["quantity"];?></td>
    <td>  <?php    
               //$row["cost"]=$row["cost"]*$_POST["quantit"];             
               echo $row["cost"];
               $total_cost=$total_cost+$row["cost"];
          ?>  </td>
      <td><a type="submit" href="cart_remove.php?item=<?php echo $row['item_id'];?>" class="btn btn-link">Remove</a></td>
      <td><a type="submit" href="cart_edit.php?item=<?php echo $row['item_id'];?>" class="btn btn-link">Edit</a></td>
    </tr>
     <?php 
	  } ?>
	</tbody>
	</table>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <p style="color:purple;font-size:16px">Total cost for all the items : <?php echo "Rs ".$total_cost."/-"; ?></p>
      </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <a type="submit" href="buy.php" class="btn btn-success">Buy</a>
      </div>
    </div>
   <?php exit; 		    
		  } 
		 ?>
		
</div>
</div>
</div>
</body>
</html>
