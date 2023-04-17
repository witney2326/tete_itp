<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $bcode = $_POST["bcode"];
    $bname = $_POST["bname"];
    $pa = $_POST["pa"];
    

        $sql = "UPDATE bairros set bairro ='$bname',admin_post ='$pa' where id = '$bcode'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Bairro Edited Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>