<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Applicant_Payments"];?></title>
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
</head>

<?php include 'layouts/body.php'; ?>
<?php
      include "layouts/config.php"; // Using database connection file here

      
         
      $id = $_GET['id']; // get id through query string
     $query="select * from households where hhcode='$id'";
      
      if ($result_set = $link->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 

              $plot = $row["plot"];
              $phone= $row["phone1"];
              $hhname = $row["hhname"];
              $locality = $row["locality"];
              $pa = $row["pa"];
              $selected_product = $row["selected_product"];
              
          }
          $result_set->close();
      }

      
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
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Applicant_Payments"];?></h4>
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
                                    
                                    <form method="POST" action="hh_payments_update.php">
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Code"];?></label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="hhname" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Name"];?></label>
                                            <input type="text" class="form-control" id="hhname" name = "hhname" value="<?php echo $hhname; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="pa" class="col-sm-2 col-form-label"><?php echo $language["Bairros"];?></label>
                                            <input type="text" class="form-control" id="pa" name="pa" value ="<?php echo ap_name($link,$pa);?>" style="max-width:30%;" readonly>
                                        
                                            <label for="locality" class="col-sm-2 col-form-label"><?php echo $language["Unidade"];?></label>
                                            <input type="text" class="form-control" id="locality" name="locality" value ="<?php echo locality_name($link,$locality);?>" style="max-width:30%;" readonly>
                                        </div>

                                                                             
                                        <div class="row mb-1">
                                            <label for="pdate" class="col-sm-2 col-form-label"><?php echo $language["Date"];?></label>
                                            <input type="date" class="form-control" id="pdate" name="pdate"  style="max-width:30%;">
                                            
                                            <label for="amount" class="col-sm-2 col-form-label"><?php echo $language["Amount_Paid"];?></label>
                                            <input type="text" class="form-control" id="amount" name="amount"  style="max-width:30%;">
                                        </div>

                                        <div class="row mb-1">
                                            <label for="pref" class="col-sm-2 col-form-label"><?php echo $language["Reference"];?></label>
                                            <input type="text" class="form-control" id="pref" name="pref"  style="max-width:30%;">
                                            
                                            
                                        </div>

                                                                                
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Submit" value="Submit"><?php echo $language["Submit"];?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-border">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><?php echo $language["Applicant_Payments"];?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        
                                            <table id="mytable" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $language["ID"];?></th>                                              
                                                        <th><?php echo $language["Date"];?></th>                                                                                               
                                                        <th><?php echo $language["Reference"];?></th>
                                                        <th><?php echo $language["Amount_Paid"];?></th>
                                                        <th><?php echo $language["Status"];?></th>
                                                        <th><?php echo $language["Action"];?></th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?Php
                                                            $id = $_GET['id'];
                                                            $query="select * from tpayments where hhCode ='$id';";
                                                                                                
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            {                                                
                                                                $amount = number_format($row["amount_paid"],"2");
                
                                                            echo "<tr>\n";                                           
                                                                echo "<td>".$row["pID"]."</td>\n";
                                                                echo "<td>".$row["pDate"]."</td>\n";
                                                                echo "<td>".$row["pReference"]."</td>\n";
                                                                echo "\t\t<td>$amount</td>\n";
                                                                echo "<td>".$row["pApproved"]."</td>\n";
                                                                
                                                                
                                                                echo "<td>
                                                                    
                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"javascript:void(0)?id=".$row['pID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
                                                                </td>\n";
                                                            echo "</tr>\n";
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