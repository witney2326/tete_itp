<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"];?></title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?> 
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style> 
        .card-border 
        {
            border-style: groove;
            border-color: gray;
            border-width: 12px;
        }
        .Mycell
        {
            background-color:red;
        }
        #mytable {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #mytable td, #mytable th {
            border: 1px solid #ddd;
            padding: 12px;
            }

            #mytable tr:nth-child(even){background-color: #f2f2f2;}

            #mytable tr:hover {background-color: #ddd;}

            #mytable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: plum;
            color: black;}
        
    </style>

    
</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->


<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    
    ['Admin_Post', 'No_Of_Applicants'],
    <?php 
        $select_query = "select adminposts.pa_ as Admin_Post, count(households.hhcode) as No_Of_Applicants from households inner join
        adminposts on households.pa = adminposts.id where (households.enrolled ='1') group by adminposts.pa_;";

        $query_result = mysqli_query($link,$select_query);
        while($row_val = mysqli_fetch_array($query_result)){               
            echo "['".$row_val['Admin_Post']."',".$row_val['No_Of_Applicants']."],";
            
        }
    ?>       
    ]);
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Verified Applicants Distribution', 'width':490, 'height':250};
    var options = {
            title: '<?php echo $language["Verified_Applicants"];?>', 
            hAxis: {title: ''},
            vAxis: {title: '<?php echo $language["No_Applicants"];?>'},
            legend: 'none',
            backgroundColor: '#dfe8e0',
            series: {
            0: { color: '3f5b14' },
          }};
    var chart = new google.visualization.ColumnChart(document.getElementById('Registered_HHs'));
    chart.draw(data, options);
    
    }
</script> 

<script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
        ['Admin_Post', 'No_Of_projs'],
        <?php 
            $select_query = "select adminposts.pa_ as Admin_Post, count(tprojects.pID) as No_Of_projs from tprojects inner join
            households on households.hhcode = tprojects.phhcode inner join adminposts on households.pa = adminposts.id where tprojects.pstatus = '06'
             group by adminposts.pa_";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['Admin_Post']."',".$row_val['No_Of_projs']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        var options = {
            title: '<?php echo $language["Completed_Toilet_Works"];?>',
            hAxis: {title: ''},
            vAxis: {title: '<?php echo $language["No_Applicants"];?>'},
            legend: 'none',
            backgroundColor: '#838784', 
            series: {
            0: { color: '#002364' },
            }
        };


        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.LineChart(document.getElementById('completed_works'));
        chart.draw(data, options);
        }
    </script> 

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Admin_Post', 'No_Of_projs'],
        
        <?php 
            $select_query = "select adminposts.pa_ as Admin_Post, count(tprojects.pID) as No_Of_projs from tprojects inner join
            households on households.hhcode = tprojects.phhcode inner join adminposts on households.pa = adminposts.id
             group by adminposts.pa_";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
            echo "['".$row_val['Admin_Post']."',".$row_val['No_Of_projs']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Current Toilet Works', 'width':490, 'height':250};

        var options = {
            title: '<?php echo $language["Current_Toilet_Works"];?>',
            hAxis: {title: ''},
            vAxis: {title: '<?php echo $language["No_OSS_Works"];?>'}, 
            legend: 'none',
            backgroundColor: '#b2b8b3',
            series: {
            0: { color: 'd421e0' },
          }
        };

        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.ColumnChart(document.getElementById('current_works'));
        chart.draw(data, options);
        }
    </script> 





