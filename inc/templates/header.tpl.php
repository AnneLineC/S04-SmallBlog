<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog O'Poil</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <header class="page-header">
        <h1 class="main-title"><a href="index.php">Blog O'Poil</a></h1>
        <p class="site-desc">Un petit blog tout épuré pour s'entraîner à utiliser PHP et MySQL</p>
        <nav class="site-nav">
            <ul class="site-nav__list">
                <li class="site-nav__item"><a class="site-nav__link" href="index.php">Home</a></li>
                <?php foreach ($categoriesList as $categoryId => $category) : ?>
                    <li class="site-nav__item"><a href="index.php?page=category&id=<?php echo $categoryId; ?>" class="site-nav__link"><?php echo $category->getName(); ?></a></li>
                <?php endforeach; ?>
                <li class="site-nav__item"><a class="site-nav__link" href="index.php?page=add-form">Rédiger</a></li>
            </ul>
        </nav>
    </header>
    
    <main>