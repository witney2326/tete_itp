<?php
include_once 'layouts/config.php';
    
    $bcode = $_GET["id"];
    
        $sql = "DELETE from bairros where id = '$bcode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Bairro Deleted Successfully!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>