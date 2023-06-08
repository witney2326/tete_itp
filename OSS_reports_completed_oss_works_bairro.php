<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Completed_Toilet_Works"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: auto;
}
        .card-border 
            {
                border-style: solid;
                border-color: gray;
            }
        .card-border1 
            {
                border-style: groove;
                border-color: gray;
                border-width: 9px;
            }
        .card1
            {
                background-color: rgba(0, 0, 0, 0.2);
            }
</style>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
    $admin_post = $_GET["admin_post"];  
    $bairro = $_GET["bairro"];   
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Completed_Toilet_Works"];?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card1">
                            <div class="card-border1">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="OSS_reports_hhs_oss_works" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Completed_Toilet_Works"];?></span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="link" href="javascript:void(0);" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Filtered_Completed_Toilet_Works"];?></span>
                                            </a>
                                        </li>
    
                                    </ul>
                                </div>
                            </div>
                            <div class="card-border">
                
                                <div class="card-body">
                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="OSS_reports_completed_oss_works_area.php" method ="GET" >
                                        <div class="col-12">
                                            <label for="admin_post" class="form-label"><?php echo $language["Bairros"];?></label>
                                            <select class="form-select" name="admin_post" id="admin_post"  required>
                                                <option selected value="<?php echo $admin_post;?>"><?php echo ap_name($link,$admin_post);?></option>     
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="bairro" class="form-label"><?php echo $language["Unidade"];?></label>
                                            <select class="form-select" name="bairro" id="bairro" required>
                                                <option selected value="<?php echo $bairro;?>"><?php echo locality_name($link,$bairro);?></option>    
                                            </select>
                                        </div>

                                                                                    
                                        <div class="col-12">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">  
                                        </div>
                                    </form>                                             
                                    <!-- End Here -->
                                </div>
                            </div>
                            <div class="card-border">

                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>

                                <div class="card-header bg-transparent border-primary">
                                    <p><center><h5 class="my-0 text-primary"><?php echo $language["Completed_Toilet_Works"];?></h5></p></center>
                                    
                                </div>

                            <div class="card-body">
                                <h7 class="card-title mt-0"></h7>
                                
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                        
                                            <img src="assets/images/logo_t.jpg" alt="" height="64" class="center">
                                            <p><center><h6 class="my-0 text-default"><?php echo locality_name($link,$bairro);?>: <?php echo $language["Unidade"];?></h6></p></center>
                                        <thead>
                                            <tr>
                                                <th><?php echo $language["Works_Code"];?></th>                                           
                                                <th><?php echo $language["Applicant_Code"];?></th>
                                                <th><?php echo $language["Applicant_Name"];?></th>
                                                <th><?php echo $language["Plot_No"];?></th>
                                                <th><?php echo $language["Start_Date"];?></th>
                                                <th><?php echo $language["Completion_Date"];?></th>
                                                <th><?php echo $language["Contractor"];?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?Php
                                                $query="select pID,phhcode,hhname,plot,pstartdate,pcompletiondate,pcontractorID,tprojects.pstatus as pstatus from tprojects inner join households on tprojects.phhcode = households.hhcode 
                                                where ((tprojects.pstatus = '06') and (households.pa = '$admin_post') and (households.locality = '$bairro') )";                                                               
                                                
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                        $pstatus = $row["pstatus"];
                                                    echo "<tr>\n";
                                                        echo "<td>".$row["pID"]."</td>\n";
                                                        echo "<td>".$row["phhcode"]."</td>\n";
                                                        echo "<td>".$row["hhname"]."</td>\n";
                                                        echo "<td>".$row["plot"]."</td>\n";
                                                        echo "<td>".$row["pstartdate"]."</td>\n";
                                                        echo "<td>".$row["pcompletiondate"]."</td>\n";
                                                        echo "<td>".contractor_name($link,$row["pcontractorID"])."</td>\n";
                                                    echo "</tr>\n";
                                                }
                                                $result_set->close();
                                                }  
                                                                    
                                            ?>
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

</body>

</html>