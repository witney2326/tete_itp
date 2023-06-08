<!DOCTYPE html>
<html>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<head>
	<title><?php echo $language["Visual_Progress"];?></title>
	
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
        img
        {
            background-image:url('./assets/images/no image.jpg');
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>
<body>
<div id="layout-wrapper">


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">



    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-4">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo $language["Visual_Progress"]?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <p align="right">
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="<?php echo $language["Back"];?>" onClick="history.go(-1);">
                                </p>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class ="row">
                <div id="display-image">
                    <?php
                        $ID = $_GET["id"];
                        $query = " select filename_ from tproject_progress where recID = $ID";
                        $result = mysqli_query($link, $query);

                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <img src="./uploads/<?php echo $data['filename_']; ?>" style="height: 400px; width: 520px; border-style: groove;border-color: gray;border-width: 8px;">

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
