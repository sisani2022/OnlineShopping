<html>
<body>
<?php
include('config.php');
session_start();
if(isset($_GET['user_id']))
{
$user_id=$_GET['user_id'];
$query1=mysql_query("delete from user_details where user_id='$user_id'");
if($query1)
{
header('location:list.php');
}
else{
$_SESSION['del']="cant't delete voilet some properties";
header('location:error.php');
}
}
?>
</body>
</html>
