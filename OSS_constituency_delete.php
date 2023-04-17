<?php
include_once 'layouts/config.php';
    
    $concode = $_GET["id"];
    
        $sql = "DELETE from constituency where id = '$concode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("City Area Deleted Successfully!");'; 
        echo 'window.location.href = "sysadmin1_regions.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>