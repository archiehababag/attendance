    <?php 
    
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        class SendEmail{

            public static function sendMail($to,$subject,$content){

                //This is where you input the API Key(if commented out no API key yet)
                $key = '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';

                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("archiehababag23@gmail.com", "It Conference Admin");
                $email->setSubject($subject);
                $email->addTo($to);
                $email->addContent("text/plain", $content);
                // email->addContent("text/html", $content);

                $sendGrid = new \SendGrid($key);
                
                try{
                    $response = $sendGrid->send($email);
                    return $response;
                }catch(Exception $e){
                    echo 'Email Exception Caught : ' . $e->getMessage() . "\n";
                    return false;
                }
            }

        

    //         public static function sendMail($to,$subject,$content){

    //             $mail = new PHPMailer(true);

    //             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //             $mail->isSMTP();                                            //Send using SMTP
    //             $mail->Host       = 'smtp.google.com';                     //Set the SMTP server to send through
    //             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //             $mail->Username   = 'archiehababagdev@google.com';                     //SMTP username
    //             $mail->Password   = '';                               //SMTP password
    //             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //             $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //             $mail->setFrom("archiehababag23@gmail.com", "It Conference Admin");
    //             $mail->setSubject($subject);
    //             $mail->addTo($to);
    //             $mail->addContent("text/plain", $content);


    //            try{ $mail->send();
    //              echo 'Message has been sent';
    //             } catch (Exception $e) {
    //             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //             }


    //         }                



        }
    
    
    ?>