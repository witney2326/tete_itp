<?php
    include 'layouts/config.php';
    if(!empty($_POST["apID"])) 
    {
        $id=$_POST["apID"];
        
        $stmt = mysqli_query($link,"SELECT id,bairro FROM bairros WHERE admin_post ='$id'");
        ?><option selected="selected"></option><?php
        while($row=mysqli_fetch_array($stmt))
        {
        ?>
        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['bairro']); ?></option>
        <?php
        }
    }
?>