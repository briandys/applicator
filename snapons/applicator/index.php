<?php
/*
Snap-on Name: Applicator
Description: Default Snap-on for Applicator WordPress Theme
Author: Brian Dys Sahagun
Version: 1.0
Author URI: http://applicator.dysinelab.com
*/

// Functionalities
if ( ! function_exists( 'apl_applicator_func_class' ) ) {
    function apl_applicator_func_class() {
		
        $snapon_name = 'apl--applicator';
        
        echo ' ' . $snapon_name;
        echo ' ' . $snapon_name . '--go-content-nav';
        echo ' ' . $snapon_name . '--go-start-nav';
        echo ' ' . $snapon_name . '--main-menu';
        echo ' ' . $snapon_name . '--main-search';
        echo ' ' . $snapon_name . '--sub-nav';
    
    }
    add_action( 'apl_hook_html_class', 'apl_applicator_func_class');
}


// Default Class via JS
if ( ! function_exists( 'applicator_snapons_applicator_class' ) ) {
    function applicator_snapons_applicator_class() { ?>
	   
        <script type="text/javascript">
            ( function( html ) {
                
                html.classList.add( '_applicator--article' );
                
                html.classList.remove( 'applicator-theme--default' );
            } ) ( document.documentElement );
        </script>
    
    <?php }
    add_action( 'wp_head', 'applicator_snapons_applicator_class' );
}


// Custom Fonts
require get_parent_theme_file_path( '/snapons/applicator/functions/custom-fonts.php' );

// Styles
if ( ! function_exists( 'apl_snapons_applicator_func_styles' ) ) {
    function apl_snapons_applicator_func_styles() {

        wp_enqueue_style( 'apl-style-fonts', applicator_fonts_url(), array(), null );
        add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        
        wp_enqueue_style( 'apl-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/applicator.css', array(), '16.2', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_func_styles', 0);
}


// Scripts
if ( ! function_exists( 'apl_snapons_applicator_scripts' ) ) {
    function apl_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'apl-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/applicator.js' ), array( 'jquery' ), '16.3', true );
        
        $arrow_icon = apl_func_get_svg( array( 'icon' => 'arrow-icon' ) );
        $arrow_up_2_icon = apl_func_get_svg( array( 'icon' => 'arrow-up-2-icon' ) );
        $burger_icon = apl_func_get_svg( array( 'icon' => 'burger-icon' ) );
        $dismiss_icon = apl_func_get_svg( array( 'icon' => 'dismiss-icon' ) );
        $search_icon = apl_func_get_svg( array( 'icon' => 'search-icon' ) );
        
        // Go to Start Nav
        $applicator_l10n['goStartNavArrowIco'] = $arrow_up_2_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataGoStartNav', $applicator_l10n );
        
        // Main Menu
        $applicator_l10n['mainMenuShowL'] = __( 'Show Main Menu', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Main Menu', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDataMainMenu', $applicator_l10n );
        
        // Main Search
        $applicator_l10n['mainSearchShowL'] = __( 'Show Main Search', 'applicator' );
        $applicator_l10n['mainSearchHideL'] = __( 'Hide Main Search', 'applicator' );
        $applicator_l10n['mainSearchTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchTogCtrlDismissIco'] = $dismiss_icon;
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