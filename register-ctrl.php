<?php
date_default_timezone_set('Europe/Paris');
include_once('inc/Dbconnect.php');
include_once 'inc/function.php';
include_once 'inc/phpmailer.php';





session_start(); // Démarrer la session

$errors = array(); // Tableau pour stocker les messages d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = intval($_POST["age"]);
    $email = $_POST["email"];
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Vérification des champs vides
    if (empty($nom) || empty($prenom) || empty($age) || empty($email) || empty($pseudo) || empty($password) || empty($confirmPassword)) {
        $errors[] = "Tous les champs sont obligatoires.";
    } else {
        // Vérification de l'âge
        if ($age < 18) {
            $errors[] = "Vous devez avoir au moins 18 ans pour vous inscrire.";
        } else {
            // Vérification du mot de passe
            if ($password !== $confirmPassword) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            } else {
                // Vérification d'adresse e-mail unique
                $checkEmailSql = "SELECT * FROM utilisateur WHERE Email = :Email";
                $checkEmailRequete = $connect->prepare($checkEmailSql);
                $checkEmailRequete->execute(['Email' => $email]);
                $existingUser = $checkEmailRequete->fetch(PDO::FETCH_ASSOC);

                if ($existingUser) {
                    $errors[] = "Cette adresse e-mail est déjà utilisée par un autre utilisateur.";
                } else {
                    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $token = str_random(60); // Assurez-vous que cette fonction existe et génère une chaîne aléatoire

                    // Insérer les données dans la base de données
                    $sql = "INSERT INTO utilisateur (`Nom`, `Prenom`, `Age`, `Email`, `Pseudo`, `Password`, `confirmation_token`)
                    VALUES(:Nom, :Prenom, :Age, :Email, :Pseudo, :Password, :Token)";

                    $requete = $connect->prepare($sql);

                    $requete->execute([
                        'Nom'          => $nom,
                        'Prenom'       => $prenom,
                        'Age'          => $age,
                        'Email'        => $email,
                        'Pseudo'       => $pseudo,
                        'Password'     => $hashedPassword,
                        'Token'        => $token
                    ]);

                    // Envoyer l'e-mail de confirmation
                    if (inscription($email, $token)) {
                        $_SESSION['register_success'] = "Inscription réussie ! Un email de confirmation a été envoyé.";
                    } else {
                        $_SESSION['register_success'] = "Inscription réussie, mais il y a eu une erreur lors de l'envoi de l'e-mail de confirmation.";
                    }
                    
                    header('Location: register.php'); // Rediriger vers le formulaire avec le message de réussite
                    exit();
                }
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['register_errors'] = $errors; // Stocker les erreurs dans la session
    }

    header('Location: register.php');
    exit();
}
?>

?>



