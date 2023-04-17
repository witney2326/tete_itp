<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Payment_Option"]?></title>
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
        $ward = $_POST['ward'];
        $area = $_POST['area'];
     
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Payment_Option"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Payment_Option"]?></li>
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
                                                <a class="nav-link" data-bs-toggle="link" href="request_for_service.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Technology_Choice"]?></span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="tech_selection.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Selection_and_Approvals"]?></span>
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="javascript: void(0);" role="tab">
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
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="" method ="POST" >
                                            <div class="col-12">
                                                <label for="constituency" class="form-label">Constituency</label>
                                                
                                                <select class="form-select" name="constituency" id="constituency"  required>
                                                    <option selected value="<?php echo $constituency;?>"><?php echo con_name($link,$constituency);?></option>  
                                                </select>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="ward" class="form-label">Ward</label>
                                                <select class="form-select" name="ward" id="ward"  required >
                                                    <option selected value="<?php echo $ward; ?>" ><?php echo ward_name($link,$ward); ?></option>
                                                        
                                                </select>
                                                
                                            </div>

                                            <div class="col-12">
                                                <label for="area" class="form-label">City Area</label>
                                                <select class="form-select" name="area" id="area" required>
                                                    <option selected  value="<?php echo $area;?>"><?php echo area_name($link,$area);?></option>
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
                                        <p align="right">
                                            <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" onclick="window.location.href = 'view-products.php'"><?php echo $language["View_Products"]?></button>
                                        </p>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo $language["Household_Code"]?></th>                                           
                                                            <th><?php echo $language["Household_Name"]?></th>
                                                            <th><?php echo $language["Tech_Option"]?></th>
                                                            <th><?php echo $language["Agree_Terms"]?></th>
                                                            <th><?php echo $language["Selected_Option"]?></th>
                                                            <th><?php echo $language["Payment_Option"]?></th>
                                                            <th><?php echo $language["Action"]?></th>  
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?Php
                                                            $query="select * from households where ((area = '$area') and (selected_product <> '00') and (enrolled = '1') and (product_approved = '1') and (pOption = '00'))";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                    if ($row["selected_product"] == '00'){$prod = 'None';}else{$prod = pname($link,$row["selected_product"]);}
                                                                    if ($row["pOption"] == '00'){$pOption = 'None';}else{$pOption = payment_option_name($link,$row["pOption"]);}
                                                                    $cost = number_format(product_cost($link,$row["selected_product"]),2);

                                                                    if ($row["agree_tcs"] == '1'){$agree_tcs = $language["Yes"];}else{$agree_tcs = $language["No"];}
                                                                    $hhID = $row["hhcode"];
                                                                echo "<tr>\n";
                                                                    echo "<td>".$row["hhcode"]."</td>\n";
                                                                    echo "<td>".$row["hhname"]."</td>\n";
                                                                    echo "<td>\t\t$prod</td>\n";
                                                                    echo "<td>\t\t$agree_tcs</td>\n";
                                                                    echo "<td>\t\t$pOption</td>\n";
                                                                    echo "<td>";
                                                                    echo "<form action = 'request_for_service_SelectPaymentOption.php' method ='POST'>";
                                                                        echo '<select id="payment_option"  name="payment_option">';
                                                                            
                                                                            $ta_fetch_query = "SELECT oID,oName FROM payment_options";                                                  
                                                                            $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                            ?>
                                                                            <option value="<?php echo $DB_ROW_ta["oID"]; ?>">
                                                                                <?php echo $DB_ROW_ta["oName"];?></option><?php
                                                                                $i++;
                                                                                    }
                                                                        echo "</select>";
                                                                        echo "<input type='hidden' id='hhID' name='hhID' value='$hhID'>";
                                                                        echo "<button type='submit' class='btn-outline-primary' name='FormSubmit' value='Submit' onClick='return confirmSubmit()'>Select</button>";
                                                                    echo "</form>";
                                                                echo "</td>";
                                                                    echo "<td>                                               
                                                                    <a href=\"hh_View.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='View HH' style='font-size:18px; color: purple'></i></a>\n
                                                                    
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