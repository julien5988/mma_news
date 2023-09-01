<?php
include 'inc/header.php';


// Vérifier si des erreurs sont stockées dans la session
if (isset($_SESSION['login_errors']) && !empty($_SESSION['login_errors'])) {
    $loginErrors = $_SESSION['login_errors']; // Récupérer les erreurs de la session
    unset($_SESSION['login_errors']); // Supprimer les erreurs de la session
}


?>

<main class="w-auto bg-gradient-to-br from-blue-500 via-white to-red-500">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-semibold mb-4 text-center">Connexion</h1>
            <?php if (isset($loginErrors) && !empty($loginErrors)) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        <?php foreach ($loginErrors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- Formulaire de connexion -->
            <form action="login-ctrl.php" method="POST" class="p-4">
                <!-- Champs pour l'adresse e-mail et le mot de passe -->
                <div>
                    <label for="email" class="block text-sm font-medium">Adresse E-mail</label>
                    <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 text-white py-4 px-4 rounded hover:bg-blue-600 mt-4">
                        Se connecter
                    </button>
                </div>
                <div class="flex justify-center mt-2">
                    <a class="animate-bounce" href="register.php">S'inscrire</a>
                </div>

            </form>
        </div>
    </div>
</main>