<?php
session_start();
include('include/config.php');


// 														if(isset($_POST['submit']))
// 														{
// 														$sql=mysqli_query($con,"SELECT password FROM  deliveryboy where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
// 														$num=mysqli_fetch_array($sql);
// 														if($num>0)
// 														{
// 														$con=mysqli_query($con,"update deliveryboy set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
// 														$_SESSION['msg']="Password Changed Successfully !!";
// 														}
// 														else
// 														{
// $_SESSION['msg']="Old Password not match !!";
// }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Deliveryboy| Leave history</title>
	
	    


		

		

	<link rel="stylesheet" href="assets/css/main.css">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript"></script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
				<div class="span9">
						<!-- Put the leave table here  -->
						
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php  ?>