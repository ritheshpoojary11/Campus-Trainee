<?php
//$value=50;
$username=$_GET['username'];
$staff_id=$_GET['staff_id'];
@$cn=new mysqli('localhost','root','','campus');
if($cn->connect_error)
    {
      echo"Could not Connect";
      exit;
    }
    $qry="select * from result where username='$username'";
    $rslt=$cn->query($qry);
    
echo '
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");
body {
	background: rgb(35, 51, 64);
}
h1 {
	font-family: "Open Sans";
	color: rgb(255, 255, 255);
	text-align: center;
	margin: 50px 0 -80px;
}
a {
	font-family: "Open Sans";
	color: rgb(255, 255, 255);
	margin: 50px 0 -80px;
	text-align: center;
	width: 100%;
	font-size: 12px;
	text-decoration: none;
}
#wrapper{
	position: relative;
	top: 80px;
	width: 404px;
}
.center {
	left: 50%;
	-webkit-transform: translate( -50% );
	-ms-transform: translate( -50% );
	transform: translate( -50% );
}


.progress{
	width: 200px;
	height: 280px;
}
.progress .track, .progress .fill{
	fill: rgba(0, 0, 0, 0);
	stroke-width: 3;
	transform: rotate(90deg)translate(0px, -80px);
}
.progress .track{
	stroke: rgb(56, 71, 83);
}
.progress .fill {
	stroke: rgb(255, 255, 255);
	stroke-dasharray: 219.99078369140625;
	stroke-dashoffset: -219.99078369140625;
	transition: stroke-dashoffset 1s;
}
.progress.blue .fill {
	stroke: rgb(104, 214, 198);
}
.progress.green .fill {
	stroke: rgb(186, 223, 172);
}
.progress .value, .progress .text {
	font-family: "Open Sans";
	fill: rgb(255, 255, 255);
	text-anchor: middle;
}
.progress .text {
	font-size: 12px;
}
.noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
		cursor: pointer;
}
	.d1{
		height:240px;
		width:200px;
		background-color:lightblue;
		margin-left:900px;
		margin-top:-267px;
		background:transparent;
		
	}

.d{
		height:240px;
		width:800px;
		background-color:lightblue;
		margin-left:340px;
		margin-top:15px;
		border: 5px outset #696969;
		border-radius:10px;
		background:transparent;
		cursor: pointer;
		
		
	}
	.d2{
		height:220px;
		width:500px;
		background-color:lightblue;
		margin-left:6px;
		margin-top:8px;
		background:transparent;
		
		
	}
	p{
		font-family: "Open Sans";
	color: rgb(255, 255, 255);
	font-size:20px;
	margin-top:1px;
	margin-left:40px;
	}
.bt{
	height:50px;
	width:80px;
	background:transparent;
	color:lightblue;
	font-size:20px;
	border: 5px outset #696969;
		border-radius:10px;

}



	</style>
	<script>
	var forEach = function (array, callback, scope) {
	for (var i = 0; i < array.length; i++) {
		callback.call(scope, i, array[i]);
	}
};
window.onload = function(){
	var max = -219.99078369140625;
	forEach(document.querySelectorAll(".progress"), function (index, value) {
	percent = value.getAttribute("data-progress");
		value.querySelector(".fill").setAttribute("style", "stroke-dashoffset: " + ((100 - percent) / 100) * max);
		value.querySelector(".value").innerHTML = percent + "%";
	});
}

</script>
</head>
<body>
<button onclick=window.location.href="view_nostudent.php?staff_id='.$staff_id.'" class="bt">BACK</button>';
if($rslt->num_rows==0){
		echo'<h1>There is no Result</h2>';
	}
	else
	{
while($r=$rslt->fetch_assoc()){
	$type=$r['type'];
	$exam_id=$r['exam_id'];
	$no_qsn=$r['no_qsn'];
	$noqsn_att=$r['noqsn_att'];
	$per=$r['percentage'];
	$right_ans=$r['right_answer'];
	$qry1="select * from exam_set where exam_id='$exam_id'";
	$rslt1=$cn->query($qry1);
	
	$r1=$rslt1->fetch_assoc();
	
echo'<div class=d>
<table>
<tr><td><p>TEST TYPE</p></td>            			<td><p>:</p></td><td><p>  '.$type.'</p></td></tr>
<tr><td><p>TEST ID   </p> </td>          		<td>	<p>:</p></td><td><p>  TEST-'.$exam_id.'</p></td></tr>
<tr><td><p>TEST DATE </p></td>             		<td><p>:</p> </td> <td><p>'.$r1['date'].'</p></td></tr>
<tr><td><p>NUMBER OF QUESTIONS</p> </td> <td>	<p>:</p></td><td><p>  '.$no_qsn.'</p></td></tr>
<tr><td><p>CORRECT ANSWERS  </p></td>   <td> 	<p>:</p> </td><td><p> '.$right_ans.'</p></td></tr></table>
</div>
	<div class=d1>
	<svg class="progress blue noselect" data-progress="'.$per.'" x="0px" y="0px" viewBox="0 0 80 80">
		<path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
		<path class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
		<text class="value" x="50%" y="55%">0%</text>

	</svg>
	</div>
</div><br>';}
}
echo'
</body>
</html>';
?>