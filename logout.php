<?php
session_start(); // Démarrer la session

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou une autre page
header('Location: login.php'); // Remplacez "login.php" par la page que vous souhaitez rediriger
exit();
?>
