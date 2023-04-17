<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title><?php echo $language["Toilet_Works_Progress_Track"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
            .upload {
                display: inline-block;
                width: 18px; height: 18px;
                background-image: url('icons/new_upload.png');
                background-repeat: no-repeat;
                }
        .ico-upload { background-position: 0 0; }

            .view {
                display: inline-block;
                width: 18px; height: 18px;
                background-image: url('icons/view.png');
                background-repeat: no-repeat;
                }
        .ico-view { background-position: 0 0; }
    </style>
</head>

    <script type="text/javascript">
        dtep = {
            defaultDate: "today",
            disableMobile: "true"
        }
    </script>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>
<?php
       include "layouts/config.php"; // Using database connection file here
        
       $id = $_GET['id']; // get id through query string
      $query="select phhcode,pcontractorID,amount_owing,pstartdate,pfinishdate,tprojects.pstatus as cstatus from tprojects inner join households on tprojects.phhcode = households.hhcode where pID='$id'";
       
       if ($result_set = $link->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               
               $phhcode= $row["phhcode"];
               $pcontractorID = $row["pcontractorID"];
               $pCost= $row["amount_owing"];
              
               $pstartdate = $row["pstartdate"];
               $pfinishdate = $row["pfinishdate"];
               $pstatus = $row["cstatus"];

           }
           $result_set->close();
       }

    ?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php if ($_SESSION["userrole"] == "04")
    {
        echo include 'layouts/vertical-menu_con.php';
    } else if ($_SESSION["userrole"] == "05")
    {
        echo include 'layouts/vertical-menu_hh.php';
    } else
    { 
        echo include 'layouts/menu.php';
    }
?>
<?php include 'layouts/body.php'; ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-10">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Toilet_Works_Progress_Track"];?></h4>
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
                    <div class="col-10">
                        <div class="card">
                        
                            <div class="card-border1">
                                <div class="card-body">
                                    
                                    <form action ="hh_project_progressUpdate.php" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="proj_id" class="col-sm-2 col-form-label"><?php echo $language["Works_Code"];?></label>
                                            <input type="text" class="form-control" id="proj_id" name = "proj_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>

                                            <label for="hhcode" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Code"];?></label>
                                            <input type="text" class="form-control" id="hhcode" name="hhcode" value ="<?php echo $phhcode; ?>" style="max-width:30%;"readonly>
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="contractor" class="col-sm-2 col-form-label"><?php echo $language["Contractor"];?></label>
                                            <input type="text" class="form-control" id="contractor" name="contractor" value ="<?php echo $pcontractorID; ?>" style="max-width:30%;"readonly>

                                            <label for="pcost" class="col-sm-2 col-form-label"><?php echo $language["Product_Cost"];?></label>
                                            <input type="text" class="form-control" id="pcost" name ="pcost" value = "<?php echo number_format($pCost,2); ?>" style="max-width:30%;"readonly>
                                        </div>

                                                                                                                        
                                        <div class="row mb-1">
                                            <label for="pstartdate" class="col-sm-2 col-form-label"><?php echo $language["Start_Date"];?></label>
                                            <input type="text" class="form-control" id="pstartdate" name="pstartdate" value ="<?php echo $pstartdate; ?>" style="max-width:30%;"readonly>

                                            <label for="pfinishdate" class="col-sm-2 col-form-label"><?php echo $language["End_Date"];?></label>
                                            <input type="text" class="form-control" id="pfinishdate" name="pfinishdate" value =" <?php echo $pfinishdate; ?>" style="max-width:30%;"readonly>
                                        </div>
                                        
                                                                               
                                        <div class="row mb-1">
                                            <label for="pstatus" class="col-sm-2 col-form-label" style ="color:blue"><?php echo $language["Current_Status"];?></label>
                                            <input type="text" class="form-control" id="pstatus" name="pstatus" value =" <?php echo pstatus($link,$pstatus); ?>" style="max-width:30%;"readonly>

                                            
                                        </div>

                                        
                                        <div class="row mb-3">
                                            <label for="progress" class="col-sm-2 col-form-label"><?php echo $language["Works_Progress"];?></label>
                                            <select class="form-select" name="progress" id="progress" style="max-width:30%;" required >
                                                
                                                <?php                                                           
                                                        $ta_fetch_query = "SELECT id,status FROM tproject_status";                                                  
                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_ta["id"]; ?>">
                                                            <?php echo $DB_ROW_ta["status"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>

                                            <label for="achieved_date" class="col-sm-2 col-form-label"><?php echo $language["Date"];?></label>
                                            <input type="date" class="form-control" id="achieved_date" name="achieved_date"  style="max-width:30%;">
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary w-md" name="Update" value="Update" ><?php echo $language["Update_Works_Progress"];?></button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                
                            <div class="card-border">
                                <div class="card-body">
                                    
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        
                                    <thead>
                                        <tr>
                                            <th style="color:black"><b><?php echo $language["ID"];?></b></th>                                           
                                            <th style="color:black"><b><?php echo $language["Date"];?></b></th>
                                            <th style="color:black"><b><?php echo $language["Status"];?></b></th>
                                            <th style="color:black"><b><?php echo $language["Pictorial_View"];?></b></th>
                                            <th style="color:black"><b><?php echo $language["Action"];?></b></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?Php
                                            $query="select * from tproject_progress where projID = '$id'";                                                               
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                if (isset($row["filename_"]))
                                                {
                                                    $stat_view = $row["filename_"];
                                                }else
                                                {
                                                    $Color = "red";
                                                    $stat_view ="Not Uploaded";
                                                }
                                                
                                                echo "<tr>\n";
                                                    echo "<td>".$row["recID"]."</td>\n";
                                                    echo "<td>".$row["status_date"]."</td>\n";
                                                    echo "<td>".pstatus($link,$row["proj_status"])."</td>\n";
                                                    echo "<td>\t\t$stat_view</td>\n";
                                                    echo "<td>
                                                        <a href=\"view_status2.php?id=".$row['recID']."\"><i class='view ico-view' title='$language[Visual_Progress]' style='font-size:18px;color:purple'></i></a> 
                                                        <a href=\"upload.php?id=".$row['recID']."\"><i class='upload ico-upload' title='$language[Upload_Visual_Progress]' style='font-size:18px'></i></a>
                                                    </td>\n";
                                                    
                                                    
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