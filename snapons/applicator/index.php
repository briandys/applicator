<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.0
Author URI: http://applicator.dysinelab.com
*/

if ( ! function_exists( 'apl_applicator_html_class' ) ) {
    function apl_applicator_html_class() {
		
        $snapon_name = 'apl--applicator';
        
        // Arbitrary Nav
        echo ' ' . $snapon_name;
        echo ' ' . $snapon_name . '--go-content-nav';
        echo ' ' . $snapon_name . '--go-start-nav';
        echo ' ' . $snapon_name . '--main-menu';
        echo ' ' . $snapon_name . '--arbitrary-nav';
    
    }
    add_action( 'apl_hook_html_class', 'apl_applicator_html_class');
}


//------------------------- Default Class via JS
if ( ! function_exists( 'applicator_snapons_applicator_class' ) ) {
    function applicator_snapons_applicator_class() { ?>
	   
        <script type="text/javascript">
            ( function( html ) {
                
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
if ( ! function_exists( 'apl_snapons_applicator_styles' ) ) {
    function apl_snapons_applicator_styles() {

        wp_enqueue_style( 'apl-style-fonts', applicator_fonts_url(), array(), null );
        
        add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        
        wp_enqueue_style( 'apl-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/applicator.css', array(), '10.6', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_styles', 0);
}


//------------------------- Scripts
if ( ! function_exists( 'apl_snapons_applicator_scripts' ) ) {
    function apl_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'apl-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/applicator.js' ), array( 'jquery' ), '9.8', true );
        
        $search_icon = applicator_get_svg( array( 'icon' => 'search--icon' ) );
        $dismiss_icon = applicator_get_svg( array( 'icon' => 'dismiss--icon' ) );
        $burger_icon = applicator_get_svg( array( 'icon' => 'burger--icon' ) );
        
        // Main Menu Control
        $applicator_l10n['mainMenuCtrlH'] = __( 'Main Menu Control', 'applicator' );
        $applicator_l10n['mainMenuShowL'] = __( 'Show Main Menu ', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Main Menu ', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataMainMenuTogL', $applicator_l10n );
        
        // Arbitrary Navigation Control
        $applicator_l10n['arbitNavCtrlH'] = __( 'Arbitrary Navigation Control', 'applicator' );
        $applicator_l10n['arbitNavShowL'] = __( 'Show Arbitrary Navigation ', 'applicator' );
        $applicator_l10n['arbitNavHideL'] = __( 'Hide Arbitrary Navigation ', 'applicator' );
        $applicator_l10n['arbitNavTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['arbitNavTogCtrlDismissIco'] = $dismiss_icon;
        $applicator_l10n['arbitNavSearchIco'] = $search_icon;
        $applicator_l10n['arbitNavDismissIco'] = $dismiss_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataArbitNav', $applicator_l10n );
        
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
}