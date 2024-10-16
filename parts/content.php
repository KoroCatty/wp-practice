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
    <p><?php _e( 'Posted in', 'wp-devs' ) ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wp-devs' ) ?> <?php the_author_posts_link(); ?></p>
      <?php if( has_category()): ?>
        <p><?php _e( 'Categories', 'wp-devs' ) ?>: <?php the_category( ' ' ); ?></p>
        <?php endif; ?>
        <?php if( has_tag()): ?>
          <p><?php _e( 'Tags', 'wp-devs' ) ?>: <?php the_tags( '', ', '); ?></p>
        <?php endif; ?>
    </div>
    <p><?php the_excerpt(); ?></p>
  </a>
</article>