
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php"; 
//send confirmation mail
$Rec_ID = $_GET['id'];

$result = mysqli_query($link, "SELECT useremail FROM users WHERE id = '$Rec_ID'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['useremail'];

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
            $mail->Subject = 'Toilet Delivery IT Platform Status (Status da plataforma de TI de entrega de banheiros)';
            $mail->Body    = 'Your IT Platform User Status has been Activated, You can now login to IT Platform at http://tds-tete.net, (This Message is auto generated please DO NOT Respond)  (Seu status de usuário da plataforma de TI foi ativado, agora você pode fazer login na plataforma de TI em http://tqoss.net) (Esta mensagem é gerada automaticamente, NÃO responda)';  
            
            $mail->send();
            echo "Mail has been sent successfully!";
            echo 'history.go(-1)';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here

//update status
         
    
        
    $sql = mysqli_query($link,"update users  SET ustatus = '1' where id = '$Rec_ID'");
            
    if ($sql) {
        echo '<script type="text/javascript">'; 
        echo 'alert("User Activated successfully !");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
            
               
    ?>
    
