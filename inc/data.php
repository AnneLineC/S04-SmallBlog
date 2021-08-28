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
$postsQuery = 'SELECT * FROM `post`';

$pdoAuthors = $pdo->query($authorsQuery);
$authorsArray = $pdoAuthors->fetchAll(PDO::FETCH_ASSOC);

$pdoCategories = $pdo->query($categoriesQuery);
$categoriesArray = $pdoCategories->fetchAll(PDO::FETCH_ASSOC);

$pdoPosts = $pdo->query($postsQuery);
$postsArray = $pdoPosts->fetchAll(PDO::FETCH_ASSOC);


// ===============================================================
// Construction des tableaux de données
// ===============================================================

$authorsList = [];
foreach ($authorsArray as $author) {
    $authorsList[$author['id']] = new Author($author['name']);
}

$categoriesList = [];
foreach ($categoriesArray as $category) {
    $categoriesList[$category['id']] = new Category($category['name']);
}

$postsList = [];
foreach ($postsArray as $post) {
    $postsList[$post['id']] = new Post(
        $post['title'],
        $post['date'],
        $post['content'],
        $categoriesList[$post['category_id']],
        $authorsList[$post['author_id']],
    );
}

// var_dump($authorsList, $categoriesList, $postsList);