<?php get_header(); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">

        <main id="main" class="site-main">
            
            <!-- 中身 -->
            <?php
            get_template_part('parts/content', 'home');
            ?>

        </main>
    </div>
</div>
<?php get_footer(); ?>