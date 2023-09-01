// Sélection des éléments du DOM
const toggleMenuBtn = document.querySelector("#menu-btn");
const toggleMenuImg = document.querySelector("#menu-btn img");
const toggledMenu = document.querySelector("#toggled-menu");
const menuLinks = document.querySelector("#main-nav ul a");

// Ajout d'un gestionnaire d'événements au clic sur le bouton de bascule du menu
toggleMenuBtn.addEventListener("click", toggleNav);

// Fonction de bascule du menu
function toggleNav() {
  // Ajoute ou supprime la classe "-translate-y-full" du menu déroulant pour le faire apparaître ou disparaître
  toggledMenu.classList.toggle("-translate-y-full");

  // Vérifie si la classe "-translate-y-full" est présente dans le menu déroulant pour déterminer l'état actuel du menu
  if (toggledMenu.classList.contains("-translate-y-full")) {
    // Si le menu est fermé, change l'image du bouton de bascule en "images/menu.svg"
    toggleMenuImg.setAttribute("src", "images/menu.svg");
    // Définit l'attribut "aria-expanded" du bouton de bascule à "false"
    toggleMenuBtn.setAttribute("aria-expanded", "false");
  } else {
    // Si le menu est ouvert, change l'image du bouton de bascule en "images/cross.svg"
    toggleMenuImg.setAttribute("src", "images/cross.svg");
    // Définit l'attribut "aria-expanded" du bouton de bascule à "true"
    toggleMenuBtn.setAttribute("aria-expanded", "true");
  }
}

