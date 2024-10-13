
<section class="hero">
                <div class="overlay" style="min-height: 800px">
                    <div class="container">
                        <div class="hero-items">
                            <h1>Lorem IPUSM</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ratione error officiis minima quam. Sunt in velit inventore. Eius aut architecto dolore laboriosam ratione sit inventore, porro distinctio! Sed, repellendus!</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                </div>
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
                        'category__in' => array(4, 5, 6),// Check Admin for Category ID
                        'category__not_in' => array(1), // Exclude Uncategorized
                    );

                    $postlist = new WP_Query($args);

                    if ($postlist->have_posts()) :
                        while ($postlist->have_posts()) : $postlist->the_post();

                            get_template_part('parts/content', 'latest-news');


                        endwhile;
                        wp_reset_postdata(); //! 忘れない!!
                    else :  ?>
                        <p>No posts found</p>
                    <?php endif; ?>
                </div>

            </section>