<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>
    <?php include 'lib.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid"> 
            <div class="card-border">                                    
                <div class ="row">
                    <div class="col-xl-6">
                        
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id ="mytable" class="table table-striped mb-0">
                                        
                                        <th><?php echo $language["Indicator"];?></th>
                                        <th><?php echo $language["Target"];?></th>
                                        <th><?php echo $language["Achieved"];?></th>
                                        <th><?php echo $language["Progress"];?>%</th>
                                        <tbody>
                                            <tr>
                                                
                                                <td><?php echo $language["Registered_Applicants"]?></td>
                                                <?php
                                                    $target_result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '04'"); 
                                                    $target_row = mysqli_fetch_assoc($target_result); 

                                                    if (isset($target_row['pvalue'])){$pvalue = $target_row['pvalue'];}else{$pvalue = 1;}
                                                    
                                                    $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where deleted = '0'"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $sum_registered = $row['value_sum'];
                                                    
                                                    $target = $pvalue;

                                                    if ($target <= 0)
                                                    {$rate = 0;}else
                                                    {$rate = ($sum_registered/$target)*100;}
                                                ?>
                                                <td><?php  echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($sum_registered);?></td> 
                                                <?php
                                                    
                                                    if ($rate < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate >= 50) and ($rate < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                
                                                <td><?php echo $language["Verified_and_Accepted_Applicants"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(hhcode) AS sum_verified FROM households where enrolled = '1'"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $sum_verified = $row['sum_verified']; 

                                                    $target = $sum_registered;
                                                    if ($target <= 0)
                                                    {$rate_v = 0;}else
                                                    {$rate_v = ($sum_verified/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($sum_verified);?></td>
                                                
                                                <?php
                                                    if ($rate_v < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_v,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_v >= 50) and ($rate_v < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_v,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_v >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_v,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>                                          
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td><?php echo $language["Applicants_with_Full_Payments"]?></td>
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
                                                    $target = $sum_verified;
                                                    if ($target <= 0)
                                                    {$rate_fp = 0;}else
                                                    {$rate_fp = ($hhCount/$target)*100;}
                                                    
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($hhCount);?></td>
                                                
                                                <?php
                                                    if ($rate_fp < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_fp,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_fp >= 50) and ($rate_fp < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_fp,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_fp >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_fp,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>                         
                                            </tr>

                                            <tr>
                                                
                                                <td><?php echo $language["Applicants_Requesting_Technical_Guidance_on_Selection"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(hhcode) AS value_sum FROM households where (((need_tg = '1') or (need_tg = '1')) and (deleted = '0'))"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $sum = $row['value_sum']; 

                                                    $target = $sum_verified;
                                                    if ($target <= 0)
                                                    {$rate_tg = 0;}else
                                                    {$rate_tg = ($sum/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($sum);?></td>
                                                
                                                <?php
                                                    if ($rate_tg < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_tg,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_tg >= 50) and ($rate_tg < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_tg,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_tg >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_tg,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                
                                                <td><?php echo $language["Total_Sites_Handed_Over_to_Contractors"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(pID) AS value_total FROM tprojects"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $value_total_ho = $row['value_total']; 

                                                    $target = $sum_verified;
                                                    if ($target <= 0)
                                                    {$rate_ho = 0;}else
                                                    {$rate_ho = ($value_total_ho/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($value_total_ho);?></td>
                                                
                                                <?php
                                                    if ($rate_ho < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_ho,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_ho >= 50) and ($rate_ho < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_ho,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_ho >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_ho,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                
                                                <td><?php echo $language["Works_on_Schedule"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs_l FROM tprojects where ((CURDATE() < pfinishdate) and (pstatus <> '05') and (pstatus <> '00'))"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $t_projs_l = $row['t_projs_l']; 

                                                    $target = $value_total_ho;
                                                    if ($target <= 0)
                                                    {$rate_os = 0;}else
                                                    {$rate_os = ($t_projs_l/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($t_projs_l);?></td>
                                                
                                                <?php
                                                    if ($rate_os < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_os,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_os >= 50) and ($rate_os < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_os,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_os >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_os,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                
                                                <td><?php echo $language["Works_OUT_of_Schedule"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(pID) AS t_projs FROM tprojects where ((CURDATE() > pfinishdate) and (pstatus <> '05'))"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $t_projs = $row['t_projs']; 

                                                    $target = $value_total_ho;
                                                    if ($target <= 0)
                                                    {$rate_pos = 0;}else
                                                    {$rate_pos = ($t_projs/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($t_projs);?></td>
                                                
                                                <?php
                                                    if ($rate_pos < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_pos,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_pos >= 50) and ($rate_pos < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_pos,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_pos >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_pos,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                
                                                <td><?php echo $language["Toilets_Handed_Over_to_Applicants"]?></td>
                                                <?php
                                                    $result = mysqli_query($link, "SELECT COUNT(pID) AS total_projs FROM tprojects where ((pstatus = '06') and (pdeleted = '0'))"); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $total_projs = $row['total_projs']; 

                                                    $target = $value_total_ho;
                                                    if ($target <= 0)
                                                    {$rate_completed = 0;}else
                                                    {$rate_completed = ($total_projs/$target)*100;}
                                                ?>
                                                <td><?php echo number_format($target);?></td>
                                                <td><?php echo "" . number_format($total_projs);?></td>
                                                <?php
                                                    if ($rate_completed < 50)
                                                    {
                                                        echo '<td><span style="color: red">';
                                                            echo round($rate_completed,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    } else if (($rate_completed >= 50) and ($rate_completed < 70))
                                                    {
                                                        echo '<td><span style="color: amber">';
                                                            echo round($rate_completed,2); 
                                                            echo '%';
                                                        echo '</td></span>';  
                                                    }else if (($rate_completed >= 70))
                                                    {
                                                        echo '<td><span style="color: green">';
                                                            echo round($rate_completed,2); 
                                                            echo '%';
                                                        echo '</td></span>'; 
                                                    }
                                                ?>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-6">
                                <div id="Registered_HHs"></div> 
                                <hr size="4" width="90%" color="green"> 
                                <div id="current_works"></div>
                                <hr size="4" width="90%" color="green"> 
                                <div id="completed_works"></div> 
                                <hr size="4" width="90%" color="green"> 
                        </div>

                    </div>
                </div>
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
