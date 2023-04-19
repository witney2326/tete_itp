
<?php
    include "layouts/config.php";    
    
    $Rec_ID = $_GET['id']; 

    $query="select enrolled from households where hhcode='$Rec_ID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $prog_status = $row["enrolled"];}
        $result_set->close();
    }

    if ($prog_status =='0') 
    {
        $sql = mysqli_query($link,"update households  SET enrolled = '1', current_status= '02', agree_tcs = '1' where hhcode = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Applicant Verified and Accepted Successfully!  Requerente verificado e aceito com sucesso!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Applicant Already Aceepted and Verified! Requerente já aceito e verificado!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>
    
