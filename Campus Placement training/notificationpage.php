<?php
$username=$_GET['username'];
$db=new mysqli('localhost','root','','campus');
$qry="select *from noti where username='$username'";
$rslt=$db->query($qry);
echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
	<style>
	body
{
  background: #000e29;
}
	.d1{
		width:530px;
		height:70px;
		margin-top:-28px;
		margin-left:30%;
		border: 5px solid rgba(7, 149, 66, 0.35);
		color:lightblue;
	}
.h{
	margin-left:25%;
	
}
.d2{height:230px;
		width:530px;
		background:transparent;
		margin-left:30%;
		margin-top:10px;
		border: 5px outset #696969;
		border-radius:10px;
		color:lightblue;
		
		border: 5px solid rgba(7, 149, 66, 0.35);

}
.btn{
	height:50px;
	width:60px;
	margin-left:900px;
	border-radius:10px;
	background-color:red;
	color:lightblue;
	cursor: pointer;
	}

h2{
	margin-top:-20px;
	font-size:27px;
}
.fa{
	margin-left:40px;
	margin-top:1px;
}
table{
	margin-top:-30px;
	margin-left:20px;
}
.bk{
	font-size:25px;
	border-radius:10px;
	color:lightblue;
	background:transparent;
	cursor:pointer;
}
.h1{
	color:white;
	font-size:30px;
	margin-left:100px;
	top:70px;
}

</style>
</head>
<body>
<button class=bk onclick=window.location.href="student_interface.php?username='.$username.'">BACK</button>
<div class=d1>
<h1 class=h>NOTIFICATIONS</h1>

</div>';
if($rslt->num_rows==0){
	echo"<span class=h1>There is no Notifications</span>";

}
else
{
while($r=$rslt->fetch_assoc()) {
	$staff_id=$r['staff_id'];
	$qry1="select * from staff where staff_id='$staff_id'";
	$rslt1=$db->query($qry1);
	$r1=$rslt1->fetch_assoc();
	$name=$r1['name'];

echo'
<div class=d2>
<pre><i style="font-size:24px" class="fa">&#xf05a;</i><center><b><h2>NEW TEST ADDED BY '.strtoupper($r1['name']).'</h2></b></center></pre>
<table><tr><td><h3><i>Type:</h3></td><td><h3>'.strtoupper($r['type']).'</h3></td></tr><tr><td><h3>date:</td><td>'.$r['date'].'</h3></td></tr><tr><td><h3>Time :</td><td>'.$r['time'].'</i></h3></td></tr></table>
</div>';
}
if($rslt->num_rows>0){
echo'
<button name=submit class=btn onclick=window.location.href="noti.php?username='.$username.'">OK</button>';
}

}


echo'


</body>
</html>';

?>
