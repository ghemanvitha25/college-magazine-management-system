<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['oesaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
   
      $sql1= "update tblmagazine set Remark=:remark, Status=:status where ID=:vid";

    $query1=$dbh->prepare($sql1);
     $query1->bindParam(':vid',$vid,PDO::PARAM_STR);
     $query1->bindParam(':remark',$remark,PDO::PARAM_STR);
$query1->bindParam(':status',$status,PDO::PARAM_STR);

 $query1->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='new-magazine.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>INSTITUTE DIGITAL MAGAZINE- Magazine Details</title>
    
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
        
                <div class="">
                    
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
  <td ><?php  echo htmlentities($row->Title);?></td>
  <th><strong>Category</strong></th>
  <td><?php  echo htmlentities($row->CategoryName);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Publisher</strong></th>
  <td><?php  echo htmlentities($row->Publisher);?></td>
  <th><strong>Language</strong></th>
  <td> <?php  echo htmlentities($row->Language);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Frequency</strong></th>
  <td ><?php  echo htmlentities($row->Frequency);?></td>
  <th width="200"><strong>View Uploaded Magazine</strong></th>
  <td><a href="../user/files/<?php echo $row->UploadMagazine;?>" target="_blank"> <strong style="color: red">View Uploaded Magazine</strong></a></td>
  </tr>
  <tr>
  <th width="200"><strong>Cover Image</strong></th>
  <td colspan="3" style="text-align: center;"><img src="../user/images/<?php echo $row->CoverImage;?>" width="300" height="300"></td>
  
  </tr>
  <tr>
   <th><strong>Magazine Description</strong></th>
  <td colspan="3"><?php  echo $row->MagazineDescription;?></td>   
  </tr>
     <tr>

  <th><strong>Status</strong></th>
  <td> <?php  $status=$row->Status;
    
if($row->Status=="Published")
{
  echo "Published Magazine";
}
if($row->Status=="Not Published")
{
  echo "Not Published Magazine";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
  <th><strong>Remark</strong></th>
  <td><?php $remark=$row->Remark;
if($remark==''){
 echo "Not Response Yet";   
} else{
echo $remark;
} ?>  </td>
</tr>
 
 <tr>
  <th><strong>Remark Date</strong></th>
  <td><?php $rd=$row->RemarkDate;
if($rd==''){
 echo "Not Response Yet";   
} else{
echo $rd;
} ?>  </td>
  
  </tr>                        </table>

                                        <?php $cnt=$cnt+1;}} ?>
                                      
    <?php 

if ($status==""){
?>                              
<p align="center"  style="padding-top: 20px">
<button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <input name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required="true"></td>
  </tr> 
   
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control" required="true" >
     <option value="Published" selected="true">Published</option>
     <option value="Not Published">Not Published</option>
     
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>
                </div>
              </div>
            </div>
          </div>
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