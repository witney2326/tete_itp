<?php
include_once 'layouts/config.php';

if(isset($_POST['Submit']))
{    
    $hh_id = $_POST["hh_id"];
    $amount= $_POST["amount"];
    $pref = $_POST['pref'];
    $pdate = $_POST['pdate'];

    $result = mysqli_query($link, "SELECT amount_owing, tamount_paid FROM households where hhcode = '$hh_id'"); 
    $row = mysqli_fetch_assoc($result); 
    $amount_owing = $row['amount_owing'];$amount_paid = $row['tamount_paid'];

    $total_paid = $amount_paid+$amount;
    $balance = $amount_owing -$total_paid;
        
    if ($balance >= 0)
    {
        $sql = "INSERT INTO tpayments (hhCode,amount_paid,pReference,pDate)
        VALUES ('$hh_id','$amount','$pref','$pdate')";

        $sql2 = "UPDATE households set current_status = '05', tamount_paid = '$total_paid' where hhcode = '$hh_id'";

        if ((mysqli_query($link, $sql)) and (mysqli_query($link, $sql2))) {
            echo '<script type="text/javascript">'; 
                echo 'alert("HH Payment Record has been added successfully !");'; 
                echo 'history.go(-2)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    }else
    {
        echo '<script type="text/javascript">'; 
            echo 'alert("Current Payment Bigger than Balance !");'; 
            echo 'history.go(-2)';
        echo '</script>';
    }
}


?>