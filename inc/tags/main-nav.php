<?php // Register Main Navigation
register_nav_menu( 'main-nav', __( 'Main Navigation', $GLOBALS['applicator_td'] ) );

// Main Nav
if ( ! function_exists( 'applicator_func_main_nav' ) ) {
    function applicator_func_main_nav() {
        
        $main_nav = 'main-nav';
        $main_nav_css = $main_nav;
        $main_nav_ct_cr_css = 'ct_cr main-nav---ct_cr';
        
        // Markup
        $main_nav_a_l_start_mu = '<span class="a_l main-navi---a_l"><span class="txt navi---txt">';
        $main_nav_a_l_end_mu = '</span></span>';
        
        if ( wp_nav_menu( array( 'theme_location' => $main_nav, 'echo' => false ) ) !== false) { ?>
        
            <nav id="main-nav" class="nav <?php echo $main_nav_css ?>" role="navigation" aria-label="Main Navigation" data-name="Main Navigation">
                <div class="cr main-nav---cr">
                    <div class="hr main-nav---hr">
                        <div class="hr_cr main-nav---hr_cr">
                            <h2 class="h main-nav---h"><span class="h_l main-nav---h_l"><?php esc_html_e( 'Main Navigation', $GLOBALS['applicator_td'] ); ?></span></h2>
                        </div>
                    </div>
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
                            'before'            => '<ul class="grp '. $main_nav_css . '---grp' .'">',
                            'after'             => '</ul>',
                        ) );

                    } else {

                        // Apperance > Menus (Custom Menu)
                        // Nav Item <li class="menu-item">
                        // Current Nav Item <li class="current-menu-item">
                        // Sub Navigation <ul class="sub-menu">
                        wp_nav_menu( array(
                            'theme_location'    => $main_nav,
                            'container'         => 'div',
                            'container_class'   => $main_nav_ct_cr_css, // <div> class
                            'link_before'       => $main_nav_a_l_start_mu,
                            'link_after'        => $main_nav_a_l_end_mu,
                            'items_wrap'        => '<ul class="grp '. $main_nav_css . '---grp' .'">%3$s</ul>',
                        ) );

                    } ?>
                    </div><!-- ct -->
                </div>
            </nav><!-- Main Navigation -->
        
        <?php }
    }
}

if ( ! function_exists( 'applicator_func_nav_menu_link_atts' ) ) {
    function applicator_func_nav_menu_link_atts( $atts, $item, $args, $depth ) {
        
        $new_atts = array( 'class' => 'main-navi---a' );
        if ( isset( $atts['href'] ) ) {
            $new_atts['href'] = $atts['href'];
        }
        return $new_atts;
    
    }
    add_filter( 'nav_menu_link_attributes', 'applicator_func_nav_menu_link_atts', 10, 4 );
}