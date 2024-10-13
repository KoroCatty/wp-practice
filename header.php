<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>
    <!--  bodyタグが開かれた直後にカスタムコードやスクリプトを追加するために使われます。Google Analyticsなど -->
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
    <header>

        <section class="top-bar">

            <div class="container">
                <div class="logo">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <a href="<?php echo home_url(); ?>">
                            <h1><?php bloginfo('name'); ?></h1>
                        <?php
                    }
                        ?>
                </div>
                <div class="searchbox">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>

        <!-- SLug を指定 -->
        <?php if (is_page('landing-page')) : ?>
                <h3>Landing pageのスラッグで is_page()を使用</h3>
        <?php endif; ?>


        <section class="menu-area">
            <div class="container">
                <nav class="main-menu">

                    <!-- Burger Button -->
                    <button class="check-button">
                        <div class="menu-icon">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>

                    <!-- Nav menu (the name is from functions.php and depth is a menu's level, ex) menu->sub->sub ) -->
                    <?php wp_nav_menu(array('theme_location' => 'wp_devs_main_menu', 'depth => 2')); ?>
                </nav>
            </div>

        </section>

    </header>
    </div>