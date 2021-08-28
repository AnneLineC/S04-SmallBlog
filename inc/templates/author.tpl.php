<?php foreach ($postsFromCurrentAuthor as $post) : ?>

<article class="post">
    <header class="post__header">
        <h2 class="post__title"><?php echo $post->getTitle(); ?></h2>
        <p class="post__meta">Par <span class="post__author"><?php echo $post->getAuthor()->getName(); ?></span> le <time datetime="<?php echo $post->getDate(); ?>"><?php echo $post->getDateFormated(); ?></time> dans <span class="post__category"><?php echo $post->getCategory()->getName(); ?></span></p>
    </header>
    <section class="post__content">
        <p class="post__text">
            <?php echo $post->getContent(); ?>
        </p>
    </section>
</article>

<?php endforeach; ?>