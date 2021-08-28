<?php foreach ($postsFromCurrentAuthor as $postId => $post) : 
    
    $categoryId = array_keys($categoriesList, $post->getCategory())[0]; 
    ?>

<article class="post">
    <header class="post__header">
        <h2 class="post__title"><a href="index.php?page=post&id=<?php echo $postId; ?>"><?php echo $post->getTitle(); ?></a></h2>
        <p class="post__meta">Par <span class="post__author"><?php echo $post->getAuthor()->getName(); ?></span> le <time datetime="<?php echo $post->getDate(); ?>"><?php echo $post->getDateFormated(); ?></time> dans <a href="index.php?page=category&id=<?php echo $categoryId; ?>"><span class="post__category"><?php echo $post->getCategory()->getName(); ?></span></a></p>
    </header>
    <section class="post__content">
        <p class="post__text">
            <?php echo $post->getResume() . '[&hellip;]'; ?>
        </p>
    </section>
</article>

<?php endforeach; ?>