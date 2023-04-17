<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Verified_Applicants"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
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
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_POST['Submit']))
    {   
        $constituency = $_POST['constituency'];
        //$ward = $_POST['ward'];
        //$area = $_POST['area'];
     
    }
    
    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Verified_Applicants"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Verified_Applicants"]?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-border1">        
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="link" data-bs-toggle="link" href="register-applicant.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                    <span class="d-none d-sm-block"><?php echo $language["Register_Applicant"]?></span>
                                </a>
                            </li>             
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link " data-bs-toggle="link" href="target_ben.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block"><?php echo $language["Registered_Applicants"]?></span>
                                </a>
                            </li>

                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block"><?php echo $language["Verified_Applicants"]?></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="link" href="enrolled_ben_tg.php" role="link">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block"><?php echo $language["Verified_Applicants_Need_Technical_Guidance"]?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                        
               
                <!-- end page title -->
                
                
                <div class="card-border">
                    <div class="card-body">
                            <h5 class="card-title mt-0"></h5>
                            <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="enrolled_ben_filter2.php" method ="POST" >
                                <div class="col-12">
                                    <label for="constituency" class="form-label">Constituency</label>
                                    
                                    <select class="form-select" name="constituency" id="constituency"  required>
                                        <option selected value=""></option>  
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
                                    <label for="area" class="form-label">City Area</label>
                                    <select class="form-select" name="area" id="area" required disabled>
                                        <option>Select Area</option>
                                        
                                    </select>
                                    
                                </div>

                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                                </div>
                            </form>                                            
                            <!-- End Here -->
                        </div>
                    </div>
                                

                    <div class="card-border">
                        <p align="right">
                            <button class="btn btn-outline-primary  waves-effect waves-light mb-2 me-2" onclick="window.location.href = 'view-products.php'"><?php echo $language["View_Products"]?></button>
                        </p>
                        <div class="card-body">
                    
                        
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            
                                <thead>
                                    <tr>
                                        <th><?php echo $language["Applicant_Code"]?></th>                                           
                                        <th><?php echo $language["Applicant_Name"]?></th>
                                        <th><?php echo $language["Need_Technical_Guide"]?></th>
                                        <th><?php echo $language["Toilet_Selected"]?></th>
                                        <th><?php echo $language["Toilet_Type"]?></th>
                                        <th><?php echo $language["Action"]?></th>  
                                    </tr>
                                </thead>

                                <tbody>
                                    <?Php
                                        $query="select * from households where ((enrolled ='1') and (deleted = '0'))";

                                        //Variable $link is declared inside config.php file & used here
                                        
                                        if ($result_set = $link->query($query)) {
                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                        { 
                                            
                                            if ($row["enrolled"]== 1){$enrolled = 'Yes';}else {$enrolled = 'No';}
                                            if ($row["agree_tcs"]== 1){$agree_tcs = 'Yes';}else {$agree_tcs = 'No';}
                                            if ($row["need_tg"]== 1){$need_tg = $language["Yes"];}else {$need_tg = $language["No"];}
                                            if ($row["selected_product"]<> '00'){$toilet_selected = $language["Yes"];}else {$toilet_selected = $language["No"];}

                                        echo "<tr>\n";
                                            echo "<td>".$row["hhcode"]."</td>\n";
                                            echo "<td>".$row["hhname"]."</td>\n";
                                        
                                            echo "<td>\t\t$need_tg</td>\n";
                                            echo "<td>\t\t$toilet_selected</td>\n";
                                            echo "<td>".pname($link,$row["selected_product"])."</td>\n";
                                            echo "<td>
                                                <a href=\"hh_View.php?id=".$row['hhcode']."\"><i class='far fa-eye' title='$language[View_Applicant]' style='font-size:18px; color:purple'></i></a>   
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