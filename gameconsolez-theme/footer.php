<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Shop</h3>
                <ul>
                    <?php if (function_exists('wc_get_page_permalink')) : ?>
                        <li><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">All Products</a></li>
                    <?php endif; ?>
                    <?php
                    $playstation = get_term_by('slug', 'playstation-5', 'product_cat');
                    if ($playstation) :
                    ?>
                        <li><a href="<?php echo esc_url(get_term_link($playstation)); ?>">PlayStation 5</a></li>
                    <?php endif; ?>
                    <?php
                    $xbox = get_term_by('slug', 'xbox-series', 'product_cat');
                    if ($xbox) :
                    ?>
                        <li><a href="<?php echo esc_url(get_term_link($xbox)); ?>">Xbox Series</a></li>
                    <?php endif; ?>
                    <?php
                    $nintendo = get_term_by('slug', 'nintendo-switch', 'product_cat');
                    if ($nintendo) :
                    ?>
                        <li><a href="<?php echo esc_url(get_term_link($nintendo)); ?>">Nintendo Switch</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Company</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/cookie-policy')); ?>">Cookie Policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/return-policy')); ?>">Return Policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/disclaimer')); ?>">Disclaimer</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Sign up for our newsletter to get updates on new products and special offers.</p>
                <form class="newsletter-form" id="newsletter-form">
                    <input type="email" name="newsletter_email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | All rights reserved</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
