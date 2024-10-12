<article class="latest-news">
  <a href="<?php the_permalink(); ?>">
    <h3><?php the_title(); ?></h3>
    <?php the_post_thumbnail(array(300, 300)); ?>
    <div class="meta-info">
      <p>Posted in <?php echo get_the_date(); ?> </p>
      <p>by <?php the_author(); ?></p>
      <p>Categories: <?php the_category(" | ") ?></p>
      <p>Tags: <?php the_tags('', ', ') ?></p>
    </div>
    <p><?php the_excerpt(); ?></p>
  </a>
</article>