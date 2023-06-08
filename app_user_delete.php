<?php
include 'layouts/config.php';


    $id=$_GET["id"];
    

    $query_up="DELETE from users where id ='$id'";
    if ($result_set_up = $link->query($query_up))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("User Record Permanently Deleted! (Registro do usuário excluído permanentemente!) ");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $query_up . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
    
?>