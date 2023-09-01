<?php include_once 'inc/header.php';
include_once 'inc/function.php';
include_once 'inc/Dbconnect.php';

?>




<main class="w-auto bg-gradient-to-br from-blue-500 via-white to-red-500 p">
    <div class="min-h-screen flex items-center justify-center">



        <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-semibold mb-4 text-center">Formulaire d'Inscription</h1>
            <?php if (!empty($_SESSION['register_errors'])) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        <?php foreach ($_SESSION['register_errors'] as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['register_errors']); ?> <!-- Supprimer les erreurs de la session après les avoir affichées -->
            <?php endif; ?>

            <?php if (!empty($_SESSION['register_success'])) : ?>
                <div class="bg-green-800 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <?php echo $_SESSION['register_success']; ?>
                </div>
                <?php unset($_SESSION['register_success']); ?> <!-- Supprimer le message de réussite de la session après l'avoir affiché -->
            <?php endif; ?>
            <form action="register-ctrl.php" method="POST" class="p-4">
                <div>
                    <label for="nom" class="block text-sm font-medium">Nom</label>
                    <input type="text" id="nom" name="nom" pattern="[A-Za-z\s\-']+" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="prenom" class="block text-sm font-medium">Prénom</label>
                    <input type="text" id="prenom" name="prenom" pattern="[A-Za-z\s\-']+" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="age" class="block text-sm font-medium">Âge</label>
                    <input type="number" id="age" name="age" min="18" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium">Adresse E-mail</label>
                    <input type="email" id="email" name="email" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="pseudo" class="block text-sm font-medium">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" pattern="[A-Za-z0-9_]+" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Mot de passe</label>
                    <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}[\]:;<>,.?~]).{8,}$" required class="w-full border rounded px-3 py-2 mt-1" title="Le mot de passe doit contenir au moins 8 caractères, incluant des lettres majuscules, des lettres minuscules, des chiffres et au moins un caractère spécial (!@#$%^&*()_+{}[]:;<>,.?~).">
                </div>



                <div>
                    <label for="confirmPassword" class="block text-sm font-medium">Confirmation Mot de passe</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 text-white py-4 px-4 rounded hover:bg-blue-600 mt-4">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</main>