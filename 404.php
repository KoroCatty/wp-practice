<?php get_header(); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="error-404">
                    <header>
                        <!-- ページのタイトルを表示し、'Page not found'を多言語対応させて表示する -->
                        <h1><?php _e('Page not found', 'wp-devs'); ?></h1>
                        <!-- ページが存在しない旨を表示し、こちらも多言語対応させている -->
                        <p><?php _e('Unfortunately, the page you tried to reach does not exist on this site.', 'wp-devs'); ?></p>
                    </header>

                    <!-- エラー情報を表示するセクションの開始 -->
                    <div class="error">
                        <p>How about doing a search?</p>
                        <!-- WordPressの検索フォームを表示 -->
                        <?php get_search_form(); ?>

                        <?php
                        // 最近の投稿を表示するウィジェットを配置
                        the_widget(
                            'WP_Widget_Recent_Posts',  // 表示するウィジェットのタイプを指定
                            array(
                                'title' =>  __('Latest Posts', 'wp-devs'),  // ウィジェットのタイトルを多言語対応させる
                                'number' => 3  // 表示する投稿数を3件に指定
                            )
                        );
                        ?>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>