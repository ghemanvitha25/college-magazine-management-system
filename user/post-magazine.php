<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$uid=$_SESSION['ocmuid'];
$title=$_POST['title'];
$category=$_POST['category'];
$publisher=$_POST['publisher'];
$langauge=$_POST['langauge'];
$frequency=$_POST['frequency'];
$magdesc=$_POST['magdesc'];
$coverimage=$_FILES["coverimage"]["name"];
$extension = substr($coverimage,strlen($coverimage)-4,strlen($coverimage));
$uploadmag=$_FILES["uploadmag"]["name"];
$extension1 = substr($uploadmag,strlen($uploadmag)-4,strlen($uploadmag));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
$allowed_extensions1 = array("docs",".doc",".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Cover image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions1))
{
echo "<script>alert('File has Invalid format. Only docs / doc/ pdf format allowed'');</script>";
}
else {
    $coverimage=md5($coverimage).time().$extension;
$uploadmag=md5($uploadmag).time().$extension1;
move_uploaded_file($_FILES["coverimage"]["tmp_name"],"images/".$coverimage);
     move_uploaded_file($_FILES["uploadmag"]["tmp_name"],"files/".$uploadmag);
$sql="insert into tblmagazine(Title,UserID,CategoryID,Publisher,Language,Frequency,MagazineDescription,CoverImage,UploadMagazine)values(:title,:uid,:category,:publisher,:langauge,:frequency,:magdesc,:coverimage,:uploadmag)";
$query=$dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
$query->bindParam(':langauge',$langauge,PDO::PARAM_STR);
$query->bindParam(':frequency',$frequency,PDO::PARAM_STR);
$query->bindParam(':magdesc',$magdesc,PDO::PARAM_STR);
$query->bindParam(':coverimage',$coverimage,PDO::PARAM_STR);
$query->bindParam(':uploadmag',$uploadmag,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Magazine details has been added.")</script>';
echo "<script>window.location.href ='post-magazine.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

}
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
            <div class="">
                <div class="container">
                    
                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Add Magazine Detail</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" action="" method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Enter Magazine Title" name="title" value="" required="true">
                                            </div>
                                        </div>
                                     <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Category</label>
                                                <select type="text" class="form-control" id="category" name="category" value="" required="true">
                                                     <option value="">Select Category</option>
            <?php
$sql="SELECT * from tblcategory";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <option value="<?php  echo htmlentities($row->ID);?>"><?php  echo htmlentities($row->CategoryName);?></option><?php $cnt=$cnt+1;}} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label for="title">Publisher</label>
                                                <input type="text" class="form-control" id="publisher" placeholder="Enter Publisher Name" name="publisher" value="" required="true">
                                            </div>
                                        </div>
                                     <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Language</label>
                                                <input type="text" class="form-control" id="langauge" placeholder="Enter Langauge ex:English,Hindi etc" name="langauge" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Frequency</label>
                                                <input type="text" class="form-control" id="Frequency" placeholder="Enter Frequency ex: weekly,mothly etc" name="frequency" value="" required="true">
                                            </div>
                                        </div>
                                          <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Magazine Description</label>
                                                <input type="text" class="form-control" id="magdesc" placeholder="Enter Magazine Details" name="magdesc" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Cover Image</label>
                                                <input type="file" class="form-control" id="coverimage" placeholder="Enter Magazine Details" name="coverimage" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                 <label>Upload Magazine</label>
                                                <input type="file" class="form-control" id="uploadmag" name="uploadmag" value="" required="true">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit" name="submit">Submit</button>
                                    </form>


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