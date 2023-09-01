<?php include 'inc/header.php'; ?>

<body class="bg-gray-100">

<main class="bg-gradient-to-br from-blue-500 via-white to-red-500 mt-10 ">
    <h1 class="text-center text-6xl py-7 mt-24 ">
        Ajouter un
        <span class="font-bold">Combattant</span>
    </h1>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-md mx-auto w-full max-w-md">
            <h2 class="text-center text-2xl font-semibold mb-4">Ajouter un combattant</h2>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<p class="text-red-500 mb-4 text-center">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            ?>

            <form class="p-4" action="ajouter_combattant_process.php" method="POST" enctype="multipart/form-data">
                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="nom" class="mb-1">Nom du combattant:</label>
                        <input type="text" id="nom" name="nom" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]{2,}$" class="border rounded p-2" title="Le nom doit contenir au moins 2 caractères alphabétiques">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="prenom" class="mb-1">Prénom du combattant:</label>
                        <input type="text" id="prenom" name="prenom" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]{2,}$" class="border rounded p-2" title="Le prénom doit contenir au moins 2 caractères alphabétiques">
                    </div>
                </div>

                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="surnom" class="mb-1">Surnom:</label>
                        <input type="text" id="surnom" name="surnom" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" class="border rounded p-2">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="taille" class="mb-1">Taille:</label>
                        <input type="number" id="taille" name="taille" step="0.01" class="border rounded p-2" title="La taille doit être un nombre positif (peut contenir une partie décimale)">
                    </div>
                </div>

                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="age" class="mb-1">Âge:</label>
                        <input type="number" id="age" name="age" class="border rounded p-2" title="L'âge doit être un nombre positif">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="poids" class="mb-1">Poids:</label>
                        <input type="number" id="poids" name="poids" step="0.01" class="border rounded p-2" title="Le poids doit être un nombre positif (peut contenir une partie décimale)">
                    </div>
                </div>

                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="categorie_poids" class="mb-1">Catégorie:</label>
                        <input type="text" id="categorie_poids" name="categorie_poids" class="border rounded p-2" title="La catégorie de poids doit contenir uniquement des caractères alphabétiques">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="organisation" class="mb-1">Organisation:</label>
                        <input type="text" id="organisation" name="organisation" class="border rounded p-2">
                    </div>
                </div>

                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="palmares" class="mb-1">Palmarès:</label>
                        <input type="text" id="palmares" name="palmares" class="border rounded p-2">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="style" class="mb-1">Style:</label>
                        <input type="text" id="style" name="style" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" class="border rounded p-2" title="Le style doit contenir uniquement des caractères alphabétiques">
                    </div>
                </div>

                <div class="flex flex-row mb-4">
                    <div class="flex flex-col w-1/2 mr-4">
                        <label for="img_combattant" class="mb-1">Image du combattant:</label>
                        <input type="file" id="img_combattant" name="img_combattant" accept=".jpg, .jpeg, .png" class="border rounded p-2">
                    </div>
                    <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['user_id']; ?>">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>






</body>

</html>