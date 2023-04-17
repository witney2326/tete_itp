<?php
include_once 'layouts/config.php';
    
    $apcode = $_GET["id"];
    
        $sql = "DELETE from adminposts where id = '$apcode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Admin Post Successfully Deleted!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            

?>