<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
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
        
        add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        
        wp_enqueue_style( 'applicator-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/css/default.css', array(), '1.5', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapons_applicator_styles', 0);
endif;


//------------------------- Scripts
if ( ! function_exists( 'applicator_snapons_applicator_scripts' ) ) :
    function applicator_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'applicator-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/js/default.js' ), array( 'jquery' ), '2.8', true );
        
        // Localization
        $applicator_l10n['searchShowLabel']      = __( 'Show Search', 'applicator' );
        $applicator_l10n['searchHideLabel']      = __( 'Hide Search', 'applicator' );
        
        wp_localize_script( 'applicator-snapons-applicator-script-global', 'applicatorSearchLabel', $applicator_l10n );
            
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapons_applicator_scripts' );
endif;