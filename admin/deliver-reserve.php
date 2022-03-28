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
$order_id=$_POST['order_id'];
$firstnamedel=$_POST['firstnamedel'];
$res_date=$_POST['res_date'];
$del_date=$_POST['del_date'];

$sql=mysqli_query($con,"insert into reservation(order_id,firstnamedel,res_date,del_date) values('$order_id','$firstnamedel','$res_date','$del_date')");
$_SESSION['msg']="Deliveryboy !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Reserve deliveryboy</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
								<h3 style="background-color:lightblue; color:black; font-weight:bold">Deliveryboy Details</h3>
							</div>

<div class="module">
<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Successfully created</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
							
							<div class="module-body table">
							
							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
								
									<thead>
										<tr>
											<th>No</th>
											<th>Deliverboy Name</th>
											<th>email</th>
											<th>Vehicle</th>
											

										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from deliveryboy join users on deliveryboy.user_id=users.id");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['email']);?></td>
											<td> <?php echo htmlentities($row['vehicle']);?></td>
										
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>


                        
<h3 style="background-color:lightblue; color:black; font-weight:bold">Reserve deliveryboy</h3>

	
<form action=" "  method="post">
<P>Order id:</p>
<?php $query=mysqli_query($con,"select * from orders");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<input type="text" id="order_id" name="order_id" value= <?php echo htmlentities($row['id']);?> required >
<?php  }?>



<?php
$mysqli=new mysqli('localhost','root','' ,'vshopping') or die(mysqli_error($mysqli));
$queryins="select firstnamedel from deliveryboy ";
if($result=mysqli_query($mysqli,$queryins)){
	if($success=mysqli_num_rows($result)>0){
     echo "<p>Select deliveryboy:</p>";
	 echo "<select name='firstnamedel'>n";
	 echo "<option>Select deliveryboy</option>";
	 
	 while($row=mysqli_fetch_array($result))
		 echo"<option value='$row[firstnamedel]'>$row[firstnamedel]</option>";
	   echo "</select> <br>";
	 }
	 else {
		 echo "no results found";
	 }
}
	 else{
	    echo "failed to connect to database";
	 }


?>


<p>Date to be reserved:</p>
<input type="date" name="res_date" required>
<p>Date to be delivered:</p>
<input type="date" name="del_date" required>

<br>



<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="background-color:blue; color: white">Reserve</button>
											</div>
										</div>

</form>
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
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php  }?>