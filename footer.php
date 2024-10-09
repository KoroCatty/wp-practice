<footer class="site-footer">
            <div class="container">
                <div class="copyright">
                    <p>Copyright X - All Rights Reserved</p>
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