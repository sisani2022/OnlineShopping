<?php
session_start();
if(isset($_SESSION['id']))
{
	header("Location: request_for.php");
}
else{
	$_SESSION['req1']='yes';
	header("Location: ../login/login.php");
}
?>
