<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Works_Tracking"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
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

<script type="text/javascript">
    function Validate() {
        var bairro1 = document.getElementById("bairro");
        if (bairro1.value == "") {
            alert("Please Select Bairro option! (Selecione a opção Bairro!) ");
            return false;
        }
        return true;
    }
</script>

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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Works_Tracking"]?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php"><?php echo $language["Dashboard"]?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Works_Tracking"]?></li>
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
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Progress_Updates"]?></span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="link" data-bs-toggle="link" href="works_tracking_ongoing_projects.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Current_Works"]?></span>
                                                </a>
                                            </li>

                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="works_tracking_completed_projects.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Completed_Works"]?></span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="link" href="works_tracking_verified_completed_projects.php" role="link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block"><?php echo $language["Verified_Works"]?></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                    <p class="mb-0">
                                        <!--start here -->
                                        <div class="card-border">
                                            <div class="card-body">
                                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="works_tracking_filter2.php" method ="POST" >
                                                    <div class="col-12">
                                                        <label for="admin_post" class="form-label"><?php echo $language["Bairro"];?></label>
                                                
                                                        <select class="form-select" name="admin_post" id="admin_post" onChange="getbairro(this.value);"  required>
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
                                                        <label for="bairro" class="form-label"><?php echo $language["Unidade"];?> </label>
                                                        <select class="form-select" name="bairro" id="bairro" placeholder="Select Bairro" required>
                                                            <option ></option>
                                                            
                                                        </select>
                                                    </div>

                                                                                                       
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit" onclick="return Validate()"><?php echo $language["Submit"]?></button>
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"]?>" onClick="history.go(-1);">  
                                                    </div>
                                                </form>                                            
                                                <!-- End Here -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-border">
                                                
                                                <div class="card-body">
                                                
                                                    
                                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                        
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $language["Works_Code"]?></th>                                           
                                                                    <th><?php echo $language["Applicant_Code"]?></th>
                                                                    <th><?php echo $language["Start_Date"]?></th>
                                                                    <th><?php echo $language["Contractor"]?></th>
                                                                    <th><?php echo $language["Status"]?></th>
                                                                    <th><?php echo $language["Action"]?></th> 
                                                                    
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select * from tprojects where ((pstatus <> '05') or (pstatus <> '06'))";                                                               
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                       $pstatus = $row["pstatus"];
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                        echo "<td>".$row["phhcode"]."</td>\n";
                                                                        echo "<td>".$row["pstartdate"]."</td>\n";
                                                                        echo "<td>".contractor_name($link,$row["pcontractorID"])."</td>\n";
                                                                        echo "<td>".pstatus($link,$row["pstatus"])."</td>\n";

                                                                        if  ($pstatus == '00') 
                                                                        {  
                                                                            echo "<td>
                                                                                <a href=\"hh_View.php?id=".$row['phhcode']."\"><i class='fas fa-eye' title='$language[View_Applicant]' style='font-size:18px;color:purple'></i></a> 
                                                                                <a href=\"hh_project_progressTrack.php?id=".$row['pID']."\"><i class='fas fa-project-diagram' title='$language[Update_Works_Progress]' style='font-size:18px;color:black'></i></a>
                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Notify The Contractor?');\" href=\"contractor_notification_works_allocation.php?id=".$row['pcontractorID']."& hhcode=".$row['phhcode']."& sdate=".$row['pstartdate']."\"><i class='fa fa-bell' title='$language[Notify_Contractor]' style='font-size:18px;color:brown'></i></a> 
                                                                                <a href=\"works-handover-certificate.php?id=".$row['pID']."\"><i class='fas fa-print' title='$language[Handover_Certificate]' style='font-size:18px;color:black'></i></a>                                                
                                                                            </td>\n";
                                                                        }else
                                                                        {
                                                                            echo "<td>
                                                                                <a href=\"hh_View.php?id=".$row['phhcode']."\"><i class='fas fa-eye' title='$language[View_Applicant]' style='font-size:18px;color:purple'></i></a> 
                                                                                <a href=\"hh_project_progressTrack.php?id=".$row['pID']."\"><i class='fas fa-project-diagram' title='$language[Update_Works_Progress]' style='font-size:18px;color:black'></i></a> 
                                                                            </td>\n";
                                                                        }

                                                                       

                                                                    echo "</tr>\n";
                                                                    }
                                                                    $result_set->close();
                                                                    }  
                                                                                        
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        </p>
                                                    </div>
                                                </div>     
                                            </div>            
                                        </div>  
                                    </p>
                                </div>
                                    <!-- Here -->
                                    
                                

                            </div>
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
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