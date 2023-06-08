<?php
include_once 'layouts/config.php';

if(isset($_POST['Edit']))
{    
    
    $paramID = $_POST["paramID"];
    $mail = $_POST["mail"];
    $host = $_POST["host"];
    $pass = $_POST["pass"];
    

        $sql = "UPDATE tconfig set cmail ='$mail', chost = '$host', cpass = '$pass' where id = '$paramID'";
        
        if (mysqli_query($link, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Email Configuration Edited Successfully! Configuração de e-mail editada com sucesso!");'; 
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>