<?php
/**
 * Modern Portfolio Theme Functions
 *
 * @package Modern_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Include template tags functions
 */
require get_template_directory() . '/template-tags.php';

/**
 * Theme Setup
 */
function modern_portfolio_setup() {
	// Add theme support for various features
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'modern-portfolio' ),
		'footer'  => esc_html__( 'Footer Menu', 'modern-portfolio' ),
	) );

	// Set content width
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'modern_portfolio_setup' );

/**
 * Enqueue scripts and styles
 */
function modern_portfolio_scripts() {
	// Enqueue styles
	wp_enqueue_style( 'modern-portfolio-style', get_stylesheet_uri(), array(), '1.0.0' );
	
	// Enqueue Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Enqueue scripts
	wp_enqueue_script( 'modern-portfolio-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );

	// Localize script for AJAX
	wp_localize_script( 'modern-portfolio-script', 'portfolioAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'portfolio_nonce' ),
	) );

	// Enqueue comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modern_portfolio_scripts' );

/**
 * Register widget areas
 */
function modern_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'modern-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'modern-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'modern_portfolio_widgets_init' );

/**
 * Get theme option helper function
 */
function modern_portfolio_get_option( $option_name, $default = '' ) {
	return get_theme_mod( $option_name, $default );
}

/**
 * Custom excerpt length
 */
function modern_portfolio_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'modern_portfolio_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
function modern_portfolio_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'modern_portfolio_excerpt_more' );

/**
 * Register Portfolio Custom Post Type
 */
function modern_portfolio_register_portfolio_post_type() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'modern-portfolio' ),
		'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'modern-portfolio' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'modern-portfolio' ),
		'add_new'            => _x( 'Add New', 'portfolio item', 'modern-portfolio' ),
		'add_new_item'       => __( 'Add New Portfolio Item', 'modern-portfolio' ),
		'edit_item'          => __( 'Edit Portfolio Item', 'modern-portfolio' ),
		'new_item'           => __( 'New Portfolio Item', 'modern-portfolio' ),
		'all_items'          => __( 'All Portfolio Items', 'modern-portfolio' ),
		'view_item'          => __( 'View Portfolio Item', 'modern-portfolio' ),
		'search_items'       => __( 'Search Portfolio', 'modern-portfolio' ),
		'not_found'          => __( 'No portfolio items found', 'modern-portfolio' ),
		'not_found_in_trash' => __( 'No portfolio items found in Trash', 'modern-portfolio' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'modern_portfolio_register_portfolio_post_type' );

/**
 * Register Portfolio Categories Taxonomy
 */
function modern_portfolio_register_portfolio_taxonomy() {
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'modern-portfolio' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'modern-portfolio' ),
		'search_items'      => __( 'Search Categories', 'modern-portfolio' ),
		'all_items'         => __( 'All Categories', 'modern-portfolio' ),
		'parent_item'       => __( 'Parent Category', 'modern-portfolio' ),
		'parent_item_colon' => __( 'Parent Category:', 'modern-portfolio' ),
		'edit_item'         => __( 'Edit Category', 'modern-portfolio' ),
		'update_item'       => __( 'Update Category', 'modern-portfolio' ),
		'add_new_item'      => __( 'Add New Category', 'modern-portfolio' ),
		'new_item_name'     => __( 'New Category Name', 'modern-portfolio' ),
		'menu_name'         => __( 'Categories', 'modern-portfolio' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-category' ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
add_action( 'init', 'modern_portfolio_register_portfolio_taxonomy' );

/**
 * Register Testimonials Custom Post Type
 */
function modern_portfolio_register_testimonials_post_type() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'modern-portfolio' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'modern-portfolio' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'modern-portfolio' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'modern-portfolio' ),
		'add_new_item'       => __( 'Add New Testimonial', 'modern-portfolio' ),
		'edit_item'          => __( 'Edit Testimonial', 'modern-portfolio' ),
		'new_item'           => __( 'New Testimonial', 'modern-portfolio' ),
		'all_items'          => __( 'All Testimonials', 'modern-portfolio' ),
		'view_item'          => __( 'View Testimonial', 'modern-portfolio' ),
		'search_items'       => __( 'Search Testimonials', 'modern-portfolio' ),
		'not_found'          => __( 'No testimonials found', 'modern-portfolio' ),
		'not_found_in_trash' => __( 'No testimonials found in Trash', 'modern-portfolio' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-format-quote',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'modern_portfolio_register_testimonials_post_type' );

/**
 * Customizer Settings
 */
function modern_portfolio_customize_register( $wp_customize ) {
	// Hero Section
	$wp_customize->add_section( 'hero_section', array(
		'title'    => __( 'Hero Section', 'modern-portfolio' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'hero_title', array(
		'default'           => 'Illustrator & Visual Designer',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hero_title', array(
		'label'   => __( 'Hero Title', 'modern-portfolio' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_description', array(
		'default'           => 'I\'m a Designer & Developer, creating minimal modern designs and products.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );

	$wp_customize->add_control( 'hero_description', array(
		'label'   => __( 'Hero Description', 'modern-portfolio' ),
		'section' => 'hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_image', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
		'label'   => __( 'Hero Image', 'modern-portfolio' ),
		'section' => 'hero_section',
	) ) );

	// Stats
	$wp_customize->add_setting( 'years_experience', array(
		'default'           => '6',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'years_experience', array(
		'label'   => __( 'Years of Experience', 'modern-portfolio' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'projects_done', array(
		'default'           => '683',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'projects_done', array(
		'label'   => __( 'Projects Done', 'modern-portfolio' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	// Social Links
	$wp_customize->add_section( 'social_links', array(
		'title'    => __( 'Social Links', 'modern-portfolio' ),
		'priority' => 35,
	) );

	$social_networks = array( 'instagram', 'tiktok', 'dribbble', 'behance' );

	foreach ( $social_networks as $network ) {
		$wp_customize->add_setting( 'social_' . $network, array(
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_' . $network, array(
			'label'   => ucfirst( $network ) . ' URL',
			'section' => 'social_links',
			'type'    => 'url',
		) );
	}

	// Contact Information
	$wp_customize->add_section( 'contact_info', array(
		'title'    => __( 'Contact Information', 'modern-portfolio' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'contact_location', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'contact_location', array(
		'label'   => __( 'Location', 'modern-portfolio' ),
		'section' => 'contact_info',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'contact_email', array(
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'contact_email', array(
		'label'   => __( 'Email', 'modern-portfolio' ),
		'section' => 'contact_info',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'contact_phone', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'contact_phone', array(
		'label'   => __( 'Phone', 'modern-portfolio' ),
		'section' => 'contact_info',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'modern_portfolio_customize_register' );
