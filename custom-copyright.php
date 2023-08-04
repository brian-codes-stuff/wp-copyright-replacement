<?php
/**
 * Plugin Name: Custom Copyright
 * Plugin URI: https://brianalonzo.com
 * Description: This plugin changes the copyright information to the title of the website and the current year.
 * Version: 1.0
 * Author: Brian Alonzo
 * Author URI: https://brianalonzo.com
**/

function custom_copyright_start() {
    ob_start();
}
add_action('wp_footer', 'custom_copyright_start', 1);

function custom_copyright_end() {
    $footer_content = ob_get_clean();
    $site_title = get_bloginfo('name');
    $year = date('Y');

    $new_copyright = "© $year $site_title";
    $footer_content = preg_replace('/©\s\d{4}\s\w+/', $new_copyright, $footer_content);

    echo $footer_content;
}
add_action('wp_footer', 'custom_copyright_end', 100);
