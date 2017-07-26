<?php
/*
Snap-on Name: Full of BS
Description: Snap-on for blog.briansahagun.com
Author: Brian Dys Sahagun
Version: 1.0
Author URI: http://applicator.dysinelab.com
*/

// Functionalities
if ( ! function_exists( 'apl_full_of_bs_func_class' ) ) {
    function apl_full_of_bs_func_class() {
		
        $applicator_name = 'apl';
        $snapon_name = $applicator_name . '--' . 'full-of-bs';
        
        echo ' ' . $snapon_name;
    
    }
    add_action( 'applicator_hook_html_class', 'apl_full_of_bs_func_class');
}


// Custom Fonts
require get_parent_theme_file_path( '/snapons/applicator/functions/custom-fonts.php' );

// Styles
if ( ! function_exists( 'apl_snapons_full_of_bs_func_styles' ) ) {
    function apl_snapons_full_of_bs_func_styles() {
        
        $snapon_name = 'full-of-bs';

        wp_enqueue_style( 'apl-style-fonts', applicator_fonts_url(), array(), null );
        add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        
        wp_enqueue_style( 'apl-snapons-'.$snapon_name.'-style', get_theme_file_uri() . '/snapons/'.$snapon_name.'/assets/'.$snapon_name.'.css', array(), '1.0', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_full_of_bs_func_styles', 0);
}