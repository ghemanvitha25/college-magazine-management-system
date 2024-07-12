<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['oesaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['oesaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where ID=:adminid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed")</script>';
 echo "<script>window.location.href ='change-password.php'</script>";
} else {
echo '<script>alert("Your current password is wrong")</script>';

}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>INSTITUTE DIGITAL MAGAZINE- Change Password</title>
   
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
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
                                            <h4>Change Password</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" action="" method="post" onsubmit="return checkpass();" name="changepassword">
                                                  <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Current Password</label>
                                               <input type="password" class="form-control" name="currentpassword" id="currentpassword"required='true'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">New Password</label>
                                               <input type="password" class="form-control" name="newpassword"  class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Confirm Password</label>
                                             <input type="password" class="form-control"  name="confirmpassword" id="confirmpassword"  required='true'>
                                            </div>
                                        </div>
                                   
                                        <button class="btn btn-primary submit-fn mt-2" type="submit" name="submit">Change</button>
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