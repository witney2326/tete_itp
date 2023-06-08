<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["roles"];?></title>
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
            background-color: plum;
            color: white;}
    
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>


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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["roles"];?></h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card1">
                            <div class="card-border1">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["users"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="sysadmin1_contractors.php" role="link">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["contractors"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active"  href="#home-1" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["roles"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_regions.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Bairros"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_districts.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Unidade"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_buscats.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Toilet_Products"];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link"  href="sysadmin1_tas.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block"><?php echo $language["Project_Settings"];?></span>
                                            </a>
                                        </li>
                                    </ul> 
                                </div>
                            </div>

                                
                            <div class="card-border">
                                <div class="card-body">
                                    <h7 class="card-title mt-0"></h7>
                                    
                                    <table id="mytable" class="table table-bordered dt-responsive  nowrap w-100">
                                    
                                        <thead>
                                            <tr>
                                                <th><?php echo $language["ID"];?></th>
                                                <th><?php echo $language["Role"];?></th>
                                                <th><?php echo $language["Action"];?></th>                                                              
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?Php
                                                $query = "SELECT * FROM userroles";

                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    echo "<tr>";
                                                    echo "<td>".$row['roleid']."</td>";
                                                    echo "<td>".$row['rolename']."</td>"; 

                                                    echo "<td>
                                                        
                                                        <a onClick=\"javascript: return confirm('$language[Sure_Delete_Role]');\" href=\"del_role.php?id=".$row['roleid']."\"><button class='btn btn-sm btn-outline-secondary' title='$language[Delete_Role]' style='font-size:18px;color:Red'><i class='fas fa-trash-alt'></i></button></a>
                                                        </td>\n";
                                                    echo "</tr>";
                                                }
                                                $result_set->close();
                                                }  
                                                                    
                                            ?>
                                        </tbody>
                                    </table>
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