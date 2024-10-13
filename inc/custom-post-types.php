<?php
function custom_wp_theme_register_post_types() {
    // Register Custom Post Type
    $args = array(
        'label'               => __('Portfolio', 'custom-wp-theme'),
        'description'         => __('Portfolio items', 'custom-wp-theme'),
        'labels'              => array(
            'name'                => _x('Portfolio', 'Post Type General Name', 'custom-wp-theme'),
            'singular_name'       => _x('Portfolio Item', 'Post Type Singular Name', 'custom-wp-theme'),
        ),
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'portfolio'),
        'menu_icon'           => 'dashicons-portfolio',
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'custom_wp_theme_register_post_types', 0);