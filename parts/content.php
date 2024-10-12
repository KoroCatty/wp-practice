<!-- 投句記事 -->
<article class="post">
  <a href="<?php echo get_the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
    <?php // the_post_thumbnail('large'); 
    ?>
    <?php the_post_thumbnail(array(300, 300)); ?>
    <div class="meta-info">
      <p>Posted in <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
      <p>Categories: <?php the_category(" | ") ?></p>
      <p>Tags: <?php the_tags('', ', ') ?></p>
    </div>
    <p><?php the_excerpt(); ?></p>
  </a>
</article>