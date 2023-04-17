<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Filtered_Verified_Applicants"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

    <style>
    .nav-link active {
        background-color: greenyellow !important;
        border: none !important;
        border-width:0!important;
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
</head>

<script type="text/javascript">
    function Validate() {
        var pa1 = document.getElementById("admin_post");
        if (pa1.value == "") {
            alert("Please Select Admin Post option! (Por favor, selecione a opção Admin Post!) ");
            return false;
        }
        return true;
    }
</script>

<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "lib.php";
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php include 'layouts/body.php'; ?>
    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Filtered_Verified_Applicants"]?></h4>

                            <div class="page-title-right">
                                
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="card1">
                    <div class="card-border1">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="OSS_reports_registration.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Verified_Applicants"]?></span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="link" href="javascript:void(0);" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Filtered_Verified_Applicants"]?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="OSS_reports_registration_verified_hhs_summarised.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Summarised_Verified_Applicants"]?></span>
                                            </a>
                                        </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-border">
                        
                        <div class="card-body">
                            <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="OSS_reports_registration_verified_hhs_pa.php" method ="GET" >
                                <div class="col-12">
                                    <label for="admin_post" class="form-label"><?php echo $language["Admin_Post"]?></label>               
                                    <select class="form-select" name="admin_post" id="admin_post" required>
                                        <option ></option>
                                        <?php                                                           
                                                $dis_fetch_query = "SELECT id, pa_ FROM adminposts";                                                  
                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                $i=0;
                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                ?>
                                                <option value ="<?php
                                                        echo $DB_ROW_reg["id"];?>">
                                                    <?php
                                                        echo $DB_ROW_reg["pa_"];
                                                    ?>
                                                </option>
                                                <?php
                                                    $i++;
                                                        }
                                            ?>
                                    </select>
                                    
                                </div>

                                <div class="col-12">
                                    <label for="bairro" class="form-label">Bairros</label>
                                    <select class="form-select" name="bairro" id="bairro" disabled required>
                                        <option>Select Bairro</option>
                                            <?php                                                           
                                                $dis_fetch_query = "SELECT id,bairro FROM bairros";                                                  
                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                $i=0;
                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                ?>
                                                <option value="<?php echo $DB_ROW_Dis["id"]; ?>">
                                                    <?php echo $DB_ROW_Dis["bairro"]; ?></option><?php
                                                    $i++;
                                                        }
                                            ?>
                                    </select>
                                    
                                </div>

                                                            
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit" onclick="return Validate()"><?php echo $language["Submit"];?></button>
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">  
                                </div>
                            </form>                                             
                            <!-- End Here -->
                        </div>
                    </div>
                </DIV>

            </div>
        </div>
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
    </div>
</div>