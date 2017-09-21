<?php
/*
Snap-on Name: Multisite Directory
Description: Provides a Page Template to display a Multisite Directory
Author: Brian Dys Sahagun
Version: 0.0.1
Author URI: http://applicator.dysinelab.com
*/





// HTML Classes
if ( ! function_exists( 'applicator_snapon_multisite_directory_html_classes' ) ) {
    function applicator_snapon_multisite_directory_html_classes() {
        
        // Variables
        $snapon_name = 'applicator-snapon--multisite-directory';
        
        echo ' ' . $snapon_name;
        
        if ( is_multisite() && is_page_template( 'multisite-directory.php' ) ) {
            echo ' ' . 'view--multisite-directory';
        }
    }
    add_action( 'applicator_hook_html_class', 'applicator_snapon_multisite_directory_html_classes');
}





// Styles
if ( ! function_exists( 'applicator_snapon_multisite_directory_styles' ) ) {
    function applicator_snapon_multisite_directory_styles() {

        wp_enqueue_style( 'applicator-snapon--multisite-directory-style', get_theme_file_uri() . '/snapons/multisite-directory/assets/css/multisite-directory.css', array( 'applicator-snapon--applicator-style' ) );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_multisite_directory_styles', 0);
}