<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["View_Applicant"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
<?php include 'layouts/config.php'; ?>
<?php include 'lib.php'; ?>
<?php
        $id = $_GET['id']; // get id through query string
        $query="select * from households where hhcode='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $hhname= $row["hhname"];               
                 $blno = $row["blno"];
                 $landmark= $row["landmark"];
                 $plot= $row["plot"];
                 $phone= $row["phone1"];
                 $phone2= $row["phone2"];
                 $locality= $row["locality"];
                 $product= $row["selected_product"];
                 $homestatus= $row["homestatus"]; 
                 $pa= $row["pa"];
                 $hh_gender= $row["hh_gender"];
                 $hh_status= $row["hh_status"];
                 $rooms_rented= $row["rooms_rented"];
                 $no_pple_premises= $row["no_pple_premises"];
                 $current_latrine= $row["current_toilet"]; 
                 $contractor= $row["contractor"];
                 $current_status= $row["current_status"]; 
                 $enrolled= $row["enrolled"];
                 $email= $row["email"];
                 $lat= $row["lat"];
                 $longi= $row["longi"]; 
                 $total_ordered= $row["total_ordered"]; 
                 $supestructure= $row["supestructure"];

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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["View_Applicant"];?>: <?php if (isset($hhname)) {echo $hhname;}else{echo "Applicant's Name Missing";}?></h4>
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

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-border1">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $language["Applicant_Details"]?></a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo $language["Applicant_Payments"]?></a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><?php echo $language["Selected_Toilet"]?></a>
                                            <a class="nav-link mb-2" id="v-pills-messages2-tab" data-bs-toggle="pill" href="#v-pills-messages2" role="tab" aria-controls="v-pills-messages2" aria-selected="false"><?php echo $language["Toilet_Order"]?></a>
                                            <a class="nav-link mb-2" id="v-pills-mycs-tab" data-bs-toggle="pill" href="#v-pills-mycs" role="tab" aria-controls="v-pills-mycs" aria-selected="false"><?php echo $language["Works_Progress"]?></a>
                                            <a class="nav-link mb-2" id="v-pills-mjsg-tab" data-bs-toggle="pill" href="#v-pills-mjsg" role="tab" aria-controls="v-pills-mjsg" aria-selected="false">Works Certificate</a>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card-border">
                                                        <h5 class="card-title mt-0"> <?php echo $language["Applicant_Details"];?></h5>   
                                                            <div class="col-lg-11">
                                                                <div class="row mb-1">
                                                                    <label for="hh_id" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Applicant_Code"]?></label> 
                                                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="hh_name" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Applicant_Name"]?></label>
                                                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php if (isset($hhname)) {echo $hhname ;}else{echo "";} ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="adminpost" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Bairros"];?></label>
                                                                    <input type="text" class="form-control" id="adminpost" name="adminpost" value ="<?php echo ap_name($link,$pa); ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="locality" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Unidade"]?></label>
                                                                    <input type="text" class="form-control" id="locality" name="locality" value ="<?php if (isset($locality)) {echo locality_name($link,$locality) ;}else{echo "";}?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="plot" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Plot_No"]?></label>                          
                                                                    <input type="text" class="form-control" id="plot" name="plot" value =" <?php if (isset($plot)) {echo $plot ;}else{echo "";} ?>" style="max-width:30%;" disabled ="True">

                                                                    <label for="landmark" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Landmark"]?></label>
                                                                    <input type="text" class="form-control" id="landmark" name="landmark" value =" <?php if (isset($landmark)) {echo $landmark ;}else{echo "";} ?>" style="max-width:30%;" disabled ="True">                                           
                                                                </div>                                  
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="gender" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Applicant_Gender"]?></label>              
                                                                    <input type="text" class="form-control" id="gender" name="gender" value ="<?php if (isset($hh_gender)){ if($hh_gender == "01"){echo "Male";}else{echo "Female";}}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="phone2" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Contact_Phones"]?> </label>
                                                                    <input type="text" class="form-control" id="phone2" name="phone2" value =" <?php if ((isset($phone)) or (isset($phone2))) {echo $phone; echo "/";echo $phone2;} else{echo "Not Set";}?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="no_people" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["No_People_at_Premises"];?></label>              
                                                                    <input type="text" class="form-control" id="no_people" name="no_people" value ="<?php if (isset($no_pple_premises)){echo $no_pple_premises;}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="blno" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["BL_No"]?></label>              
                                                                    <input type="text" class="form-control" id="blno" name="blno" value ="<?php if (isset($blno)) {echo $blno ;}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="Homestatus" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Home_Status"];?></label>              
                                                                    <input type="text" class="form-control" id="Homestatus" name="Homestatus" value ="<?php if (isset($hh_status)){echo hh_homestatus($link,$hh_status);}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="zonename" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Rooms_Rented"]?></label>
                                                                    <input type="text" class="form-control" id="zonename" name="zonename" value =" <?php if (isset($rooms_rented)){echo $rooms_rented;}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="latrine" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Current_Toilet"]?></label>              
                                                                    <input type="text" class="form-control" id="latrine" name="latrine" value ="<?php if (isset($current_latrine)){echo current_toilet($link,$current_latrine);}else{echo "Not Set";}?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="enrolled" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Verified_Accepted"]?></label>
                                                                    <input type="text" class="form-control" id="enrolled" name="enrolled" value =" <?php if (isset($enrolled)){if ($enrolled == '1'){echo "Yes";}else{echo "No";}}else{echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="contractor" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Contractor_Allocated"]?></label>              
                                                                    <input type="text" class="form-control" id="contractor" name="contractor" value ="<?php if (isset($contractor)){echo $contractor;}else{echo "Not Allocated";} ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    
                                                                    <label for="current_status" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Current_Status"]?></label>
                                                                    <input type="text" class="form-control" id="current_status" name="current_status" value =" <?php if (isset($current_status)){echo hh_status($link,$current_status);}else{echo "Not Set";}?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <label for="lat" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Latitude"]?></label>              
                                                                    <input type="text" class="form-control" id="lat" name="lat" value ="<?php if ($lat == 0){echo "Not Set";}else{echo $lat;}?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    
                                                                    <label for="longi" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["Longitude"]?></label>
                                                                    <input type="text" class="form-control" id="longi" name="longi" value =" <?php if ($longi == "0"){echo "Not Set";}else{echo $longi;}?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="email" class="col-sm-2 col-form-label" style="color:blue"><?php echo $language["email"]?></label>              
                                                                    <input type="text" class="form-control" id="email" name="email" value ="<?php if ($email == ""){echo "Not Set";}else{echo $email;}?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card-border">
                                                            <div class="col-lg-12">

                                                                <div class="card-header bg-transparent border-primary">
                                                                    <?php
                                                                        $result = mysqli_query($link, "SELECT SUM(amount_paid) AS value_total FROM tpayments where hhCode ='$id'"); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total_savings = $row['value_total'];
                                                                    ?>
                                                                    <h5 class="my-0 text-default"><?php echo $language["Applicant_Payments"]?>: <?php echo number_format($total_savings,2); ?> </h5>
                                                                    
                                                                </div>
                                                                <div class="card-body">
                                                                <h5 class="card-title mt-0"></h5>
                                                                
                                                                    <div class="table-responsive">
                                                                                        
                                                                        <table id = "mytable" class="table table-striped mb-0">
                                                                        
                                                                            <thead>
                                                                                <tr>   
                                                                                    <th>Payment_ID</th>                                              
                                                                                    <th>Date</th>                                                                                               
                                                                                    <th>Reference</th>
                                                                                    <th>Amount Paid</th>
                                                                                    <th>Payment Status</th>
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
                                                                                        if  ($row["pApproved"] == "1"){$pApproved = "Approved";}else{$pApproved = "Not Approved";}
                                                                                    echo "<tr>\n";                                           
                                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                                        echo "<td>".$row["pDate"]."</td>\n";
                                                                                        echo "<td>".$row["pReference"]."</td>\n";
                                                                                        echo "\t\t<td>$amount</td>\n";
                                                                                        echo "<td>\t\t$pApproved</td>\n";

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
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> <?php echo $language["Selected_Toilet"]?></h5>
                                                            <div class="card-header bg-transparent border-primary">
                                                                
                                                                <h6 class="my-0 text-default"><?php echo $language["Toilet_Type"]?>: <?php if ($product == '00'){echo $language["Toilet_Option_Not_Selected"];}else {echo pname($link,$product);} ?> </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p> 
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages2-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> <?php echo $language["Toilet_Order"]?></h5>
                                                            <div class="card-header bg-transparent border-primary">
                                                                
                                                                
                                                                <div class="row mb-1">
                                                                    <label for="contractor" class="col-sm-2 col-form-label" style="color:blue">Number Of Toilets</label>              
                                                                    <input type="text" class="form-control" id="contractor" name="contractor" value ="<?php echo $total_ordered;?>" style="max-width:30%;" disabled ="True">
                                                                </div>   
                                                                <div class="row mb-1">
                                                                    <label for="current_status" class="col-sm-2 col-form-label" style="color:blue">Type Of Super structure</label>
                                                                    <input type="text" class="form-control" id="current_status" name="current_status" value ="<?php echo superstructure($link,$supestructure);?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </p> 
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mycs" role="tabpanel" aria-labelledby="v-pills-mycs-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> <?php echo $language["Works_Progress"]?></h5>

                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                            <thead>
                                                                <tr>
                                                                    <th><?php $language["Works_Code"]?></th>                                           
                                                                    <th><?php $language["Start_Date"]?></th>
                                                                    <th><?php $language["End_Date"]?></th>
                                                                    <th><?php $language["Contractor"]?></th>
                                                                    <th><?php $language["Status"]?></th>
 
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?Php
                                                                    $query="select * from tprojects where phhcode = '$id'";                                                               
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                       
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["pID"]."</td>\n";
                                                                        echo "<td>".$row["pstartdate"]."</td>\n";
                                                                        echo "<td>".$row["pfinishdate"]."</td>\n";
                                                                        echo "<td>".contractor_name($link,$row["pcontractorID"])."</td>\n";
                                                                        echo "<td>".pstatus($link,$row["pstatus"])."</td>\n";
                                                                        
                                                                    echo "</tr>\n";
                                                                    }
                                                                    $result_set->close();
                                                                    }  
                                                                                                     
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mjsg" role="tabpanel" aria-labelledby="v-pills-mjsg-tab">
                                                <p>
                                                    <div class="card-border">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Project Completion Certificate</h5>
                                                              
                                                            

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
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