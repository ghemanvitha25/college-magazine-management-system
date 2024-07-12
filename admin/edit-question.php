<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['oesaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
 $paperid=$_POST['paperid'];
 $question=$_POST['question'];
 $opta=$_POST['opta'];
 $optb=$_POST['optb'];
 $optc=$_POST['optc'];
 $optd=$_POST['optd'];
 $answer=$_POST['answer'];
 $eid=$_GET['editid'];
$sql="update tblquestion set PaperID=:paperid,Question=:question,OptionA=:opta,OptionB=:optb,OptionC=:optc,OptionD=:optd,Answer=:answer where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':paperid',$paperid,PDO::PARAM_STR);
$query->bindParam(':question',$question,PDO::PARAM_STR);
$query->bindParam(':opta',$opta,PDO::PARAM_STR);
$query->bindParam(':optb',$optb,PDO::PARAM_STR);
$query->bindParam(':optc',$optc,PDO::PARAM_STR);
$query->bindParam(':optd',$optd,PDO::PARAM_STR);
$query->bindParam(':answer',$answer,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
     echo '<script>alert("Question has been updated")</script>';
    echo "<script>window.location.href ='manage-question.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Online Examination System - Update Question</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
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
            <div class="container">
                <div class="container">
                    
                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Update Question</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" action="" method="post" >
                                        <?php
$eid=$_GET['editid'];
$sql="SELECT tblquestion.ID as qid,tblquestion.PaperID,tblquestion.Question,tblquestion.OptionA,tblquestion.OptionB,tblquestion.OptionC,tblquestion.OptionD,tblquestion.Answer,tblexam.ID as eid,tblexam.ExamName from tblquestion join tblexam on tblexam.ID=tblquestion.PaperID where tblquestion.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
                                       <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Name of Exam</label>
                                               <select type="text" class="form-control"  name="paperid" value="" required='true'>
                                                <option value="<?php  echo $row->PaperID;?>"><?php  echo $row->ExamName;?></option>
                                                        <?php 

$sql2 = "SELECT * from   tblexam";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->ExamName);?></option>
 <?php } ?>    
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Question</label>
                                               <input type="text" class="form-control"  name="question" value="<?php  echo $row->Question;?>" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Option A</label>
                                               <input type="text" class="form-control" name="opta" value="<?php  echo $row->OptionA;?>" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Option B</label>
                                              <input type="text" class="form-control" name="optb" value="<?php  echo $row->OptionB;?>" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Option C</label>
                                               <input type="text" class="form-control" name="optc" value="<?php  echo $row->OptionC;?>" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Option D</label>
                                               <input type="text" class="form-control" id="" name="optd" value="<?php  echo $row->OptionD;?>" required='true'>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Answer</label>
                                               <input type="text" class="form-control" id="" name="answer" value="<?php  echo $row->Answer;?>" required='true'>
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