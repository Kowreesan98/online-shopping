<?php
session_start();
include('include/config.php');
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Deliveryboy| Leave</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <script type="text/javascript">
  
  function RequestCheck()
  {
    var cause=RequestForm.leavecause;
    var type=RequestForm.type;
    var days=RequestForm.days;
    var stade=RequestForm.sdate;
    var edate=RequestForm.edate;


     if(trimfield(cause.value) == '') 
    {
       window.alert("Please Enter Causes Of Request.");
        cause.focus();
        return false;
    }

    if(days.value<=0||days.value=="")
    {
       window.alert("Enter Valid days.");
        days.focus();
        return false;
    }

     if(sdate.value=="")
    {
       window.alert("Enter Start Date of Leave.");
        sdate.focus();
        return false;
    }
    if(edate.value=="")
    {
       window.alert("Enter End Date of Leave.");
        edate.focus();
        return false;
    }
  }

function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
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
                            
							
								<h3 style="background-color:lightblue; color:black; font-weight:bold">Leave Application form</h3>
							</div>
                            <div class="module-body">
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $uname= $_SESSION['username'];
  $u_id= $_SESSION['id'];
  date_default_timezone_set('Asia/Colombo');
  $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));

$cause=$_POST['leavecause'];
$Type=$_POST['type'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];

//  $query="select * from leaves where UserName='$uname'";
//  $Result=mysqli_query($connection,$query);
//  $exist=mysqli_num_rows($Result);


// if(!$exist){




$delivertyBoy=0;
 $query="select deliveryboy.id from deliveryboy join users on users.id=deliveryboy.user_id where users.id='$u_id'";
 $Result=mysqli_query($con,$query); 
 while($row=mysqli_fetch_array($Result))
 { 
    $delivertyBoy=$row['id'];
}  


//  $day=$row['TotalLeave'];


// if($day>=$Days){

//  $query="select * from deliveryboy where username='$uname'";
// $Result=mysqli_query($connection,$query);
//  $row = mysqli_fetch_array($Result);


//  $dept=$row['Edept'];


// $query="insert into Leaverequest(UserName,LeaveCause,LeaveType,NoOfDays,StartDate,EndDate) values('$uname','$cause','$Type','$Days','$sdate','$edate')";
         if (mysqli_query($con, "INSERT INTO leaves (LeaveType, PostingDate, StartingDate, EndDate, Status, deliveryboy_id, AdminRemark, AdminRemarkDate,Cause) VALUES ('$Type', '$admremarkdate', '$sdate', '$edate' , 'pending', $delivertyBoy,null,null, '$cause');"))
          {
            echo '<script language="javascript">';
            echo 'alert("Applied Successfully")';
            echo '</script>';
            

            }

         else {
            echo "Error:  <br>" . mysqli_error($con);
          }

     
    //   }
    //   else
    //   {
    //          echo '<script language="javascript">';
    //         echo "alert('Sorry You Have Only '+$day+'  Leave Days Left')";
            
    //         echo '</script>';


    //   }
    // }
    // else
    // {
    //   echo '<script language="javascript">';
    //         echo 'alert(" Sorry You Have Pending Request")';
    //         echo '</script>';
    // }
  }

?>

<br>
<div class="container">
<div class="module-body">
<form class="form-horizontal" method="POST" role="form" name="RequestForm" onsubmit="return RequestCheck();"> 
<div class="form-group">
	    	
	  	</div>

          
            <form class="" method="POST" role="form" name="RequestForm" onsubmit="return RequestCheck();"> 
                
                <div class="form-group">
                    <label for="causes">Causes Of Leave <span style="color:red;">*</span></label>
                   
                        <textarea  rows="2" cols="50" id="leavecause" name="leavecause" placeholder="Enter The Causes Of Leave" class="form-control" required="required">
                       </textarea>
                      
                   
                </div>
                <div class="form-group">
                    <label for="email">Type Of Leave <span style="color:red;">*</span></label>
                   
                        <select id="type" name="type" class="form-control" required="required">
                            <option  value="half day">Half Day</option>
                            <option value="full day">Full Day</option>
                        </select>
                    
                </div>
                <div class="form-group">
                    <label for="startdate">Start Date<span style="color:red;">*</span></label>
                    
                        <input type="date" id="startdate" name="sdate" class="form-control" required="required">
                    
                </div>
                <div class="form-group">
                    <label for="birthDate">End Date <span style="color:red;">*</span></label>
                   
                        <input type="date" id="enddate" name="edate" class="form-control" required="required">
                    </div>
               
                <br>
                
                <div class="form-group">
                <button type="submit" name="submit" class="btn" style="background-color:blue;color:white">Leave request</button>
                    
				</div>
			</form>
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