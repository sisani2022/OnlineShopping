<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
  <script src="../bootstrap/js/jquery-1.8.0.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <style type="text/css" >
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
function  fun(x)
{
try{
	var x1=x.childNodes[0].nodeValue;
	var id=x.parentNode.children[0].childNodes[0].nodeValue;
	var b= document.createElement("input");
	setAttributes(b,{"type": "text", "width": "30px","id":id,"name":x1});
	b.addEventListener("keyup", function(event) {
   			 event.preventDefault();
   			 if (event.keyCode == 13) {
      				
   				 }
		});
	x.replaceChild(b,x.childNodes[0]);
	}catch(e)
	{
alert(e);
	}
}
function setAttributes(el, attrs) {
  for(var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
}
</script>
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
  <ul class="nav navbar-nav " style="position:relative;right:-900px;"">
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
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
 <?php
 $row="";
 $row1="";
 $count=0;
 $result1="";
   $con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$_SESSION['id']='navya@gmail.com';
	$_SESSION['user_type']='admin';
	if(isset($_SESSION['id'])&&isset($_SESSION['user_type'])&&$_SESSION['user_type']=='admin'){
	$qu2="select * from item_list;";
	 if($result1=mysqli_query($con,$qu2)){
	$count++;
	} 
	//echo "<br><br><br><br><br><br><br><br><br>".$row1;	
	}
	}
 mysqli_close($con);
 ?>
     <?php 
     if($count>0){ ?>
     <br>
        <br>
           <br>
   <div class="hii" style="overflow: scroll; overflow-x:hidden;width:1200px;height:500px;box-shadow: 2px 2px 2px 2px green;" >
 <table class="table table-hover table-bordered" style="color:green;">
    	<thead>
    		  <tr>
       		 <th>Item_id</th>
        		<th>Item Name</th>
        		<th>Item Category</th>
        		<th>Item Cost</th>
         		<th>Item Measure</th>
         		<th>Item Quantity</th>
         		<th>Item Rating</th>
         		<th>Item Image</th>
         		<th>operation1</th>
         		<th>operation2</th>
     		 </tr>
    	</thead>
    <tbody>
<?php while($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)) { ?>
    		<tr>
       		 <td onclick="fun(this);"><?php echo $row2['item_id'];?></td>
        		<td onclick="fun(this);"><?php echo $row2['item_name'];?></td>
        		<td onclick="fun(this);"><?php echo $row2['item_category'];?></td>
        		<td onclick="fun(this);"><?php echo $row2['item_cost'];?></td>
         			<td onclick="fun(this);"><?php echo $row2['item_measure'];?></td>
         			<td onclick="fun(this);"><?php echo $row2['item_quantity'];?></td>
         			<td onclick="fun(this);"><?php echo $row2['item_rating'];?></td>
         			<td onclick="fun(this);"><?php echo $row2['item_image'];?></td>
         		<td><a href="edit.php?tab=1&id=<?php echo $row2['item_id'];?>"><button  class="btn btn-success" style="width:100px;">edit_item</button></a></td>
         		<td><a href="delete.php?tab=1&id=<?php echo $row2['item_id'];?>"><button  class="btn btn-success"  style="width:100px;" >remove_item</button></a></td>
     		 </tr>
     		 <?php } ?>
    </tbody>
  </table>
  <?php  } else {
  //header("Location: ../login/login.php");
  } ?>
   </div>
   </div>
   </div>
   </body>
   </html>
