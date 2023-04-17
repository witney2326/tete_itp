<?php
include_once 'layouts/config.php';

if(isset($_POST['Submit']))
{    
    $hh_code = $_POST["hhcode"];
    $lat_input= $_POST["lat_input"];
    $long_input = $_POST['long_input'];

    if ((is_numeric($lat_input)) and (is_numeric($long_input)))
    {
        $sql = "UPDATE households set lat = '$lat_input', longi = '$long_input' where hhcode = '$hh_code'";

        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Applicant toilet Site has Been updated successfully with GeoPoints (O site do toalete do candidato foi atualizado com sucesso com GeoPoints) !");'; 
            echo 'history.go(-2)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    } else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Geopoints NOT Captured, Please Capture GeoPoints (Geopoints NÃO capturados, capture GeoPoints) !");'; 
        echo 'history.go(-1)';
        echo '</script>';
    }
    mysqli_close($link);
}

?>