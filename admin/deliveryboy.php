<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$firstnamedel=$_POST['firstnamedel'];
$lastnamedel=$_POST['lastnamedel'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$vehicle=$_POST['vehicle'];
$username=$_POST['username'];

$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(username,name,email,contactno,password,role) values('$username','$firstnamedel $lastnamedel','$email','$contactno','$password','deliveryboy')");
$getUser=mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
$num_rows = mysqli_num_rows($getUser);

if($num_rows > 0){

	while($row=mysqli_fetch_array($getUser))
	{
		$user_id=$row['id'];
		$sql=mysqli_query($con,"insert into deliveryboy(user_id,vehicle) values($user_id,'$vehicle')");
		
	}
	
}else{	
	
}



// $sql=mysqli_query($con,"insert into deliveryboy(user_id,vehicle) values($user_id,'$vehicle')");


$_SESSION['msg']="Deliveryboy !!";

}
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add deliveryboy</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

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
								<h3 style="background-color:lightblue; color:black; font-weight:bold">Add deliveryboy</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Successfully created</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />


                                    <div>
	
	<form class="adddeliveryboy-form outer-top-xs" role="form" method="post" name="registerdelivery" onSubmit="return valid();">
<div class="form-group">
	    	<label class="info-title" for="fullname">First Name <span style="color:red;">*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="firstnamedel" name="firstnamedel" required="required">
	  	</div>

          <div class="form-group">
	    	<label class="info-title" for="fullname">Last Name <span style="color:red;">*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="lastnamedel" name="lastnamedel" required="required">
	  	</div>

          <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email<span style="color:red;">*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="email" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>

	  	</div>

          <div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span style="color:red;">*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" minlength="10" required >
	  	</div>

          <div class="form-group">

          <p>Vehicle <span style="color:red;">*</span></p>
<select name="vehicle" required>
<option value="select">select vehicle type</option>
    <option value="car">Car</option>
    <option value="van">Van</option>
    <option value="motorbike">Moter bike</option>

  </select>
<br>
<br>

</div>

		  <div class="form-group">
	    	<label class="info-title" for="username">User Name <span style="color:red;">*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="username" name="username" required="required">
	  	</div>



<div class="form-group">
	    	<label class="info-title" for="password">Password. <span style="color:red;">*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
	  	</div>



	  	
			
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="background-color:blue;color:white">Add</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						<div class="module">
							<div class="module-head">
								<h3 style="background-color:lightblue; color:black; font-weight:bold">Manage Deliveryboy</h3>
							</div>
							<div class="module-body table">
							
							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
								
									<thead>
										<tr>
											<th>No</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Contactno</th>
											<th>Vehicle</th>
											<th>Edit</th>
											<th>Delete</th>

										</tr>
									</thead>
									<tbody>

<?php 
$query=mysqli_query($con,"SELECT u.*, d.* FROM deliveryboy d INNER JOIN users u WHERE d.user_id=u.id;");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td> <?php echo htmlentities($row['email']);?></td>
											<td><?php echo htmlentities($row['contactno']);?></td>
											<td><?php echo htmlentities($row['vehicle']);?></td>

											<td>
											<a href="edit-deliveryboy.php?id=<?php echo $row['id']?>&user_id=<?php echo $row['user_id']?>" >
											<div>
												<button type="edit" name="edit" class="btn" style="background-color:blue; color: white">edit</button>
											</div>
</td>
											<td>
											<a href="deliveryboy.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
											<div class="delete">
												<button type="delete" name="delete" class="btn" style="background-color:blue; color: white">delete</button>
											</div></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
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
	
</body>
<?php } ?>
						
						
					