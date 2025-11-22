<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <span>Free Shipping on Orders Over $50</span>
            </div>
            <div class="header-top-right">
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">My Account</a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">Login / Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="header-main">
        <div class="container">
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => 'gameconsolez_fallback_menu',
                ));
                ?>
            </nav>
            
            <div class="header-actions">
                <button class="search-toggle" aria-label="Search">🔍</button>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-toggle">
                    🛒 <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
            </div>
        </div>
    </div>
</header>

<?php
// Fallback menu if no menu is assigned
function gameconsolez_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    if (function_exists('wc_get_page_permalink')) {
        echo '<li><a href="' . esc_url(wc_get_page_permalink('shop')) . '">Shop</a></li>';
    }
    echo '</ul>';
}
?>
