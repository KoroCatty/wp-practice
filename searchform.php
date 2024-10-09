<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s">
        <input type="submit" id="searchsubmit" value="Search">

        <!-- value="post"：このフィールドには「post」という値が設定されています。
         この場合、「post」という投稿タイプ（通常のブログ投稿）に限定して検索することを意味します。 -->
        <input type="hidden" value="post" name="post_type" id="post_type" />
    </div>
</form>