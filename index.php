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
    // Traitement des données par template
    // ===============================================================

    if ($pageToDisplay === 'category') {
        
        if(!empty($_GET['id'])) {
            $categoryId = $_GET['id'];

            // On récupère l'objet category à afficher selon l'ID indiqué en $_GET
            $categoryToDisplay = $categoriesList[$categoryId];

            // On prépare un tableau vide que l'on va remplir avec les articles correspondants à afficher
            $postsFromCurrentCategory = [];

            foreach ($postsList as $index => $post) {
                if($post->getCategory()->getName() === $categoryToDisplay->getName()) {
                    $postsFromCurrentCategory[$index] = $post;
                }
            }

        }
        else {
            $pageToDisplay = 'home';
        }
        
    }

    if ($pageToDisplay === 'author') {
        
        if(!empty($_GET['id'])) {
            $authorId = $_GET['id'];

            // On récupère l'objet category à afficher selon l'ID indiqué en $_GET
            $authorToDisplay = $authorsList[$authorId];
            var_dump($authorToDisplay);

            // On prépare un tableau vide que l'on va remplir avec les articles correspondants à afficher
            $postsFromCurrentAuthor = [];

            foreach ($postsList as $index => $post) {
                if($post->getAuthor()->getName() === $authorToDisplay->getName()) {
                    $postsFromCurrentAuthor[$index] = $post;
                }
            }

        }
        else {
            $pageToDisplay = 'home';
        }
        
    }


    // ===============================================================
    // Affichage
    // ===============================================================

    require 'inc/templates/header.tpl.php';
    require 'inc/templates/' . $pageToDisplay . '.tpl.php';
    require 'inc/templates/footer.tpl.php';

?>