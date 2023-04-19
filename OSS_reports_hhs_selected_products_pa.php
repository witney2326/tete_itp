<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Filtered_Selected_Toilet"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: auto;
}
        .card-border {
            border-style: solid;
            border-color: greenyellow;
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

<script type="text/javascript">
    function Validate() {
        var bairro1 = document.getElementById("bairro");
        if (bairro1.value == "") {
            alert("Please Select Unidade option! (Selecione a opção Unidade!) ");
            return false;
        }
        return true;
    }
</script>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php 
     $admin_post = $_GET["admin_post"];  
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Filtered_Selected_Toilet"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card1">
                            <div class="card-border1">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="link" href="OSS_reports_hhs_selected_products.php" role="link">
                                                <span class="d-none d-sm-block"><?php echo $language["Selected_Toilet"]?></span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="link" href="javascript:void(0);" role="link">
                                                <span class="d-none d-sm-block"><?php echo $language["Filtered_Selected_Toilet"]?></span>
                                            </a>
                                        </li>
                                        
    
                                    </ul>
                                </div>
                            </div>

                            <div class="card-border">
                                <div class="card-body">
                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="OSS_reports_hhs_selected_products_bairro.php" method ="GET" >
                                        <div class="col-12">
                                            <label for="admin_post" class="form-label"><?php echo $language["Bairros"]?></label>
                                            <select class="form-select" name="admin_post" id="admin_post"  required>
                                            <option selected value="<?php echo $admin_post;?>"><?php echo ap_name($link,$admin_post);?></option>     
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="bairro" class="form-label"><?php echo $language["Unidade"]?></label>
                                            <select class="form-select" name="bairro" id="bairro" required>
                                                <option></option>
                                                    <?php                                                           
                                                        $dis_fetch_query = "SELECT id,bairro FROM bairros where admin_post ='$admin_post'";                                                  
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
                                            <button type="submit" class="btn btn-outline-primary w-md" name="Submit" value="Submit" onclick="return Validate()"><?php echo $language["Submit"]?></button>
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"]?>" onClick="history.go(-1);">  
                                        </div>
                                    </form>                                             
                                    <!-- End Here -->
                                </div>
                            </div>

                            <div class="card-border">

                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>

                                <div class="card-header bg-transparent border-primary">
                                    <p><center><h5 class="my-0 text-primary"><?php echo $language["Selected_Toilet"]?></h5></p></center>
                                    <p><center><h6 class="my-0 text-default"><?php echo ap_name($link,$admin_post);?>: <?php echo $language["Bairros"]?></h6></p></center>
                                </div>

                            

                            <div class="card-body">
                                
                                <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                    
                                    <img src="assets/images/logo_t.jpg" alt="" height="64" class="center">
                                    
                                    <thead>
                                        <tr>
                                            <th><?php echo $language["Selected_Toilet"]?></th>
                                            <th><?php echo $language["Number_Applicants"]?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?Php
                                            $query="SELECT selected_product, COUNT(hhcode) as applicants
                                            FROM households where ((enrolled ='1') and (product_approved = '1') and pa = '$admin_post') group by selected_product ";
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                
                                            echo "<tr>\n";
                                                echo "<td>".pname($link,$row["selected_product"])."</td>\n";
                                                echo "<td>".$row["applicants"]."</td>\n";
                                            echo "</tr>\n";
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