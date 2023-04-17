<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php header("Cache-Control: max-age=300, must-revalidate"); ?>

<head>
    <title><?php echo $language["Add_New_Beneficiary_Household"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    
    <style> 
        .card-border 
        {
            border-style: solid;
            border-color: greenyellow;
        }
    </style>
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        include "lib.php";
        
        $con = $_POST['constituency'];
        $ward = $_POST['ward'];
        $area = $_POST['area'];

        
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php include 'layouts/body.php'; ?>
    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Add_New_Beneficiary_Household"];?></h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <p align="right">
                    <INPUT TYPE="button" class="btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);">  
                </p>

            <div class="card-border">
                <div class="card-body">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                <span class="d-none d-sm-block">Register HH</span>
                            </a>
                        </li>              
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link " data-bs-toggle="link" href="target_ben.php" role="link">
                                <span class="d-none d-sm-block">Registered HHs</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="link" href="enrolled_ben.php" role="link">
                                <span class="d-none d-sm-block">Verified HHs</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="link" href="enrolled_ben_tg.php" role="link">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Verified HHs: Need Technical Guidance</span>
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- end here -->
                <div class="row">
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card-border">
                            
                            <div class="card-body">
                                
                                <form novalidate action="register_new_beneficiary_hh.php" method ="POST">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="con" class="form-label"><?php echo $language["Filter"];?>1</label>
                                                <select class="form-select" id="con" name ="con" required >
                                                    <option selected value="<?php echo $con;?>" ><?php echo con_name($link,$con);?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ward" class="form-label"><?php echo $language["Filter"];?>2</label>
                                                <select class="form-select" id="ward" name ="ward" required >
                                                    <option selected value="<?php echo $ward;?>" ><?php echo ward_name($link,$ward);?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="area" class="form-label"><?php echo $language["Filter"];?>3</label>
                                                <select class="form-select" id="area" name ="area" required>
                                                    <option selected  value="<?php echo $area;?>"><?php echo area_name($link,$area);?></option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="block" class="form-label">Street Name</label>
                                                <input type="text" class="form-control" id="block" name="block">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhname" class="form-label">Plot Number</label>
                                                <input type="text" class="form-control" id="hhname" name = "hhname" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="plot" class="form-label">Applicant's Name</label>
                                                <input type="text" class="form-control" id="plot" name ="plot"  >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" pattern="/(0)\d{9}/" title="Please enter valid phone number">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="age_category" class="form-label">Applicant's Gender</label>
                                                <select class="form-select" id="age_category" name ="age_category" required>
                                                <option ></option> 
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, gender FROM tgender";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["gender"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_ownership_status" class="form-label">House Status</label>
                                                <select class="form-select" id="hh_ownership_status" name ="hh_ownership_status" required>
                                                    <option></option>
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, status_ FROM home_status";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["status_"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_population" class="form-label">No. Of People Living at Premises</label>
                                                <input type="number" min="1" class="form-control" id="hh_population" name="hh_population">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_population" class="form-label">No. Of Adult Males</label>
                                                <input type="number" min="0" class="form-control" id="hh_population" name="hh_population">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_population" class="form-label">No. Of Adult Females</label>
                                                <input type="number" min="0" class="form-control" id="hh_population" name="hh_population">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_population" class="form-label">No. Of Children (Under 5)</label>
                                                <input type="number" min="0" class="form-control" id="hh_population" name="hh_population">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_latrine" class="form-label">Current Latrine Type</label>
                                                <select class="form-select" id="hh_latrine" name ="hh_latrine" required>
                                                    <option></option>
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT id, type_ FROM hh_latrine";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["id"]; ?>">
                                                            <?php echo $DB_ROW_spp["type_"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hh_nat_id" class="form-label">National ID For HH Head</label>
                                                <input type="text"  class="form-control" id="hh_nat_id" name="hh_nat_id">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-outline-info w-md" style="width:200px" name="Submit_geo" value="Submit_geo">Capture GPS Coordinates</button>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="latitude" class="form-label">Latitude</label>
                                                <input type="text"  class="form-control" id="latitude" name="latitude" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="longitude" class="form-label">Longitude</label>
                                                <input type="text"  class="form-control" id="longitude" name="longitude" readonly>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md" style="width:200px" name="Submit" value="Submit">Save Applicatant's Record</button>
                                                
                                            </div>                                   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
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