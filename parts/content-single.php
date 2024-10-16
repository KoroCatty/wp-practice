   <!-- 投稿のIDを出す the_ID() と post_class() -->
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <header>
       <h1><?php the_title(); ?></h1>
       <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail([560, 560], ['alt' => '']);
        }
        ?>
       <div class="meta-info">
         <p><?php _e('Posted in', 'wp-devs') ?> <?php echo get_the_date(); ?> <?php _e('by', 'wp-devs') ?> <?php the_author_posts_link(); ?></p>
         <?php if (has_category()): ?>
           <p><?php _e('Categories', 'wp-devs') ?>: <?php the_category(' '); ?></p>
         <?php endif; ?>
         <?php if (has_tag()): ?>
          <p><?php _e( 'Tags', 'wp-devs' ) ?>: <?php the_tags( '', ', '); ?></p>
         <?php endif; ?>
       </div>
     </header>
     <div class="content">
       <?php the_content(); ?>

       <!-- Page Break のページネーション -->
       <?php wp_link_pages(); ?>
     </div>
   </article>