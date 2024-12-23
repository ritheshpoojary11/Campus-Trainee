<?php
$username=$_GET['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$image = $_FILES['image']['name'];
$add=$_POST['add'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$mail=$_POST['mail'];
$url=$_POST['url'];
$nation=$_POST['nation'];
$lang=$_POST['lang'];
$hobbi=$_POST['h'];
$objective=$_POST['objective'];
$year1=$_POST['year1'];
$course1=$_POST['course1'];
$un1=$_POST['university1']; 
$perc1=$_POST['perc1'];
$year2=$_POST['year2'];
$course2=$_POST['course2'];
$university2=$_POST['university2']; 
$perc2=$_POST['perc2'];
$year3=$_POST['year3'];
$perc3=$_POST['perc3'];
$university3=$_POST['university3']; 
$skill=$_POST['s'];
$cert=$_POST['c'];
$target = "images/".basename($image);
if(isset($_POST['language']))
{
	for($a=1;$a<=count($_POST['language']);$a++)
	{
		$lang=$lang.",".$_POST['language'][$a];
	}
}
if(isset($_POST['hobbi']))
{
	for($a=1;$a<=count($_POST['hobbi']);$a++)
	{
		$hobbi=$hobbi.",".$_POST['hobbi'][$a];
	}
}
if(isset($_POST['skill']))
{
	for($a=1;$a<=count($_POST['skill']);$a++)
	{
		$skill=$skill.",".$_POST['skill'][$a];
	}
}
if(isset($_POST['cert']))
{
	for($a=1;$a<=count($_POST['cert']);$a++)
	{
		$cert=$cert.",".$_POST['cert'][$a];
	}
}
@$cn=new mysqli('localhost','root','','campus');
$un1=mysqli_real_escape_string($cn,$un1);
if($cn->connect_error)
    {
      echo"Could not Connect";
      exit;
    }
$qry="select username from resume where username='$username'";
$rslt=$cn->query($qry);
if($rslt->num_rows==0)
{
	$qry="insert into resume(username,fname,lname,image,add1,dob,phone,mail,url,nation,lang,hobbi,objective,year1,course1,university1,perc1,year2,course2,university2,perc2,year3,perc3,university3,skill,cert) values('$username','$fname','$lname','$image','$add','$dob','$phone','$mail','$url','$nation','$lang','$hobbi','$objective','$year1','$course1','$un1','$perc1','$year2','$course2','$university2','$perc2','$year3','$perc3','$university3','$skill','$cert')";
	$rslt=$cn->query($qry);
	if($rslt)
	move_uploaded_file($_FILES['image']['tmp_name'], $target); 
}
else
{
	$uqry="update resume set fname='$fname',lname='$lname',image='$image',add1='$add',dob='$dob',phone='$phone',mail='$mail',url='$url',nation='$nation',lang='$lang',hobbi='$hobbi',objective='$objective',year1='$year1',course1='$course1',university1='$un1',perc1='$perc1',year2='$year2',course2='$course2',university2='$university2',perc2='$perc2',year3='$year3',perc3='$perc3',university3='$university3',skill='$skill',cert='$cert' where username='$username'";
	$rslt=$cn->query($uqry);
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
}
?>
<?php
$username=$_GET['username'];
@$cn=new mysqli('localhost','root','','campus');
if($cn->connect_error)
    {
      echo"Could not Connect";
      exit;
    }
 $qry="select * from resume where username='$username'";
$rslt=$cn->query($qry);
$r=$rslt->fetch_assoc();
$fname=$r['fname'];
$lname=$r['lname'];
$add=$r['add1'];
$dob=$r['dob'];
$phone=$r['phone'];
$mail=$r['mail'];
$url=$r['url'];
$nation=$r['nation'];
$lang=$r['lang'];
$hobbi=$r['hobbi'];
$objective=$r['objective'];
$year1=$r['year1'];
$course1=$r['course1'];
$university1=$r['university1']; 
$perc1=$r['perc1'];
$year2=$r['year2'];
$course2=$r['course2'];
$university2=$r['university2']; 
$perc2=$r['perc2'];
$year3=$r['year3'];
$perc3=$r['perc3'];
$university3=$r['university3']; 
$skill=$r['skill'];
$cert=$r['cert'];
echo"
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title></title>
	<link rel=stylesheet type=text/css href=Resume1_style.css>
</head>
<body>
	<div class=container1>
		<div class=leftside>
			<div class=profileText>
				<div class=imgBx>
					<img src='images/".$r['image']."'>
				</div>
				<h1>".$fname." ".$lname."</h1>
			</div>
			<div class=contact>
				<h2>Personal Info</h2>
			</div>
			<ul claaa=title>
				<li>
					<span class=text>Address:-".$add."</span>
				</li>
				<li>
					<span class=text>DOB:-".$dob."</span>
				</li>
				<li>
					<span class=text>Phone:-".$phone."</span>
				</li>
				<li>
					<span class=text>Email:-".$mail."</span>
				</li>
				<li>
					<span class=text>Linkedin:-".$url."</span>
				</li>
				<li>
					<span class=text>Nationality:-".$nation."</span>
				</li>
			</ul>
			
			<h2 class=contact>Language</h2>
			<div class=language><ul>";
			$lang1=strtok($lang,",");
			while($lang1!="")
			{
				echo"<li>".$lang1."</li>";
				$lang1=strtok(",");
			}
				echo"</ul>
			</div>
			<h2 class=contact>Hobbies</h2>
			<div class=language>
				<ul>";
					$hobbi1=strtok($hobbi,",");
					while($hobbi1!="")
					{
						echo"<li>".$hobbi1."</li>";
						$hobbi1=strtok(",");
					}
				echo"</ul>	
				</ul>
			</div>
		</div>
		<div class=rightside>
			<h2>Objective</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;".$objective."</p>
			<h2>Education</h2>
			<div class=education>
				<ul>
					<li><h4>".$year1."</h4>
						<h3>".$course1."</h3>
						<h3>".$university1."</h3>
						<h3>".$perc1."</h3>
					</li>
					<li><h4>".$year2."</h4>
						<h3>".$course2."</h3>
						<h3>".$university2."</h3>
						<h3>".$perc2."</h3>
					</li>
					<li><h4>".$year3."</h4>
						<h3>".$university3."</h3>
						<h3>".$perc3."</h3>
					</li>
				</ul>

			</div>
			<h2>Skills</h2>
			<div class=skill>
				<ul>";
					$skill1=strtok($skill,",");
					while($skill1!="")
					{
						echo"<li>".$skill1."</li>";
						$skill1=strtok(",");
					}
					echo"
				</ul>
				
			</div>
			<h2>Certification</h2>
			<div class=skill>
				<ul>";
				$cert1=strtok($cert,",");
					while($cert1!="")
					{
						echo"<li>".$cert1."</li>";
						$cert1=strtok(",");
					}
					echo"
				</ul>
			</div>
			<h2>Declaration</h2>
			<p> &nbsp;&nbsp;&nbsp;&nbsp;I hereby declare that the above information is true and correct to the best of my knowledge and belief.</p>
		</div>
	</div>
</body>
</html>";
?>