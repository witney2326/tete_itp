

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $hhID = $_POST['hhID'];
        $product = $_POST['product'];

        
        $query="select selected_product from households where hhcode='$hhID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $selected_product= $row["selected_product"];}
            $result_set->close();
        }
 
        if (($selected_product =='00'))
        {
            $sql = mysqli_query($link,"update households  SET  selected_product = '$product', current_status = '03' where hhcode = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Applicant Successfully Updated With Toilet Product! Requerente atualizado com sucesso com produto de toalete!");'; 
                echo 'history.go(-1)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }else

        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Applicant Already Selected a Toilet Product! O requerente já selecionou um produto de toalete!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    