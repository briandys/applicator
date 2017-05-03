<?php // Register Main Navigation
register_nav_menu( 'main-nav', __( 'Main Navigation', 'applicator' ) );


// Primary Navigation
if ( ! function_exists( 'apl_func_main_nav' ) ) {
    function apl_func_main_nav() {
        
        $main_nav_css = 'main-nav';
        $main_nav_ct_cr_css = 'ct_cr main-nav---ct_cr';
        $main_nav_a_l_start_mu = '<span class="a_l main-nav---a_l"><span class="word navi---word">';
        $main_nav_a_l_end_mu = '</span></span>';
        
        if ( wp_nav_menu( array( 'theme_location' => $main_nav_css, 'echo' => false ) ) !== false) { ?>
        
            <?php //------------------------- Sub-Constructor: Main Navigation ------------------------- ?>
            <nav id="main-nav" class="nav main-nav" role="navigation" aria-label="Main Navigation" data-name="Main Navigation">
                <div class="cr main-nav---cr">
                    <h2 class="h main-nav---h"><span class="h_l main-nav---h_l"><?php esc_html_e( 'Main Navigation', 'applicator' ); ?></span></h2>
                    <div class="ct main-nav---ct">
                    <?php if ( ! has_nav_menu( 'main-nav' ) ) {

                        // Default Menu
                        // Nav Item <li class="page_item">
                        // Current Nav Item <li class="current_page_item">
                        // Sub Navigation <ul class="children">
                        wp_page_menu( array(
                            'menu_class'        => $main_nav_ct_cr_css, // <div> class
                            'link_before'       => $main_nav_a_l_start_mu,
                            'link_after'        => $main_nav_a_l_end_mu,
                            'show_home'         => true,
                        ) );

                    } else {

                        // Apperance > Menus (Custom Menu)
                        // Nav Item <li class="menu-item">
                        // Current Nav Item <li class="current-menu-item">
                        // Sub Navigation <ul class="sub-menu">
                        wp_nav_menu( array(
                            'theme_location'    => $main_nav_css,
                            'container'         => 'div',
                            'container_class'   => $main_nav_ct_cr_css, // <div> class
                            'link_before'       => $main_nav_a_l_start_mu,
                            'link_after'        => $main_nav_a_l_end_mu,
                        ) );

                    } ?>
                    </div>
                </div>
            </nav><!-- main-nav -->
        
        <?php }
    }
}