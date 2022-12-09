
<html lang="en">
<head>
  <title>Forgot Password</title>
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
    width: 500px;
    height: 100%;
    margin-right:500px;
  }
 
 button{
 	margin-right:-100px;
 	width:100px;
 }
 .row{
 	position: relative;
 	right: -100px;
 }
 .h{
 	position: relative;
 	right: -100px;
 	width:600px;
 	height:430px; 
 	box-shadow: 5px 5px 5px 5px green;
 }
 .container input{
    width:300px;
  }

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
    <span id="h"style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right" >
    <?php
    	session_start();
    	if(isset($_SESSION['id'])){?>
    		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	<?php  } 
    	else
    	{
    	?>
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br><br><br>
<?php
global $user_id,$user_idErr,$con,$count;
$user_i=$user_idErr=$con='';
$count=0;
if ($_SERVER["REQUEST_METHOD"] =="POST"){
 try{
      if (empty($_POST["email"])) {
            $GLOBALS['user_idErr'] = " *Email is required";
             $count++; 
//echo '7';
        
             ////echo "ui";
        } 
        else{
            $GLOBALS['con']=mysqli_connect("localhost","root","","first_project");
            if($GLOBALS['con'])
            {
              $qu2="select *from user_details where user_id='".$_POST["email"]."';";
             // echo "kill";
              if ($result=mysqli_query($GLOBALS['con'],$qu2))
               {
                    header("Location:change.php?user_id='".$_POST['email']."'");
               }
                else{
                      //echo "else";
                  $GLOBALS['user_idErr'] = " * your not part of out site";
                    }
            }
        }

    
    }
    catch(Exception $e) {
          echo $e;
    }
   }
?>
 <div class="h" style="width:700px;">
  <h3><lable style="position:relative;right:-200px;color:green;">Get the password</lable></h3>
 <br><br>
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group">
      <div class="col-sm-2">
      <label class="control-label col-sm-2" for="email">E-mail:</label></div>
      <div class="col-sm-4">
        <input type="text" class="form-control" style="width:200px;"name="email"  placeholder="">
      </div>
     
       <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['user_idErr'];?></label>
       </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-success">Ok</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
<div id="h">Contact-us:navyamasuram137@gmail.com
</div>
</nav>
</body>
</html>
