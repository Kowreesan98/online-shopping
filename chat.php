<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

    if(isset($_POST['submit'])){
        $qury=" INSERT INTO message (message, message_from, message_to, date) VALUES ('".$_POST['message']."', '".$_SESSION['id']."', '5', current_timestamp());";

        if (mysqli_query($con,$qury ) )
        {
            header("Refresh:0");
        }else{
            echo "Error:  <br>" . mysqli_error($con);
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

	    <title>visvam-My Wishlist</title>
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

		
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
	</head>
    <body class="cnt-home">
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	
</header>

<!-- ============================================== HEADER : END ============================================== -->


<div class="body-content outer-top-bd">
	<div class="container">
		
	<div class="table-responsive">
		<table class="table">
			<tbody>
<?php
$ret=mysqli_query($con,"select * from message where message_from=".$_SESSION['id']." or message_to=".$_SESSION['id'].";");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {

?>

				<tr>
                       

					
					<td >
                            <?php if($row['message_to']==$_SESSION['id']) {?>
                                <span class="review"><?php echo htmlentities($row['message']);?> (<?php echo htmlentities($row['date']);?>)</span>
                            <?php }?>
					</td>

					<td>
                            <?php if($row['message_from']==$_SESSION['id']) {?>
								<div style="text-align:right"><span class="review" style="color: green"><?php echo htmlentities($row['message']);?> (<?php echo htmlentities($row['date']);?>)</span></div>
                            <?php }?>
                        </td>
					
				</tr>
				<?php } } else{ ?>
				<tr>
					<td style="font-size: 18px; font-weight:bold ">Your Message Box is Empty</td>

				</tr>
				<?php } ?>
                <tr>
                    
                </tr>
			</tbody>
		</table>

	    </div>
                        <form  method="POST" >
                            

                            <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Write your message here</label>
                                    <textarea class="form-control" name="message" rows="3"></textarea>
                                </div>
                                <div style="text-align:right"> <button type="submit" name="submit" class="btn btn-success">Send</button> </div>
                                
                        </form>
                    
    </div>
</div>			
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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
<?php } ?>