<?php
/**
 * Front page template
 */
get_header();
?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Order The PS5 Digital Version</h1>
            <p>Trade your PS4 for Discount</p>
            <?php if (function_exists('wc_get_page_permalink')) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-primary">Order Now</a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn-primary">Order Now</a>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Special Offer Banner -->
    <section class="special-offer">
        <div class="container">
            <h2>Get $100 off Nintendo Switch OLED + 2 controllers</h2>
            <p style="font-size: 24px; margin: 10px 0;">
                From <span style="text-decoration: line-through;">$449</span> for <strong style="color: #0070f3;">$349</strong>
            </p>
        </div>
    </section>
    
    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Browse Through Our Categories</h2>
            <?php echo do_shortcode('[gameconsolez_categories number="4"]'); ?>
        </div>
    </section>
    
    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">Our Featured Products</h2>
            <div class="products-grid">
                <?php
                if (function_exists('wc_get_featured_product_ids')) {
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'meta_key' => '_featured',
                        'meta_value' => 'yes',
                    );
                    $featured_products = new WP_Query($args);
                    
                    if ($featured_products->have_posts()) {
                        while ($featured_products->have_posts()) {
                            $featured_products->the_post();
                            wc_get_template_part('content', 'product');
                        }
                        wp_reset_postdata();
                    } else {
                        // Fallback to recent products
                        echo do_shortcode('[recent_products limit="4"]');
                    }
                } else {
                    // If WooCommerce is not active, show message
                    echo '<p>Please install and activate WooCommerce to display products.</p>';
                }
                ?>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <h2>Sign Up For Our Newsletter</h2>
            <p>Get the latest updates on new products and exclusive offers</p>
            <form class="newsletter-form" id="newsletter-form">
                <input type="email" name="newsletter_email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>
</main>

<?php
get_footer();
