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
    </style>
<?php
// Include config file
require_once "layouts/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';
$useremail_err = $msg = "";
// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if (isset($_POST['submit'])) {

    $useremail = mysqli_real_escape_string($link, $_POST['useremail']);
    $sql = "SELECT * FROM users WHERE useremail = '$useremail'";
    $query = mysqli_query($link, $sql);
    $emailcount = mysqli_num_rows($query);

    $sql2 = mysqli_query($link, "SELECT cmail,chost,cpass FROM tconfig"); 
    $rw = mysqli_fetch_assoc($sql2); 
    $chost = $rw['chost'];
    $cmail = $rw['cmail'];
    $cpass = $rw['cpass'];

    if ($emailcount) {
        $userdata = mysqli_fetch_array($query);
        $username = $userdata['username'];
        $token = $userdata['token'];

        $subject = "Password Reset -- Redefinição da palavra-passe";
        $body = "Hi, $username. Click here to reset your password -- Clique aqui para redefinir a sua palavra-passe " . $actual_link . "/auth-reset-password.php?token=$token ";
        
        $sender_email = "From: $cmail";

        try {
            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = $chost;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = $cmail;
            $mail->Password = $cpass;

            // Sender and recipient settings
            $mail->setFrom($cmail, $gmailusername);
            $mail->addAddress($useremail, $username);
            //$mail->addReplyTo($gmailid, $gmailusername); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            $msg = "We have emailed your password reset link! -- Enviámos por e-mail a sua ligação de redefinição da palavra-passe!";
            // header("location:auth-login.php");
        } catch (Exception $e) {
            $useremail_err =  "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $useremail_err = "No Email Found";
    }
}
?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Recover Password -- Recuperar a palavra-passe</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class ="card">
                        <div class ="card-border">
                            <div class ="card-body">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-4">
                                                    <h5 class="text-primary"> Reset Password -- Redefinir a palavra-passe</h5>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/logo_t.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div>
                                            <a href="index.php">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <img src="assets/images/logo_t.jpg" alt="" class="rounded-circle" height="34">
                                                    </span>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="p-2">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success text-center mb-4" role="alert">
                                                    <?php echo $msg; ?>
                                                </div>
                                            <?php } ?>
                                            <form class="form-horizontal" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">

                                                <div class="mb-3 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                                    <label for="useremail" class="form-label">Email</label>
                                                    <input type="email" class="form-control mb-1" id="useremail" name="useremail" placeholder="Enter email -- Introduzir e-mail">
                                                    <span class="text-danger"><?php echo $useremail_err; ?></span>
                                                </div>

                                                <div class="text-end">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type='submit' name='submit' value='Submit'>Reset -- Reiniciar</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <p>Remember It ? <a href="auth-login.php" class="fw-medium text-primary"> Sign In here -- Iniciar sessão aqui</a> </p>
                                    <p>© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Wilok Concepts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>