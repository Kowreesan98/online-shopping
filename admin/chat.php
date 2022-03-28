<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
	header('location:login.php');
}
else{

    if(isset($_POST['submit'])){
        $qury=" INSERT INTO message (message, message_to, message_from, date) VALUES ('".$_POST['message']."', '".$_SESSION['id']."', '5', current_timestamp());";

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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Chat</title>
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
					<div class="table-responsive">
		<table class="table">
			<tbody>
<?php
$ret=mysqli_query($con,"select users.name, message.message_from from message join users on message.message_from=users.id where message_to=".$_SESSION['id']." group by message_from;");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {

?>

				<tr>
                        <td>
                            
							<span class="review"><a href="chatUser.php?messagefrom=<?php echo $row['message_from'];?>"><?php echo htmlentities($row['name']);?></a></span>
                         
                        </td>
					
					</td>
					
				</tr>
				<?php } } else{ ?>
				<tr>
					<td style="font-size: 18px; font-weight:bold ">Your Message box is Empty</td>

				</tr>
				<?php } ?>
                <tr>
                    
                </tr>
			</tbody>
		</table>

	    </div>
                        
                    
						</div>
				</div>
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
<?php } ?>