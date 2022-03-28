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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|deliveryboy leave</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">

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

                            <h3 style="background-color:lightblue; color:black; font-weight:bold">Deliveryboy Leave</h3>
							</div>
							<div class="module-body table">
							<?php } ?>
									<!-- <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Successfully deleted</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div> -->


									<br />
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
                            <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="200">deliveryboy Name</th>
                                            <th width="120">Leave Type</th>

                                             <th width="180">Posting Date</th>                 
                                            <th>Status</th>
											<th></th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
										
                                    <?php 
									$sql = "SELECT leaves.id as lid,users.name,deliveryboy.id,leaves.LeaveType,leaves.PostingDate,leaves.Status from leaves join deliveryboy on leaves.deliveryboy_id=deliveryboy.id  join users on users.id=deliveryboy.user_id order by lid desc";
   
									$cnt=1;
									$results=mysqli_query($con,"SELECT leaves.id as lid,users.name,deliveryboy.id,leaves.LeaveType,leaves.PostingDate,leaves.Status from leaves join deliveryboy on leaves.deliveryboy_id=deliveryboy.id  join users on users.id=deliveryboy.user_id order by lid desc;");
									while($row=mysqli_fetch_array($results))
										{
									
										?>     
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['LeaveType']);?></td>
											<td><?php echo htmlentities($row['PostingDate']);?></td>
                                            
											<td><?php
                                        
											if($row['Status']=='approved'){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($row['Status']=='rejected')  { ?>
                                                <span style="color: red">Not Approved</span>
                                                 <?php } if($row['Status']=='pending')  { ?>
 												<span style="color: blue">waiting for approval</span>
 												<?php } ?>


                                             </td>

          
           <td><a href="leavedetails.php?leaveid=<?php echo $row['lid'];?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td>
                                    </tr>
                                         <?php $cnt++; }?>
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
<?php  ?>