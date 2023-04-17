<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Applicants_With_Approved_Payments"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <style>
        
    </style>
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Applicants_With_Approved_Payments"]?></h4>

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
                                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Applicants_With_Approved_Payments"]?></span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="OSS_reports_hhs_payments_filter.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Filtered_Applicants_With_Approved_Payments"]?></span>
                                            </a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
   
                            <div class="card-border">
                                <div class="card-body">

                                    <div class="d-print-none">
                                        <div class="float-end">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                        </div>
                                    </div>

                                    <div class="card-header bg-transparent border-primary">
                                        <p><center><h5 class="my-0 text-primary"><?php echo $language["Applicants_With_Approved_Payments"]?></h5></p></center>
                                    </div>

                                        <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                            <img src="assets/images/logo_t.jpg" alt="" height="64" class="center">
                                            
                                            <thead>
                                                <tr>
                                                    <th><?php echo $language["Applicant_Code"]?></th>
                                                    <th><?php echo $language["Applicant_Name"]?></th>
                                                    <th><?php echo $language["Bairros"]?></th>
                                                    <th><?php echo $language["Plot_No"]?></th>
                                                    <th><?php echo $language["Selected_Toilet"]?></th>
                                                    <th><?php echo $language["Toilet_Cost"]?></th>
                                                    <th><?php echo $language["Total_Paid"]?></th>
                                                    <th><?php echo $language["Balance"]?></th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?Php
                                                    $query="select tpayments.hhCode as code, hhname, locality, plot, pname, pCost, amount_owing, SUM(amount_paid) as Total_Paid from tpayments inner join households on tpayments.hhCode = households.hhcode
                                                    inner join tproducts on households.selected_product = tproducts.pID  
                                                    where ((tpayments.pApproved ='1')) group by tpayments.hhCode";
                                                                        
                                                    if ($result_set = $link->query($query)) {
                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                    { 
                                                        if (($row["amount_owing"]-$row["Total_Paid"])<0){$balance = 0;}else{$balance = $row["amount_owing"]-$row["Total_Paid"];}
                                                        
                                                        echo "<tr>\n";
                                                            echo "<td>".$row["code"]."</td>\n";
                                                            echo "<td>".$row["hhname"]."</td>\n";
                                                            echo "<td>".bairro_name($link,$row["locality"])."</td>\n";
                                                            echo "<td>".$row["plot"]."</td>\n";
                                                            echo "<td>".$row["pname"]."</td>\n";
                                                            echo "<td>".number_format($row["pCost"],2)."</td>\n";
                                                            echo "<td>".number_format($row["Total_Paid"],2)."</td>\n";
                                                            echo "<td>".number_format($balance,2)."</td>\n";
                                                        echo "</tr>\n";
                                                        }
                                                        $result_set->close();
                                                    }              
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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