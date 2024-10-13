<?php

//! CUSTOMIZER
require get_template_directory() . '/inc/customizer.php';

// loading css and js files with time versioning
function wpdevs_load_scripts()
{
    // wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array( 'foo.css' ), '1.0', 'all' );
    wp_enqueue_style('wpdevs-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null);
    wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true); // by true, it will be loaded in the footer
}
add_action('wp_enqueue_scripts', 'wpdevs_load_scripts');

// =================================================================
// Version 5.2 以上 (wp_body_openを使用可能にする)
// =================================================================
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

// =================================================================
// Google Tag Manager
// =================================================================
/*
 * Insert Google Tag Manager right after body open tag
 * @link       https://marcobrughi.com
 *
 * @author     Marco Brughi <marco.brughi@mail.com>
 *
 * NB: Change Code with your's
 */
function mb_add_after_body_code() {
    echo '<!-- Google Tag Manager (noscript) -->
          <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXX"
          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
          <!-- End Google Tag Manager (noscript) -->
        ';
}
add_action( 'wp_body_open', 'mb_add_after_body_code' );   

// =================================================================
// Menus
// =================================================================
function wpdevs_config()
{
    // Menus
    register_nav_menus(
        array(
            'wp_devs_main_menu' => "Main Menu Kazu",
            'wp_devs_footer_menu' => "Footer Menu Kazu",
        )
    );

    // Header customizer
    $args = array(
        'height' => 225,
        'width' => 1920,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-header', $args);
    add_theme_support('post-thumbnails'); // featured image
    add_theme_support('custom-logo', array( // Logo
        'width'       => 200,
        'height'      => 110,
        'flex-width'  => true, // if true, the width of the logo will be flexible
        'flex-height' => true,
    ));
    add_theme_support('title-tag'); // title tag
    add_theme_support('automatic-feed-links'); // rss feed を取得できるようにする
    add_theme_support('html5', array('comment-list', 'comment-form', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script')); // Web標準に適合するための設定
}
add_action('after_setup_theme', 'wpdevs_config', 0); // 0 is the priority(This is the fastest)


// =================================================================
// sidebar widget を追加
// =================================================================
add_action('widgets_init', 'wpdevs_sidebars');
function wpdevs_sidebars()
{
    // 1st sidebar
    register_sidebar(
        array(
            'name' => "Blog Sidebar Kazu made",
            'id' => 'sidebar_blog_kazu',
            'description' => 'This is the blog sidebar. You can add your widgets here for kazu.',
            'before_widget' => '<div class="widgetContainerKazu">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widgetTitleKazu">',
            'after_title' => '</h4>',
        )
    );
    // 2nd sidebar
    register_sidebar(
        array(
            'name' => "Page Sidebar２つ目",
            'id' => 'sidebar_page_kazu',
            'description' => 'This is the page sidebar.',
            'before_widget' => '<div class="widgetContainerKazu">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widgetTitleKazu">',
            'after_title' => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'  => 'Service 1',
            'id'    => 'services-1',
            'description'   => 'First Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 2',
            'id'    => 'services-2',
            'description'   => 'Second Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 3',
            'id'    => 'services-3',
            'description'   => 'Third Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
}

// =================================================================
// 
// =================================================================








// function enqueue_styles_scripts_versioning() {
//     /*******************************
//     ページ毎に読み込むJSを切り替える      // 条件分岐してスクリプトのパスを定義
//     ****************************/
//        if (is_front_page()){
//          $scriptPath =  '/dist/app.js';

//      } else if( is_page("about-us")){
//        $scriptPath =  '/dist/about.js';

//      } else if( is_single()){
//        $scriptPath =  '/dist/about.js';

//      } else if( is_archive()){
//        $scriptPath =  '/dist/about.js';

//    }else {
//          $scriptPath =  '/dist/contact.js';
//      }

// JS, CSS enqueuing with filetime() 
//    wp_enqueue_style('main-styles', get_template_directory_uri() . '/dist/app.css', array(), filemtime(get_template_directory() . '/dist/app.css'), false);

//  wp_enqueue_script( 'main-styles', get_template_directory_uri() .  $scriptPath, ['jquery'], filemtime(get_template_directory() .  $scriptPath ), true );


//    }
//    add_action( 'wp_enqueue_scripts', 'enqueue_styles_scripts_versioning' );



// =================================================================
// 管理画面の投稿一覧に featured Image を表示
// =================================================================

// 投稿一覧にカスタムカラム「サムネイル」を追加する関数
function manage_posts_columns($columns)
{
    // 新しいカラムとして「サムネイル」列を追加
    $columns['thumbnail'] = __('Thumbnail');
    return $columns; // カラムの配列を返す
}

// カラムにサムネイル画像を表示するための関数
function add_column($column_name, $post_id)
{
    // 「thumbnail」カラムの場合、アイキャッチ画像を取得
    if ('thumbnail' == $column_name) {
        // 投稿のアイキャッチ画像を取得、サイズは80x80
        $thum = get_the_post_thumbnail($post_id, array(80, 80), 'thumbnail');
    }

    // アイキャッチが設定されているかを確認
    if (isset($thum) && $thum) {
        echo $thum; // アイキャッチがあれば表示
    } else {
        echo __('None'); // アイキャッチがなければ「なし」と表示
    }
}

// 投稿一覧のカラム構成を変更するためのフィルターを追加
add_filter('manage_posts_columns', 'manage_posts_columns');

// カラムの内容をカスタマイズするためのアクションを追加
add_action('manage_posts_custom_column', 'add_column', 10, 2);

