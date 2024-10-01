<?php get_header(); ?>
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
                                    <h2><?php the_title(); ?></h2>
                                    <div class="meta-info">
                                        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
                                        <p>Categories: <?php the_category(" | ") ?></p>
                                        <p>Tags: <?php the_tags('', ', ') ?></p>
                                    </div>
                                    <p><?php the_content(); ?></p>
                                </article>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <p>No posts found</p>
                        <?php endif; ?>
                        ?>
                    </div>
                </div>


        </main>
    </div>
</div>
<?php get_footer(); ?>