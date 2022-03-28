<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
    $firstnamedel=$_POST['name'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $vehicle=$_POST['vehicle'];
    $username=$_POST['username'];
    $user_id=intval($_GET['user_id']);
    $password=$_POST['password'];
    $id=intval($_GET['id']);
    $sql=mysqli_query($con,"update user set name='$firstnamedel',email='$email',contactno='$contactno',username='$username',password='$password' where id='$user_id'");
	$sql2=mysqli_query($con,"update deliveryboy set vehicle='vehicle' where id='$id'");
    $_SESSION['msg']="Deliveryboy updated !!";
    
	
	
}
	


?>


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| deliveryboy</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Delivery boy</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"SELECT u.*, d.* FROM deliveryboy d INNER JOIN users u WHERE d.user_id=u.id and d.id=$id;");

while($row=mysqli_fetch_array($query))
{
?>	


<div class="control-group">
<label class="control-label" for="fullname">Full Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" placeholder="Enter first Name"  name="name" value="<?php echo  htmlentities($row['name']);?>" class="span8 tip" required>
	  	</div>
		  </div>

          <!-- <div class="control-group">
<label class="control-label" for="fullname">Last Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" placeholder="Enter last Name"  name="lastnamedel" value="<?php echo  htmlentities($row['lastnamedel']);?>" class="span8 tip" required>
	  	</div>
		  </div> -->

          <div class="control-group">
<label class="control-label" for="email">Email<span style="color:red;">*</span></label>
<div class="controls">
	    	<input type="email" class="span8 tip"  onBlur="userAvailability()" name="email" value="<?php echo  htmlentities($row['email']);?>" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>

	  	</div>
		  </div>

          <div class="control-group">
<label class="control-label" for="contactno">Contact No<span style="color:red;">*</span></label>
<div class="controls">
	    	<input type="text"  name="contactno" maxlength="10" minlength="10" value="<?php echo  htmlentities($row['contactno']);?>" required >
	  	</div>
		  </div>


          <div class="control-group">
<label class="control-label" for="vehicle">Vehicle<span style="color:red;">*</span></label>
<div class="controls">
<select name="vehicle" value="<?php echo  htmlentities($row['vehicle']);?>" required>
<option value="select">select vehicle type</option>
    <option value="car">Car</option>
    <option value="van">Van</option>
    <option value="motorbike">Moter bike</option>

  </select>
<br>
<br>

</div>
</div>

<div class="control-group">
<label class="control-label" for="contactno">User name<span style="color:red;">*</span></label>
<div class="controls">
	    	<input type="text"  id="username" name="username" value="<?php echo  htmlentities($row['username']);?>" required="required">
	  	</div>
</div>



<div class="control-group">
<label class="control-label" for="contactno">Password<span style="color:red;">*</span></label>
<div class="controls">
	    	<input type="password"  id="password" name="password" value="<?php echo  htmlentities($row['password']);?>" required >
	  	</div>
		  </div>
		  <?php } ?>


		  <div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="background-color:blue; color: white">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	
	</script>
</body>
<?php } ?>