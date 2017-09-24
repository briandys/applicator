<?php // Enhancements Styles and Scripts





// Scripts
if ( ! function_exists( 'applicator_enhancements_styles_scripts' ) ) {
    function applicator_enhancements_styles_scripts() {
        
        
        /*------------ Styles ------------*/
        
        // Enhancements
        wp_enqueue_style( 'applicator-style--enhancements', get_theme_file_uri( '/assets/css/enhancements.css' ), array( 'applicator-style--default' ) );
        
        
        /*------------ Scripts ------------*/
        
        
        // Enhancements
        wp_enqueue_script( 'applicator-script--functionalities', get_theme_file_uri( '/assets/js/enhancements.js' ), array( 'jquery', 'applicator-script--global' ), '25.6.0', true );
        
        
        // SVG Icons
        $arrow_icon = applicator_get_svg( array( 'icon' => 'arrow-icon', 'fallback' => true, ) );
        $arrow_up_2_icon = applicator_get_svg( array( 'icon' => 'arrow-up-2-icon', 'fallback' => true, ) );
        $burger_icon = applicator_get_svg( array( 'icon' => 'burger-icon', 'fallback' => true, ) );
        $dismiss_icon = applicator_get_svg( array( 'icon' => 'dismiss-icon', 'fallback' => true, ) );
        $search_icon = applicator_get_svg( array( 'icon' => 'search-icon', 'fallback' => true, ) );
        
        
        // Go to Start Nav Icons
        $applicator_l10n['goStartNavArrowIco'] = $arrow_up_2_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataGoStartNav', $applicator_l10n );
        
        
        // Main Menu Icons
        $applicator_l10n['mainMenuShowL'] = __( 'Show Menu', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Menu', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataMainMenu', $applicator_l10n );
        
        
        // Main Search Icons Icons
        $applicator_l10n['mainSearchShowL'] = __( 'Show Search', 'applicator' );
        $applicator_l10n['mainSearchHideL'] = __( 'Hide Search', 'applicator' );
        $applicator_l10n['mainSearchTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchTogDismissIco'] = $dismiss_icon;
        $applicator_l10n['mainSearchSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchDismissIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataArbitNav', $applicator_l10n );
        
        
        // Sub-Nav Icons
        $applicator_l10n['subNavTogBtnShowL']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subNavTogBtnHideL']    = __( 'Hide Sub-Nav', 'applicator' );
        $applicator_l10n['subNavTogBtnIco']      = $arrow_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataSubNav', $applicator_l10n );
    }
    add_action( 'wp_enqueue_scripts', 'applicator_enhancements_styles_scripts' );
}








// HTML Classes
if ( ! function_exists( 'applicator_functionalities_html_classes' ) ) {
    function applicator_functionalities_html_classes() {
        
        // Variables
        $theme_name = 'applicator';
        
        echo ' ' . $theme_name;
        
        // Array of CSS Class Names
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
            echo ' '. $theme_name. '--'. $class_name;
        }
    }
    add_action( 'applicator_hook_html_class', 'applicator_functionalities_html_classes');
}