<html>
<body>
<?php
include('config.php');
session_start();
if(isset($_GET['item_id']))
{
$item_id=$_GET['item_id'];
$query1=mysql_query("delete from item_list where item_id='$item_id'");
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
