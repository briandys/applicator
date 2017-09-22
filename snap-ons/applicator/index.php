<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.3.0
Author URI: http://applicator.dysinelab.com
*/





// Styles
if ( ! function_exists( 'applicator_snapon_applicator_styles' ) ) {
    function applicator_snapon_applicator_styles() {

        wp_enqueue_style( 'applicator-snapon--applicator-style', trailingslashit( get_theme_file_uri() ). 'snap-ons/applicator/assets/css/applicator.css', array( 'applicator-style--applicator' ) );
        
        wp_enqueue_style( 'applicator-snapon--applicator-style--main-header', trailingslashit( get_theme_file_uri() ). 'snap-ons/applicator/assets/css/main-header.css', array( 'applicator-snapon--applicator-style' ) );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_applicator_styles', 0);
}