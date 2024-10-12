<?php get_header(); ?>

<div id="primary">
  <div id="main">
    <div class="container">

      <?php
      while (have_posts()):
        the_post();
      ?>
     
     get_template_part('parts/content', 'single');

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