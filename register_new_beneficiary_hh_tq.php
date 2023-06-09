<?php
include_once 'layouts/config.php';
session_start();

$nameErr = $emailErr = $blnoErr = $plotErr = $landmarkErr = $phoneno1Err = $plotnoErr = $no_pple_at_premisesErr = FALSE;
    
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($_POST["applicant_name"])) {
    $nameErr = TRUE;
  } else {$applicant_name = test_input($_POST["applicant_name"]);}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = TRUE;
    } else {$email = test_input($_POST["email"]);}
 
if ((strlen($_POST["blno"])) <> 13) {
    $blnoErr = TRUE;
    } else 
    { $blno = test_input($_POST["blno"]);}
    

if ((strlen($_POST["phoneno1"])) <> 14) {
    $phoneno1Err = TRUE;
    } else 
    { $phoneno1 = test_input($_POST["phoneno1"]);}

if (empty($_POST["plotno"])) {
    $plotnoErr = TRUE;
    } else {$plotno = test_input($_POST["plotno"]);}

if (empty($_POST["landmark"])) {
    $landmarkErr = TRUE;
    } else {$landmark = test_input($_POST["landmark"]);}

if ((empty($_POST["no_pple_at_premises"])) OR ($_POST["no_pple_at_premises"]== 0)) {
    $no_pple_at_premisesErr = TRUE;
    } else {$no_pple_at_premises = test_input($_POST["no_pple_at_premises"]);}



     //$applicant_name = $_POST['applicant_name'];
     $gender = $_POST["gender"];
     //$blno = $_POST["blno"];
     //$phoneno1 = $_POST["phoneno1"];
     $phoneno2 = $_POST["phoneno2"];
     //$plotno = $_POST["plotno"];
     $adminpost = $_POST["adminpost"];
     $bairro = $_POST["bairro"];
     //$landmark = $_POST["landmark"];
     $hh_status = $_POST["hh_status"];
     //$email = $_POST["email"];

     $no_rooms_rented = $_POST["no_rooms_rented"];

     $current_toilet_type = $_POST["current_toilet_type"];

     $ordered_toilet_type = $_POST["ordered_toilet_type"];
     
     if ($ordered_toilet_type == "04"){$ready_select = '0';$need_tg ='1'; $ordered_toilet_type = "00";}else{$ready_select ='1';$need_tg ='0';}

     //$no_pple_at_premises = $_POST["no_pple_at_premises"];
     $no_pple_adult_males = $_POST["no_pple_adult_males"];
     $no_pple_adult_females = $_POST["no_pple_adult_females"];
     $no_pple_children = $_POST["no_pple_children"];

     $no_toilets_order = $_POST["no_toilets_order"]; 

     $super_structure_order = $_POST["super_structure_order"];


    if (isset($_POST["prompted_by_New_Toilet"])){$prompted_by_New_Toilet = $_POST["prompted_by_New_Toilet"];}else{ $prompted_by_New_Toilet=0;} 
    if (isset($_POST["prompted_by_Toilet_Promotor"])){$prompted_by_Toilet_Promotor = $_POST["prompted_by_Toilet_Promotor"];}else{ $prompted_by_Toilet_Promotor=0;} 
    if (isset($_POST["prompted_by_Toilet_Builder"])){$prompted_by_Toilet_Builder = $_POST["prompted_by_Toilet_Builder"];}else{ $prompted_by_Toilet_Builder=0;} 
    if (isset($_POST["prompted_by_Demo_Site"])){$prompted_by_Demo_Site = $_POST["prompted_by_Demo_Site"];}else{ $prompted_by_Demo_Site=0;} 
    if (isset($_POST["prompted_by_TV_Radio"])){$prompted_by_TV_Radio = $_POST["prompted_by_TV_Radio"];}else{ $prompted_by_TV_Radio=0;} 
     
   
    if (isset($_POST["prompted_by_Printed_Media"])){$prompted_by_Printed_Media = $_POST["prompted_by_Printed_Media"];}else{ $prompted_by_Printed_Media=0;} 
    if (isset($_POST["prompted_by_Bill_board"])){$prompted_by_Bill_board = $_POST["prompted_by_Bill_board"];}else{ $prompted_by_Bill_board=0;} 
    if (isset($_POST["prompted_by_flier"])){$prompted_by_flier = $_POST["prompted_by_flier"];}else{ $prompted_by_flier=0;} 
    if (isset($_POST["prompted_by_Neighbor_Relative"])){$prompted_by_Neighbor_Relative = $_POST["prompted_by_Neighbor_Relative"];}else{ $prompted_by_Neighbor_Relative=0;} 
    if (isset($_POST["prompted_by_Kiosk_attendant"])){$prompted_by_Kiosk_attendant = $_POST["prompted_by_Kiosk_attendant"];}else{ $prompted_by_Kiosk_attendant=0;}
     
  
    if (isset($_POST["prompted_by_Church_School"])){$prompted_by_Church_School = $_POST["prompted_by_Church_School"];}else{ $prompted_by_Church_School=0;}
    if (isset($_POST["prompted_by_Water_Office"])){$prompted_by_Water_Office = $_POST["prompted_by_Water_Office"];}else{ $prompted_by_Water_Office=0;}
    if (isset($_POST["prompted_by_SMS"])){$prompted_by_SMS = $_POST["prompted_by_SMS"];}else{ $prompted_by_SMS=0;}
    if (isset($_POST["prompted_by_Legal_Enforce"])){$prompted_by_Legal_Enforce = $_POST["prompted_by_Legal_Enforce"];}else{ $prompted_by_Legal_Enforce=0;}
    if (isset($_POST["prompted_by_Other"])){$prompted_by_Other = $_POST["prompted_by_Other"];$prompted_by_Other_specify = $_POST["prompted_by_Other_specify"];}else{ $prompted_by_Other=0;$prompted_by_Other_specify="";}
    
     
     function get_hh_count($link)
     {
        $sql = "SELECT * FROM households";
        $mysqliStatus = $link->query($sql);
        $rows_count_value = mysqli_num_rows($mysqliStatus);
        return $rows_count_value;   
     }
      
    $dbcount= sprintf("%06d", get_hh_count($link)+1);
    $x=date("Y");		
    $x.="/TMC/";				
    $x.=$dbcount;
    $hhcode = $x;
    $pstatus = 0;
    $enrolled = 0;
    $current_status = '01';

    $_SESSION['hhid'] = $hhcode;
    $_SESSION['aemail'] = $email;

    if ($emailErr OR $nameErr OR $blnoErr OR $phoneno1Err OR $plotnoErr OR $landmarkErr OR $no_pple_at_premisesErr) 
    {
        echo '<script type="text/javascript">'; 
            echo 'alert("EITHER Invalid email format OR Missing Applicant Name OR BL_Number OR Phone_number OR Plot_Number OR number of people at Premises");'; 
            echo 'history.go(-1)';
        echo '</script>';
    }else
    {
    
        $sql = "INSERT INTO households (hhcode, hhname, hh_gender,blno, plot,pa, locality, landmark, hh_status,phone1,phone2,total_ordered, supestructure,prompted_by,rooms_rented,no_pple_premises,no_pple_premises_a_males,no_pple_premises_a_females,no_pple_premises_children,current_toilet,selected_product,ready_selection,need_tg,email)
        VALUES ('$hhcode','$applicant_name','$gender','$blno','$plotno','$adminpost','$bairro','$landmark','$hh_status','$phoneno1','$phoneno2','$no_toilets_order','$super_structure_order','01','$no_rooms_rented','$no_pple_at_premises',
        '$no_pple_adult_males','$no_pple_adult_females','$no_pple_children','$current_toilet_type','$ordered_toilet_type','$ready_select','$need_tg','$email')";

        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Application Received Successfully !");'; 
            echo 'window.location.href = "auth-register-hh5-1.php";';
            //echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    }



    
?>