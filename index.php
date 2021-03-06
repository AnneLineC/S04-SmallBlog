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

    if ($pageToDisplay === 'post') {
        
        if(!empty($_GET['id'])) {
            $postToDisplay = $postsList[$_GET['id']];
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



    // ===============================================================
    // Traitement du formulaire
    // ===============================================================


    if (!empty($_POST)) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $content = $_POST['content'];
        $categoryId = $_POST['category'];
        $authorId = $_POST['author'];
        
        if ($title === '' || $date === '' || $content === '' || $categoryId === 0 || $authorId === 0) {
            exit("Tous les champs doivent être remplis.");
        }
        
        // Requête permettant d'insérer les données récupérées dans le formulaire
        $insertQuery = "
            INSERT INTO post (title, published_date, content, category_id, author_id)
            VALUES ('{$title}', '{$date}', '{$content}', '{$categoryId}', '{$authorId}')
        ";
        
        $affectedRows = $pdo->exec($insertQuery);
    
        if ($affectedRows === 1) {
            header('Location: index.php');
            exit();
        } else {
            exit("Erreur lors de l'ajout du jeu video");
        }
    

    }

?>