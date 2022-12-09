<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Case</title>
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
  .error{
  color:red;
  }
}
</style>
</head>
<?php
global $passwordErr,$password1Err,$c;
$passwordErr=$password1Err=""; 
$c=0;   
 session_start();
if ($_SERVER["REQUEST_METHOD"] =="POST"&&!empty($_POST["1"])){
    try{
      if (empty($_POST["password"])) {
            $GLOBALS['passwordErr'] = " *password required";
            $count++;
            //echo '13';
         
         } 
     else {
              $GLOBALS['password'] = test_input($_POST["password"]);
            if (!preg_match("/[a-zA-Z0-9!$@*]{6,}$/", $GLOBALS['password'])) {
                  $GLOBALS['passwordErr']= " *password must be of  length  altleast 6";
                $count++;
                //echo '12';
               }
             }
         if (empty($_POST["password1"])) {
            $GLOBALS['password1Err'] = " *password required";
            $count++;
            //echo '13';
         
         } 
         
         else {
              $GLOBALS['password1'] = test_input($_POST["password1"]);
            if ($GLOBALS['password1']!=$GLOBALS['password']) {
                      $GLOBALS['password1Err']= " *passwords must be same";
                $count++;
                //echo '14';
               }
        }
       /*  <?php if($x==0){?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <button class="btn btn-success" style="width:150px;position:fixed;top:100px;left:200px;">RequestForItem</button>
<textarea rows="5"  cols="50" style="position:fixed;top:150px;left:200px;"placeholder="write your request here...." name="request"></textarea>
<button type="submit"class="btn btn-danger" style="width:150px;position:fixed;top:300px;left:200px;">send</button>
</form>
<?php }
else {  ?>
  <lable style="position:relative;top:200px;left:200px;font-size:20px;">You Request has been sent..  <span class="glyphicon glyphicon-ok" style="width:100px;"></span></lable>
<?php } ?>*/
         if($count==0)
      {
          $con=mysqli_connect("localhost","root","","first_project");
          if($con)
          {
               $qu2="update user_details set password='".$_POST['password']."' where user_id='".
                $_SESSION['checkp']."'";
             if(mysqli_query($con,$qu2))
              {
               $c++;
                unset($_SESSION['checkp']);
             }
             }
               else
             {
             $result1="connection problem!..";
             }
          }
     
          }
           catch(Exception $e)
        {
         $result=$e;
        }
          }
   if ($_SERVER["REQUEST_METHOD"] =="POST"&&!empty($_POST["2"])){
   header("Location:../main1.php");
          }
          function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
          ?>
<br><br><br>
<body>
<div class="container">
<div id="contaner">
<nav class="navbar navbar-fixed-top" style="background-color:green;">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <a id="h1" href="../main1.php">
        <span class="glyphicon glyphicon-home"></span>
    </a>
    </div>
    <span id="h" style="position:relative;right:-400px;">GroceryOutlet</span>
    <ul class="nav navbar-nav navbar-right">
    <?php

      if(isset($_SESSION['id'])){?>
        <li ><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <?php  } 
      else
      {
      ?>
      <li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav><br><br>
 <div class="h" style="width:700px;height:400px;position:relative;top:-20px;">
<?php if($c==0){?>
 <h3><lable style="position:relative;right:-200px;">ResovlePassword</lable></h3>
  <br>
  <div style="color:red;">
  <?php 
 if(!empty($result1))
     echo "<span class='glyphicon glyphicon-alert'></span>".$result1;		
 ?>
 </div>
    <form class="form-horizontal"   action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email-Id:</label>
      <div class="col-sm-4">
          <input type="text" class="form-control" name="email" value="<?php if(isset($_SESSION['checkp'])){echo $_SESSION['checkp'];}?>"  readonly="readonly" placeholder="enter email id" />
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" name="password" placeholder="Enter password">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['passwordErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Re-Enter-Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" name="password1" placeholder="Enter password again">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['password1Err'];?></label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">          
  <button type="submit" value="1" name="1" class="btn btn-success">Submit</button>
      </div>
      <div class="col-sm-6">
       <button type="submit" value="2"  name="2" class="btn btn-danger">Cancel</button>
      </div>
    </div>
  </form>
  <?php } 
  else{ ?>
  <img style="position:relative;top:120px;left:100px;font-size:20px;" src="../img/1.png" width="100" height="100"/>
  <lable style="position:relative;top:220px;left:60px;font-size:20px;">You Password has been changed..login now... <span class="glyphicon glyphicon-ok" style="width:100px;"></span></lable>
  <?php } ?>

</div>
</div>
</div>
</body>
</html>
</center>
</html>
<nav class="navbar navbar-fixed-bottom" style="background-color:green;">
  <div class="container-fluid">
    <div class="navbar-header" >

