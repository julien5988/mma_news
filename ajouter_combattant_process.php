<?php
include_once 'inc/Dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $surnom = htmlspecialchars($_POST['surnom']);
    $taille = floatval($_POST['taille']);
    $age = intval($_POST['age']);
    $poids = floatval($_POST['poids']); // Nouveau champ poids
    $categorie_poids = htmlspecialchars($_POST['categorie_poids']); // Nouveau champ catégorie de poids
    $palmares = htmlspecialchars($_POST['palmares']);
    $style = htmlspecialchars($_POST['style']);
    $organisation = htmlspecialchars($_POST['organisation']); // Nouveau champ organisation
    $id_utilisateur = intval($_POST['id_utilisateur']);

    // Validation : Vérifier que toutes les données sont remplies
    if (empty($nom) || empty($prenom) || empty($taille) || empty($age) || empty($style) || empty($id_utilisateur) || empty($_FILES['img_combattant']['name']) || empty($poids) || empty($categorie_poids) || empty($organisation)) {
        $_SESSION['error_message'] = "Tous les champs doivent être remplis, y compris l'image, le poids, la catégorie de poids et l'organisation.";
        header("Location: ajouter_combattant.php");
        exit();
    }

    $img_combattant = $_FILES['img_combattant']['name'];
    $img_combattant_temp = $_FILES['img_combattant']['tmp_name'];
    $upload_dir = 'images/'; // Mettez le chemin vers votre dossier d'images
    move_uploaded_file($img_combattant_temp, $upload_dir . $img_combattant);

    $sql = "INSERT INTO combattant__de__mma__ (Nom, Prenom, Surnom, Taille, Age, poids, categories, Palmares, Img_combattant, Style, Organisation, ID_utilisateur)
            VALUES (:nom, :prenom, :surnom, :taille, :age, :poids, :categorie_poids, :palmares, :img_combattant, :style, :organisation, :id_utilisateur)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':surnom', $surnom);
    $stmt->bindParam(':taille', $taille);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':poids', $poids);
    $stmt->bindParam(':categorie_poids', $categorie_poids);
    $stmt->bindParam(':palmares', $palmares);
    $stmt->bindParam(':img_combattant', $img_combattant);
    $stmt->bindParam(':style', $style);
    $stmt->bindParam(':organisation', $organisation);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur);

    if ($stmt->execute()) {
        // Redirection en cas de succès
        header("Location: les-combattants.php");
        exit();
    } else {
        // Enregistrement de l'erreur dans une variable et affichage pour le débogage
        $error_message = "Erreur d'exécution de la requête : " . $stmt->errorInfo()[2];
        // Vous pouvez aussi stocker l'erreur dans une variable de session
        $_SESSION['error_message'] = $error_message;
        header('location: ajouter_combattant.php');
        exit();
    }
}
?>
