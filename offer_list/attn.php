<html>
<body>
<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("select age fron addd where id='$id'");
	$query1=$query1+1;
	$age=$query1;
$query2=mysql_query("UPDATE addd SET  age=$age where id='$id'");
if($query2)
{
header('location:list.php');
}

}
?>
</body>
</html>
