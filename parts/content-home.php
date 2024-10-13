<!-- カスタマイザーからまずは取得 (左がcustomizer.phpから、右がデフォルト) -->
<?php
$hero_title = get_theme_mod('set_hero_title', 'Plz add some title');
$hero_subtitle = get_theme_mod('set_hero_subtitle', 'Plz add some sub title');
$hero_button_text = get_theme_mod('set_hero_button_text', 'Learn More');
$hero_button_url = get_theme_mod('set_hero_button_url', '#');
$hero_height = get_theme_mod('set_hero_height', '800');
// 画像のURLを取得
// $hero_bg = wp_get_attachment_url( get_theme_mod(
//     'set_hero_bg'
// ));
// var_dump($hero_bg);

$hero_background = wp_get_attachment_url( get_theme_mod( 'set_hero_background' ) );
?>

<section class="hero" style="background-image: url('<?php echo $hero_background; ?>');">

    <div class="overlay" style="min-height: <?php echo $hero_height ?>px">
        <div class="container">
            <div class="hero-items">
                <h1><?php echo $hero_title ?></h1>

                <!-- 改行も出力する nl2br()関数 -->
                <p><?php echo nl2br($hero_subtitle); ?></p>
                <a href="<?php echo esc_url($hero_button_url); ?>" class="btn"><?php echo $hero_button_text; ?></a>
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
            'category__in' => array(4, 5, 6), // Check Admin for Category ID
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