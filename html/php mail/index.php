<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../phpstyle.css">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Envoyer l'e-mail
    if (envoie_mail($name, $email,$subject, $message)) {
        echo '<script>alert("Votre message a été envoyé avec succès.");</script>';
    } else {
        echo '<script>alert("Une erreur s\'est produite lors de l\'envoi du message. Veuillez réessayer.");</script>';
    }
}

function envoie_mail($from_name, $from_email,$subject, $message) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'azharpindra03@gmail.com';
    $mail->Password = 'bhmjfesmseyyxlvn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom($from_email, $from_name);
    $mail->addAddress('azharpindra03@gmail.com', 'Portfolio');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');
    
    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}
?>

<section class="contact" id="ancre3">
    <div class="contact">
<div id="container">
  <h2>contact</h2>
  <form action="#" method="post" id="contact_form">
    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="name" name="name" id="name_input" required>
    </div>
    <div class="email">
      <label for="email"></label>
      <input type="email" placeholder="e-mail" name="email" id="email_input" required>
    </div>
    <div class="subject">
      <label for="subject"></label>
      <select placeholder="subject line" name="subject" id="subject_input" required>
        <option disabled hidden selected>subject</option>
        <option>Just sayin' "hi"!</option>
        <option>Quick question.</option>
        <option>How about a commission?</option>
      </select>
    </div>
    <div class="message">
      <label for="message"></label>
      <textarea name="message" placeholder="message" id="message_input" cols="30" rows="5" required></textarea>
    </div>
    <div class="submit">
      <input type="submit" value="submit" id="form_button"/>
      <a href="../index.html" id="form_button">Back</a>
    </div>
  </form>
</div>
</div>
</section>

<footer>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-github"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>&copy; 2023 Azhar PINDRA - All rights reserved</p>
</footer>
</body>
</html>
