 <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['oesaid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>INSTITUTE DIGITAL MAGAZINE- Report of Published Magazine</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
</head>
<body class="sidebar-noneoverflow">
    

   <?php include_once('includes/header.php');?>
 
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

<?php include_once('includes/menubar.php');?>

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                 <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h4 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h4>
                                <table id="alter_pagination" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr><th>S.No</th>
                                            <th>Full Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Category Name</th>
                                            <th>Posting Date</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
$sql="SELECT tblmagazine.Title,tblmagazine.ID as mid,tblmagazine.PostDate,tblmagazine.RemarkDate,tblmagazine.Status,tblmagazine.CategoryID,tblcategory.CategoryName,tbluser.FullName,tbluser.MobileNumber,tbluser.Email from tblmagazine join tblcategory on tblcategory.ID=tblmagazine.CategoryID join tbluser on tbluser.ID=tblmagazine.UserID where (date(tblmagazine.RemarkDate) between '$fdate' and '$tdate') && tblmagazine.Status='Published'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>                                        
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                             <td><?php  echo htmlentities($row->FullName);?></td>
                                              <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                               <td><?php  echo htmlentities($row->Email);?></td>
                                             <td><?php  echo htmlentities($row->Title);?></td>
                                            <td><?php  echo htmlentities($row->CategoryName);?></td>
                                            <td><?php  echo htmlentities($row->PostDate);?></td>
                                           <td><?php $status=$row->Status;
if($status==''){
 echo "Pending";   
} else{
echo $status;
}

                                                    ?>  </td>
                                            <td class="text-center">
                                                <a href="view-magazine.php?viewid=<?php echo ($row->mid);?>" data-toggle="tooltip" data-placement="top" title="View">View</a>
                                            </td>
                                        </tr>
                                       <?php $cnt=$cnt+1;}} ?> 
                                    </tbody>
                                   
                                </table>
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
    <script src="../assets/js/custom.js"></script>
    <script src="../plugins/table/datatable/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
        } );
    </script>
</body>
</html><?php }  ?>