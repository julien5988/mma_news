<?php include 'inc/header.php'; ?>



<body class="bg-gray-100">
    <main class="w-auto bg-gradient-to-br from-blue-500 via-white to-red-500">
        <div class="min-h-screen flex items-center justify-center">

            <div class="w-full md:w-1/2 mx-auto p-6 mt-24">
                <h1 class="text-4xl font-semibold mb-10 text-center">FAQ</h1>
                <div class="w-full md:w-1/2 mx-auto p-6 mt-4">

                    < </div>
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <h2 class="text-xl font-semibold mb-2">Poser une question :</h2>
                            <form action="inc/submit_comment.php" method="POST" class="bg-white p-6 rounded shadow-md">
                                <textarea name="comment" cols="30" rows="5" placeholder="Posez votre question ici" class="w-full border rounded p-2"></textarea>
                                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Envoyer</button>
                            </form>
                        <?php endif; ?>

                        <h2 class="text-xl font-semibold mt-4">Questions précédentes :</h2>
                        <!-- Afficher les questions et réponses précédentes depuis la base de données -->
                        <?php
                        include_once 'inc/Dbconnect.php'; // Inclure la connexion à la base de données

                        $sql = "SELECT c.ID_question, c.Contenu, c.Date, u.Pseudo FROM commentaire c
        INNER JOIN utilisateur u ON c.ID_utilisateur = u.ID_utilisateur
        ORDER BY c.Date DESC";

                        $stmt = $connect->prepare($sql);
                        $stmt->execute();
                        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Affichage des commentaires et réponses
                        foreach ($comments as $comment) {
                            echo '<div class="bg-white p-4 mb-2 rounded shadow-md">';
                            echo '<p class="mb-1"><span class="font-semibold">' . $comment['Pseudo'] . ' :</span> ' . $comment['Contenu'] . '</p>';
                            echo '<p class="text-sm text-gray-500">' . $comment['Date'] . '</p>';

                            // Afficher les réponses associées à ce commentaire
                            $sql = "SELECT r.*, u.Pseudo AS Reponseur FROM reponse r
            INNER JOIN utilisateur u ON r.ID_utilisateur = u.ID_utilisateur
            WHERE r.ID_question = :comment_id";
                            $stmt = $connect->prepare($sql);
                            $stmt->bindParam(':comment_id', $comment['ID_question'], PDO::PARAM_INT);
                            $stmt->execute();
                            $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($responses as $response) {
                                echo '<div class="bg-gray-100 p-2 mt-2 rounded shadow-md">';
                                echo '<p class="mb-1"><span class="font-semibold">' . $response['Reponseur'] . ' :</span> ' . $response['Contenu'] . '</p>';
                                echo '<p class="text-xs text-gray-500">' . $response['Date'] . '</p>';
                                echo '</div>';
                            }

                            // Formulaire pour ajouter une réponse
                            echo '<form action="inc/submit_response.php" method="POST" class="mt-2">';
                            echo '<input type="hidden" name="comment_id" value="' . $comment['ID_question'] . '">';
                            echo '<textarea name="response" cols="30" rows="3" placeholder="Répondre à cette question" class="w-full border rounded p-2"></textarea>';
                            echo '<button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Répondre</button>';
                            echo '</form>';

                            echo '</div>';
                            echo '<hr class="mt-4">'; // Ajout d'une ligne horizontale pour séparer les questions
                        }
                        ?>
                </div>
            </div>
    </main>

</body>

</html>