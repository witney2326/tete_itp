<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Technical_Guidance_Record"]?></title>
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
    </style>

</head>

<?php include 'layouts/body.php'; ?>
<?php
       include "layouts/config.php";    
    
    $Rec_ID = $_GET['id']; 

    $result = mysqli_query($link, "SELECT hhname,plot,phone1 FROM households where hhcode = '$Rec_ID'"); 
    $row = mysqli_fetch_assoc($result); 
    $hhname = $row['hhname'];$plot = $row["plot"];$phone = $row["phone1"];
         
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Technical_Guidance_Record"]?></h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="<?php echo $language["Back"]?>" onClick="history.go(-1);">
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
                                <div class="card-header bg-transparent border-success">
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="record_hh_tech_guide.php">
                                        <div class="row mb-1">
                                            <label for="hhcode" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Code"]?></label>
                                            <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $Rec_ID;?>"  style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Name"]?></label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value ="<?php  if (isset($hhname)){echo $hhname;}?>"  style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="plotno" class="col-sm-2 col-form-label"><?php echo $language["Plot_No"]?></label>
                                            <input type="text" class="form-control" id="plotno" name="plotno" value="<?php if (isset($plot)){echo $plot;}?>" style="max-width:30%;" readonly>
                                        
                                            <label for="phone" class="col-sm-2 col-form-label"><?php echo $language["Contact_Phones"]?></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php if (isset($phone)){echo $phone;}?>"  style="max-width:30%;" readonly >
                                        </div>

                                        <div class="row mb-1">
                                            <label for="rdate" class="col-sm-2 col-form-label"><?php echo $language["Date"]?></label>
                                            <input type="date" class="form-control" id="rdate" name="rdate" style="max-width:30%;" >

                                            <label for="supervisor" class="col-sm-2 col-form-label"><?php echo $language["Rendered_By"]?></label>
                                            <input type="text" class="form-control" id="supervisor" name="supervisor" style="max-width:30%;" >
                                        </div>  

                                        <div class="row mb-1">
                                            <label for="tg" class="col-sm-2 col-form-label"><?php echo $language["Technical_Guidance_Rendered"]?></label>
                                            <input type="textarea" class="form-control" id="tg" name="tg" style="max-width:80%;"  >

                                        </div>
                                                                    
                                                                                
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-info w-md" name="Add" value="Add"><?php echo $language["Record_Guidance_Rendered"]?></button>
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