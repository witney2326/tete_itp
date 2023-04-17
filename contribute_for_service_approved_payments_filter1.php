<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Approved_Full_Payments"]?></title>
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
            border-width: 7px;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $constituency = $_POST['constituency'];
        //$ward = $_POST['ward'];
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Approved_Full_Payments"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Approved_Full_Payments"]?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
               
                    <div class="col-xl-12">
                            <div class="card">
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
                                                <a class="nav-link" data-bs-toggle="link" href="contribute_for_service.php" role="link">
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
                                                <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
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
                                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="contribute_for_service_approved_payments_filter2.php" method ="POST" >
                                                    <div class="col-12">
                                                        <label for="constituency" class="form-label">Constituency</label>
                                                        
                                                        <select class="form-select" name="constituency" id="constituency"  required>
                                                            <option selected value="<?php echo $constituency;?>"><?php echo con_name($link,$constituency);?></option>  
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <label for="ward" class="form-label">Ward</label>
                                                        <select class="form-select" name="ward" id="ward"  required >
                                                            <option ></option>
                                                                <?php                                                           
                                                                    $dis_fetch_query = "SELECT id,wname FROM wards where constituency = '$constituency'";                                                  
                                                                    $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                    $i=0;
                                                                        while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                    ?>
                                                                    <option value="<?php echo $DB_ROW_Dis["id"]; ?>">
                                                                        <?php echo $DB_ROW_Dis["wname"]; ?></option><?php
                                                                        $i++;
                                                                            }
                                                                ?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a valid Ward.
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="ta" class="form-label">City Area</label>
                                                        <select class="form-select" name="ta" id="ta" required disabled>
                                                            <option selected  value="$ta"></option>
                                                            <?php                                                           
                                                                    $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                    $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                    $i=0;
                                                                        while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                    ?>
                                                                    <option>
                                                                        <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                        $i++;
                                                                            }
                                                                ?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a valid Area
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit"><?php echo $language["Submit"]?></button>
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
                                                                    <th><?php echo $language["Applicant_Code"]?></th>                                           
                                                                    <th><?php echo $language["Applicant_Name"]?></th>
                                                                    <th><?php echo $language["OSS_Product"]?></th>
                                                                    <th><?php echo $language["Total_Paid"]?></th>
                                                                    <th><?php echo $language["Product_Cost"]?></th>
                                                                    <th><?php echo $language["Action"]?></th>  
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select DISTINCT(tpayments.hhCode) from tpayments inner join households on tpayments.hhCode = households.hhcode  where ((households.con = '$constituency') and (tpayments.pApproved ='1') and (households.selected_product <> '00') and (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1') and (households.contractor_identified = '0') and (households.contractor_allocated = '0'))";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        $hhcode = $row["hhCode"];
                                                                                                                                                                                                                  
                                                                        $result2 = mysqli_query($link, "SELECT SUM(amount_paid) AS total_paid FROM tpayments where ((hhCode ='$hhcode') and (pApproved ='1'))"); 
                                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                                        $total_paid = number_format($row2['total_paid'],2);
                                                                        
                                                                        $result3 = mysqli_query($link, "SELECT hhname,selected_product FROM households where ((hhcode ='$hhcode'))"); 
                                                                        $row3 = mysqli_fetch_assoc($result3); 
                                                                        $hhname = $row3['hhname'];$selected_product = pname($link,$row3['selected_product']);$pcost = number_format(product_cost($link,$row3['selected_product']),2);
                                                                        
                                                                        if (($row2['total_paid']) >= product_cost($link,$row3['selected_product']))
                                                                        {
                                                                            echo "<tr>\n";
                                                                                
                                                                                echo "<td>".$row["hhCode"]."</td>\n";
                                                                                echo "<td>\t\t$hhname</td>\n";
                                                                                echo "<td>\t\t$selected_product</td>\n";
                                                                                echo "<td>\t\t$total_paid</td>\n";
                                                                                echo "<td>\t\t$pcost</td>\n";
                                                                        
                                                                                echo "<td>                              
                                                                                    <a href=\"hh_view.php?id=".$row['hhCode']."\"><i class='far fa-eye' title='$language[View_Applicant]' style='font-size:18px;color:purple'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To Schedule Works For This HOUSEHOLD?');\" href=\"hh_works_schedule1.php?id=".$row['hhCode']."\"><i class='far fa-calendar' title='$language[Schedule_Toilet_Works]' style='font-size:18px;color:green'></i></a> 
                                                                                </td>\n";
                                                                            echo "</tr>\n";
                                                                        } 
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