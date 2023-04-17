<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Selection_and_Approvals"]?></title>
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
            .pin {
                display: inline-block;
                width: 18px; height: 18px;
                background-image: url('icons/pin.png');
                background-repeat: no-repeat;
            }
            .ico-pin { background-position: 0 0; }
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Selection_and_Approvals"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Selection_and_Approvals"]?></li>
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
                                                <a class="nav-link" data-bs-toggle="link" href="request_for_service.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Technology_Choice"]?></span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="javascript: void(0);" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Selection_and_Approvals"]?></span>
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="tcs_opt_payment.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Payment_Option"]?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <!--start here -->
                                <div class="card-border">
                                    <div class="card-body">
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="tech_selection_filter3.php" method ="POST" >
                                            <div class="col-12">
                                                <label for="admin_post" class="form-label">Admin Post</label>
                                                
                                                <select class="form-select" name="admin_post" id="admin_post"  required>
                                                    <option selected value="<?php echo $admin_post;?>"><?php echo ap_name($link,$admin_post);?></option>  
                                                </select>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="bairro" class="form-label">bairro</label>
                                                <select class="form-select" name="bairro" id="bairro"  required >
                                                    <option selected value="<?php echo $bairro; ?>" ><?php echo locality_name($link,$bairro); ?></option>
                                                        
                                                </select>
                                                
                                            </div>

                                            
                                            
                                            <div class="col-12">
                                                
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                            </div>
                                        </form>                                            
                                        <!-- End Here -->
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-border">
                                        <p align="right">
                                            <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" onclick="window.location.href = 'view-products.php'"><?php echo $language["View_Products"]?></button>
                                        </p>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo $language["Applicant_Code"]?></th>                                           
                                                            <th><?php echo $language["Applicant_Name"]?></th>
                                                            <th><?php echo $language["Tech_Option"]?></th>
                                                            <th><?php echo $language["Toilet_Site_Set"];?></th>
                                                            <th><?php echo $language["Product_Cost"]?></th>
                                                            <th><?php echo $language["Approved"]?>?</th>
                                                            <th><?php echo $language["Action"]?><
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?Php
                                                            $query="select * from households where ((pa='$admin_post') and (locality='$bairro') and (selected_product <> '04') and (enrolled = '1') and (product_approved = '0'))";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                    if ($row["selected_product"] == '00'){$prod = 'None';}else{$prod = pname($link,$row["selected_product"]);}
                                                                    $cost = number_format(product_cost($link,$row["selected_product"]),2);
                                                                    if (($row["lat"]== 0) or ($row["longi"]== 0)){$geo_set = "Not Set";}else{$geo_set = "Set";}
                                                                    if ($row["product_approved"] == '1'){$approved = $language["Yes"];}else{$approved = $language["No"];}
                                                                echo "<tr>\n";
                                                                    echo "<td>".$row["hhcode"]."</td>\n";
                                                                    echo "<td>".$row["hhname"]."</td>\n";
                                                                    echo "<td>\t\t$prod</td>\n";
                                                                    echo "<td>\t\t$geo_set</td>\n";
                                                                    echo "<td>\t\t$cost</td>\n";
                                                                    echo "<td>\t\t$approved</td>\n";
                                                                    if ($geo_set == "Not Set")
                                                                    {
                                                                        echo "<td>                                               
                                                                            <a href=\"hh_View.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='$language[View_Applicant]' style='font-size:18px; color: purple'></i></a>\n
                                                                            <a href=\"location.php?id=".$row['hhcode']."\"><i class='pin ico-pin' title='Geo Locate Toilet' style='font-size:18px; color: blue'></i></a>\n
                                                                        </td>\n";
                                                                    }else
                                                                    {
                                                                        echo "<td>                                               
                                                                            <a href=\"hh_View.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='$language[View_Applicant]' style='font-size:18px; color: purple'></i></a>\n
                                                                            <a onClick=\"javascript: return confirm('$language[Sure_Want_Approve_Toilet_Selection]');\" href=\"tech_selected_approval.php?id=".$row['hhcode']."\"><i class='fa fa-check' title='$language[Approve_Tech_Selection]' style='font-size:18px;color:green'></i></a>
                                                                        </td>\n";
                                                                    }

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