<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<title>INSTITUTE DIGITAL MAGAZINE|| About Us</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		
		<div class="site-main-container">
		
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">About Us</h1>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		</div>
		
		

		<section class="feedback-area section-gap" id="feedback">
			<div class="container">
					<?php

$sql="SELECT * from  tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="row justify-content-center">
					<div class="col-md-12 pb-50 header-text text-center">
						<h1 class="mb-10"><?php  echo $row->PageTitle;?></h1>
						<p>
							Who are in extremely love with eco friendly system..
						</p>
					</div>
				</div>
				<div class="row feedback-contents justify-content-between align-items-center">
					<div class="col-lg-6 feedback-left">
						<div class="mn-accordion" id="accordion">
						<p><?php  echo $row->PageDescription;?></p>
						</div>
					</div><?php $cnt=$cnt+1;}} ?>
					<div class="col-lg-5 feedback-right relative d-flex justify-content-center align-items-center">
					
						<img class="img-fluid" src="img/download.png" alt="">
					</div>
				</div>
			</div>
		</section>

		<?php include_once('includes/footer.php');?>

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="js/easing.min.js"></script>
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/mn-accordion.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>