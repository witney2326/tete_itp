<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $pa_code = $_POST["pa_code"];
    $pname = $_POST["pname"];
    

        $sql = "UPDATE adminposts set pa_ ='$pname' where id = '$pa_code'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Admin Post Edited Successfully!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>