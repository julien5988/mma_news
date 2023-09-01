<?php
include_once 'inc/Dbconnect.php'; // Inclure la connexion à la base de données

session_start(); // Démarrer la session

$errors = array(); // Tableau pour stocker les messages d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérification des champs vides
    if (empty($email) || empty($password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    } else {
        // Requête pour récupérer l'utilisateur par adresse e-mail
        $sql = "SELECT * FROM utilisateur WHERE Email = :Email";
        $requete = $connect->prepare($sql);
        $requete->execute(['Email' => $email]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['ID_utilisateur'];
                header('Location: index.php'); // Rediriger vers le tableau de bord après la connexion
                exit();
            } else {
                $errors[] = "Mot de passe incorrect ou adresse e-mail incorrecte.";
            }
        } else {
            $errors[] = "Mot de passe incorrect ou adresse e-mail incorrecte.";
        }
    }

    if (!empty($errors)) {
        $_SESSION['login_errors'] = $errors; // Stocker les erreurs dans la session
    }

    header('Location: login.php');
    exit();
}
?>

