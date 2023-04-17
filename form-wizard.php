<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Form Wizard | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>
<style>
    table, th, td 
        {
        border: 1px solid black;
        border-collapse: collapse;
        }
        thead th {
            width: 25%;
            }

            .cell-highlight {
            background-color: gold;
            font-weight: bold;
            }
</style>
<?php include 'layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Application For Household Toilet</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Wizard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           <form class="row row-cols-lg-auto g-3 align-items-center" validate action="register_new_beneficiary_hh_tq.php" method ="POST">
                                <div class="card-body">
                                
                                    <div id="vertical-example" class="horizontal-wizard">
                                        <!-- Seller Details -->
                                        <h3>Applicant Details</h3>
                                        <section>
                                            
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label for="applicant_name" style="color:blue">Name Of Applicant</label>
                                                            <input type="text" class="form-control" id="applicant_name" name ="applicant_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <p style="color:blue">Applicant's Gender</p>
                                                            <input type="radio" id="male" name="gender" value="01" checked = "true">
                                                            <label for="male">Male</label>
                                                            <input type="radio" id="female" name="gender" value="02">
                                                            <label for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label for="blno" style="color:blue">BL No.</label>
                                                            <input type="text" class="form-control" id="blno" name="blno" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-1">
                                                            <label for="phoneno1" style="color:blue" >Cell No. 1</label>
                                                            <input type="text" class="form-control" id="phoneno1" name="phoneno1" >
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="phoneno2" style="color:blue">Cell No. 2</label>
                                                            <input type="text" class="form-control" id="phoneno2" name="phoneno2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-1">
                                                            <label for="plotno" style="color:blue">Plot No.</label>
                                                            <input type="text" class="form-control" id="plotno" name="plotno">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-1">
                                                            <label for="adminpost" style="color:blue">Admin Post</label>
                                                            <input type="text" class="form-control" id="adminpost" name="adminpost" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-1">
                                                            <label for="locality" style="color:blue">Locality</label>
                                                            <input type="text" class="form-control" id="locality" name="locality" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-1">
                                                            <label for="landmark" style="color:blue">Nearest School Or Well Known Landmark</label>
                                                            <input type="text" class="form-control" id="landmark" name="landmark" >
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </section>

                                        <!-- Company Document -->
                                        <h3>Household Details</h3>
                                        <section>
                                           
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-1">
                                                            <p style="color:blue">Select ONE of the THREE:</p>
                                                            <input type="radio" id="homeowner_no_tenant" name="hh_status" value="01" checked = "true">
                                                            <label for="homeowner_no_tenant">Home Owner (No Tenant)</label><br>
                                                            <input type="radio" id="resident_landlord" name="hh_status" value="02">
                                                            <label for="resident_landlord">Resident Landlord</label><br>
                                                            <input type="radio" id="absent_landlord" name="hh_status" value="03">
                                                            <label for="absent_landlord">Absent Landlord</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-1">

                                                            <p style="color:blue">No Of Rooms Rented:</p>
                                                            <input type="number" min="0" max="20" value="0" id="no_rooms_resident_landlord" name="no_rooms_resident_landlord" style="width:15%">
                                                            <label for="no_rooms_resident_landlord"></label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-1">

                                                            <p style="color:blue">Current Toilet Type:</p>
                                                            <input type="radio" id="upl" name="current_toilet_type" value="01" >
                                                            <label for="upl">Unlined Pit Latrine</label><br>

                                                            <input type="radio" id="slpl" name="current_toilet_type" value="02">
                                                            <label for="slpl">Semi-lined Pit Latrine</label><br>

                                                            <input type="radio" id="flpl" name="current_toilet_type" value="03">
                                                            <label for="flpl">Fully Lined Pit Latrine</label><br>

                                                            <input type="radio" id="none" name="current_toilet_type" value="04" checked = "true">
                                                            <label for="none">None</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-1">

                                                            <p style="color:blue">Requested Toilet Type:</p>
                                                            <input type="radio" id="vip" name="ordered_toilet_type" value="01">
                                                            <label for="vip">VIP (Lined with vent pipe)</label><br>

                                                            <input type="radio" id="pour_flush" name="ordered_toilet_type" value="02">
                                                            <label for="pour_flush">Pour Flash + Septic Tank</label><br>

                                                            <input type="radio" id="flush_flush" name="ordered_toilet_type" value="03">
                                                            <label for="flush_flush">Flush Flush + Septic Tank</label><br>

                                                            <input type="radio" id="tg" name="ordered_toilet_type" value="04" checked = "true">
                                                            <label for="tg">Dont Know Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-1">
                                                            <input type="number" id="no_pple_at_premises" name="no_pple_at_premises" style="width:10%">
                                                            <label for="no_pple_at_premises">Total No Of people living at the premises</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="mb-1">
                                                            <input type="number" id="no_pple_adult_males" name="no_pple_adult_males" style="width:8%">
                                                            <label for="no_pple_adult_males">Adult Males</label>

                                                            <input type="number" id="no_pple_adult_females" name="no_pple_adult_females" style="width:8%">
                                                            <label for="no_pple_adult_females">Adult Females</label>

                                                            <input type="number" id="no_pple_children" name="no_pple_children" style="width:8%">
                                                            <label for="no_pple_children">Children Under 5 Years</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            
                                            
                                        </section>

                                        <!-- Bank Details -->
                                        <h3>Toilet Order</h3>
                                        <section>
                                            
                                                
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="no_toilets_order">No. of toilets to buy</label>
                                                                <input type="number" min="1" max="5" value="1" id="no_toilets_order" name="no_toilets_order" style="width:8%">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label style="color:blue">Type Of Super structure</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="radio" id="blocks" name="super_structure_order" checked ="true">
                                                                <label for="blocks">Blocks</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="radio" id="bricks" name="super_structure_order">
                                                                <label for="bricks">Bricks</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="radio" id="prefab" name="super_structure_order">
                                                                <label for="prefab">prefab</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <div class="mb-3">
                                                                <b>Accesories Requested</b>
                                                                <table style="width:100%">
                                                                    
                                                                    <tr>
                                                                        <th>Accessory</th>
                                                                        <th>1st Toilet</th>
                                                                        <th>2nd Toilet</th>
                                                                        <th>3rd Toilet</th>
                                                                        <th>4th Toilet</th>
                                                                        <th>5th Toilet</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <td style="color:blue">Wall Tiles</td>
                                                                        <td><input type="checkbox" id="toilet1_wall_tiles" name="toilet1_wall_tiles"></td>
                                                                        <td><input type="checkbox" id="toilet2_wall_tiles" name="toilet2_wall_tiles"></td>
                                                                        <td><input type="checkbox" id="toilet3_wall_tiles" name="toilet3_wall_tiles"></td>
                                                                        <td><input type="checkbox" id="toilet4_wall_tiles" name="toilet4_wall_tiles"></td>
                                                                        <td><input type="checkbox" id="toilet5_wall_tiles" name="toilet5_wall_tiles"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="color:orange">Mirror</td>
                                                                        <td><input type="checkbox" id="toilet1_mirror" name="toilet1_mirror"></td>
                                                                        <td><input type="checkbox" id="toilet2_mirror" name="toilet2_mirror"></td>
                                                                        <td><input type="checkbox" id="toilet3_mirror" name="toilet3_mirror"></td>
                                                                        <td><input type="checkbox" id="toilet4_mirror" name="toilet4_mirror"></td>
                                                                        <td><input type="checkbox" id="toilet5_mirror" name="toilet5_mirror"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="color:purple">Solar Light</td>
                                                                        <td><input type="checkbox" id="toilet1_solar_light" name="toilet1_solar_light"></td>
                                                                        <td><input type="checkbox" id="toilet2_solar_light" name="toilet2_solar_light"></td>
                                                                        <td><input type="checkbox" id="toilet3_solar_light" name="toilet3_solar_light"></td>
                                                                        <td><input type="checkbox" id="toilet4_solar_light" name="toilet4_solar_light"></td>
                                                                        <td><input type="checkbox" id="toilet5_solar_light" name="toilet5_solar_light"></td>
                                                                    </tr>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                
                                            
                                        </section>
                                        <h3>WHAT PROMPTED APPLICANT TO BUY A TOILET</h3>
                                        <section>
                                            
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="checkbox" id="prompted_by_New_Toilet" name="prompted_by_New_Toilet" style="width:3%">
                                                            <label for="prompted_by_New_Toilet">Saw New Toilet</label>

                                                            <input type="checkbox" id="prompted_by_Toilet_Promotor" name="prompted_by_Toilet_Promotor"style="width:3%">
                                                            <label for="prompted_by_Toilet_Promotor">Toilet Promotor</label>

                                                            <input type="checkbox" id="prompted_by_Toilet_Builder" name="prompted_by_Toilet_Builder"style="width:3%">
                                                            <label for="prompted_by_Toilet_Builder">Toilet Builder</label>

                                                            <input type="checkbox" id="prompted_by_Demo_Site" name="prompted_by_Demo_Site"style="width:3%">
                                                            <label for="prompted_by_Demo_Site">Demo Site</label>

                                                            <input type="checkbox" id="prompted_by_TV_Radio" name="prompted_by_TV_Radio"style="width:3%">
                                                            <label for="prompted_by_TV_Radio">TV or Radio</label>

                                                            <input type="checkbox" id="prompted_by_Printed_Media" name="prompted_by_Printed_Media"style="width:3%">
                                                            <label for="prompted_by_Printed_Media">Printed Media</label>

                                                            <input type="checkbox" id="prompted_by_Bill_board" name="prompted_by_Bill_board"style="width:3%">
                                                            <label for="prompted_by_Bill_board">Bill board</label>

                                                            <input type="checkbox" id="prompted_by_flier" name="prompted_by_flier"style="width:3%">
                                                            <label for="prompted_by_flier">Paper or Flier</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="checkbox" id="prompted_by_Neighbor_Relative" name="prompted_by_Neighbor_Relative" style="width:3%">
                                                            <label for="prompted_by_Neighbor_Relative">Neighbor/Relative</label>

                                                            <input type="checkbox" id="prompted_by_Kiosk_attendant" name="prompted_by_Kiosk_attendant"style="width:3%">
                                                            <label for="prompted_by_Kiosk_attendant">Water Kiosk attendant</label>

                                                            <input type="checkbox" id="prompted_by_Church_School" name="prompted_by_Church_School"style="width:3%">
                                                            <label for="prompted_by_Church_School">Church or School</label>

                                                            <input type="checkbox" id="prompted_by_Water_Office" name="prompted_by_Water_Office"style="width:3%">
                                                            <label for="prompted_by_Water_Office">Water Office</label>

                                                            <input type="checkbox" id="prompted_by_SMS" name="prompted_by_SMS"style="width:3%">
                                                            <label for="prompted_by_SMS">SMS</label>

                                                            <input type="checkbox" id="prompted_by_Legal_Enforce" name="prompted_by_Legal_Enforce"style="width:3%">
                                                            <label for="prompted_by_Legal_Enforce">Legal Enforce</label>

                                                            <input type="checkbox" id="prompted_by_Other" name="prompted_by_Other"style="width:3%">
                                                            <label for="prompted_by_Other">Other</label>

                                                            <label for="Other_specify">(Specify)</label>
                                                            <input type="text" id="prompted_by_Other_specify" name="prompted_by_Other_specify"style="width:10%">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </section>
                                        
                                        <!-- Confirm Details -->
                                        <h3>Confirm Detail</h3>
                                        <section>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <div class="mb-4">
                                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                        </div>
                                                        <div>
                                                            <h5>Confirm Detail</h5>
                                                            
                                                            <button type="submit" id="Submit" class="btn btn-btn btn-outline-primary w-md" value ="Submit">Submit</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        
                                    </div>
                                    
                                </div>
                            </form>   
                            
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
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

<!-- jquery step -->
<script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

<!-- form wizard init -->
<script src="assets/js/pages/form-wizard.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>