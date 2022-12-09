<?php
global $con,$table,$na,$firstnameErr , $lastnameErr,$user_idErr ,$phone_noErr ,$firstname, $lastname,$user_id,$phone_no,$h,$dob,$age,$m,$result;
$h=0;
$m=1;
$c=0;
$firstnameErr = $lastnameErr=$emailErr = $mobileErr = $enquiryErr = $ageErr="";
$firstname = $lastname=$email = $mobile = $comment = $enquiry=$result="";
$count=0;
$table=$qu=$result="navya";
$h="";
if ($_SERVER["REQUEST_METHOD"] =="POST"){
    try{
  
          if (empty($_POST["firstname"])) {
            $GLOBALS['use_id'] = "Name is required";
        		echo "fn";
            $count++;
          } 
        else {
   
              $GLOBALS['firstname'] = test_input($_POST["firstname"]);
              if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['firstname'])) {
                 $GLOBALS['firstnameErr'] = "Only letters and white space allowed";
                  $count++;
                  echo "fn";
              }
              if(strlen($GLOBALS['firstname'])>50)
              {
                  $GLOBALS['firstnameErr'] = "Only 50 chars";
                   $count++;
                   echo "fn";
               }
           }
        if (empty($_POST["lastname"])) {
           $GLOBALS['lastnameErr'] = "Name is required";
            $count++;
            echo "ln";
         } 
        else {
             $GLOBALS['lastname']= test_input($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$GLOBALS['lastname'])) {
              $GLOBALS['lastnameErr']= "Only letters and white space allowed";
                $count++;
                echo "ln";
             }
            if(strlen($lastname)>50)
             {
               $GLOBALS['lastnameErr']= "Only 50 chars";
                 $count++;
                 echo "ln";
             }
          }
         if (empty($_POST["email"])) {
            $GLOBALS['user_idErr'] = "Email is required";
             $count++;
             echo "ui";
        }
         else {
             $GLOBALS['user_id'] = test_input($_POST["email"]);
            if (!preg_match("/^[a-zA-Z]+\w+([\-]?\w+)*@+gmail*(\.\w{2,3})+$/", $GLOBALS['user_id'])) {
                  $GLOBALS['user_idErr']= "Invalid email format";
          $count++;
            echo "ui";
               }
          }
           if (empty($_POST["address"])) {
            $GLOBALS['addressErr'] = "address Required is required";
             $count++;
               echo "ad";
        }
         else {
             $GLOBALS['address'] = test_input($_POST["address"]);
          }
        if (empty($_POST["phone_no"])) {
            $GLOBALS['phone_noErr'] = "enter mobile number";
            $count++;
              echo "pn";
         } 
         else {
              $GLOBALS['phone_no'] = test_input($_POST["phone_no"]);
            if (!preg_match("/[0-9]{10}$/", $GLOBALS['phone_no'])) {
                  $GLOBALS['phone_noErr']= "Invalid mobile";
                $count++;
                  echo "pn";
               }
        }
         if (empty($_POST["password"])) {
            $GLOBALS['passwordErr'] = "password required";
            $count++;
         
         } 
         else {
              $GLOBALS['password'] = test_input($_POST["password"]);
            if (!preg_match("/[a-zA-Z0-9!@#$%^&*()]{10}$/", $GLOBALS['password'])) {
                  $GLOBALS['passwordErr']= "Invalid password";
                $count++;
               }
        }
        if (empty($_POST["password"])) {
            $GLOBALS['password1Err'] = "password required";
            $count++;
         
         } 
         else {
              $GLOBALS['password1'] = test_input($_POST["password1"]);
            if ($GLOBALS['password1']!=$GLOBALS['password']) {
                  		$GLOBALS['passwordErr']= "Invalid password";
                $count++;
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
       echo "dob";
       }
       if($count==0)
      {
           $GLOBALS['con']=mysqli_connect("localhost","root","","first_project");
          if($GLOBALS['con'])
          {
               $qu2="insert into user_details(first_name,last_name,user_id,phone_num,age,dob,address,confirm) values('".$GLOBALS['firstname']."','".$GLOBALS['lastname']."','".$GLOBALS['user_id']."','".$GLOBALS['phone_no']."',".$GLOBALS['age'].",'".$GLOBALS['dob']."','".$GLOBALS['address']."','no');";
             if(mysqli_query($GLOBALS['con'],$qu2))
              {
                $na="kill";
                $result ="successfull fully registered";
             }
            else
              $result = "not successfull";
        }
        else
          $result = "connection failure";
      }
      else{
        $result = "wrong result";
      }
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
<?php if(!empty($na)) { ?>
<div class="h">
<label> <?php echo $result; ?></label>
<a href="link.php?$user_id=<?php echo GLOBALS['user_id'];?>">click here confirm</a>
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
