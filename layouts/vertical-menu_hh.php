<style>
    .navbar-header {
        background-color: #61e3f5 !important;
        border: none !important;
        border-width:0!important;
    }
</style>
<header id="page-topbar">

    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
        
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo_t.jpg" alt="" height="20">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo_t.jpg" alt="" height="20">
                    </span>
                </a>

                <div class="row mb-5">
                </div>

                <a href="javascript:void(0);" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo_t.jpg" alt="" height="2">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo_t.jpg" alt="" height="100">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            
            <div class = "row">
                <?php include_once 'layouts/config.php';
                    $result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '01'"); 
                    $row = mysqli_fetch_assoc($result); 
                    $pvalue = $row['pvalue'];
                ?>
                <br></br><br></br>
                <div class="row mb-5">
                </div>
                <span><h2><b><?php echo" "; echo $pvalue;?></h2></span>
            </div>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $language["Select_Language"]?>
                    <?php if ($lang == 'en') { ?>
                        <img src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                    <?php } ?>
                    <?php if ($lang == 'es') { ?>
                        <img src="assets/images/flags/moz.jpg" alt="Header Language" height="16">
                    <?php } ?>
                    
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="?lang=en" class="dropdown-item notify-item language" data-lang="en">
                        <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="?lang=es" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="assets/images/flags/moz.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Portuguese</span>
                    </a>

                    
                </div>
            </div>

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/toilet.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo lcfirst($_SESSION["username"]); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog "></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"></li>

                <li>
                    <a href="index_hh.php" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                    
                </li>

                <li>
                    
                    <a href="view-products_hh.php" class="waves-effect">
                        <i class="fa-solid fa-eye" style="color:purple"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="v-products"><?php echo $language["View_Products"]?></span>
                    </a>
                    
                </li>

                <li>
                   
                    <a href="comments_hh.php" class="waves-effect"> 
                    <i class="fa-solid fa-message" style="color:blue"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards"> <?php echo $language["Message_Supervisor"];?></span>
                    </a>
                    
                </li>

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->