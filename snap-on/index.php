<?php





/* ------------------------ Styles and Scripts ------------------------ */
if ( ! function_exists( 'applicator_snapon_styles_scripts' ) ) {
    
    function applicator_snapon_styles_scripts() {
        
        // Applicator
        wp_enqueue_style( 'applicator-snapon--style', get_theme_file_uri( '/snap-on/assets/css/applicator.css' ), array( 'applicator-style--enhancements' ) );
        
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_styles_scripts', 0);

}