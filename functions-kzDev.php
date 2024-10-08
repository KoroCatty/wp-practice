
// ACF のメニューを追加
// if ( function_exists('acf_add_options_page')) {
// 	acf_add_options_page( array(
// 		'page_title' => "メイン メニュー",
// 		"menu_title" => "Main menu",
// 		'show_in_graphql' => true,
// 		'icon_url' => 'dashicons-menu'
// 	));
// }

// 管理画面の投稿一覧に featured Image を表示
add_theme_support( 'post-thumbnails', array( 'post' ) );
    set_post_thumbnail_size( 50, 50, true );
 
    function manage_posts_columns($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
    }
    function add_column($column_name, $post_id) {
    
    //アイキャッチ取得 array(サイズ,サイズ)
        if ( 'thumbnail' == $column_name) {
    $thum = get_the_post_thumbnail($post_id, array(80,80), 'thumbnail');
    }
    
    //使用していない場合「なし」を表示
    if ( isset($thum) && $thum ) {
    echo $thum;
    } else {
    echo __('None');
    }
    }
    add_filter( 'manage_posts_columns', 'manage_posts_columns' );
  add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );