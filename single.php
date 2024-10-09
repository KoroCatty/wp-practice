<?php get_header(); ?>

<div id="primary">
  <div id="main">
    <div class="container">

      <?php
      while (have_posts()):
        the_post();
      ?>
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
              <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
              <p>Categories: <?php the_category(' '); ?></p>
              <p>Tags: <?php the_tags('', ', '); ?></p>
            </div>
          </header>
          <div class="content">
            <?php the_content(); ?>

            <!-- Page Break のページネーション -->
             <?php wp_link_pages(); ?>
          </div>
        </article>

        <!-- Pagination （ループ内なので、左右の記事名が出る）-->
        <div class="wpdevs-pagination">
          <div class="pages next">
            <?php next_post_link('&laquo; %link'); ?>
          </div>
          <div class="pages previous">
            <?php previous_post_link('%link &raquo;'); ?>
          </div>
        </div>

        <!-- コメント (コメントがあれば表示するコード )-->
        <?php
        if (comments_open() || get_comments_number()) {
          comments_template();
        }
        ?>

      <?php
      endwhile;
      ?>

    </div>
  </div>
</div>










<?php get_footer(); ?>