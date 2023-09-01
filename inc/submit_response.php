<?php
date_default_timezone_set('Europe/Paris');
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['response']) && isset($_POST['comment_id'])) {
    include_once 'Dbconnect.php'; // Inclure la connexion à la base de données

    $user_id = $_SESSION['user_id'];
    $response = $_POST['response'];
    $comment_id = $_POST['comment_id'];
    $currentDate = date('Y-m-d H:i:s'); // Obtenir la date actuelle au format MySQL

    $sql = "INSERT INTO reponse (ID_utilisateur, Contenu, ID_question, Date) VALUES (:user_id, :contenu, :comment_id, :currentDate)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':contenu', $response, PDO::PARAM_STR);
    $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $stmt->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: FAQ.php'); // Assurez-vous d'utiliser "../" pour revenir au dossier parent
    exit();
}
?>
