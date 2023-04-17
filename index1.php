<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["The_Sanitation_Project"]?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://kit.fontawesome.com/a6e2755b4d.js"crossorigin="anonymous"> </script>
    
    <style>
        .center 
        { text-align: center;
        width: 100%;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
        ['Filter1', 'Households'],
        <?php 
            $select_query = "select constituency.cname as Filter1, count(households.hhcode) as No_Of_HHs from households inner join
                constituency on households.con = constituency.id group by constituency.cname";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['Filter1']."',".$row_val['Households']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        var options = {
            title: 'Households Per Filter1',
            hAxis: {title: ''},
            vAxis: {title: 'No. Households'},
            legend: 'none',
            series: {
            0: { color: '#002364' },
            }
        };


        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.LineChart(document.getElementById('actual_hhs'));
        chart.draw(data, options);
        }
    </script> 

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; 
          include 'lib.php';
    ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
        <?php echo '<body style="background-color:greenyellow;">' ;?>
            <div class="container-fluid">                                     
                </div>

                <!-- start page title -->
                
                <!-- end page title -->
                <!-- start here -->
                <div class="row">
                    <div class="col-xl-6">
                        
                            <div class="card border border-success">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            
                                            <th>Track Unit</th>
                                            <th>Target</th>
                                            <th>Achieved</th>
                                            <th></th>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td><?php echo $language["Registered_HouseHolds"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where deleted = '0'"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum'];
                                                        
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td><?php echo $language["Verified_and_Accepted_Households"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where enrolled = '1'"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    
                                                    <td></td>                         
                                                </tr>
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $language["Households_with_Full_Payments"]?></td>
                                                    <?php
                                                        $hhCount = 0;
                                                        $query="select DISTINCT(tpayments.hhCode) from tpayments inner join households on tpayments.hhCode = households.hhcode  where ((tpayments.pApproved ='1') and (households.selected_product <> '00') and (households.enrolled = '1') and (households.product_approved = '1') and (households.agree_tcs = '1'))";
                                                        
                                                        if ($result_set = $link->query($query)) 
                                                        {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $hhcode = $row["hhCode"];
                                                                                                                                                                                                        
                                                                $result2 = mysqli_query($link, "SELECT SUM(amount_paid) AS total_paid FROM tpayments where ((hhCode ='$hhcode') and (pApproved ='1'))"); 
                                                                $row2 = mysqli_fetch_assoc($result2); 
                                                                $total_paid = $row2['total_paid'];

                                                                $pcost = product_cost($link,hh_selected_product($link,$hhcode));

                                                                if ($total_paid >= $pcost)
                                                                {
                                                                    $hhCount = $hhCount+1;
                                                                }

                                                            }
                                                        }
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($hhCount);?></td>
                                                    
                                                    <td></td>                         
                                                </tr>

                                                <tr>
                                                   
                                                    <td><?php echo $language["Households_Requesting_Technical_Guidance_on_Selection"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where (((need_tg = '1') or (need_tg = '1')) and (deleted = '0'))"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td><?php echo $language["Total_OSS_Sites_Handed_Over_to_Contractors"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(pID) AS value_total FROM tprojects"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $value_total = $row['value_total']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($value_total);?></td>
                                                    
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    
                                                    <td><?php echo $language["OSS_Works_on_Schedule"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs_l FROM tprojects where ((CURDATE() < pfinishdate) and (pstatus <> '05') and (pstatus <> '00'))"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $t_projs_l = $row['t_projs_l']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($t_projs_l);?></td>
                                                    
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    
                                                    <td><?php echo $language["OSS_Works_OUT_of_Schedule"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs FROM tprojects where ((CURDATE() > pfinishdate) and (pstatus <> '05'))"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $t_projs = $row['t_projs']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($t_projs);?></td>
                                                    
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    
                                                    <td><?php echo $language["OSS_Products_Handed_over_to_Households"]?></td>
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(pID) AS total_projs FROM tprojects where ((pstatus = '06') and (pdeleted = '0'))"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total_projs = $row['total_projs']; 
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($total_projs);?></td>
                                                    
                                                    <td></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                

                            </div>
                        
                        
                            
                    </div>
                    new
                    
                        
                        
                             
                                <div id="actual_hhs"></div> 
                         
                        
                        
                    
                    

                    
                </div>
                   
                <!-- end here -->
                
                    
            </div>
            <!-- container-fluid -->
        </div>

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
