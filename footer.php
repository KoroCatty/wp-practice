<footer class="site-footer">
            <div class="container">
                <div class="copyright">
                    <!-- カスタマイザーから呼び出す。２個目は default value -->
                    <p><?php echo get_theme_mod( 'set_copyright', __( 'Copyright X - All Rights Reserved😊', 'wp-devs' ) ); ?></p>
                </div>
                <nav class="footer-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'wp_devs_footer_menu' , 'depth' => 1 )); ?>
                </nav>
                <?php get_search_form(); ?>
            </div>
            <?php wp_footer(); ?>
        </footer>
    </div>
</body>
</html>