<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
    $isread=1;
    $orderId=intval($_GET['orderId']);  
    date_default_timezone_set('Asia/Colombo');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    // $sql="update leaves set IsRead=:isread where id=:did";
    // $query = $dbh->prepare($sql);
    // $query->bindParam(':isread',$isread,PDO::PARAM_STR);
    // $query->bindParam(':did',$did,PDO::PARAM_STR);
    // $query->execute();
    
     //code for action taken on leave
    
     if (isset($_POST['submit'])) {
     
       $user_id_deliveryboy= $_POST['userIdDeliveryBoy'];
       $order_id=intval($_GET['orderId']); 
     
       $reversonQury="insert into reservation(order_id,del_id,res_date,del_date) values($order_id,$user_id_deliveryboy,'$admremarkdate','$admremarkdate')";
       $reversonQury2="update orders set orderStatus='Assigned' where id=$order_id";
        
       // echo $user_id_deliveryboy;
         if (mysqli_query($con,$reversonQury ) && mysqli_query($con,$reversonQury2))
               {
                //  echo '<script language="javascript">';
                //  echo 'alert("Assigned Successfully")';
                //  echo '</script>';
                 
                header("Location: pending-orders.php");

                 }
     
              else {
                 echo "Error:  <br>" . mysqli_error($con);
               }

               
         
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
            <form method="POST" >
                <!-- <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog"> -->

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title">Assign Delivery Boy</h4>
                    </div>
                    <div class="modal-body">
                        <table>
                        <tr>
                        <td> Select Delivery boy for order id <?php echo $orderId; ?></td></tr><tr>
                        <td>
                            <!-- <input type="hidden" name="order_id" value= "<?php echo $row['orderId']; ?>" > -->

                        <select name="userIdDeliveryBoy">
                        <?php 
                            $deliveryBoys=mysqli_query($con,"select users.id as uid, users.name as name,deliveryboy.id as id  from users join deliveryboy on deliveryboy.user_id=users.id where users.role='deliveryboy';");
                            while($row_deliv=mysqli_fetch_array($deliveryBoys)){ ?>
                                <option value="<?php echo $row_deliv['id'] ?>" >
                                    <?php echo htmlspecialchars($row_deliv['name']); ?>
                                </option>
                            <?php }
                        ?>
                        </select>
                        </td>
                        </tr>
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn" style="background-color:blue; color: white">Send</button>
                    </div>
                    </div>

                <!-- </div> -->
                <!-- </div> -->
                </form>

            </main>
            <?php } ?>        		
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
</html>