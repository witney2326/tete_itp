<?php
include_once 'layouts/config.php';


if(isset($_POST['Add']))
{    
    $pcode = $_POST["pcode"];
    $apname= $_POST["apname"];   

        $sql = "INSERT INTO adminposts (id,pa_)
        VALUES ('$pcode','$apname')";

        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("New Admin Post Added Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>