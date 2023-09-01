<?php 
include_once('Dbconnect.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM utilisateur WHERE confirmation_token = :Token";
    $requete = $connect->prepare($sql);
    $requete->execute(['Token' => $token]);
    $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        // Mettez à jour la base de données pour indiquer que l'utilisateur est confirmé
        $updateSql = "UPDATE utilisateur SET confirmation_token = NULL, confirmed_at = NOW() WHERE ID_utilisateur = :UserId";
        $updateRequete = $connect->prepare($updateSql);
        $updateRequete->execute(['UserId' => $utilisateur['ID_utilisateur']]);

        echo "Votre compte a été confirmé avec succès!";
    } else {
        echo "Le token n'est pas valide.";
    }
} else {
    echo "Le token n'est pas présent dans l'URL.";
}
?>


