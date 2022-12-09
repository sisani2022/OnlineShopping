<html>
<body>
<?php
include('config.php');
session_start();
if(isset($_GET['offer_no']))
{
$item_id=$_GET['offer_no'];
$query1=mysql_query("delete from offers_list where offer_no=$offer_no");
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
