<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Toilet_Works_Schedule"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
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
        .card1
            {
                background-color: rgba(0, 0, 0, 0.2);
            }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php
       include "layouts/config.php";
               
       $id = $_GET['id'];
       $query="select * from households where hhcode ='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
              $blno = $row["blno"];
              $pa = $row["pa"];
              $locality = $row["locality"];
              $plot = $row["plot"];
              $phone= $row["phone1"];
              $hhname = $row["hhname"];
              $selected_product = $row["selected_product"];
              
            }
            
        }
  
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Toilet_Works_Schedule"];?></h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card-border1">
                                <div class="card-body">
                                    
                                    <form method="POST" action="hh_project_schedule.php">
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Code"];?></label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Name"];?></label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value="<?php echo $hhname;?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="ap" class="col-sm-2 col-form-label"><?php echo $language["Bairro"];?></label>
                                            <input type="text" class="form-control" id="ap" name="ap" value ="<?php echo ap_name($link,$pa);?>" style="max-width:30%;" readonly>
                                        
                                            <label for="locality" class="col-sm-2 col-form-label"><?php echo $language["Unidade"];?> </label>
                                            <input type="text" class="form-control" id="locality" name="locality" value ="<?php echo locality_name($link,$locality);?>" style="max-width:30%;" readonly>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="blno" class="col-sm-2 col-form-label"><?php echo $language["BL_No"];?></label>
                                            <input type="text" class="form-control" id="blno" name="blno" value ="<?php echo $blno;?>" style="max-width:30%;" readonly>
                                        
                                            <label for="plot" class="col-sm-2 col-form-label"><?php echo $language["Plot_No"];?></label>
                                            <input type="text" class="form-control" id="plot" name="plot" value ="<?php echo $plot ; ?>" style="max-width:30%;" readonly>
                                        </div>

                                                                             
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label"><?php echo $language["Phone"];?></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value ="<?php echo $phone?>" style="max-width:30%;" readonly>
                                            
                                            <label for="product" class="col-sm-2 col-form-label"><?php echo $language["Selected_Toilet"];?></label>
                                            <input type="text" class="form-control" id="product" name="product" value ="<?php echo pname($link,$selected_product);?>" style="max-width:30%;" readonly>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="contractor" class="col-sm-3 col-form-label" style="color:blue"> <?php echo $language["Select_Contractor"];?></label>
                                            
                                            
                                                <select class="form-select" name="contractor" id="contractor" style="max-width:22%;background-color:LightGray;"  required>
                                                    <option ></option>
                                                        <?php                                                           
                                                            $slg_fetch_query = "SELECT id,cname FROM tcontractor";                                                  
                                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                                            ?>
                                                            <option  value="<?php echo $DB_ROW_slg["id"]; ?>">
                                                                <?php echo $DB_ROW_slg["cname"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                        </div>

                                        <div class="row mb-4"><h6 style="color:black"><?php echo $language["Allocate_Schedule_Contractor"];?></h6></div>
                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Start_Date"];?></label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;background-color:LightGray;">

                                            <label for="finishdate" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["End_Date"];?></label>
                                            <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;background-color:LightGray;">
                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Allocate" value="Allocate"><?php echo $language["Schedule_Toilet_Works"];?></button>
                                            </div>
                                        </div>
                                    </form>
                                    
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

</body>

</html>