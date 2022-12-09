<html>
<head>
<title> view attendance </title><div>
<style>
table{
position:absolute;
left:200px;
top:190px;
}
h1{
	color:white;
	}
body{background-image:url("wede.jpg");
	background-repeat:no-repeat;
	background-size: cover;
	}
th{
	height:40px;
	background-color:orange;
	text-align:center;
}
td{
	height:30px;
	width:200px;
	background-color:white;
	text-align:center;
}

</style>
</head>
<body><br></br><br>
<center><h1>  Attendance </h1>
<?php
include('config.php');
$query1=mysql_query("select id, name, attn from class1");
echo "<center><table border=10px;><tr><th>Admission No</th><th>Name</th><th>Attended days</th><th>Working days</th></tr>";
while($query2=mysql_fetch_array($query1))
{
	echo "<tr><td>".$query2['id']."</td>";
	echo "<td>".$query2['name']."</td>";
	echo "<td>".$query2['attn']."</td>";
	echo "<td></th></tr>";
}
 echo "</table></center>";
?>
</div>
</body>
</html>
