<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Edit_Applicant"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'lib.php'; ?>

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




<?php
    include "layouts/config.php"; // Using database connection file here
    
    $id = $_GET['id']; // get id through query string
    $query="select * from households where hhcode='$id'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            $hhname= $row["hhname"];;
            $pa = $row["pa"];
            $locality= $row["locality"];
            $blno= $row["blno"];
            $plot = $row["plot"];
            $phone = $row["phone1"];
            
        }
        $result_set->close();
    }
?>
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Edit_Applicant"];?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php"><?php echo $language["Dashboard"];?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $language["Edit_Applicant"];?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <?php include 'layouts/body.php'; ?>
                <div class="col-lg-12">
                    
                    <div class="row mb-1">  
                        <div>
                            <p align="right">
                                
                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">
                            </p>
                        </div>
                    </div>

                    <div class="card-border1">
                        
                        <div class="card-body">
                            
                            <form novalidate action="uphh.php" method ="POST" >
                                <div class="row mb-1">
                                    <label for="hh_id" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Code"];?></label> 
                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>
                                    
                                    <label for="hh_name" class="col-sm-2 col-form-label"><?php echo $language["Applicant_Name"];?></label>
                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" >
                                </div>
                                                                        
                                <div class="row mb-1">
                                    <label for="region" class="col-sm-2 col-form-label"><?php echo $language["Bairros"];?></label>              
                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo ap_name($link,$pa) ; ?>" style="max-width:30%;" readonly>
                                    
                                    <label for="district" class="col-sm-2 col-form-label"><?php echo $language["Unidade"];?></label>
                                    <input type="text" class="form-control" id="district" name="district" value ="<?php locality_name($link,$locality); ?>" style="max-width:30%;" readonly>
                                </div>
                                                                        
                                                                        
                                <div class="row mb-1">
                                    
                                    <label for="plot" class="col-sm-2 col-form-label"><?php echo $language["Plot_No"];?></label>
                                    <input type="text" class="form-control" id="plot" name="plot" value =" <?php echo $plot ; ?>" style="max-width:30%;" readonly>
                                </div>
                                
                                <div class="row mb-1">
                                    <label for="phone" class="col-sm-2 col-form-label"><?php echo $language["Phone"];?></label>                          
                                    <input type="text" class="form-control" id="phone" name="phone" value =" <?php echo $phone ; ?>" style="max-width:30%;" >

                                    <label for="bl_no" class="col-sm-2 col-form-label"><?php echo $language["BL_No"];?></label>
                                    <input type="text" class="form-control" id="bl_no" name="bl_no" value ="<?php echo $blno ; ?>" style="max-width:30%;">                                           
                                </div>

                                <div class="row mb-1">  
                                    <div>
                                        
                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit"><?php echo $language["Submit"];?></button>
                                           
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        

    </div>
</div>