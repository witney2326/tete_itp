<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["The_Sanitation_Project"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .nav-link active 
    {
        background-color: yellowgreen !important;
        border: none !important;
        border-width:0!important;
    }
    .card-border 
    {
        border-style: solid;
        border-color: yellowgreen;
    }
</style>
</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<?php
$hhCode = $_SESSION["hhid"];
?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php include 'layouts/menu_hh.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">                                     
                </div>
                <!-- start page title -->
                <div class="row">
                        
                    </div>
                <!-- end page title -->
                    <div class="row">
                        <div class="col-4">                   
                            <div class="card">
                                <div class="card-border">
                                    <div class="card-group">
                                        <div class="card-border">
                                            <div class="card-body">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium"><h5><?php echo $language["Household_Current_Status"];?></h5></p>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT current_status  FROM households where hhcode = '$hhCode'"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $current_status = $row['current_status'];
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border">
                                            <div class="card-body">                                                  
                                                <h5 class="mb-0">
                                                    <div class="mb-0"><?php echo "" . hh_status($link,$current_status);?></div>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                    
                    
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
