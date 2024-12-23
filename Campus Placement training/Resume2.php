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
  <link rel=stylesheet type=text/css href=Resume2_style.css>
</head>
<body>
  <div class=maindiv>

<div class=mydiv>
  <div class=img1>
    <img src='images/".$r['image']."'>
</div>
<center><h1 class=name>".$fname." ".$lname."</h1></center>
<h3 class=em>Email :</h3>
<p class=p1>".$mail."</p>
<h3 class=ph>Phone  :</h3>
<p class=p2>".$phone."</p>
<h3 class=ph1>LinkedIn  :</h3>
<p class=p3>".$url."</p>
</div><hr>
<div class=nxtdiv>
 <br> <h2 class=pi><u>Personal Info</u></h2>
 <h3 class=ad> Address       : </h3>
 <p class=pp1>".$add."</p>
 <h3 class=ad1>Date of Birth : </h3>
 <p class=pp2>".$dob."</p>
 <h3 class=ad2>Nationality   : </h3>
 <p class=pp3>".$nation."</p><br><br><br><br><br><br>
 <hr>
  <h2 class=pi1><u>Languages</u></h2>
  <ul class=lang>";
 $lang1=strtok($lang,",");
      while($lang1!="")
      {
        echo"<h3><li>".$lang1."</li></h3>";
        $lang1=strtok(",");
      }
        echo"</ul>
<br><br><br><br><br><br>
<hr>
 <h2 class=pi2><u>Hobbies</u></h2>
  <ul class=lang1>
 <ul>";
          $hobbi1=strtok($hobbi,",");
          while($hobbi1!="")
          {
            echo"<h3><li>".$hobbi1."</li></h3>";
            $hobbi1=strtok(",");
          }
        echo"</ul>";
echo"</ul> <br><br><br><br><br><br>
<hr>
<h2 class=pi3><u>Objective</u></h2>
<h3 class=obj>".$objective."</h3><br><br><br><br><br><br>
<hr>
<h2 class=pi4><u>Education</u></h2>
<h3 class=dur><u>Duration</h3>
  <h3 class=dur1><u>Course</u></h3>
  <h3 class=dur2><u>University/Institution</u></h3>
     <h3 class=dur3><u>Percentage</u></h3>

  <p class=y1>".$year1."</p>
   <p class=y2>".$year2."</p>

 <p class=y3>".$year3."</p>

<p class=c1>".$course1."</p>
<p class=c2>".$course2."</p>
<p class=c3>SSLC</p>

<p class=u1>".$university1."</p>
<p class=u2>".$university2."</p>
<p class=u3>".$university3."</p>

<p class=m1>".$perc1."</p>
<p class=m2>".$perc2."</p>
<p class=m3>".$perc3."</p><br><br><br><br><br><br><br><br>

<hr>

<h2 class=pi5><u>Skills</u></h2>
<ul class=lang2>";
 $skill1=strtok($skill,",");
          while($skill1!="")
          {
            echo"<h3><li>".$skill1."</li></h3>";
            $skill1=strtok(",");
          }
          echo"
        </ul>
</ul>  <br><br><br><br><br><br>
<hr>

<h2 class=pi6><u>Certifications</u></h2>
<ul class=lang3>";
 $cert1=strtok($cert,",");
          while($cert1!="")
          {
            echo"<h3><li>".$cert1."</li></h3>";
            $cert1=strtok(",");
          }
          echo"
        </ul>  <br><br><br><br><br><br>
<hr>
<h2 class=pi7><u>Declaration</u></h2>
<h3 class=dec>I hereby declare that all the information provided above is accurate to the best of my knowledge.</h3>
</div>
</div>
</body>
</html>";
?>