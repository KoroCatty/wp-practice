<?php get_header(); ?>

<div id="primary">
  <div id="main">
    <div class="container">

      <h1>Search results for " <?php echo get_search_query(); ?></h1>

      <?php
      while (have_posts()):
        the_post();

        // Loop content
        get_template_part('parts/content', 'search');

      endwhile;

      // Pagination
      the_posts_pagination();
      ?>

    </div>
  </div>
</div>










<?php get_footer(); ?>