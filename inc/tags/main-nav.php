<?php // Register Main Navigation
register_nav_menu( 'main-nav', __( 'Main Navigation', 'applicator' ) );


// Main Nav
if ( ! function_exists( 'applicator_main_nav' ) ) {
    function applicator_main_nav() {
        
        // Variables
        $main_nav_term = 'main-nav';
        $main_nav_css = $main_nav_term;
        $main_nav_ct_cr_css = 'menu';
        $main_nav_group_start_mu = '<ul class="grp '. $main_nav_css . '---grp' .'">';
        $main_nav_group_end_mu = '</ul>';
        
        $main_nav_a_l_start_mu = '';
        $main_nav_a_l_start_mu .= '<span class="a_l main-navi---a_l">';
        $main_nav_a_l_start_mu .= '<span class="l main-navi---l">';
        $main_nav_a_l_start_mu .= '<span class="txt navi---txt">';
        
        $main_nav_a_l_end_mu = '';
        $main_nav_a_l_end_mu .= '</span>';
        $main_nav_a_l_end_mu .= '</span>';
        $main_nav_a_l_end_mu .= '</span>';
        
        
        if ( wp_nav_menu( array( 'theme_location' => $main_nav_term, 'echo' => false ) ) !== false) {
        
            ob_start();
                
            function escape_html_the_title( $title, $id = null )
            {
                return esc_html( $title );
            }
            add_filter( 'the_title', 'escape_html_the_title', 10, 2 );
            
            if ( ! has_nav_menu( $main_nav_term ) ) {

                // Default Menu
                // Nav Item <li class="page_item">
                // Current Nav Item <li class="current_page_item">
                // Sub Navigation <ul class="children">
                wp_page_menu( array(
                    'menu_class'        => $main_nav_ct_cr_css, // <div> class
                    'link_before'       => $main_nav_a_l_start_mu,
                    'link_after'        => $main_nav_a_l_end_mu,
                    'show_home'         => true,
                    'before'            => $main_nav_group_start_mu,
                    'after'             => $main_nav_group_end_mu,
                ) );

            } else {

                // Apperance > Menus (Custom Menu)
                // Nav Item <li class="menu-item">
                // Current Nav Item <li class="current-menu-item">
                // Sub Navigation <ul class="sub-menu">
                wp_nav_menu( array(
                    'theme_location'    => $main_nav_term,
                    'container'         => 'div',
                    'container_class'   => $main_nav_ct_cr_css, // <div> class
                    'link_before'       => $main_nav_a_l_start_mu,
                    'link_after'        => $main_nav_a_l_end_mu,
                    'items_wrap'        => $main_nav_group_start_mu. '%3$s'. $main_nav_group_end_mu,
                ) );

            }
            $main_nav_ob_content = ob_get_clean();

            // Main Navigation
            $main_navigation_cp = applicator_htmlok( array(
                'name'      => 'Main',
                'structure' => array(
                    'type'      => 'component',
                    'subtype'   => 'navigation',
                    'elem'      => 'nav',
                    'h_elem'    => 'h2',
                    'attr'      => array(
                        'elem'    => array(
                            'aria-label'    => 'Main Navigation',
                        ),
                    ),
                ),
                'id'        => 'main-nav',
                'content'   => array(
                    'component' => $main_nav_ob_content,
                ),
            ) );

            return $main_navigation_cp;
            
        }
    }
}


// Add class to <a>
if ( ! function_exists( 'applicator_nav_menu_link_atts' ) ) {
    function applicator_nav_menu_link_atts( $atts, $item, $args, $depth ) {
        
        $new_atts = array( 'class' => 'main-navi---a' );
        if ( isset( $atts['href'] ) ) {
            $new_atts['href'] = $atts['href'];
        }
        return $new_atts;
    
    }
    add_filter( 'nav_menu_link_attributes', 'applicator_nav_menu_link_atts', 10, 4 );
}