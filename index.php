<?php

    // ===============================================================
    // Récupération de la page à afficher
    // ===============================================================

    // Par défaut, on considère qu'on affichera la page d'accueil
    $pageToDisplay = 'home';

    // Mais si un paramètre 'page' est présent dans l'URL, c'est
    // qu'on veut afficher une autre page
    if (!empty($_GET['page'])) {
        $pageToDisplay = $_GET['page'];
    }



    // ===============================================================
    // Affichage
    // ===============================================================

    require 'inc/templates/header.tpl.php';
    require 'inc/templates/' . $pageToDisplay . '.tpl.php';
    require 'inc/templates/footer.tpl.php';

?>