<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row no-gutters">
        <div class="col-lg-6">
            <form class="p-5" action="" method="post">
                <div class="form-group">
                    <label for="firstname" class="mb-lg-2">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="First Name" required autocomplete="off">
                </div>
                <div class="form-group mt-lg-4">
                    <label for="lastname" class="mb-lg-2">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Last Name" required autocomplete="off">
                </div>
                <div class="form-group mt-lg-4">
                    <label for="exampleInputEmail1" class="mb-lg-2">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autocomplete="off">
                </div>
                <div class="form-group mt-lg-4">
                    <label for="exampleInputPassword1" class="mb-lg-2">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required autocomplete="off">
                </div>
                <button type="submit" name="send" class="btn btn-primary mt-lg-4">Submit</button>
            </form>
        </div>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['send']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {                
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'borgesachin365@gmail.com';                   
    $mail->Password   = 'vnhlzusomdileuph';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                   
    $mail->setFrom('borgesachin365@gmail.com', 'contact form');
    $mail->addAddress('borgesachin365@gmail.com', 'Joe User');     


    $mail->isHTML(true);                                
    $mail->Subject = 'Test Contact Form';
    $mail->Body    = "Sender Name - $firstname <br> Sender Lastname - $lastname <br> Sender Email - $email <br> Sender Password - $password";


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>