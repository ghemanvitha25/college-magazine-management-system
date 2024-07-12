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
    $name=$_POST['fname'];
  $mobno=$_POST['mobno'];
  $email=$_POST['email'];
  $sql="update tbluser set FullName=:name,MobileNumber=:mobilenumber where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$name,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
     echo "<script>window.location.href ='profile.php'</script>";

  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>INSTITUTE DIGITAL MAGAZINE - Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
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
                                            <h4>Profile</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" action="" method="post" >
                                        <?php
$uid=$_SESSION['ocmuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Full Name</label>
                                               <input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Mobile Number</label>
                                              <input type="text" name="mobno" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Email Address</label>
                                             <input type="email" class="form-control" value="<?php  echo $row->Email;?>" name="email" readonly="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Registration Date</label>
                                               <input type="text" value="<?php  echo $row->RegDate;?>" class="form-control" name="password" readonly="true">
                                            </div>
                                        </div>
                                   
                                        <?php $cnt=$cnt+1;}} ?>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit" name="submit">Update</button>
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