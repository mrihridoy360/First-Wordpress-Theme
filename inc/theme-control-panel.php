<?php
function custom_wp_theme_add_admin_menu() {
    add_menu_page(
        __('Theme Control Panel', 'custom-wp-theme'),
        __('Theme Control', 'custom-wp-theme'),
        'manage_options',
        'theme_control_panel',
        'custom_wp_theme_control_panel_page',
        'dashicons-admin-generic',
        60
    );
}
add_action('admin_menu', 'custom_wp_theme_add_admin_menu');

function custom_wp_theme_control_panel_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('theme_control_options');
            do_settings_sections('theme_control_panel');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

function custom_wp_theme_settings_init() {
    register_setting('theme_control_options', 'custom_wp_theme_options');

    add_settings_section(
        'custom_wp_theme_control_panel_section',
        __('Theme Settings', 'custom-wp-theme'),
        'custom_wp_theme_settings_section_callback',
        'theme_control_panel'
    );

    add_settings_field(
        'header_logo',
        __('Header Logo', 'custom-wp-theme'),
        'custom_wp_theme_header_logo_render',
        'theme_control_panel',
        'custom_wp_theme_control_panel_section'
    );

    add_settings_field(
        'footer_text',
        __('Footer Text', 'custom-wp-theme'),
        'custom_wp_theme_footer_text_render',
        'theme_control_panel',
        'custom_wp_theme_control_panel_section'
    );
}
add_action('admin_init', 'custom_wp_theme_settings_init');

function custom_wp_theme_settings_section_callback() {
    echo __('Customize your theme settings here.', 'custom-wp-theme');
}

function custom_wp_theme_header_logo_render() {
    $options = get_option('custom_wp_theme_options');
    ?>
    <input type="text" name="custom_wp_theme_options[header_logo]" value="<?php echo $options['header_logo'] ?? ''; ?>">
    <?php
}

function custom_wp_theme_footer_text_render() {
    $options = get_option('custom_wp_theme_options');
    ?>
    <textarea name="custom_wp_theme_options[footer_text]"><?php echo $options['footer_text'] ?? ''; ?></textarea>
    <?php
}