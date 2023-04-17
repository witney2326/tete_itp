<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $bcode = $_POST["bcode"];
    $bname= $_POST["bname"];   
    $apcode = $_POST["apcode"];

        $sql = "INSERT INTO bairros (id,admin_post,bairro)
        VALUES ('$bcode','$apcode','$bname')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New Bairros Added Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>