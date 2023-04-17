<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Payments_Approvals"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
  <style> 
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
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $admin_post = $_POST['admin_post'];
        $bairro = $_POST['bairro'];
        //$area = $_POST['area'];
     
    }
    
    
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Payments_Approvals"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Payments_Approvals"]?></li>
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
                                                <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_payments.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Payments"]?></span>
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Payments_Approvals"]?></span>
                                                </a>
                                            </li>

                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_app_pymnts.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Approved_Payments"]?></span>
                                                </a>
                                            </li>
                                                                                
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="contribute_for_service_approved_payments.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Approved_Full_Payments"]?></span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>


                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                    <p class="mb-0">
                                        <!--start here -->
                                        <div class="card-border">
                                            <div class="card-body">
                                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="contribute_for_service_filter3.php" method ="POST" >
                                                    <div class="col-12">
                                                    <label for="admin_post" class="form-label"><?php echo $language["Bairro"];?></label>
                                            
                                                        <select class="form-select" name="admin_post" id="admin_post"  required>
                                                            <option selected value="<?php echo $admin_post;?>"><?php echo ap_name($link,$admin_post);?></option>  
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <label for="bairro" class="form-label"><?php echo $language["Unidade"];?></label>
                                                        <select class="form-select" name="bairro" id="bairro"  required >
                                                            <option selected value="<?php echo $bairro; ?>" ><?php echo locality_name($link,$bairro); ?></option>
                                                                
                                                        </select>
                                                        
                                                    </div>

                                                                                                        
                                                    <div class="col-12">
                                                        
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"]?>" onClick="history.go(-1);">  
                                                    </div>
                                                </form>                                            
                                                <!-- End Here -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-border">
                                               
                                                <div class="card-body">
                                                <h7 class="card-title mt-0"></h7>
                                                    
                                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                        
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $language["ID"]?></th> 
                                                                    <th><?php echo $language["Applicant_Code"]?></th>                                           
                                                                    <th><?php echo $language["Applicant_Name"]?></th>
                                                                    <th><?php echo $language["Option"]?></th>
                                                                    <th><?php echo $language["Reference"]?></th>
                                                                    <th><?php echo $language["Amount_Paid"]?></th>
                                                                    <th><?php echo $language["Approved"]?>?</th>
                                                                    <th><?php echo $language["Action"]?></th>  
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select * from tpayments inner join households on tpayments.hhCode = households.hhcode where ((households.pa='$admin_post') and (households.locality='$bairro') and (households.selected_product <> '00') and (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1') and (tpayments.pApproved = '0'))";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        if ($row["pApproved"] == 1){$pApproved = 'Yes';}else{$pApproved = 'No';}
                                                                        if ($row["pOption"] == '00'){$pOption = 'None';}else{$pOption = payment_option_name($link,$row["pOption"]);}
                                                                        if ($row["enrolled"]== 1){$enrolled = 'Yes';}else {$enrolled = 'No';}
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                        echo "<td>".$row["hhcode"]."</td>\n";
                                                                        echo "<td>".$row["hhname"]."</td>\n";
                                                                        echo "<td>\t\t$pOption</td>\n";
                                                                        echo "<td>".$row["pReference"]."</td>\n";
                                                                        echo "<td>".$row["amount_paid"]."</td>\n";
                                                                        echo "<td>\t\t$pApproved</td>\n";
                                                                        echo "<td>                                               
                                                                            <a href=\"hh_view.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='$language[View_Applicant]' style='font-size:18px;color:purple'></i></a> 
                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To Approve This HOUSEHOLD Payment?');\" href=\"hh_payment_approval.php?id=".$row['pID']."\"><i class='far fa-check-square' title='$language[Approve_Payment_Amount]' style='font-size:18px;color:green'></i></a> 
                                                                        </td>\n";

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
                                    </p>
                                </div>
                                    <!-- Here -->
                                    
                                

                            </div>
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
                <!-- end row -->

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