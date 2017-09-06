<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.1
Author URI: http://applicator.dysinelab.com
*/


// Functions
$custom_fonts = get_parent_theme_file_path( '/snapons/applicator/inc/functions/custom-fonts.php' );
if ( file_exists( $custom_fonts ) ) { require_once( $custom_fonts ); }

$customizer = get_parent_theme_file_path( '/snapons/applicator/inc/functions/customizer.php' );
if ( file_exists( $customizer ) ) { require_once( $customizer ); }

$customizer_custom_colors = get_parent_theme_file_path( '/snapons/applicator/inc/functions/customizer-custom-colors.php' );
if ( file_exists( $customizer_custom_colors ) ) { require_once( $customizer_custom_colors ); }


// Functionalities
if ( ! function_exists( 'apl_applicator_func_class' ) ) {
    function apl_applicator_func_class() {
		
        $applicator_name = 'apl';
        $snapon_name = $applicator_name . '--' . 'applicator';
        
        echo ' ' . $snapon_name;
        
        $r = array(
            'go-content-nav',
            'main-search',
            'main-menu',
            'easy-access-nav',
            'sub-nav',
            'go-start-nav',
            'theme--table--stroked',
            'theme--avatar--circular',
        ); 
        
        foreach ( ( array ) $r as $val ) {
            echo ' '. $snapon_name. '--'. $val;
        }
        
        // Get the colorscheme or the default if there isn't one.
        $colors = applicator_func_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'default' ) );
        echo ' '. $snapon_name. '--theme--customizer-colors--'. $colors;
    
    }
    add_action( 'applicator_hook_html_class', 'apl_applicator_func_class');
}


// Styles
if ( ! function_exists( 'apl_snapons_applicator_styles' ) ) {
    function apl_snapons_applicator_styles() {

        add_editor_style( array( 'assets/css/editor-style.css' ) );
        
        wp_enqueue_style( 'apl-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/css/applicator.css', array(), '25.5', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_styles', 0);
}


// Scripts
if ( ! function_exists( 'apl_snapons_applicator_scripts' ) ) {
    function apl_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'apl-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/js/applicator.js' ), array( 'jquery' ), '25.3', true );
        
        $arrow_icon = applicator_func_get_svg( array( 'icon' => 'arrow-icon', 'fallback' => true, ) );
        $arrow_up_2_icon = applicator_func_get_svg( array( 'icon' => 'arrow-up-2-icon', 'fallback' => true, ) );
        $burger_icon = applicator_func_get_svg( array( 'icon' => 'burger-icon', 'fallback' => true, ) );
        $dismiss_icon = applicator_func_get_svg( array( 'icon' => 'dismiss-icon', 'fallback' => true, ) );
        $search_icon = applicator_func_get_svg( array( 'icon' => 'search-icon', 'fallback' => true, ) );
        
        // Go to Start Nav
        $applicator_l10n['goStartNavArrowIco'] = $arrow_up_2_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataGoStartNav', $applicator_l10n );
        
        // Main Menu
        $applicator_l10n['mainMenuShowL'] = __( 'Show Menu', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Menu', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataMainMenu', $applicator_l10n );
        
        // Main Search
        $applicator_l10n['mainSearchShowL'] = __( 'Show Search', 'applicator' );
        $applicator_l10n['mainSearchHideL'] = __( 'Hide Search', 'applicator' );
        $applicator_l10n['mainSearchTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchTogDismissIco'] = $dismiss_icon;
        $applicator_l10n['mainSearchSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchDismissIco'] = $dismiss_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataArbitNav', $applicator_l10n );
        
        // Sub-Navigation
        $applicator_l10n['subNavTogBtnShowL']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subNavTogBtnHideL']    = __( 'Hide Sub-Nav', 'applicator' );
        $applicator_l10n['subNavTogBtnIco']      = $arrow_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataSubNav', $applicator_l10n );
    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_scripts' );
}