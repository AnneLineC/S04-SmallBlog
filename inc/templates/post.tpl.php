<?php
    $authorId = array_keys($authorsList, $postToDisplay->getAuthor())[0]; 
    $categoryId = array_keys($categoriesList, $postToDisplay->getCategory())[0]; 
    ?>

<article class="post">
    <header class="post__header">
        <h2 class="post__title"><?php echo $postToDisplay->getTitle(); ?></h2>
        <p class="post__meta">Par <a href="index.php?page=author&id=<?php echo $authorId; ?>"><span class="post__author"><?php echo $postToDisplay->getAuthor()->getName(); ?></span></a> le <time datetime="<?php echo $postToDisplay->getDate(); ?>"><?php echo $postToDisplay->getDateFormated(); ?></time> dans <a href="index.php?page=category&id=<?php echo $categoryId; ?>"><span class="post__category"><?php echo $postToDisplay->getCategory()->getName(); ?></span></a></p>
    </header>
    <section class="post__content">
        <p class="post__text">
            <?php echo $postToDisplay->getContent(); ?>
        </p>
    </section>
</article>