<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Enqueue styles and scripts
function custom_wp_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'custom_wp_theme_enqueue_styles');

// Register nav menus
function custom_wp_theme_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'custom-wp-theme'),
        'footer' => __('Footer Menu', 'custom-wp-theme'),
    ));
}
add_action('init', 'custom_wp_theme_register_menus');

// Add theme support
function custom_wp_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'custom_wp_theme_setup');

// Include theme customizer options
require_once get_template_directory() . '/inc/customizer.php';

// Include custom post types and taxonomies
require_once get_template_directory() . '/inc/custom-post-types.php';

// Include theme control panel
require_once get_template_directory() . '/inc/theme-control-panel.php';

// Elementor support
function custom_wp_theme_elementor_support() {
    update_option('elementor_disable_color_schemes', 'yes');
    update_option('elementor_disable_typography_schemes', 'yes');
    add_theme_support('elementor-page-transitions');
}
add_action('after_switch_theme', 'custom_wp_theme_elementor_support');

// WooCommerce specific functions
if (class_exists('WooCommerce')) {
    // Unhook default WooCommerce wrappers
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    // Hook your own wrappers
    add_action('woocommerce_before_main_content', 'custom_wp_theme_woocommerce_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'custom_wp_theme_woocommerce_wrapper_end', 10);
}

function custom_wp_theme_woocommerce_wrapper_start() {
    echo '<main id="main" class="site-main" role="main"><div class="container">';
}

function custom_wp_theme_woocommerce_wrapper_end() {
    echo '</div></main>';
}