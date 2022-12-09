<?php
session_start();
if(isset($_SESSION['id']))
{
	header("Location: cart.php?action=add");
}
else{
	$_SESSION['req2']='yes';
	header("Location: ../login/login.php");
}
?>
