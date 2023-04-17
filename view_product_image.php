<!DOCTYPE html>
<html>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<head>
	<title><?php echo $language["View_Toilet"];?></title>
	
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php if ($_SESSION["userrole"] == "04"){include 'layouts/vertical-menu_con.php';}else{include 'layouts/menu.php';}?>

    <style> 
        .card-border 
        {
            border-style: groove;
            border-color: gray;
            border-width: 8px;
        }
        .Mycell
        {
            background-color:red;
        }
        .card-border1 
        {
            border-style: solid;
            border-color: gray;
            border-width: 9px;
            background-color:gray;
            
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<body>

<?php
    $ID = $_GET["id"];

    $result = mysqli_query($link, "select pname, pdescription from tproducts where pID = $ID"); 
    $row = mysqli_fetch_assoc($result); 
    $pname = $row['pname']; $pdescription = $row['pdescription'];
?>
<div id="layout-wrapper">


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">



    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-5">
                    <p><B><h5>Image View For Toilet Product:</h5></B></p>
                    <h6 class="mb-sm-0 font-size-18"><?php echo $pname; echo " "; echo $pdescription;?></h6>
                    <p align="right">
                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">
                    </p>
                </div>
            </div>
	
            
                <div class ="row">
                    <div id="display-image">
                        <?php
                            $query = "select filename_ from tproducts where pID = $ID";
                            $result = mysqli_query($link, $query);

                            while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <img src="./uploads_products/<?php echo $data['filename_']; ?>" style="height: 400px; width: 440px; border-style: groove;border-color: gray;border-width: 8px;"/>

                        <?php
                            }
                        ?>
                    </div>
                </div>
           
        </div>
    </div>
</div>
</body>

</html>
