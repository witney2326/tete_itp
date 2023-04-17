<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
<title><?php echo $language["Add_New_Beneficiary_Household"];?></title>
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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to Select this OSS Product?");
        if (agree)
        return true ;
        else
        return false ;
        }   
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
            #mytable {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #mytable td, #mytable th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #mytable tr:nth-child(even){background-color: #f2f2f2;}

            #mytable tr:hover {background-color: #ddd;}

            #mytable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: gray;
            color: white;}
</style>

    <script>
      function getbairro(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_bairro.php",
            data:'apID='+val,
            success: function(data)
                    {
                    $("#bairro").html(data);
                    }
                });
        }

        function getArea(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_area.php",
                data:'wardid='+val,
                success: function(data){
                $("#area").html(data);
                }
                });
            }

    </script>
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

            .gumba1 { 
                background-color: #f2f2f2; 
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Application_For_Household_Toilet"];?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index_check.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Register_Household"]?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card1">
                            <div class="card-border1"> 
                                <div class="card-body">

                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
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
                                            <a class="nav-link" data-bs-toggle="link" href="enrolled_ben.php" role="link">
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
                            <div class="card-border"> 
                                <form class="row row-cols-lg-auto g-3 align-items-center" validate action="register_new_beneficiary_hh_tq.php" method ="POST">
                                    <div class="card-body">
                                    
                                        <div id="vertical-example" class="horizontal-wizard">
                                            
                                            <h3><?php echo $language["Applicant_Details"];?></h3>
                                            <section>
                                                
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-1">
                                                                <label for="applicant_name" style="color:blue"><?php echo $language["Applicant_Name"];?></label>
                                                                <input type="text" class="form-control" id="applicant_name" name ="applicant_name" style="max-width:50%; background-color: #f2f2f2;" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-1">
                                                                <p style="color:blue"><?php echo $language["Applicant_Gender"];?></p>
                                                                <input type="radio" id="male" name="gender" value="01" checked = "true">
                                                                <label for="male"><?php echo $language["Male"];?></label>
                                                                <input type="radio" id="female" name="gender" value="02">
                                                                <label for="female"><?php echo $language["Female"];?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-1">
                                                                <label for="blno" style="color:blue"><?php echo $language["BL_No"];?></label>
                                                                <input type="text" class="form-control" id="blno" name="blno" style="max-width:50%;background-color: #f2f2f2;" >
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="email" style="color:blue"><?php echo $language["Email"];?></label>
                                                                <input type="text" class="form-control" id="email" name="email" style="max-width:50%;background-color: #f2f2f2;" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-1">
                                                                <label for="phoneno1" style="color:blue" ><?php echo $language["Contact_Phones"];?>1</label>
                                                                <input type="text" class="form-control" id="phoneno1" name="phoneno1" style="max-width:50%;background-color: #f2f2f2;">
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="phoneno2" style="color:blue"><?php echo $language["Contact_Phones"];?>2</label>
                                                                <input type="text" class="form-control" id="phoneno2" name="phoneno2" style="max-width:50%;background-color: #f2f2f2;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-1">
                                                                <label for="plotno" style="color:blue"><?php echo $language["Plot_No"];?></label>
                                                                <input type="text" class="form-control" id="plotno" name="plotno" style="max-width:50%;background-color: #f2f2f2;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-1">
                                                                
                                                                <label for="adminpost" class="form-label" style="color:blue"><?php echo $language["Bairro"]?></label>
                                                
                                                                <select class="form-select" name="adminpost" id="adminpost" style="max-width:30%;background-color: #f2f2f2;" onChange="getbairro(this.value);" required>
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
                                                            
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-1">
                                                                <label for="bairro" class="form-label" style="color:blue"><?php echo $language["Unidade"];?> </label>
                                                                <select class="form-select" name="bairro" id="bairro" placeholder="Select Unidade" style="max-width:50%;background-color: #f2f2f2;" required>
                                                                    <option ></option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-1">
                                                                <label for="landmark" style="color:blue"><?php echo $language["Nearest_School_Or_Well_Known_Landmark"];?></label>
                                                                <input type="text" class="form-control" id="landmark" name="landmark" style="max-width:44%;background-color: #f2f2f2;" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </section>

                                            <!-- Company Document -->
                                            <h3><?php echo $language["Household_Details"];?></h3>
                                            <section>
                                            
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-1">
                                                                <p style="color:blue"><?php echo $language["Select_ONE_of_THREE"];?>:</p>
                                                                <input type="radio" id="homeowner_no_tenant" name="hh_status" value="01" checked = "true">
                                                                <label for="homeowner_no_tenant"><?php echo $language["Home_Owner"];?></label><br>
                                                                <input type="radio" id="resident_landlord" name="hh_status" value="02">
                                                                <label for="resident_landlord"><?php echo $language["Resident_Landlord"];?></label><br>
                                                                <input type="radio" id="absent_landlord" name="hh_status" value="03">
                                                                <label for="absent_landlord"><?php echo $language["Absent_Landlord"];?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-1">

                                                                <p style="color:blue"><?php echo $language["Rooms_Rented"];?>:</p>
                                                                <input type="number" min="0" max="20" value="0" id="no_rooms_rented" name="no_rooms_rented" style="width:15%">
                                                                <label for="no_rooms_rented"></label><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-1">

                                                                <p style="color:blue"><?php echo $language["Current_Toilet"];?>:</p>
                                                                <input type="radio" id="upl" name="current_toilet_type" value="01" >
                                                                <label for="upl"><?php echo $language["Unlined_Pit_Latrine"];?></label><br>

                                                                <input type="radio" id="slpl" name="current_toilet_type" value="02">
                                                                <label for="slpl"><?php echo $language["Semi_lined_Pit_Latrine"];?></label><br>

                                                                <input type="radio" id="flpl" name="current_toilet_type" value="03">
                                                                <label for="flpl"><?php echo $language["Fully_Lined_Pit_Latrine"];?></label><br>

                                                                <input type="radio" id="none" name="current_toilet_type" value="04" checked = "true">
                                                                <label for="none"><?php echo $language["None"];?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-1">

                                                                <p style="color:blue"><?php echo $language["Requested_Toilet_Type"];?>:</p>
                                                                <input type="radio" id="vip" name="ordered_toilet_type" value="01">
                                                                <label for="vip"><?php echo $language["VIP"];?></label><br>

                                                                <input type="radio" id="pour_flush" name="ordered_toilet_type" value="02">
                                                                <label for="pour_flush"><?php echo $language["Pour_Flash_Septic_Tank"];?></label><br>

                                                                <input type="radio" id="flush_flush" name="ordered_toilet_type" value="03">
                                                                <label for="flush_flush"><?php echo $language["Flush_Flush_Septic_Tank"];?></label><br>

                                                                <input type="radio" id="tg" name="ordered_toilet_type" value="04" checked = "true">
                                                                <label for="tg"><?php echo $language["Dont_Know"];?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-1">
                                                                <input type="number" id="no_pple_at_premises" name="no_pple_at_premises" style="width:10%">
                                                                <label for="no_pple_at_premises"><?php echo $language["No_People_at_Premises"];?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="mb-1">
                                                                <input type="number" id="no_pple_adult_males" name="no_pple_adult_males" style="width:8%">
                                                                <label for="no_pple_adult_males"><?php echo $language["Adult_Males"];?></label>

                                                                <input type="number" id="no_pple_adult_females" name="no_pple_adult_females" style="width:8%">
                                                                <label for="no_pple_adult_females"><?php echo $language["Adult_Females"];?></label>

                                                                <input type="number" id="no_pple_children" name="no_pple_children" style="width:8%">
                                                                <label for="no_pple_children"><?php echo $language["Children_Under_5"];?></label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                
                                                
                                            </section>

                                            <!-- Bank Details -->
                                            <h3><?php echo $language["Toilet_Order"];?></h3>
                                            <section>
                                                
                                                    
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="no_toilets_order"><?php echo $language["Toilet_No"];?></label>
                                                                    <input type="number" min="1" max="5" value="1" id="no_toilets_order" name="no_toilets_order" style="width:8%">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label style="color:blue"><?php echo $language["Type_Super_structure"];?></label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="radio" id="blocks" name="super_structure_order" checked value="01">
                                                                    <label for="blocks"><?php echo $language["Blocks"];?></label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="radio" id="bricks" name="super_structure_order" value="02">
                                                                    <label for="bricks"><?php echo $language["Bricks"];?></label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="radio" id="prefab" name="super_structure_order" value="03">
                                                                    <label for="prefab"><?php echo $language["Prefab"];?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-7">
                                                                <div class="mb-3">
                                                                    <b><?php echo $language["Accesories_Requested"];?></b>
                                                                    <table id ="mytable" style="width:100%">
                                                                        
                                                                        <tr>
                                                                            <th><?php echo $language["Accesory"];?></th>
                                                                            <th><?php echo $language["First_Toilet"];?></th>
                                                                            <th><?php echo $language["Second_Toilet"];?></th>
                                                                            <th><?php echo $language["Third_Toilet"];?></th>
                                                                            <th><?php echo $language["Fourth_Toilet"];?></th>
                                                                            <th><?php echo $language["Fifth_Toilet"];?></th>

                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:blue"><?php echo $language["Wall_Tiles"];?></td>
                                                                            <td><input type="checkbox" id="toilet1_wall_tiles" name="toilet1_wall_tiles" value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet2_wall_tiles" name="toilet2_wall_tiles"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet3_wall_tiles" name="toilet3_wall_tiles"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet4_wall_tiles" name="toilet4_wall_tiles"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet5_wall_tiles" name="toilet5_wall_tiles"value = "1"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:black"><?php echo $language["Mirror"];?></td>
                                                                            <td><input type="checkbox" id="toilet1_mirror" name="toilet1_mirror"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet2_mirror" name="toilet2_mirror"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet3_mirror" name="toilet3_mirror"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet4_mirror" name="toilet4_mirror"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet5_mirror" name="toilet5_mirror"value = "1"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:purple"><?php echo $language["Solar_Light"];?></td>
                                                                            <td><input type="checkbox" id="toilet1_solar_light" name="toilet1_solar_light"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet2_solar_light" name="toilet2_solar_light"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet3_solar_light" name="toilet3_solar_light"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet4_solar_light" name="toilet4_solar_light"value = "1"></td>
                                                                            <td><input type="checkbox" id="toilet5_solar_light" name="toilet5_solar_light"value = "1"></td>
                                                                        </tr>
                                                                    </table> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                
                                            </section>
                                            <h3><?php echo $language["Toilet_Prompt"];?></h3>
                                            <section>
                                                
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <input type="checkbox" id="prompted_by_New_Toilet" name="prompted_by_New_Toilet" style="width:3%">
                                                                <label for="prompted_by_New_Toilet"><?php echo $language["Saw_New_Toilet"];?></label>

                                                                <input type="checkbox" id="prompted_by_Toilet_Promotor" name="prompted_by_Toilet_Promotor"style="width:3%">
                                                                <label for="prompted_by_Toilet_Promotor"><?php echo $language["Toilet_Promotor"];?></label>

                                                                <input type="checkbox" id="prompted_by_Toilet_Builder" name="prompted_by_Toilet_Builder"style="width:3%">
                                                                <label for="prompted_by_Toilet_Builder"><?php echo $language["Toilet_Builder"];?></label>

                                                                <input type="checkbox" id="prompted_by_Demo_Site" name="prompted_by_Demo_Site"style="width:3%">
                                                                <label for="prompted_by_Demo_Site"><?php echo $language["Demo_Site"];?></label>

                                                                <input type="checkbox" id="prompted_by_TV_Radio" name="prompted_by_TV_Radio"style="width:3%">
                                                                <label for="prompted_by_TV_Radio"><?php echo $language["TV_Radio"];?></label>

                                                                <input type="checkbox" id="prompted_by_Printed_Media" name="prompted_by_Printed_Media"style="width:3%">
                                                                <label for="prompted_by_Printed_Media"><?php echo $language["Printed_Media"];?></label>

                                                                <input type="checkbox" id="prompted_by_Bill_board" name="prompted_by_Bill_board"style="width:3%">
                                                                <label for="prompted_by_Bill_board"><?php echo $language["Bill_board"];?></label>

                                                                <input type="checkbox" id="prompted_by_flier" name="prompted_by_flier"style="width:3%">
                                                                <label for="prompted_by_flier"><?php echo $language["Paper_Flier"];?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <input type="checkbox" id="prompted_by_Neighbor_Relative" name="prompted_by_Neighbor_Relative" style="width:3%">
                                                                <label for="prompted_by_Neighbor_Relative"><?php echo $language["Neighbor_Relative"];?></label>

                                                                <input type="checkbox" id="prompted_by_Kiosk_attendant" name="prompted_by_Kiosk_attendant"style="width:3%">
                                                                <label for="prompted_by_Kiosk_attendant"><?php echo $language["Water_Kiosk_attendant"];?></label>

                                                                <input type="checkbox" id="prompted_by_Church_School" name="prompted_by_Church_School"style="width:3%">
                                                                <label for="prompted_by_Church_School"><?php echo $language["Church_School"];?></label>

                                                                <input type="checkbox" id="prompted_by_Water_Office" name="prompted_by_Water_Office"style="width:3%">
                                                                <label for="prompted_by_Water_Office"><?php echo $language["Water_Office"];?></label>

                                                                <input type="checkbox" id="prompted_by_SMS" name="prompted_by_SMS"style="width:3%">
                                                                <label for="prompted_by_SMS"><?php echo $language["SMS"];?></label>

                                                                <input type="checkbox" id="prompted_by_Legal_Enforce" name="prompted_by_Legal_Enforce"style="width:3%">
                                                                <label for="prompted_by_Legal_Enforce"><?php echo $language["Legal_Enforce"];?></label>

                                                                <input type="checkbox" id="prompted_by_Other" name="prompted_by_Other"style="width:3%">
                                                                <label for="prompted_by_Other"><?php echo $language["Other"];?></label>

                                                                <label for="Other_specify"><?php echo $language["Specify"];?></label>
                                                                <input type="text" id="prompted_by_Other_specify" name="prompted_by_Other_specify"style="width:10%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </section>
                                            
                                            <!-- Confirm Details -->
                                            <h3><?php echo $language["Toilet_Prompt"];?></h3>
                                            <section>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="text-center">
                                                            <div class="mb-4">
                                                                <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                            </div>
                                                            <div>
                                                                <h5><?php echo $language["Toilet_Prompt"];?></h5>
                                                                
                                                                <button type="submit" id="Submit" class="btn btn-btn btn-outline-primary w-md" value ="Submit"><?php echo $language["Submit"];?></button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>   
                            
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