<?php include 'inc/header.php'; ?>

<body class="bg-gray-100">

    <main class="bg-gradient-to-br from-blue-500 via-white to-red-500 mt-10 ">
        <h1 class="text-center text-6xl py-7 mt-24 ">
            Les
            <span class="font-bold">Combattants</span>
        </h1>

        <div class="min-h-screen flex flex-col items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-4">
                <?php
                include_once 'inc/Dbconnect.php';

                $sql = "SELECT * FROM combattant__de__mma__";
                $stmt = $connect->query($sql);
                $combattants = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($combattants as $row) {
                    $imagePath = 'C:/laragon/www/Projet-passion/images/' . $row['Img_combattant'];

                    // Crée une instance de Imagick avec l'image
                    $imagick = new Imagick($imagePath);

                    // Dimensions de redimensionnement souhaitées
                    $targetWidth = 350;
                    $targetHeight = 250;

                    // Effectue le redimensionnement
                    $imagick->resizeImage($targetWidth, $targetHeight, Imagick::FILTER_LANCZOS, 1);

                    echo '<div class="bg-white p-4 shadow-md rounded-md text-center m-4">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($imagick) . '" alt="' . $row['Nom'] . '" class="mb-2 w-[300px] h-[250px] object-cover">';
                    echo '<h2 class="text-xl font-semibold">' . $row['Nom'] . ' ' . $row['Prenom'] . '</h2>';
                    echo '<p class="text-gray-500">' . $row['Surnom'] . '</p>';
                    echo '<p class="mt-2">Taille: ' . $row['Taille'] . '</p>';
                    echo '<p>Poids: ' . $row['poids'] . '</p>'; // Affiche le poids
                    echo '<p>Catégorie de poids: ' . $row['categories'] . '</p>'; // Affiche la catégorie de poids
                    echo '<p>Âge: ' . $row['Age'] . '</p>';
                    echo '<p>Palmarès: ' . $row['Palmares'] . '</p>';
                    echo '<p>Style: ' . $row['Style'] . '</p>';
                    echo '<p>Organisation: ' . $row['organisation'] . '</p>'; // Affiche l'organisation
                    echo '</div>';

                    // Libération de la mémoire
                    $imagick->clear();
                    $imagick->destroy();
                }
                ?>
            </div>
        </div>




        <div class="flex justify-center mb-20">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a href="ajouter_combattant.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Ajouter un combattant
                </a>';
            }
            ?>
        </div>
        </div>
    </main>

</body>

</html>

</body>

</html>