<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message= $_POST['message'];
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    // Load Composer's autoloader
    require 'vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.zone.eu';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '************';                     // SMTP username
        $mail->Password   = '************';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('dasrajanraj@gmail.com');
        $mail->addReplyTo($_POST['email'],$_POST['name']);
    
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'FEEDBACK FORM: '.$name;
        $mail->Body    = $message;
        if($mail->send()){
            echo "<center><div style='margin-top:30%; color: green; font-weight:bolder'> <h1>Message Successfully sent</h1></div><center>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error.";
    }
?>