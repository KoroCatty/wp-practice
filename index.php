<?php get_header(); ?>

<!-- Header Customization -->
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div id="content" class="site-content">
    <div id="primary" class="content-area">

        <main id="main" class="site-main">
            <h1>Blog Page</h1>

            <div class="container">
                <div class="blog-items">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                            <article class="post">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                    <?php // the_post_thumbnail('large'); 
                                    ?>
                                    <?php the_post_thumbnail(array(300, 300)); ?>
                                    <div class="meta-info">
                                        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
                                        <p>Categories: <?php the_category(" | ") ?></p>
                                        <p>Tags: <?php the_tags('', ', ') ?></p>
                                    </div>
                                    <p><?php the_excerpt(); ?></p>
                                </a>
                            </article>
                        <?php
                        endwhile;
                    else :
                        ?>
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