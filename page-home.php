<?php get_header(); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <section class="hero">
                Hero
            </section>

            <section class="services">
                <h2>Services</h2>
                <div class="container">
                    <div class="servicesItem">
                        <?php
                        if (is_active_sidebar('services-1')) {
                            dynamic_sidebar('services-1');
                        }
                        ?>
                    </div>
                    <div class="servicesItem">
                        <?php
                        if (is_active_sidebar('services-2')) {
                            dynamic_sidebar('services-2');
                        }
                        ?>
                    </div>
                    <div class="servicesItem">
                        <?php
                        if (is_active_sidebar('services-3')) {
                            dynamic_sidebar('services-3');
                        }
                        ?>
                    </div>
                </div>
            </section>

            <section class="home-blog">
                <h2>Latest News</h2>
                <div class="container">
                    <?php
                    //! WP_Query arguments
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category__in' => array(4, 5, 6),// Check Admin
                        'category__not_in' => array(1), // Exclude Uncategorized
                    );

                    $postlist = new WP_Query($args);

                    if ($postlist->have_posts()) :
                        while ($postlist->have_posts()) : $postlist->the_post();
                    ?>
                            <article class="latest-news">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_post_thumbnail(array(300, 300)); ?>
                                    <div class="meta-info">
                                        <p>Posted in <?php echo get_the_date(); ?> </p>
                                        <p>by <?php the_author(); ?></p>
                                        <p>Categories: <?php the_category(" | ") ?></p>
                                        <p>Tags: <?php the_tags('', ', ') ?></p>
                                    </div>
                                    <p><?php the_excerpt(); ?></p>
                                </a>
                            </article>
                        <?php
                        endwhile;
                        wp_reset_postdata(); //! 忘れない!!
                    else :  ?>
                        <p>No posts found</p>
                    <?php endif; ?>
                </div>

            </section>

        </main>
    </div>
</div>
<?php get_footer(); ?>