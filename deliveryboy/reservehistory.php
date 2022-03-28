<?php
session_start();
include('include/config.php');
$uname= $_SESSION['username'];
$u_id= $_SESSION['id'];

$delivertyBoy=0;
$query="select deliveryboy.id from deliveryboy join users on users.id=deliveryboy.user_id where users.id='$u_id'";
$Result=mysqli_query($con,$query); 
while($row=mysqli_fetch_array($Result))
{ 
  $delivertyBoy=$row['id'];
}


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
	<title>Deliveryboy| Reservertion History</title>
	
	    


		

		

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
						<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
                            <thead>
                                <tr>
                                    <th> Order</th>
                                    <th>Delivery Details</th>
                                    <th>Product </th>
                                    <th>Qty </th>
                                    <th>Delivery Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
								
                    <tbody>
                <?php
                    $orderQu="select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,reservation.del_date, users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id ,orders.orderStatus from orders join users on  orders.userId=users.id join products on products.id=orders.productId join reservation on reservation.order_id= orders.id where orders.orderStatus='Delivered' and reservation.del_id=$delivertyBoy; ";
                    
                    $Resultset=mysqli_query($con,$orderQu); 
                    while($row=mysqli_fetch_array($Resultset))
                    { ?>
                        <tr>
                        <td><?php echo htmlentities($row['id']);?></td>
                        <td>
                            <div>
                                <?php echo htmlentities($row['username']);?>
                            </div>
                            <div>
                                <?php echo htmlentities($row['useremail']);?>
                            </div>
                            <div>
                                <?php echo htmlentities($row['usercontact']);?>
                            </div>
                            <div>
                            <?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?>
                            </div>
                        </td>
                        <td><?php echo htmlentities($row['productname']);?></td>
                        <td><?php echo htmlentities($row['quantity']);?></td>
                        <td><?php echo htmlentities($row['del_date']);?></td>
                        <td><?php echo htmlentities($row['orderStatus']);?></td>
                        
                        </tr>

                    <?php 
                    } ?>
                    </table>
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