<?php
include 'layouts/config.php';

if (isset($_POST['Submit'])) 
    {
        $hh_name=$_POST["hh_name"];
        $phone=$_POST["phone"];
        $bl_no=$_POST["bl_no"];
        $hh_id=$_POST["hh_id"];
        

        $query_up="UPDATE households set blno = '$bl_no', phone1 = '$phone', hhname = '$hh_name' where hhcode='$hh_id'";
        if ($result_set_up = $link->query($query_up))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Applicant Record Updated Successfully! Cadastro de Candidato Atualizado com Sucesso! ");'; 
                echo 'history.go(-2)';
                echo '</script>';
            } else {
                echo "Error: " . $query_up . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            
    }
?>