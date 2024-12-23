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
	<title></title>
	<link rel=stylesheet type=text/css href=css/style.css>
	<style>

		:root{
    --bgcolor:#beb8ac;
    --blue:#0b83c4;
    --black:#3D3F42;
    --white:#f4f7ff;
    --gray:#d8dce4;
    --lightgray:#8e9095;
}
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: monospace;
}
body{
    background: var(--bgcolor);
}
.clearfix{clear: both;}
.resume-box{
    width: 900px;
    height: 1050px;
    margin: 30px auto;
    background: var(--white);
    box-shadow: 5px 21px 20px 20px #3df4238;
    margin-top: 70px;
}
.left-section{
    background: var(--blue);
    width: 250px;
    height: 1050px;
    float: left;
}
.profile{
    overflow: hidden;position: relative;
}
.blue-box{
    width: 257px;
    height: 407px;
    background: var(--blue);
    margin-left: -100px;
    transform: rotateZ(48deg);
    margin-top: -178px;
}
.profile-img{
    position: absolute;
    z-index: 9;
    width: 120px;
    height: 120px;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    border-radius: 50%;
    border: 3px solid var(--gray);
}
.name{
    color: var(--gray);
    text-align: center;
    margin-top: -34px;
    font-size: 25px;
    font-weight: 400;
    text-transform: uppercase;
}
.name span{color:var(--white);}
.n-p{
    width: 180px;
    margin: 0 auto;
    text-align: center;
    padding: 7px;
    border-bottom: 1px solid var(--gray);
    border-top:1px solid var(--gray);
    color: var(--black);
    background: var(--white);
    margin-top: 11px;
    text-transform: uppercase;
}
.info{
    margin-top: 50px;
}
.heading{
    width: 230px;
    margin-left: 20px;
    padding: 5px;
    padding-left: 15px;
    border-bottom: 1px solid var(--gray);
    border-top:1px solid var(--gray);
    color:var(--blue);
    background: var(--white);
    margin-top: 11px;
    text-transform: uppercase;
    font-size: 18px;
    border-radius: 10px 0px 0px 10px; 
}
.p1{
    color: var(--gray);
    width: 184px;
    margin: 0 auto;
    margin-top: 25px;
    font-size: 15px;
    line-height: 14px;
}
.p1 span{font-size: 12px;}
.span1 img{
    background: white;
    width: 30px;
    padding: 6px;
    border-radius: 16px;
    float: left;
    margin-right: 10px;
}
.right-section{
    padding: 40px 30px;
    background: var(--white);
    width: 68%;
    float: left;
    height: 1050px;
}
.right-heading img{
    background:var(--blue);
    width: 36px;
    padding: 7px;
    border-radius: 17px;
    float: left;
    display: inline-block;
    margin-top: -2px;
}
.p2{
    margin: 0 auto;
    padding: 6px;
    border-bottom: 1px solid var(--lightgray);
    border-top: 1px solid var(--lightgray);
    color: var(--white);
    background: var(--blue);
    text-transform: uppercase;
    font-size: 17px;
    margin-left: 26px;
    font-weight: bold;
    line-height: 18px;
    padding-left: 20px;
}
.p3{
    margin-top: 20px;
    color: var(--lightgray);
    text-align: justify;
    word-spacing: -4px;
}
.left{width: 25%; float: left;}
.right{width: 75%; float: left;}
.right1{width: 75%; float: left;}
.lr-box{margin-top: 20px; margin-bottom: 20px; width: 100%;}
.p4{font-size: 14px; font-weight: 600; margin-left: 16px}
.p5{font-size: 12px; color: var(--lightgray);}
.s-box{
    width: 50%; float: left; padding: 20px 20px 20px 0px;
}
#progress{
    background: #333;
    border-radius: 13px;
    height: 8px;
    width: 100%;
}
#progress:after{
    content: '';
    display: block;
    background: var(--blue);
    width: 50%;
    height: 100%;
    border-radius: 9px;
}
#progress1{
    background: #333;
    border-radius: 13px;
    height: 8px;
    width: 100%;
}
#progress1:after{
    content: '';
    display: block;
    background: var(--blue);
    width: 40%;
    height: 100%;
    border-radius: 9px;
}

