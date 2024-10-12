<!-- 投句記事 -->
<article class="post">
  <a href="<?php echo get_the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>

  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail(array(300, 300)); ?>
  <?php else : ?>
    <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_7540.jpg" alt="">
  <?php endif; ?>

    <div class="meta-info">
      <p>Posted in <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
      <?php if( has_category()): ?>
            <p>Categories: <?php the_category( ' ' ); ?></p>
        <?php endif; ?>
        <?php if( has_tag()): ?>
            <p>Tags: <?php the_tags( '', ', '); ?></p>
        <?php endif; ?>
    </div>
    <p><?php the_excerpt(); ?></p>
  </a>
</article>