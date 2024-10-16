<?php
//Template Name: General Template
?>

<!-- General Template の項目がページのところに出現するようになり、このファイル構成を共有できるようになる -->

<?php get_header(); ?>

<!-- Header Customization -->
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div id="content" class="site-content">
    <div id="primary" class="content-area">

        <main id="main" class="site-main">


            <section class="home-blog">
                <div class="container">
                    <div class="general-template">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                        ?>
                                <article class="post">
                                    <h2><?php the_title(); ?></h2>

                                    <p><?php the_content(); ?></p>
                                </article>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <p><?php _e('Nothing yet to be displayed!', 'wp-devs') ?></p>
                        <?php endif; ?>
            
                    </div>
                </div>

            </section>

        </main>
    </div>
</div>
<?php get_footer(); ?>