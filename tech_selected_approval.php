<?php
    include "layouts/config.php";     
    
    $hhID = $_GET['id']; 

    $query="select product_approved, selected_product from households where hhcode='$hhID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $product_approved= $row["product_approved"];$selected_product= $row["selected_product"];}
        $result_set->close();
    }

    $query_pamount = mysqli_query($link, "SELECT pCost as toilet_cost FROM tproducts where pID = '$selected_product'"); 
    $row_query_pamount = mysqli_fetch_assoc($query_pamount); 
    $toilet_cost = $row_query_pamount['toilet_cost'];

     
    if (($product_approved =='0'))
    {
        $sql = mysqli_query($link,"update households  SET product_approved = '1', amount_owing= '$toilet_cost', current_status = '04' where hhcode = '$hhID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Technology Selection Approved successfully !");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Technology Already Approved!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>