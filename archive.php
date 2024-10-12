<?php get_header(); ?>

<!-- Header Customization -->
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <!-- アーカイブページに便利なタイトル関数 -->
      <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>

      <!-- Desc (Adminで書いておくこと)-->
      <?php the_archive_description('<div class="archive-description">', '</div>'); ?>

      <div class="container">
        <div class="archive-items">
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();

            // Loop content (content.php)
              get_template_part('parts/content');

            endwhile;
          ?>

            <!-- Pagination -->
            <div class="wpdevs-pagination">
              <div class="pages new">
                <?php previous_posts_link("<< Newer posts"); ?>
              </div>
              <div class="pages old">
                <?php next_posts_link("Older posts >>"); ?>
              </div>
            </div>

          <?php
          else : ?>
            <p>No posts found</p>
          <?php endif; ?>
        </div>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
      </div>
    </main>
  </div>
</div>
<?php get_footer(); ?>