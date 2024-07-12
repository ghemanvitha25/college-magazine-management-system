<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmuid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>INSTITUTE DIGITAL MAGAZINE- Add Post Details</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body class="sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">
    <?php include_once('includes/header.php');?>
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

<?php include_once('includes/menubar.php');?>
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">
                    
                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>View Magazine Detail</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   
                                       
                                 <?php
$vid=$_GET['viewid'];
$sql="SELECT tblmagazine.Title,tblmagazine.Publisher,tblmagazine.Language,tblmagazine.Frequency,tblmagazine.MagazineDescription,tblmagazine.CoverImage,tblmagazine.UploadMagazine,tblmagazine.PostDate,tblmagazine.Status,tblmagazine.Remark,tblmagazine.RemarkDate,tblmagazine.CategoryID,tblcategory.CategoryName from tblmagazine join tblcategory on tblcategory.ID=tblmagazine.CategoryID where tblmagazine.ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>                     
<table class="table table-bordered table-hover data-tables">
                                <tr>
  <th width="200"><strong>Title</strong></th>
  <td colspan="2"><?php  echo htmlentities($row->Title);?></td>
  <th><strong>Category</strong></th>
  <td colspan="2"><?php  echo htmlentities($row->CategoryName);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Publisher</strong></th>
  <td colspan="2"><?php  echo htmlentities($row->Publisher);?></td>
  <th><strong>Language</strong></th>
  <td colspan="2"> <?php  echo htmlentities($row->Language);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Frequency</strong></th>
  <td ><?php  echo htmlentities($row->Frequency);?></td>
  <th width="200"><strong>View Uploaded Magazine</strong></th>
  <td colspan="3" style="text-align: center;"><a href="files/<?php echo $row->UploadMagazine;?>" width="100" height="100" target="_blank"> <strong style="color: red">View Uploaded Magazine</strong></a></td>
  </tr>
  <tr>
  <th width="200"><strong>Cover Image</strong></th>
  <td colspan="5" style="text-align: center;"><img src="images/<?php echo $row->CoverImage;?>" width="300" height='300'></td>
  
  </tr>
  <tr>
   <th><strong>Magazine Description</strong></th>
  <td colspan="6"><?php  echo $row->MagazineDescription;?></td>   
  </tr>
     <tr>

  <th><strong>Status</strong></th>
  <td><?php  echo htmlentities($row->Status);?></td>
  <th><strong>Remark</strong></th>
  <td><?php  echo $row->Remark;?></td>
  <th><strong>Remark Date</strong></th>
  <td><?php  echo $row->RemarkDate;?></td>
  </tr>                        </table>

                                        <?php $cnt=$cnt+1;}} ?>
                                      
                                   


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
     <?php include_once('includes/footer.php');?>
        </div>

    </div>
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../plugins/highlight/highlight.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/scrollspyNav.js"></script>
    <script src="../assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>
</body>
</html><?php }  ?>