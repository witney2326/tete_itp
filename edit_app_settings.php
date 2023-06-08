<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Edit_Parameter"];?></title>
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
       

        $result = mysqli_query($link, "SELECT * FROM tconfig where id = '$id'"); 
        $row = mysqli_fetch_assoc($result); 
        $cmail= $row["cmail"];
        $chost= $row["chost"];
        $cpass= $row["cpass"];
       
       
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
                    <div class="col-6">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Edit_Parameter"];?></h4>
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
                        <div class="col-lg-6">
                            <div class="card1">
                                <div class="card-border1">
                                    <div class="card-header bg-transparent border-success">
                                        
                                    </div>
                                    <div class="card-body">
                                        
                                        <form method="POST" action="app_settings_save.php">
                                            <div class="row mb-1">
                                                <label for="paramID" class="col-sm-3 col-form-label"><?php echo $language["Parameter_ID"];?></label>
                                                <input type="text" class="form-control" id="paramID" name = "paramID" value="<?php echo $id;?>" style="max-width:10%;" readonly >
                                            </div> 
                                            <div class="row mb-1">
                                                <label for="mail" class="col-sm-3 col-form-label"><?php echo $language["Email"];?></label>
                                                <input type="text" class="form-control" id="mail" name = "mail" value="<?php echo $cmail;?>"  style="max-width:30%;">
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label for="host" class="col-sm-3 col-form-label"><?php echo $language["Host"];?></label>
                                                <input type="text" class="form-control" id="host" name="host" value="<?php echo $chost;?>" style="max-width:30%;">
                                            </div>

                                            <div class="row mb-3">
                                                <label for="pass" class="col-sm-3 col-form-label"><?php echo $language["Password"];?></label>
                                                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $cpass;?>" style="max-width:30%;">
                                            </div>
                                                        
                                                                                    
                                            <div class="row justify-content-end">
                                                <div>
                                                    
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Edit" value="Add"><?php echo $language["Edit_Parameter"];?></button>
                                                    
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