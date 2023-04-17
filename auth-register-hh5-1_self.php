<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; ?>

<head>
    <title>Register User Household| OSS IT Platform</title>
    <?php include 'layouts/head.php'; ?>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <?php include 'layouts/head-style.php'; ?>

    <style> 
        .card-border 
            {
                border-style: solid;
                border-color: gray;
            }
        .card-border1 
            {
                border-style: groove;
                border-color: gray;
                border-width: 9px;
            }
        .card1
            {
                background-color: rgba(0, 0, 0, 0.2);
            }
        .card2
            {
                background-color: white;
            }
        .center 
        {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 20%;
        }
    </style>
</head>


<?php
// Include config file
require_once "layouts/config.php";

$hhcode = $_SESSION['hhid'];
$applicant_email = $_SESSION['aemail'];

// Define variables and initialize with empty values
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if (isset($_POST["Submit"])) {

    //$region = $_POST["region"];
    //$district = $_POST["district"];
    //$ta = $_POST["ta"];
    $position = $_POST["position"];

    // Validate useremail
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Please enter a useremail.";
    } elseif (!filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL)) {
        $useremail_err = "Invalid email format";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $useremail_err = "This useremail is already taken.";
                } else {
                    $useremail = trim($_POST["useremail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
        $ustatus = '0';
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please enter a confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (useremail, username, ustatus, userrole, usercon, userward, userarea, password, token) VALUES (?, ?, ?, ?,?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_useremail, $param_username, $param_ustatus, $param_userrole, $param_userreg, $param_userdis, $param_userta, $param_password, $param_token);

            // Set parameters
            $param_useremail = $useremail;
            $param_username = $username;
            $param_ustatus = $ustatus;

            $param_userrole = $position;
            $param_userreg = $hhcode;
            $param_userdis = '00';
            $param_userta = '00';

            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_token = bin2hex(random_bytes(50)); // generate unique token

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo '<script type="text/javascript">'; 
                echo 'alert("Successfully Registered, Wait for email confirmation before login!");'; 
                echo 'window.location.href = "register-applicant_self.php";';
                echo '</script>';
                //header("location: auth-login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement

            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="w-100">
                        <div class="card2">
                            <div class="card-border1">
                                <p align="right"> <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="<?php echo $language["Back"]?>" onClick="history.go(-1);"></p>
                                <div class="card-body">
                                    <center><img src="assets/images/logo_q.jpg" alt="" height="264" class="auth-logo-dark"></center>
                                    <?php 
                                        $result = mysqli_query($link, "SELECT pvalue FROM app_parameters where id = '02'"); 
                                        $row = mysqli_fetch_assoc($result); 
                                        $pvalue = $row['pvalue'];
                                    ?>
                                        <center><h2><?php echo $pvalue;?></h2></center>
                                        
                                    </div>
                                    <center><img src="assets/images/logo_q.jpg" alt="" height="264" class="auth-logo-dark" hidden ></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><img src="assets/images/logo_q.jpg" alt="" height="264" class="auth-logo-dark" hidden ></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h2 style="color:white"><?php echo $pvalue;?></h2></center>
                                    <center><h1 style="color:white"><?php echo $pvalue;?></h1></center>
                          
                                </div>
                            </div>
                        </div>
                    
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    
                    <div class="w-100">
                        <div class="card1">
                            <div class="card-border1">
                                <div class="card-body">
                
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-4 mb-md-5">
                                            <a href="javascript:void(0)" class="d-block auth-logo">
                                                <center><img src="assets/images/logo_q.jpg" alt="" height="64" class="auth-logo-dark"></center>
                                            </a>
                                        </div>
                                        <div class="my-auto">

                                        <div>
                                            <p><center><h5 class="text-default">Register Household Account for</h5></center></p>
                                            <p><center><?php echo $hhcode;?></center></p>
                                        </div>

                                    <div class="mt-4">
                                        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                            <div class="mb-1">
                                                <label for="position" class="form-label">Role</label>
                                                <select class="form-select" name="position" id="position" required>
                                                    <option selected value="05">household</option>
                                                </select>
                                                
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                                <label for="useremail" class="form-label">email address</label>
                                                <input type="email" class="form-control" id="useremail" name="useremail"  value="<?php echo $applicant_email; ?>">
                                                <span class="text-danger"><?php echo $useremail_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                <label for="username" class="form-label">Enter Username</label>
                                                <input type="text" class="form-control" id="username" name="username"  value="<?php echo $hhcode; ?>">
                                                <span class="text-danger"><?php echo $username_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <label for="userpassword" class="form-label">Enter Password</label>
                                                <input type="password" class="form-control" id="userpassword" name="password"  value="<?php echo $hhcode; ?>">
                                                <span class="text-danger"><?php echo $password_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                <label for="confirm_password" class="form-label">Confirm Your Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"  value="<?php echo $hhcode; ?>">
                                                <span class="text-danger"><?php echo $confirm_password_err; ?></span>
                                            </div>
                                            
                                            <input type="hidden" id="hhcode" name="hhcode" value="<?php echo $hhcode;?>">
                                            
                                            
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit"name="Submit" value="Submit">Submit Registration</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Copyright<i class="mdi mdi-heart text-danger"></i> <?php echo $pvalue;?></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- owl.carousel js -->
    <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>

    <!-- auth-2-carousel init -->
    <script src="assets/js/pages/auth-2-carousel.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>