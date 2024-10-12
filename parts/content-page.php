<!-- 固定ページの中身 -->
<article>
  <header>
    <h1><?php the_title(); ?></h1>
  </header>
  <?php the_content(); ?>

  <!-- Page Break のページネーション -->
  <?php wp_link_pages(); ?>
</article>