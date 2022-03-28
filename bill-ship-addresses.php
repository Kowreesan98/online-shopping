<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{
	


// code for Shipping address updation
if(isset($_POST['shipupdate']))
{
	$saddress=$_POST['shippingaddress'];
	$sstate=$_POST['shippingstate'];
	$scity=$_POST['shippingcity'];
	$spincode=$_POST['shippingpincode'];
	$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
	if($query)
	{
echo "<script>alert('Shipping Address has been updated');</script>";
	}
}




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Account</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		

	</head>
    <body class="cnt-home">
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	

</header>
<!-- ============================================== HEADER : END ============================================== -->

<div>
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->

<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">Delivery Information </h4>
						        
				            </div>
						    
						     
				<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
					<div class="form-group">
					    <label class="info-title" for="Billing Address">Delivery Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
					  



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Delivery City  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing District">Delivery District <span>*</span></label>
						<select class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required"value="<?php echo $row['billingCity'];?>" >
						<option value="badulla">Badulla</option>
						<option value="jaffna">Jaffna</option>
						<option value="trincomalee">Trincomalee</option>
					  </div>
<div>
					  <div class="form-group">
					    <label class="info-title" for="Billing Province">Delivery Province <span>*</span></label>
					    <select class="form-control unicase-form-control text-input" id="billingprovince" name="billingprovince" required="required" value="<?php echo $row['billingProvince'];?>" >
						
					</div>
					  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>

					</form>
					<?php } ?>

</div>


						      
					</div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	<?php include('includes/brands-slider.php');?>

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	
</body>
</html>
<?php } ?>