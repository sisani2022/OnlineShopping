<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
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
.error{
  color: red;
  font-size:14px;
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
     yearRange: '1800:2030'
    });
    });
</script>
<?php
global $con,$table,$na,$firstnameErr,$lastnameErr,$passwordErr,$password,$password1,$password1Err,$user_idErr ,$address,$addressErr,$phone_noErr ,$firstname, $lastname,$user_id,$phone_no,$h,$dob,$dobErr,$age,$m,$result;
$firstnameErr = $lastnameErr= $user_idErr = $passwordErr= $password1Err= $phone_noErr = $dobErr= $addressErr = $ageErr="";
$firstname = $lastname= $user_id = $password = $password1= $phone_no = $dob=$address = $age="";
$count=0;
if ($_SERVER["REQUEST_METHOD"] =="POST"){
    try{
          if(empty($_POST["firstname"])) {
            $GLOBALS['firstnameErr'] = "Name is required";
            $count++;
            //echo '1';
          } 
        else {
              $GLOBALS['firstname'] = test_input($_POST["firstname"]);
              if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['firstname'])) {
                 $GLOBALS['firstnameErr'] = " * Only letters  allowed";
                  $count++;
                  ////echo "fn";
                   //echo '2';
              }
              if(strlen($GLOBALS['firstname'])>50)
              {
                  $GLOBALS['firstnameErr'] = "* Only 50 chars";
                   $count++;
                   ////echo "fn";
                    //echo '3';
               }
           }
        if (empty($_POST["lastname"])) {
           $GLOBALS['lastnameErr'] = " *Name is required";
            $count++;
            ////echo "ln";
             //echo '4';
         } 
        else {
             $GLOBALS['lastname']= test_input($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['lastname'])) {
              $GLOBALS['lastnameErr']= " *Only letters allowed";
                $count++;
                //////echo "ln";
                 //echo '5';
             }
            if(strlen($lastname)>50)
             {
               $GLOBALS['lastnameErr']= " *Only 50 chars";
                 $count++;
                  //echo '6';
                // ////echo "ln";
             }
          }
         if (empty($_POST["email"])) {
            $GLOBALS['user_idErr'] = " *Email is required";
             $count++; 
//echo '7';
        
             ////echo "ui";
        }
         else {
             $GLOBALS['user_id'] = test_input($_POST["email"]);
            if (!preg_match("/^[a-zA-Z]+\w+([\-]?\w+)*@+gmail*(\.\w{2,3})+$/", $GLOBALS['user_id'])) {
                  $GLOBALS['user_idErr']= " *Invalid email format";
          $count++;
            ////echo "ui";
           //echo '8';
               }
          }
           if (empty($_POST["address"])) {
            $GLOBALS['addressErr'] = " *address Required is required";
             $count++;
               ////echo "ad";
              //echo '9';
        }
         else {
             $GLOBALS['address'] = test_input($_POST["address"]);
          }
        if (empty($_POST["phone_no"])) {
            $GLOBALS['phone_noErr'] = " *enter mobile number";
            $count++;
              ////echo "pn";
            //echo '9';

         } 
         else {
              $GLOBALS['phone_no'] = test_input($_POST["phone_no"]);
            if (!preg_match("/[0-9]{10}$/", $GLOBALS['phone_no'])) {
                  $GLOBALS['phone_noErr']= " *Invalid mobile";
                $count++;
                  ////echo "pn";
                //echo '10';

               }
        }
         if (empty($_POST["password"])) {
            $GLOBALS['passwordErr'] = " *password required";
            $count++;//echo '11';

         
         } 
         else {
              $GLOBALS['password'] = test_input($_POST["password"]);
            if (!preg_match("/[a-zA-Z0-9]{6,}$/", $GLOBALS['password'])) {
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
                      $GLOBALS['password1Err']= " *Invalid password";
                $count++;
                //echo '14';
               }
        }
  
        if (!empty($_POST["dob"])) {
            $GLOBALS['dob'] =$_POST["dob"];
            $myd=explode("/",$GLOBALS['dob']);
            $mydate=getdate(date("U"));
            $da=$mydate['mday'];
            $month=$mydate['month'];
        $k=date('m', strtotime($month));
           $d=$mydate['year']."-".$k."-".$da;
         $GLOBALS['dob']=$myd[2]."-".$myd[0]."-".$myd[1];
          $GLOBALS['age']=daysDifference($GLOBALS['dob'],$d);
        }
       else
       {
       $count++;
       $GLOBALS['dobErr'] ="date of birth required";
       //echo '12';
       }
       if($count==0)
      {
           $GLOBALS['con']=mysqli_connect("localhost","root","","first_project");
          if($GLOBALS['con'])
          {
               $qu2="insert into user_details(first_name,last_name,user_id,phone_num,password,age,dob,address,confirm,isadmin) values('".$GLOBALS['firstname']."','".$GLOBALS['lastname']."','".$GLOBALS['user_id']."','".$GLOBALS['phone_no']."','".$GLOBALS['password']."',".$GLOBALS['age'].",'".$GLOBALS['dob']."','".$GLOBALS['address']."','no','no');";
             if(mysqli_query($GLOBALS['con'],$qu2))
              {
                //$na=1;
                ////echo 'navya';
                header("Location:confirm.php?user_id=".$GLOBALS['user_id']);
             }
            else
              $result = "already registered";
        }
        else
          $result = "connection failure";
      }
      else{
        $result = "wrong result";
        ////echo 'coming';
      }
      ////echo 'mavua';
    }
      catch(Exception $e)
        {
         $result=$e;
        }
  }
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function daysDifference($beginDate, $endDate)
{
  
   $date_parts1=explode("-", $beginDate);
   $date_parts2=explode("-", $endDate);
   if($date_parts1[1]>$date_parts2[1]){
    $date_parts2[2]--;
    $years=$date_parts2[0]- $date_parts1[0];
   }
   else
     $years=$date_parts2[0]- $date_parts1[0];
   return $years;
}
?>


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
      session_start();
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
 <div class="h" style="position:relative;top:10px;height:550px;width:800px;">
  <h3><lable style="position:relative;right:-200px;">Registration</lable></h3>
 <label style="color:red;font-size:16px;position:relative;right:-200px;"><?php if(!empty($result)){ echo $result;}?></label>
 <br>
  <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">FirstName:</label>
      <div class="col-sm-4">
        <input type="text" name="firstname"  style="width:270px;" class="form-control" id="email" placeholder="Enter firstname">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['firstnameErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m"for="pwd">LastName:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control"  style="width:270px;" name="lastname" placeholder="Enter lastname">
      </div>
       <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['lastnameErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Email:</label>
      <div class="col-sm-4">          
        <input type="email" class="form-control"  style="width:270px;" name="email" placeholder="Enter email">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['user_idErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" style="width:270px;" name="password" placeholder="Enter password">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['passwordErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Re-Enter-Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control"style="width:270px;" name="password1" placeholder="Enter password again">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['password1Err'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m"  for="pwd">DOB:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control"  style="width:270px;" id="datepicker" readonly="readonly" name="dob" placeholder="Enter dateofbirth">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"> <?php echo $GLOBALS['dobErr'];?></label>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Contact-No:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" style="width:270px;" name="phone_no" placeholder="Enter contact number">
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['phone_noErr'];?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" id="m" for="pwd">Address:</label>
      <div class="col-sm-4">          
        <textarea class="form-control" name="address"  style="width:270px;" placeholder="Enter address" style="width:300px" ></textarea>
      </div>
      <div class="col-sm-6">
         <label class="control-label error" for="email"><?php echo $GLOBALS['addressErr'];?></label>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</body>
</html>
