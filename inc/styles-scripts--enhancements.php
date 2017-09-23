<?php





// Scripts
if ( ! function_exists( 'applicator_enhancements_styles_scripts' ) ) {
    function applicator_enhancements_styles_scripts() {
        
        
        // Styles
        wp_enqueue_style( 'applicator-style--applicator', get_theme_file_uri( '/assets/css/applicator.css' ), array( 'applicator-style--default' ) );
        
        if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) ) {
            wp_enqueue_style( 'applicator-style--multisite-directory', get_theme_file_uri( '/assets/css/multisite-directory.css.css' ), array( 'applicator-style--applicator' ) );
        }
        
        
        // Scripts
        wp_enqueue_script( 'applicator-script--functionalities', get_theme_file_uri( '/assets/js/applicator.js' ), array( 'jquery', 'applicator-script--global' ), '25.6.0', true );
        
        // SVG Icons
        $arrow_icon = applicator_get_svg( array( 'icon' => 'arrow-icon', 'fallback' => true, ) );
        $arrow_up_2_icon = applicator_get_svg( array( 'icon' => 'arrow-up-2-icon', 'fallback' => true, ) );
        $burger_icon = applicator_get_svg( array( 'icon' => 'burger-icon', 'fallback' => true, ) );
        $dismiss_icon = applicator_get_svg( array( 'icon' => 'dismiss-icon', 'fallback' => true, ) );
        $search_icon = applicator_get_svg( array( 'icon' => 'search-icon', 'fallback' => true, ) );
        
        // Go to Start Nav
        $applicator_l10n['goStartNavArrowIco'] = $arrow_up_2_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataGoStartNav', $applicator_l10n );
        
        // Main Menu
        $applicator_l10n['mainMenuShowL'] = __( 'Show Menu', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Menu', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = $burger_icon;
        $applicator_l10n['mainMenuHideIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataMainMenu', $applicator_l10n );
        
        // Main Search
        $applicator_l10n['mainSearchShowL'] = __( 'Show Search', 'applicator' );
        $applicator_l10n['mainSearchHideL'] = __( 'Hide Search', 'applicator' );
        $applicator_l10n['mainSearchTogCtrlSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchTogDismissIco'] = $dismiss_icon;
        $applicator_l10n['mainSearchSearchIco'] = $search_icon;
        $applicator_l10n['mainSearchDismissIco'] = $dismiss_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataArbitNav', $applicator_l10n );
        
        // Sub-Navigation
        $applicator_l10n['subNavTogBtnShowL']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subNavTogBtnHideL']    = __( 'Hide Sub-Nav', 'applicator' );
        $applicator_l10n['subNavTogBtnIco']      = $arrow_icon;
        wp_localize_script( 'applicator-script--functionalities', 'aplDataSubNav', $applicator_l10n );
    }
    add_action( 'wp_enqueue_scripts', 'applicator_enhancements_styles_scripts' );
}