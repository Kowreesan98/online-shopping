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

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| reservation approvals</title>
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
								<h3 style="background-color:lightblue; color:black; font-weight:bold">Reservation History</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Successfully deleted</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>No</th>
											
											<th>Deliveryboy name</th>
											<th>Reserve<br>date</th>
											<th>Delivery<br>date</th>
											<th>Applied date/time</th>
											<th>Status</th>
											<th>cancel</th>
											

										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select reservation.*,order_id,deliveryboy.id,users.name,res_date,del_date,madetime from reservation join deliveryboy on deliveryboy.id=reservation.deliveryboy join orders on orders.id=reservation.orders join users on users.id=deliveryboy.user_id");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['order_id']);?></td>
											<td><?php echo htmlentities($row['firstnamedel']);?></td>
											<td><?php echo htmlentities($row['res_date']);?></td>
											<td> <?php echo htmlentities($row['del_date']);?></td>
											<td><?php echo htmlentities($row['madetime']);?></td>
											<td><?php echo htmlentities($row['status']);?></td>
                             <td><?php $stats=$result->status;
if($stats==1){
                                             ?>
                                                 <span style="color:white;background-color:green;">Reserved</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color:white;background-color:red;">Cancelled</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color:white;background-color:blue;">waiting for approval</span>
 <?php } ?>

                                             </td>
<td> <?php $stats=$result->status;
if($stats==0){ ?> <a href="reservehistory.php?delete=<?php echo htmlentities($result->reserve_id);?>"
class="btn btn-danger" style="font-weight:bold;">Cancel</a><?php } ?>
                                            
                                            <?php $stats=$result->status;
if($stats==1 || $stats==2){ ?> <button
class="btn btn-danger" style="font-weight:bold;" disabled>Cancel</button></td><?php } ?>
											 
       
                                        </tr>
                                         <?php $cnt++; }?>


</table>


</div>


 
?>
</body>
</html>

</tbody>
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
<?php  }?>