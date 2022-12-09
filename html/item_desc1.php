<!DOCTYPE html>
<html lang="en">
<head>
 <title>Item Description</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
  <script src="../bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css">
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
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <a id="h" class="navbar-brand" href="main.php">GroceryOutlet</a>
    </div>
  </div>
</nav>
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
    height: 40%;
    margin-right:500px;
  }
  .h{
  position: relative;
  right: -90px;
  width:400px;
  height:530px; 
  box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:200px;
  }
.container form{
     position: relative;
    right: -6px;
  }
}
</style>
<script>
function fun()
{
     var d=document.f.quantit.value;
     //alert(d);
     var re=/^[1-9]$/;
 
     if(d.match(re)) {
          window.location.assign("cart.php?action=add&item="+d);          
     }
     else
          alert("enter quantity");
}
</script>
</head>
<br><br><br>
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
   <span id="h" style="position:relative;right:-200px;">GroceryOutlet</span>
  <ul class="nav navbar-nav " style="position:relative;right:-1000px;">
    <?php
    	session_start();
    	//$_SESSION["l"];
    	if(isset($_SESSION['id'])){?>
    	     <li><a href="notification.php"><div class="notification-icon"><span class="glyphicon glyphicon-bell"></span>Notifications<span class="badge"><?php $count;?></span>
</div></a></li>
    	     <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
    		<li ><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="../login/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      <li ><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
 <div class="h">
 <?php
 $row="";
 $row1="";
   $con=mysqli_connect("localhost","root","","first_project");

/*if($_SERVER['REQUEST_METHOD']=='POST')
{
	if (empty($_POST["add"])) {
            echo "enter quantity"; 
         } 
         else {
            if (preg_match("/^[1-9]$/", test_input($_POST["add"]))) {
                header("Location: cart.php?action=add");
               }
        }
} 	  
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}*/
   
	if($con){
	$s=$_GET['id'];
	$_SESSION['itid']=$s;
	$qu2="select * from item_list where item_id=".$s.";";
	 if($result1=mysqli_query($con,$qu2)) {
	 $row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
	     $_SESSION['count']=$row['item_quantity'];
		 $qu1="select i.item_name from offers_list o ,item_list i where o.item_id=i.item_id and item_id=".$s.";";
	 	 if($result1=mysqli_query($con,$qu1)){
			 while($row2=mysqli_fetch_array($result,MYSQLI_ASSOC))
			 {
			 	$row1.=",".$row2['item_name'];
			 }
			 }
	} 
	//echo "<br><br><br><br><br><br><br><br><br>".$row1;<?php $_SERVER['PHP_SELF'];
	}
 mysqli_close($con);
   ?>
 <form class="form-horizontal" method="post" name="f">
  <figure class="owl-item"><center>
<img src="../img/<?php echo $row['item_image'];?> "  height=130px width=220px ></a>
  <br>
  <h3><lable>Description</lable></h3>
  <br>
    <div class="form-group">
      <label class="control-label col-sm-5">Item Name:</label>
      <div class="col-sm-5">
         <label class="control-label col-sm-5"><?php echo $row['item_name'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5">Cost:</label>
      <div class="col-sm-5">          
        <label class="control-label col-sm-5"><?php $_SESSION['price']=$row['item_cost']; echo $row['item_cost'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5">Offers:</label>
      <div class="col-sm-5">          
           <label class="control-label col-sm-5"><?php echo $row1;?></label>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-5">Rating:</label>
      <div class="col-sm-5">          
           <label class="control-label col-sm-5"><?php echo $row['item_rating'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5" for="pwd">Measures:</label>
      <div class="col-sm-5">          
          <label class="control-label col-sm-5" for="email"><?php echo $row['item_measure'];?></label>
      </div>
    </div>
 <div class="form-group">
      <label class="control-label col-sm-5"">Edit quantity:</label>
      <div class="col-sm-5">          
          <input type="text" name="quantit" style="width:100px;" />
      </div>
    </div>
  <center>  <div class="row">
  <div class="col-sm-4">
   <button type="button" name="add" onclick="fun()" class="btn btn-success col-sm-4" style="width:100px;padding:10px;">Add to cart</button>
    </div>
    </div>
   </center>
      </div>
    </div>
  </form>
      </div>
    </div>
</div>
</body>
</center>
</html>

