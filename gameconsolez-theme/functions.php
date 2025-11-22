<?php
/**
 * GameConsolez Theme Functions
 */

// Enqueue styles and scripts
function gameconsolez_enqueue_styles() {
    wp_enqueue_style('gameconsolez-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('gameconsolez-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('gameconsolez-script', 'gameconsolez_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'gameconsolez_enqueue_styles');

// Theme setup
function gameconsolez_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gameconsolez'),
        'footer' => __('Footer Menu', 'gameconsolez'),
    ));
}
add_action('after_setup_theme', 'gameconsolez_setup');

// Register widget areas
function gameconsolez_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'gameconsolez'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'gameconsolez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'gameconsolez_widgets_init');

// Customize WooCommerce
function gameconsolez_woocommerce_setup() {
    // Remove default WooCommerce wrappers
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    
    // Add custom wrappers
    add_action('woocommerce_before_main_content', 'gameconsolez_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'gameconsolez_wrapper_end', 10);
}
add_action('init', 'gameconsolez_woocommerce_setup');

function gameconsolez_wrapper_start() {
    echo '<div class="woocommerce-wrapper"><div class="container">';
}

function gameconsolez_wrapper_end() {
    echo '</div></div>';
}

// Change number of products per row
function gameconsolez_loop_columns() {
    return 4;
}
add_filter('loop_shop_columns', 'gameconsolez_loop_columns', 999);

// Change number of products per page
function gameconsolez_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'gameconsolez_products_per_page', 20);

// Custom product categories shortcode
function gameconsolez_categories_shortcode($atts) {
    $atts = shortcode_atts(array(
        'number' => 4,
    ), $atts);
    
    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'number' => $atts['number'],
    ));
    
    if (empty($categories) || is_wp_error($categories)) {
        return '';
    }
    
    $output = '<div class="categories-grid">';
    foreach ($categories as $category) {
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        
        $output .= '<a href="' . esc_url(get_term_link($category)) . '" class="category-card">';
        if ($image) {
            $output .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($category->name) . '">';
        } else {
            $output .= '<div style="height: 150px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">';
            $output .= '<span style="font-size: 48px;">🎮</span>';
            $output .= '</div>';
        }
        $output .= '<h3>' . esc_html($category->name) . '</h3>';
        $output .= '</a>';
    }
    $output .= '</div>';
    
    return $output;
}
add_shortcode('gameconsolez_categories', 'gameconsolez_categories_shortcode');

// Newsletter form handler
function gameconsolez_newsletter_submit() {
    if (isset($_POST['newsletter_email']) && is_email($_POST['newsletter_email'])) {
        $email = sanitize_email($_POST['newsletter_email']);
        // Add your newsletter integration here (Mailchimp, etc.)
        // For now, just return success
        wp_send_json_success(array('message' => 'Thank you for subscribing!'));
    }
    wp_send_json_error(array('message' => 'Invalid email address.'));
}
add_action('wp_ajax_newsletter_submit', 'gameconsolez_newsletter_submit');
add_action('wp_ajax_nopriv_newsletter_submit', 'gameconsolez_newsletter_submit');
