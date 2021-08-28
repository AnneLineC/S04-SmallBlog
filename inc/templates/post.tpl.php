<article class="post">
    <header class="post__header">
        <h2 class="post__title"><?php echo $postToDisplay->getTitle(); ?></h2>
        <p class="post__meta">Par <span class="post__author"><?php echo $postToDisplay->getAuthor()->getName(); ?></span> le <time datetime="<?php echo $postToDisplay->getDate(); ?>"><?php echo $postToDisplay->getDateFormated(); ?></time> dans <span class="post__category"><?php echo $postToDisplay->getCategory()->getName(); ?></span></p>
    </header>
    <section class="post__content">
        <p class="post__text">
            <?php echo $postToDisplay->getContent(); ?>
        </p>
    </section>
</article>