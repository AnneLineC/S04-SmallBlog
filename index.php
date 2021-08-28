<?php

    // ===============================================================
    // Récupération des données nécessaires à toutes les pages
    // ===============================================================
    
    // Classes
    require 'inc/classes/Author.php';
    require 'inc/classes/Category.php';
    require 'inc/classes/Post.php';

    // Tableaux de données reconstitués à partir de la BDD
    require 'inc/data.php';


    // ===============================================================
    // Récupération des données
    // ===============================================================

    require 'inc/data.php';

    // Utilisation de variables intermédiaires pour mieux "cloisonner" la data
    $authorsList = $dataAuthorsList;
    $categoriesList = $dataCategoriesList;
    $postsList = $dataPostsList; 

    

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