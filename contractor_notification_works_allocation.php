<?php include 'layouts/session.php'; ?>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php";
    include "lib.php"; 
//send notification mail
$id=$_GET["id"];
$hhid=$_GET["hhcode"];
$sdate=$_GET["sdate"];

$result = mysqli_query($link, "SELECT cemail FROM tcontractor WHERE id = '$id'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['cemail'];

$sql2 = mysqli_query($link, "SELECT cmail,chost,cpass FROM tconfig"); 
$rw = mysqli_fetch_assoc($sql2); 
$chost = $rw['chost'];
$cmail = $rw['cmail'];
$cpass = $rw['cpass'];

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 1;                                       
            $mail->isSMTP();                                            
            $mail->Host       = $chost;                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = $cmail;                 
            $mail->Password   = $cpass;                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom($cmail, 'Admin');           
            $mail->addAddress($usermail);
            
            
            $mail->isHTML(true);                                  
            $mail->Subject = $hhid.":Toilet Works Allocation (Alocação de Obras Sanitárias)";
            $mail->Body    = "You have been allocated Toilet Works: log on to http://tqoss.net for details (Você foi alocado para Toilet Works: acesse http://tqoss.net para obter detalhes)";
            
            $mail->send();
            echo '<script type="text/javascript">'; 
                echo 'alert("Notification has been sent successfully! (A notificação foi enviada com sucesso!)");'; 
                echo 'history.go(-1)';
            echo '</script>';
            //echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here         
    ?>
    
