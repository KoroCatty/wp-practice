<?php

// loading css and js files with time versioning
function wpdevs_load_scripts(){
    // wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array( 'foo.css' ), '1.0', 'all' );
    wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true ); // by true, it will be loaded in the footer

}
add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts' );


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