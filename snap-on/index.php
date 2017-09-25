<?php





/*------------ Styles ------------*/
if ( ! function_exists( 'applicator_snapon_styles_scripts' ) ) {
    
    function applicator_snapon_styles_scripts() {

        
        // Applicator
        wp_enqueue_style( 'applicator-snapon--style', get_theme_file_uri( '/snap-on/assets/css/applicator.css' ), array( 'applicator-style--enhancements' ) );

        
        // Multisite Directory
        if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) ) {
            wp_enqueue_style( 'applicator-snapon--style--multisite-directory', get_theme_file_uri( '/snap-on/assets/css/multisite-directory.css' ), array( 'applicator-snapon--style' ) );
        }

        
        // Themes
        wp_enqueue_style( 'applicator-snapon--style--themes', get_theme_file_uri( '/snap-on/assets/css/themes.css' ), array( 'applicator-snapon--style' ) );

        
        // Main Header
        wp_enqueue_style( 'applicator-snapon--style--main-header', get_theme_file_uri( '/snap-on/assets/css/main-header.css' ), array( 'applicator-snapon--style' ) );
        
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_styles_scripts', 0);

}