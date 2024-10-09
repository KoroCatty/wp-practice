<?php get_header(); ?>

<!-- Header Customization -->
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="page-item">
                    <?php
                    while (have_posts()) : the_post();
                    ?>
                        <article>
                            <header>
                                <h1><?php the_title(); ?></h1>
                            </header>
                            <?php the_content(); ?>

                            <!-- Page Break のページネーション -->
                            <?php wp_link_pages(); ?>
                        </article>
                        <!-- コメント (コメントがあれば表示するコード )-->
                    <?php
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    endwhile;
                    ?>
                </div>
                <!-- sidebar page -->
                <?php get_sidebar('page'); ?>
            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>