<!DOCTYPE html>
<html>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 <script src="sweetalert.js"></script>
 <body>
<?php 
@$cn=new mysqli('localhost','root','','campus');
$username=$_GET['staff_id'];
$replay=$_POST['replay'];
$qry3="update staff_support set replay='$replay' where staff_id='$username'";
if($rslt2=$cn->query($qry3)){
	echo"<script>Swal.fire({ 
                      icon: 'success',
                      title: 'Your response send successful',
                      showConfirmButton: false,
                      timer: 2000
                    }).then((result) => { window.location.href='admin_support.php' })</script>";
	//echo'<script>window.location.href="admin_support.php"</script>';

}
?>
</body>
</html>
