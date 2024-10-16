        <!-- 投稿のIDを出す the_ID() と post_class() -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>">
            <header>
              <h2><?php the_title(); ?></h2>
              <!-- 現在表示している投稿の「投稿タイプ（post type）」を取得 [投稿タイプが 'post' である場合のみ発火 ]-->
              <?php if ('post' == get_post_type()): ?>
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail([160, 160], ['alt' => '']);
                }
                ?>

                <div class="meta-info">
                  <p><?php _e('Posted in', 'wp-devs') ?> <?php echo get_the_date(); ?> <?php _e('by', 'wp-devs') ?> <?php the_author_posts_link(); ?></p>

                  <?php if (has_category()): ?>
                    <p><?php _e('Categories', 'wp-devs') ?>: <?php the_category(' '); ?></p>
                  <?php endif; ?>
                  <?php if (has_tag()): ?>
                    <p><?php _e('Tags', 'wp-devs') ?>: <?php the_tags('', ', '); ?></p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

            </header>
            <div class="content">
              <?php the_excerpt(); ?>
            </div>
          </a>
        </article>