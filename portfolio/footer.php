<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_id'        => 'footer-menu',
                'menu_class'     => 'footer-nav',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
            
            <ul class="footer-social">
                <?php if ( get_theme_mod( 'social_instagram' ) ) : ?>
                    <li><a href="<?php echo esc_url( get_theme_mod( 'social_instagram' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'social_tiktok' ) ) : ?>
                    <li><a href="<?php echo esc_url( get_theme_mod( 'social_tiktok' ) ); ?>" target="_blank" rel="noopener" aria-label="Tiktok"><i class="fab fa-tiktok"></i></a></li>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'social_dribbble' ) ) : ?>
                    <li><a href="<?php echo esc_url( get_theme_mod( 'social_dribbble' ) ); ?>" target="_blank" rel="noopener" aria-label="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'social_behance' ) ) : ?>
                    <li><a href="<?php echo esc_url( get_theme_mod( 'social_behance' ) ); ?>" target="_blank" rel="noopener" aria-label="Behance"><i class="fab fa-behance"></i></a></li>
                <?php endif; ?>
            </ul>
            
            <p class="copyright">© <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
