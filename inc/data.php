<?php

// ===============================================================
// Connexion à la BDD
// ===============================================================

$dsn = 'mysql:dbname=blogopoil;host=localhost;charset=UTF8';
$username = 'blogopoil';
$password = 'blogopoil';

$pdo = new PDO(
    $dsn,
    $username,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]
);

// ===============================================================
// Requêtes SQL
// ===============================================================

$authorsQuery = 'SELECT * FROM `author`';
$categoriesQuery = 'SELECT * FROM `category`';
$postsQuery = 'SELECT * FROM `post` ORDER BY `published_date` DESC';

$pdoAuthors = $pdo->query($authorsQuery);
$authorsArray = $pdoAuthors->fetchAll(PDO::FETCH_ASSOC);

$pdoCategories = $pdo->query($categoriesQuery);
$categoriesArray = $pdoCategories->fetchAll(PDO::FETCH_ASSOC);

$pdoPosts = $pdo->query($postsQuery);
$postsArray = $pdoPosts->fetchAll(PDO::FETCH_ASSOC);


// ===============================================================
// Construction des tableaux de données
// ===============================================================

$dataAuthorsList = [];
foreach ($authorsArray as $author) {
    $dataAuthorsList[$author['id']] = new Author($author['name']);
}

$dataCategoriesList = [];
foreach ($categoriesArray as $category) {
    $dataCategoriesList[$category['id']] = new Category($category['name']);
}

$dataPostsList = [];
foreach ($postsArray as $post) {
    $dataPostsList[$post['id']] = new Post(
        $post['title'],
        $post['published_date'],
        $post['content'],
        $dataCategoriesList[$post['category_id']],
        $dataAuthorsList[$post['author_id']],
    );
}

// var_dump($authorsList, $categoriesList, $postsList);