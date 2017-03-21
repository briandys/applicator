<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator Theme
Author: Brian Dys Sahagun
Version: 1.0
Author URI: http://applicator.dysinelab.com
*/


//------------------------- Default Class via JS
if ( ! function_exists( 'applicator_snapons_applicator_class' ) ) :
    function applicator_snapons_applicator_class() { ?>
	   
        <script type="text/javascript">( function( html ) { html.classList.add( 'applicator--theme' ); } ) ( document.documentElement );</script>
    
    <?php }
    add_action( 'wp_head', 'applicator_snapons_applicator_class' );
endif;


//------------------------- Custom Fonts
require get_parent_theme_file_path( '/snapons/applicator/inc/functions/custom-fonts.php' );


//------------------------- Styles
if ( ! function_exists( 'applicator_snapons_applicator_styles' ) ) :
    function applicator_snapons_applicator_styles() {

        wp_enqueue_style( 'applicator-style-fonts', applicator_fonts_url(), array(), null );
        
        wp_enqueue_style( 'applicator-snapons-applicator-style', get_template_directory_uri() . '/snapons/applicator/assets/css/default.css', array(), '1.0', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapons_applicator_styles', 0);
endif;