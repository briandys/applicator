<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.3
Author URI: http://applicator.dysinelab.com
*/





// Functions
$custom_fonts = get_parent_theme_file_path( '/snapons/applicator/inc/functions/custom-fonts.php' );
if ( file_exists( $custom_fonts ) ) { require_once( $custom_fonts ); }

$customizer = get_parent_theme_file_path( '/snapons/applicator/inc/functions/customizer.php' );
if ( file_exists( $customizer ) ) { require_once( $customizer ); }

$customizer_custom_colors = get_parent_theme_file_path( '/snapons/applicator/inc/functions/customizer-custom-colors.php' );
if ( file_exists( $customizer_custom_colors ) ) { require_once( $customizer_custom_colors ); }





// HTML Classes
if ( ! function_exists( 'applicator_snapon_applicator_html_classes' ) ) {
    function applicator_snapon_applicator_html_classes() {// Terms
        
        // Variables
        $snapon_name = 'applicator-snapon--applicator';
        
        echo ' ' . $snapon_name;
        
        // Array of Class Names
        $r = array(
            
            // Functionalities
            'go-content-nav',
            'main-search',
            'main-menu',
            'easy-access-nav',
            'sub-nav',
            'go-start-nav',
            
            // Themes
            'theme--table--stroked',
            'theme--avatar--circular',
        ); 
        
        
        // Functionalities, Themes
        foreach ( ( array ) $r as $class_name ) {
            echo ' '. $snapon_name. '--'. $class_name;
        }
        
        
        // Customizer Colors
        $colors = applicator_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'default' ) );
        echo ' '. $snapon_name. '--'. 'theme--customizer-colors--'. $colors;
    
    }
    add_action( 'applicator_hook_html_class', 'applicator_snapon_applicator_html_classes');
}





// Styles
if ( ! function_exists( 'applicator_snapon_applicator_styles' ) ) {
    function applicator_snapon_applicator_styles() {

        add_editor_style( array( 'assets/css/editor-style.css' ) );
        
        wp_enqueue_style( 'applicator-snapon--applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/css/applicator.css', array( 'applicator-style--default' ) );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_applicator_styles', 0);
}





// Scripts
if ( ! function_exists( 'applicator_snapon_applicator_scripts' ) ) {
    function applicator_snapon_applicator_scripts() {
        
        wp_enqueue_script( 'applicator-snapon--applicator-script', get_theme_file_uri( '/snapons/applicator/assets/js/applicator.js' ), array( 'jquery' ), '25.5', true );
        
        // SVG Icons
        $arrow_icon = applicator_get_svg( array( 'icon' => 'arrow-icon', 'fallback' => true, ) );
        $arrow_up_2_icon = applicator_get_svg( array( 'icon' => 'arrow-up-2-icon', 'fallback' => true, ) );
        $burger_icon = applicator_get_svg( array( 'icon' => 'burger-icon', 'fallback' => true, ) );
        $dismiss_icon = applicator_get_svg( array( 'icon' => 'dismiss-icon', 'fallback' => true, ) );
        $search_icon = applicator_get_svg( array( 'icon' => 'search-icon', 'fallback' => true, ) );
        
        // Go to Start Nav
        $applicator_l10n['goStartNavArrowIco'] = $arrow_up_2_icon;
        wp_localize_script( 'applicator-snapon--applicator-script', 'aplDataGoStartNav', $applicator_l10n );
        
        // Main Menu
        $applicator_l10n['mainMenuShowL'] = __( 'Show Menu', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Menu', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-snapon--applicator-script', 'aplDataMainMenu', $applicator_l10n );
        
        // Main Search
        $applicator_l10n['mainSearchShowL'] = __( 'Show Search', 'applicator' );
        $applicator_l10n['mainSearchHideL'] = __( 'Hide Search', 'applicator' );
        $applicator_l10n['mainSearchTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchTogDismissIco'] = $dismiss_icon;
        $applicator_l10n['mainSearchSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchDismissIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-snapon--applicator-script', 'aplDataArbitNav', $applicator_l10n );
        
        // Sub-Navigation
        $applicator_l10n['subNavTogBtnShowL']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subNavTogBtnHideL']    = __( 'Hide Sub-Nav', 'applicator' );
        $applicator_l10n['subNavTogBtnIco']      = $arrow_icon;
        wp_localize_script( 'applicator-snapon--applicator-script', 'aplDataSubNav', $applicator_l10n );
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_applicator_scripts' );
}