<?php
try{
$con=mysqli_connect("localhost","root","","first_project");
	if($con){
	$s=$_GET['id'];
	$s1=$_GET['tab'];
	$qu2="";
	switch($s1)
	{
		case 1:
			$qu2="delete  from item_list where item_id=$s";
			break;
		case 2:
			$qu2="delete  from notifications where user_id='$s'";
			break;
		case 3:
			$qu2="delete  from offers_list where offer_no=$s";
			break;
		case 4:
			$qu2="delete  from user_details where user_id='$s'";
			break;
	}
	if (mysqli_query($con, $qu2)){
	 //
	 header("Location: items.php");
			 }
	} 
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
finally{//echo "<br><br><br><br><br><br><br><br><br>".$row1;	
 mysqli_close($con);
 }
?>
