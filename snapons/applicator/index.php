<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.0
Author URI: http://applicator.dysinelab.com
*/


//------------------------- Default Class via JS
if ( ! function_exists( 'applicator_snapons_applicator_class' ) ) {
    function applicator_snapons_applicator_class() { ?>
	   
        <script type="text/javascript">
            ( function( html ) {
                
                // Snap-on Name
                html.classList.add( 'apl--applicator' );
                
                // Go to Content Nav
                html.classList.add( 'apl--applicator--go-content-nav' );
                
                // Main Menu
                html.classList.add( 'apl--applicator--main-menu' );
                
                // Go to Start Nav
                html.classList.add( 'apl--applicator--go-start-nav' );
                
                // Arbitrary Nav
                html.classList.add( 'apl--applicator--arbit-nav' );
                
                
                html.classList.add( 'applicator--sub-nav' );
                
                html.classList.add( '_applicator--article' );
                
                html.classList.remove( 'applicator-theme--default' );
            } ) ( document.documentElement );
        </script>
    
    <?php }
    add_action( 'wp_head', 'applicator_snapons_applicator_class' );
}


//------------------------- Custom Fonts
require get_parent_theme_file_path( '/snapons/applicator/functions/custom-fonts.php' );


//------------------------- Styles
if ( ! function_exists( 'apl_snapons_applicator_styles' ) ) :
    function apl_snapons_applicator_styles() {

        wp_enqueue_style( 'apl-style-fonts', applicator_fonts_url(), array(), null );
        
        add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        
        wp_enqueue_style( 'apl-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/applicator.css', array(), '9.9', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_styles', 0);
endif;


//------------------------- Scripts
if ( ! function_exists( 'apl_snapons_applicator_scripts' ) ) :
    function apl_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'apl-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/applicator.js' ), array( 'jquery' ), '9.2', true );
        
        // Main Menu Control
        $applicator_l10n['mainMenuCtrlH'] = __( 'Main Menu Control', 'applicator' );
        $applicator_l10n['mainMenuShowL'] = __( 'Show Main Menu ', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Main Menu ', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = applicator_get_svg( array( 'icon' => 'burger--icon' ) );
        $applicator_l10n['mainMenuHideIco'] = applicator_get_svg( array( 'icon' => 'dismiss--icon' ) );
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataMainMenuTogL', $applicator_l10n );
        
        // Localization
        $applicator_l10n['subnavShowLabel']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subnavHideLabel']    = __( 'Hide Sub-Nav', 'applicator' );
        $applicator_l10n['subnavIcon']         = applicator_get_svg( array( 'icon' => 'arrow--icon' ) );
        wp_localize_script( 'apl-snapons-applicator-script-global', 'applicatorSubnavLabel', $applicator_l10n );
        
        
        $applicator_l10n['searchShowLabel']      = __( 'Show Search', 'applicator' );
        $applicator_l10n['searchHideLabel']      = __( 'Hide Search', 'applicator' );
        $applicator_l10n['searchIcon']           = applicator_get_svg( array( 'icon' => 'search--icon', 'fallback' => true ) );
        $applicator_l10n['searchDismissIcon']           = applicator_get_svg( array( 'icon' => 'dismiss--icon' ) );
        wp_localize_script( 'apl-snapons-applicator-script-global', 'applicatorSearchLabel', $applicator_l10n );
        
        
        $applicator_l10n['mainNavHeaderAsideMenuShowLabel']      = __( 'Show Main Navigation', 'applicator' );
        $applicator_l10n['mainNavHeaderAsideMenuHideLabel']      = __( 'Hide Main Navigation', 'applicator' );
        $applicator_l10n['mainNavHeaderAsideMenuIcon']           = applicator_get_svg( array( 'icon' => 'burger--icon', 'fallback' => true ) );
        $applicator_l10n['mainNavHeaderAsideMenuDismissIcon']    = applicator_get_svg( array( 'icon' => 'dismiss--icon', 'fallback' => true ) );
        
        wp_localize_script( 'apl-snapons-applicator-script-global', 'applicatormainNavHeaderAsideMenuLabel', $applicator_l10n );
        
        
            
    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_scripts' );
endif;