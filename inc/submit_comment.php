<?php

session_start();

if (isset($_SESSION['user_id']) && isset($_POST['comment'])) {
    include_once 'Dbconnect.php'; // Inclure la connexion à la base de données

    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO commentaire (user_id, contenu) VALUES (:user_id, :contenu)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':contenu', $comment, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: FAQ.php');
    exit();
}
?>

