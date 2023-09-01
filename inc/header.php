<?php
date_default_timezone_set('Europe/Paris');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/38c4d45a21.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dist/style.css">
  <title>MMA NEWS</title>
</head>

<body>
  <header class="bg-white z-50 fixed top-0 w-full shadow">
    <!-- En-tête fixé en haut de la page avec un arrière-plan blanc, une ombre et une superposition z-index de 50 -->
    <nav id="main-nav" class="bg-white max-w-5xl mx-auto p-6 flex items-center justify-between">
      <a href="index.html" class="flex items-center" aria-label="Page d'accueil mma news">
        <img src="images/logo.png" class="w-6 md:w-16 mr-4" alt="logo mma news" />
        <span aria-hidden="true" class="text-lg lg:text-xl">
          MMA <strong>NEWS<span class="text-red-600">.</span></strong>
        </span>
      </a>
      <button aria-label="toggle button" aria-expanded="false" id="menu-btn" class="cursor-pointer w-7 md:hidden">
        <img src="images/menu.svg" alt="">
      </button>
      <ul id="toggled-menu" class="bg-white text-center w-full absolute top-full left-0 -translate-y-full -z-10 text-gray-800 md:static md:z-10 md:w-min md:transform-none md:border-none md:flex md:flex-row md:space-x-6 md:items-center md:justify-center md:ml-auto">
        <li class="py-4 md:py-0 whitespace-nowrap">
          <a href="index.php" class="text-sm uppercase font-semibold w-full hover:text-red-600">Accueil</a>
        </li>
        <li class="py-4 md:py-0 whitespace-nowrap">
          <a href="les-combattants.php" class="text-center text-sm uppercase font-semibold w-full hover:text-red-600">Les combattants</a>
        </li>
        <li class="py-4 md:py-0 whitespace-nowrap">
          <a href="news.html" class="text-sm uppercase font-semibold w-full hover:text-red-600">News</a>
        </li>
        <li class="py-4 md:py-0 whitespace-nowrap">
          <a href="contact.html" class="text-sm uppercase font-semibold w-full hover:text-red-600">Contact</a>
        </li>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="py-4 md:py-0 whitespace-nowrap">
            <a href="FAQ.php" class="text-center text-sm uppercase font-semibold w-full hover:text-red-600">FAQ</a>
          </li>
          <li class="py-4 md:py-0 whitespace-nowrap">
            <a href="logout.php" class="text-center text-sm uppercase font-semibold w-full hover:text-red-600">Déconnexion</a>
          </li>
        <?php else : ?>
          <li class="py-4 md:py-0 whitespace-nowrap">
            <a href="login.php" class="text-center text-sm uppercase font-semibold w-full hover:text-red-600">Connexion</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>

  </header>