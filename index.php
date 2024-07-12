<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		

		<title>INSTITUTE DIGITAL MAGAZINE||Home Page</title>
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
								<h1 class="text-white">Home</h1>
								<p class="text-white link-nav"><a href="index.php">Magazine</a></p>
							</div>
						</div>
					
					</div>
				</div>
			</section>
		
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
						
							<div class="latest-post-wrap">
								<h4 class="cat-title">Magazine</h4>
								<?php
                                    if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
       
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblmagazine";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT tblmagazine.Title,tblmagazine.ID as mid,tblmagazine.PostDate,tblmagazine.Status,tblmagazine.CategoryID,tblmagazine.RemarkDate,tblmagazine.CoverImage,tblmagazine.MagazineDescription,tblcategory.CategoryName,tblcategory.ID as cid,tbluser.FullName,tbluser.MobileNumber,tbluser.Email from tblmagazine join tblcategory on tblcategory.ID=tblmagazine.CategoryID join tbluser on tbluser.ID=tblmagazine.UserID where tblmagazine.Status='Published' LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
								<div class="single-latest-post row align-items-center">
									
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img  src="user/images/<?php echo $row->CoverImage;?>" height="300" width="300" alt="">
										</div>
										<ul class="tags">
											
<li><a href="category-details.php?catid=<?php echo htmlentities($row->cid)?>"><?php echo htmlentities($row->CategoryName)?></a></li> 
										</ul>
									</div>
									<div class="col-lg-7 post-right">
										<a href="single-magazine-post.php?magzid=<?php echo htmlentities($row->mid)?>">
											<h4><?php echo htmlentities($row->Title)?></h4>
										</a>
										<ul class="meta">
											<li><?php echo htmlentities($row->FullName)?></li>
											<li><?php echo htmlentities($row->RemarkDate)?></li>
											 <?php 
$sql1 ="SELECT tblcomments.postid,tblcomments.id,tblcomments.status from tblcomments join tblmagazine on tblcomments.postid=tblmagazine.ID where tblcomments.status=1 && tblmagazine.ID=:id &&tblcomments.postid=tblmagazine.ID";
$query1 = $dbh -> prepare($sql1);

$query1->bindParam(':id',$row->mid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$nocomm=$query1->rowCount();
?>

											
											<li><a href="#"><?php echo $nocomm;?> Comments</sa></li>
										</ul>
										<p><?php echo htmlentities($row->MagazineDescription)?></p>
									</div>
								</div> <?php $cnt=$cnt+1;}} ?> 
					
				<hr />
							                           <div style="padding-left: 500px">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
								
							</div>
						
						</div>
						
					</div>
				</div>
			</section>
		
		</div>
		
		
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