<?php 
require 'vendor/autoload.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configuration du serveur SMTP (si nécessaire)
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'julien.thoumy@gmail.com'; // Remplacez par votre adresse e-mail
$mail->Password = 'ouxomivoqdxplfre';           // Remplacez par votre mot de passe
$mail->SMTPSecure = 'ssl';                         // Utilisez 'tls' si vous préférez
$mail->Port = 465;                                 // Ou 587 pour TLS

function inscription($to, $token) {
    global $mail;
    $mail->CharSet = 'UTF-8';
    $mail->clearAddresses();
    $mail->setFrom('julien.thoumy@gmail.com', 'Julien Thoumy'); // Remplacez par votre adresse et nom d'expéditeur
    $mail->addAddress($to);
    $mail->Subject = 'Validation inscription';
    $mail->Body = 'Afin de valider votre inscription, veuillez cliquer sur le lien suivant : http://localhost/projet-passion/inc/confirm.php?token=' . urlencode($token);
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

function envoyerEmailMiseAJour($to) {
    global $mail;
    $mail->CharSet = 'UTF-8';
    $mail->clearAddresses();
    $mail->setFrom('julien.thoumy@gmail.com', 'Mode83 - julien thoumy'); // Remplacez par votre adresse et nom d'expéditeur
    $mail->addAddress($to);
    $mail->Subject = 'Mise à jour dans de l\'article';
    $mail->Body = 'Votre article  a été mis à jour. Cliquez sur le lien pour voir les modifications : http://localhost/news/index.php';
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

// Exemple d'appel des fonctions
 //$adresseEmail = 'julien.thoumy@gmail.com'; // Remplacez par l'adresse e-mail réelle
//inscription($adresseEmail);
//envoyerEmailMiseAJour($adresseEmail);
?>