
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
global $con,$table,$na,$firstnameErr,$lastnameErr,$passwordErr,$password,$password1,$password1Err,$user_idErr ,$address,$addressErr,$phone_noErr ,$firstname, $lastname,$user_id,$phone_no,$h,$dob,$dobErr,$age,$m,$result;
$firstnameErr = $lastnameErr= $user_idErr = $passwordErr= $password1Err= $phone_noErr = $dobErr= $addressErr = $ageErr="";
$firstname = $lastname= $user_id = $password = $password1= $phone_no = $dob=$address = $age="";
$count=0;
if ($_SERVER["REQUEST_METHOD"] =="POST"){
 try{
      if (empty($_POST["password"])) {
            $GLOBALS['passwordErr'] = " *password required";
            $count++;//echo '11';

         
         } 
         else {
              $GLOBALS['password'] = test_input($_POST["password"]);
            if (!preg_match("/[a-zA-Z0-9!$@*]{6,}$/", $GLOBALS['password'])) {
                  $GLOBALS['passwordErr']= " *Invalid password";
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
                      $GLOBALS['passwordErr']= " *Invalid password";
                $count++;
                //echo '14';
               }
        }
        if($count==0){
            $GLOBALS['con']=mysqli_connect("localhost","root","","first_project");
            if($GLOBALS['con'])
            {
              $qu2="update user_details set password='".$_POST["email"]."' where user_id='".$_POST["email"]."';";
             // echo "kill";
              if ($result=mysqli_query($GLOBALS['con'],$qu2))
               {
                    header("Location:login.php");
               }
                else{
                      //echo "else";
                  $GLOBALS['user_idErr'] = " * your not part of out site";
                    }
            }
        }

    
    }
     catch(Exception $e)
        {
         $result=$e;
        }
  }
?>
 <div class="h">
  <h3><lable style="position:relative;right:-200px;color:green;">Get the password</lable></h3>
 <br><br>
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Email:</label>
      <div class="col-sm-4">          
        <input type="email" class="form-control" name="email" value="<?php $_GET['user_id'];?>" 
        readonly="readonly" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" name="password" placeholder="Enter password">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['passwordErr']?></label>
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
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-success">change</button>
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
