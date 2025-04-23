<?php
/**
 * Plugin Name: UpSearch (Upload Search View PDF)
 * Description: Plugin yang digunakan untuk fitur upload search view PDF
 * Version: 1.0
 * Author: Satria Jaka Prayoga
 * Author URI: https://satriajaka.site/
 */

 // Cegah akses langsung
 if (!defined('ABSPATH')) {
     exit;
 }

 // Load file upload admin page
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'includes/admin/upload-page.php';
}

// Shortcode Search
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes/search-form.php';


// Load CSS ke front-end
add_action('wp_enqueue_scripts', 'myusp_enqueue_styles');

function myusp_enqueue_styles() {
    wp_enqueue_style(
        'myusp-style',
        plugin_dir_url(__FILE__) . 'assets/css/style.css',
        [],
        '1.0.0'
    );
}