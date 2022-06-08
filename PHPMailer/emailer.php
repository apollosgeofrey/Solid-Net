
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

function mailFunction($recepient, $subject, $body, $replyer){
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2//;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'solidnetservicesltd@gmail.com';                     // SMTP username
    $mail->Password   = '**SolidnetServicesLtd1234**';                               // SMTP password
    $mail->SMTPSecure = 'ssl'; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
     $mail->CharSet       = "UTF-8";

    //Recipients
    $mail->setFrom('solidnetservicesltd@gmail.com', 'Solidnet Multi-Vision Services Limited');
    $mail->addAddress($recepient);     // Add a recipient
    if ($replyer != '') {
        $mail->addReplyTo($replyer, 'Reply would be forwarded here!!!');
    }
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->AltBody = $body;//'This is the body in plain text for non-HTML mail clients';

    if ($mail->send() == true) {
        return true;
    } else {
        return false;
    }

} catch (Exception $e) {
    //echo "<h4> Message could not be sent. Mailer Error: {$mail->ErrorInfo} </h4>";
}

}



?>