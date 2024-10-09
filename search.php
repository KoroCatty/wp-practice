<?php get_header(); ?>

<div id="primary">
  <div id="main">
    <div class="container">

    <h1>Search results for " <?php echo get_search_query(); ?></h1>

      <?php
      while (have_posts()):
        the_post();
      ?>
        <!-- 投稿のIDを出す the_ID() と post_class() -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>">
            <header>
              <h2><?php the_title(); ?></h2>
              <!-- 現在表示している投稿の「投稿タイプ（post type）」を取得 [投稿タイプが 'post' である場合のみ発火 ]-->
              <?php if ('post' == get_post_type()): ?>
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail([160, 160], ['alt' => '']);
                }
                ?>

                <div class="meta-info">
                  <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
                  <p>Categories: <?php the_category(' '); ?></p>
                  <p>Tags: <?php the_tags('', ', '); ?></p>
                </div>
              <?php endif; ?>
            </header>
            <div class="content">
              <?php the_excerpt(); ?>
            </div>
          </a>
        </article>


      <?php
      endwhile;

      // Pagination
      the_posts_pagination();
      ?>

    </div>
  </div>
</div>










<?php get_footer(); ?>