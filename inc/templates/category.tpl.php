<h2 class="title-h2">Articles de la catégorie : <?php echo $categoryToDisplay->getName(); ?></h2>

<?php foreach ($postsFromCurrentCategory as $postId => $post) : 
    
    $authorId = array_keys($authorsList, $post->getAuthor())[0]; 
    ?>

<article class="post">
    <header class="post__header">
        <h3 class="post__title"><a href="index.php?page=post&id=<?php echo $postId; ?>"><?php echo $post->getTitle(); ?></a></h3>
        <p class="post__meta">Par <a href="index.php?page=author&id=<?php echo $authorId; ?>"><span class="post__author"><?php echo $post->getAuthor()->getName(); ?></span></a> le <time datetime="<?php echo $post->getDate(); ?>"><?php echo $post->getDateFormated(); ?></time> dans <span class="post__category"><?php echo $post->getCategory()->getName(); ?></span></p>
    </header>
    <section class="post__content">
        <p class="post__text">
            <?php echo $post->getResume() . '[&hellip;]'; ?>
        </p>
    </section>
</article>

<?php endforeach; ?>