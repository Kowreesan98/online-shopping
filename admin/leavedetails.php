<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
    $isread=1;
    $did=intval($_GET['leaveid']);  
    date_default_timezone_set('Asia/Colombo');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    // $sql="update leaves set IsRead=:isread where id=:did";
    // $query = $dbh->prepare($sql);
    // $query->bindParam(':isread',$isread,PDO::PARAM_STR);
    // $query->bindParam(':did',$did,PDO::PARAM_STR);
    // $query->execute();
    
     //code for action taken on leave
    if(isset($_POST['update']))
    { 
    $did=intval($_GET['leaveid']);
    $description=$_POST['description'];
    $status=$_POST['status'];   
    date_default_timezone_set('Asia/Colombo');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $results=mysqli_query($con,"update leaves set AdminRemark='$description',Status='$status',AdminRemarkDate='$admremarkdate' where id=$did;");
    
    // $query = $dbh->prepare($sql);
    // $query->bindParam(':description',$description,PDO::PARAM_STR);
    // $query->bindParam(':status',$status,PDO::PARAM_STR);
    // $query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
    // $query->bindParam(':did',$did,PDO::PARAM_STR);
    // $query->execute();
        $msg="Leave updated Successfully";
   
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Category</title>
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

                    <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title" style="font-size:24px;"></div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave Details</span>
                                <!-- <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?> -->
                                <table id="example" class="display responsive-table ">
                               
                                 
                                    <tbody>
<?php 
$lid=intval($_GET['leaveid']);
$results=mysqli_query($con,"SELECT leaves.id as lid,users.name,deliveryboy.id,deliveryboy.vehicle,users.contactno,users.email,leaves.LeaveType,leaves.StartingDate,leaves.EndDate,leaves.PostingDate,leaves.Status,leaves.AdminRemark,leaves.AdminRemarkDate from leaves join deliveryboy on leaves.deliveryboy_id=deliveryboy.id join users on users.id=deliveryboy.user_id where leaves.id=$did;");
while($row=mysqli_fetch_array($results))
{         
      ?>  

                                        <tr>
                                            <td style="font-size:16px;"> <b>Deliveryboy Name :</b></td>
                                              <td>
                                                <?php echo htmlentities($row['name']);?></td>
                                              <td style="font-size:16px;"><b>Deliverboy Id :</b></td>
                                              <td><?php echo htmlentities($row['id']);?></td>
                                              <td style="font-size:16px;"><b>Vehicle :</b></td>
                                              <td><?php echo htmlentities($row['vehicle']);?></td>
                                          

                                          <tr>
                                             <td style="font-size:16px;"><b>deliveryboy Email id :</b></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                             <td style="font-size:16px;"><b>phone No. :</b></td>
                                            <td><?php echo htmlentities($row['contactno']);?></td>
                                            <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                        </tr>

  <tr>
                                             <td style="font-size:16px;"><b>Leave Type :</b></td>
                                            <td><?php echo htmlentities($row['LeaveType']);?></td>
                                             <td style="font-size:16px;"><b>Leave Date . :</b></td>
                                            <td>From <?php echo htmlentities($row['StartingDate']);?> to <?php echo htmlentities($row['EndDate']);?></td>
                                            <td style="font-size:16px;"><b>Posting Date</b></td>
                                           <td><?php echo htmlentities($row['PostingDate']);?></td>
                                        </tr>
                                    <tr>
                                    <td style="font-size:16px;"><b>leave Status :</b></td>
                                    <td colspan="5"><?php
                                        
                                        if($row['Status']=='approved'){
                                         ?>
                                             <span style="color: green">Approved</span>
                                             <?php } if($row['Status']=='rejected')  { ?>
                                            <span style="color: red">Not Approved</span>
                                             <?php } if($row['Status']=='pending')  { ?>
                                             <span style="color: blue">waiting for approval</span>
                                             <?php } ?>
                                        </td>
                                        </tr>

                                        <tr>
                                        <td style="font-size:16px;"><b>Admin Remark: </b></td>
                                        <td colspan="5"><?php
                                        if($row['AdminRemark']==""){
                                        echo "waiting for Approval";  
                                        }
                                        else{
                                        echo htmlentities($row['AdminRemark']);
                                        }
                                        ?></td>
                                        </tr>

                                        <tr>
                                        <td style="font-size:16px;"><b>Admin Action taken date : </b></td>
                                        <td colspan="5"><?php
                                        if($row['AdminRemarkDate']==""){
                                        echo "NA";  
                                        }
                                        else{
                                            echo htmlentities($row['AdminRemarkDate']);
                                        }
                                        ?></td>
                                        </tr>
                                        <?php 
                                        if($row['Status']=='pending')
                                        {

                                        ?>
                                        <tr>
                                        <td colspan="5">
                                        <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Take&nbsp;Action</a>
                                        <form name="adminaction" method="post">
                                        <select class="browser-default" name="status" required="">
                                            <option value="">Choose your option</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Not Approved</option>
                                        </select>
                                        <p><textarea id="textarea1" name="description" class="materialize-textarea" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
                                        <div class="modal-footer" style="width:90%">
                                            <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">
                                        </div>
                                        </form>
                                        <!-- <form name="adminaction" method="post">
                                        <div id="modal1" class="modal modal-fixed-footer" style="height: 60%">
                                            <div class="modal-content" style="width:90%">
                                                <h4>Leave take action</h4>
                                                <select class="browser-default" name="status" required="">
                                                                                    <option value="">Choose your option</option>
                                                                                    <option value="1">Approved</option>
                                                                                    <option value="2">Not Approved</option>
                                                                                </select>
                                                                                <p><textarea id="textarea1" name="description" class="materialize-textarea" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
                                            </div>
                                            <div class="modal-footer" style="width:90%">
                                            <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">
                                            </div>

                                        </div>   
                                        </form>   -->
                                        </td>
                                        </tr>
                                        <?php } ?>
                                                                        
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>



						

                    		
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
<?php ?>