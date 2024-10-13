<?php
function custom_wp_theme_customize_register($wp_customize) {
    // Add sections for customization
    $wp_customize->add_section('custom_wp_theme_colors', array(
        'title' => __('Theme Colors', 'custom-wp-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_section('custom_wp_theme_fonts', array(
        'title' => __('Theme Fonts', 'custom-wp-theme'),
        'priority' => 35,
    ));

    // Add color settings
    $wp_customize->add_setting('primary_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'custom-wp-theme'),
        'section' => 'custom_wp_theme_colors',
    )));

    // Add font settings
    $wp_customize->add_setting('body_font', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('body_font', array(
        'label' => __('Body Font', 'custom-wp-theme'),
        'section' => 'custom_wp_theme_fonts',
        'type' => 'select',
        'choices' => array(
            'Arial, sans-serif' => 'Arial',
            'Helvetica, sans-serif' => 'Helvetica',
            'Georgia, serif' => 'Georgia',
            'Tahoma, sans-serif' => 'Tahoma',
        ),
    ));
}
add_action('customize_register', 'custom_wp_theme_customize_register');

function custom_wp_theme_customize_css() {
    ?>
    <style type="text/css">
        body { font-family: <?php echo get_theme_mod('body_font', 'Arial, sans-serif'); ?>; }
        a { color: <?php echo get_theme_mod('primary_color', '#007bff'); ?>; }
    </style>
    <?php
}
add_action('wp_head', 'custom_wp_theme_customize_css');