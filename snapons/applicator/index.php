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
		
        $applicator_name = 'apl';
        $snapon_name = $applicator_name . '--' . 'applicator';
        
        
        echo ' ' . $snapon_name;
        echo ' ' . $snapon_name . '--' . 'go-content-nav';
        echo ' ' . $snapon_name . '--' . 'go-start-nav';
        
        echo ' ' . $snapon_name . '--' . 'main-menu';
        
        echo ' ' . $snapon_name . '--' . 'main-search';
        
        echo ' ' . $snapon_name . '--' . 'sub-nav';
        
        echo ' ' . $snapon_name . '--' . 'easy-access-nav';
        
        echo ' ' . $snapon_name . '--' . 'theme--table--stroked';
    
    }
    add_action( 'applicator_hook_html_class', 'apl_applicator_func_class');
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
// require get_parent_theme_file_path( '/snapons/applicator/functions/custom-fonts.php' );

// Styles
if ( ! function_exists( 'apl_snapons_applicator_func_styles' ) ) {
    function apl_snapons_applicator_func_styles() {

        // wp_enqueue_style( 'apl-style-fonts', applicator_fonts_url(), array(), null );
        // add_editor_style( array( 'assets/css/editor-style.css', applicator_fonts_url() ) );
        add_editor_style( array( 'assets/css/editor-style.css', ) );
        
        wp_enqueue_style( 'apl-snapons-applicator-style', get_theme_file_uri() . '/snapons/applicator/assets/applicator.css', array(), '25.5', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_func_styles', 0);
}


// Scripts
if ( ! function_exists( 'apl_snapons_applicator_scripts' ) ) {
    function apl_snapons_applicator_scripts() {
        
        wp_enqueue_script( 'apl-snapons-applicator-script-global', get_theme_file_uri( '/snapons/applicator/assets/applicator.js' ), array( 'jquery' ), '25.3', true );
        
        // EQCSS
        // wp_enqueue_script( 'apl-snapons-applicator-script-eqcss', get_theme_file_uri( '/snapons/applicator/assets/eqcss.min.js' ), array(), '1.0', true );
        
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

/*
// EQCSS Style
// https://discourse.wicg.io/t/position-an-element-relatively-to-another-element-from-anywhere-in-the-dom/968/49
if ( ! function_exists( 'apl_snapons_applicator_eqcss' ) ) {
    function apl_snapons_applicator_eqcss() { ?>
	   
        <script type="text/eqcss">
            <?php
            $eqcss = file_get_contents( get_theme_file_uri() . '/snapons/applicator/assets/applicator.eqcss' );
            echo $eqcss;
            ?>
        </script>
    
    <?php }
    add_action( 'wp_footer', 'apl_snapons_applicator_eqcss' );
}
*/