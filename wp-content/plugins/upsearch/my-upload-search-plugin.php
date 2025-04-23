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

 // Hook contoh
 add_shortcode('upload_form', 'myusp_upload_form');

 function myusp_upload_form() {
     return '<form><input type="file" name="file"><button type="submit">Upload</button></form>';
 }