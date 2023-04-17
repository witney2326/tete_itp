
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"];?></title>
    
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    
    <style> 
        .card-border 
        {
            border-style: groove;
            border-color: gray;
            border-width: 9px;
        }
        .Mycell
        {
            background-color:red;
        }
        .card-border1 
        {
            border-style: solid;
            border-color: gray;
            border-width: 4px;
            background-color:white;
            
        }
    </style>

    
</head>

<?php
    include 'layouts/body.php';
    include 'layouts/Config.php';

    $statusMsg = '';

    $ID = $_GET["id"];

    // File upload path

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $targetDir = "uploads_products/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database

                $insert="UPDATE tproducts set filename_ = '$fileName' where pID=$ID";
                if ($result_set_up = $link->query($insert))
                {
                    $statusMsg = "The Picture File ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "Picture upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your Picture.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please Select Works Status Picture to upload.';
    }

    // Display status message
    echo '<p>';
    echo $statusMsg;

        echo '<div id="display-image">';
            
                $query = " select filename_ from tproducts where pID =$ID ";
                $result = mysqli_query($link, $query);
        
                $data = mysqli_fetch_assoc($result);
                echo '<img src="./uploads_products/'; echo $data['filename_']; 
        echo '</div>';
?>

<body>   
    <!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>
    <?php include 'lib.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid"> 
            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:100px" VALUE="Back" onClick="history.go(-1);">  
                                    
                <div class = "col-lg-6">
                    <div class ="row">
                        <div class="card">
                            <div class="card-border">     

                                <form action="" method="post" enctype="multipart/form-data">
                                    <br>
                                    <p>Select Picture File to Upload:</p>
                                    <input type="file" name="file">
                                    <input type="submit" name="submit" value="Upload">
                                </form>
                            </div>
                            <div class="card-border1"> 
                                <?php
                                    echo $statusMsg;
                                    echo " ";
                                    echo '<div id="display-image">';
                                        
                                            $query = " select filename_ from tproject_progress where recID = '$ID' ";
                                            $result = mysqli_query($link, $query);
                                    
                                            $data = mysqli_fetch_assoc($result);
                                            if (isset($data)){echo '<img src="./uploads_products/'; echo $data['filename_'];}else{echo "No Status Picture";} 
                                    echo '</div>';       
                                ?>
                               
                            </div>

                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>
</body>