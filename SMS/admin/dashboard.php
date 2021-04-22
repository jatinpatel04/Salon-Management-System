<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Dashboard</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/styles.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

   
</head> 
<body class="cbp-spmenu-push">
<div class="main-content">
		
		 <?php include_once('includes/sidebar.php');?>
		
	<?php include_once('includes/header.php');?>
		<!-- main content start-->
	
		<div id="page-wrapper" class="row calender widget-shadow">
			<div class="main-page">
			<div>
			<h2 align = 'center'>Dashboard Details</h2>
			</div>
			
				
					<div class="row justify-content-start">
						<?php $query1=mysqli_query($con,"Select * from tblcustomers");
$totalcust=mysqli_num_rows($query1);
?>
						<div class="stats-left ">
							
							<h4>Total Customer</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalcust;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="row justify-content-start">
						<?php $query2=mysqli_query($con,"Select * from tblappointment");
$totalappointment=mysqli_num_rows($query2);
?>
						<div class="stats-left">
						
							<h4>Total Appointment</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalappointment;?></label>
						</div>
						<div class="clearfix"> </div>	
						<div class="row justify-content-start">
						</div>
					<div class="col-sm">
						<?php $query3=mysqli_query($con,"Select * from tblappointment where Status='1'");
$totalaccapt=mysqli_num_rows($query3);
?>
						<div class="stats-left">
							
							<h4>Total Accepted Apt</h4>
						</div>
						<div class="stats-right">
							<label><?php echo $totalaccapt;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
				<div class="row justify-content-start">
					<div class="col-sm">
						<?php $query4=mysqli_query($con,"Select * from tblappointment where Status='1'");
$totalrejapt=mysqli_num_rows($query4);
?>
						<div class="stats-left ">
						
							<h4>Total Rejected Apt</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalrejapt;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					</div>
					<div class="row justify-content-start">
					<div class="col-sm">
						<?php
//todays sale
 $query6=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
while($row=mysqli_fetch_array($query6))
{
$todays_sale=$row['Cost'];
$todysale+=$todays_sale;

}
 ?>
						<div class="stats-left">
							
							<h4>Today Sales</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $todysale;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
				</div>
						
					</div>	
			


			</div>
		</div>
		<!--footer-->
		<?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>