#progress2{
    background: #333;
    border-radius: 13px;
    height: 8px;
    width: 100%;
}
#progress2:after{
    content: '';
    display: block;
    background: var(--blue);
    width: 80%;
    height: 100%;
    border-radius: 9px;
}

#progress3{
    background: #333;
    border-radius: 13px;
    height: 8px;
    width: 100%;
}
#progress3:after{
    content: '';
    display: block;
    background: var(--blue);
    width: 90%;
    height: 100%;
    border-radius: 9px;
}
.p6{margin-top:10px; margin-bottom:10px;}
.h-img{
    margin-top: 25px;
    width: 45px;
    margin-right: 45px;
}
	</style>

</head>
<body>

<div class=resume-box>
	<div class=left-section>
		<div class=profile>
			<img src='images/".$r['image']."' class=profile-img>
			<div class=blue-box></div>
		</div>
		<h2 class=name>".$fname." ".$lname."<br></h2>
		

		<div class=info>
			<p class=heading>Info</p>
			<p class=p1>Address<span><br>".$add."</span></p>
			<p class=p1>Phone<span><br>".$phone."</span></p>
			<p class=p1>Email<span><br>".$mail."</span></p>
			<p class=p1></span>DOB<span><br>".$dob."</span></p>
			<p class=p1></span>LinkedIn<span><br>".$url."</span></p>
			<p class=p1></span>Nationality<span><br>".$nation."</span></p>
		</div>

		<div class=info>
			<p class=heading>Languages</p><br><br>
			";
						$lang1=strtok($lang,",");
						while($lang1!="")
						{
							echo"&nbsp;&nbsp;<h3 class=p4>".$lang1."</h3><br>";
							$lang1=strtok(",");
						}
				echo"
		</div>

	</div>

	<div class=right-section>
		<div class=right-heading>
			
			<p class=p2>DEclaration</p>

		</div>
		<p class=p3>
			Lorem Ipsum is simply dummy text of the printing and typesetting industruy.Lorem Ipsum is simply dummy text of the printing and typesetting industruy.Lorem Ipsum is simply dummy text of the printing and typesetting industruy.
		</p>
		<div class=clearfix></div>
		<br><br>
		<div class=right-heading>
			
			<p class=p2>Objective</p>

		</div>
		<p class=p3>
			".$objective."
		</p>
		<div class=clearfix></div>
		<br><br>
		<div class=right-heading>
			
			<p class=p2>Education</p>
		</div>
		<div class=clearfix></div>

		<div class=lr-box>
			<div class=left>
				<p class=p4>".$year1."</p>
				</div>
			<div class=right>
				<p class=p4>".$university1."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$perc1."</p>
				
			</div>
			<div class=clearfix></div>
		</div>

		<div class=lr-box>
			<div class=left>
				<p class=p4>".$year2."</p>
				
			</div>
			<div class=right>
				<p class=p4>".$university2."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$perc2."</p>
				
			</div>
			<div class=clearfix></div>
		</div>

		<div class=lr-box>
			<div class=left>
				<p class=p4>".$year3."</p>
				
			</div>
			<div class=right>
				<p class=p4>".$university3."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$perc3."</p>
				

			</div>
			<div class=clearfix></div>
		</div>

		<div class=right-heading>
			
			<p class=p2>Certifications</p>
		</div>
		

		<div class=lr-box>
			<div class=left>";
			$cert1=strtok($cert,",");
					while($cert1!="")
					{
						echo"<h3>".$cert1."</h3><br>";
						$cert1=strtok(",");
					}			
					echo"
			</div>
			
			<div class=clearfix></div>
		</div>
		<div class=right-heading>
			
			<p class=p2>Skills</p>
		</div>
		<div class=clearfix></div>

		<div class=s-box>";
					$skill1=strtok($skill,",");
					while($skill1!="")
					{
						echo"<h3>".$skill1."</h3><br>";
						$skill1=strtok(",");
					}
					echo"
					
		</div>

		<div class=clearfix></div>
		<br>
		<div class=right-heading>
			
			<p class=p2>Hobbies</p>
		</div>
		<div class=clearfix></div><br>";
		$hobbi1=strtok($hobbi,",");
					while($hobbi1!="")
					{
						echo"<h3>".$hobbi1."</h3><br>";
						$hobbi1=strtok(",");
					}
				echo"
	</div>
	<div class=clearfix></div>
	</div>
</body>
</html>";
?>