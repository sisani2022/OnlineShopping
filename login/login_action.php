<?php
global $con,$table,$na,$firstnameErr , $lastnameErr,$user_idErr ,$phone_noErr ,$firstname, $lastname,$user_id,$phone_no,$h,$dob,$age,$m,$result,$c;
$h=0;
$m=1;
$c=0;
$firstnameErr = $lastnameErr=$emailErr = $mobileErr = $enquiryErr = $ageErr="";
$firstname = $lastname=$email = $mobile = $comment = $enquiry=$result="";
$count=0;
$table=$qu=$result="navya";
$h="";
$con=$c="";
$count=0;
session_start();
//$_SESSION['req2']="yes";
if ($_SERVER["REQUEST_METHOD"] =="POST"){
 try{
    if (empty($_POST["email"])) {
            $GLOBALS['user_idErr'] = "Email is required";
             $count++;
        }
         else {
             $GLOBALS['user_id'] = test_input($_POST["email"]);
            if (!preg_match("/^[a-zA-Z]+\w+([\-]?\w+)*@+gmail*(\.\w{2,3})+$/", $GLOBALS['user_id'])) {
                  $GLOBALS['user_idErr']= "Invalid email format";
          $count++;
               }
          }
          if (empty($_POST["password"])) {
          	   $GLOBALS['passwordErr'] = "Email is required";
             		$count++;
          }
          else{
          	 $GLOBALS['password'] =$_POST["password"];
          }
          if($count==0)
          {
          	$GLOBALS['con']=mysqli_connect("localhost","root","","first_project");
          	if($GLOBALS['con'])
          	{
          		$qu2="select *from user_details where user_id='".$_POST["email"]."' and password='".$_POST["password"]."';";
             // echo "kill";
              if ($result=mysqli_query($GLOBALS['con'],$qu2))
               {
                      		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
               			 if(mysqli_num_rows($result)>0){
                      			  $_SESSION['id']=$row['user_id'];
                      			  $_SESSION['user_type']=$row['isadmin'];
                      			  //echo $_SESSION['user_type'];
                      			  if($_SESSION['user_type']=='no')
                      			  {
                      			    // echo "<br><br><br><br><br><br><br><br>navya";
                      			  	if($_SESSION['req1']=='yes'){
                      			  	     unset($_SESSION['req1']);
                      			  		header("Location: ../html/request_for.php");
                      			  		  }
                      				else if($_SESSION['req2']=='yes'){
                      				     unset($_SESSION['req2']);
                      				     //$v="<script>alert(document.cookie);</script>";
                      			  		header("Location: ../html/cart.php?action=add&item=".$_SESSION['quantit']);
                      			  		  }
                      			     	else
                      				      header("Location: ../main1.php");
                      			  }
                      		        else
                      		           header("Location: ../adminmain.php");
                    		}
                    		else{
                      //echo "else";
                      		if($_SESSION['ad']=='yes')
                      			header("Location: login1.php?status=error");
                      		else
                        			header("Location: login.php?status=error");
                    }
            }
                else{
                      //echo "else";
                    if($_SESSION['ad']=='yes')
                      			header("Location: login1.php?status=error");
                      		else
                        		header("Location: login.php?status=error");
                    }
          	}
          }
 }
catch(Exception $e)
{
    echo $e;
}
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
