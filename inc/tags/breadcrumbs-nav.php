<?php // Breadcrumbs Navigation | content.php
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

if ( ! function_exists( 'applicator_func_breadcrumbs_nav' ) ) {
    function applicator_func_breadcrumbs_nav() {    
        
        global $post;

        if ( ! is_front_page() ) {
            
            if ( is_page() ) {
                
                
                // Terms Variables
                $breadcrumbs_term = __( 'Breadcrumbs', 'applicator' );
                $breadcrumbs_term_css = sanitize_title( $breadcrumbs_term );
                $breadcrumbs_data_name_term = 'Navigation Item OBJ';
                $breadcrumbs_navi_css = 'breadcrumbs-navi';
                
                
                // Template Markups
                
                // Group <ul>
                $breadcrumbs_nav_grp_smu = '';
                $breadcrumbs_nav_grp_smu .= '<ul class="grp breadcrumbs-nav---grp">';
                
                $breadcrumbs_nav_grp_emu = '';
                $breadcrumbs_nav_grp_emu .= '</ul>';
                
                
                // Navi <li>
                $breadcrumbs_navi_smu = '';
                $breadcrumbs_navi_smu .= '<li class="item obj navi %2$s-navi%3$s" data-name="%1$s '.$breadcrumbs_data_name_term.'">';
                
                $breadcrumbs_navi_emu = '';
                $breadcrumbs_navi_emu .= '</li><!-- %1$s '.$breadcrumbs_data_name_term.' -->';
                
                
                // Navi <a>
                $breadcrumbs_navi_a_mu = '';
                $breadcrumbs_navi_a_mu .= '<a class="a %3$s---a" href="%4$s" title="%5$s">';
                    $breadcrumbs_navi_a_mu .= '<span class="a_l %3$s---a_l">';
                        $breadcrumbs_navi_a_mu .= '<span class="txt %2$s---txt">';
                            $breadcrumbs_navi_a_mu .= '%1$s';
                        $breadcrumbs_navi_a_mu .= '</span>';
                    $breadcrumbs_navi_a_mu .= '</span>';
                $breadcrumbs_navi_a_mu .= '</a>';
                
                
                // Navi <g>
                $breadcrumbs_navi_g_mu = '';
                $breadcrumbs_navi_g_mu .= '<span class="g %5$s---g %3$s---g" title="%4$s">';
                    $breadcrumbs_navi_g_mu .= '<span class="g_l %5$s---g_l %3$s---g_l">';
                        $breadcrumbs_navi_g_mu .= '<span class="txt %2$s---txt">';
                            $breadcrumbs_navi_g_mu .= '%1$s';
                        $breadcrumbs_navi_g_mu .= '</span>';
                    $breadcrumbs_navi_g_mu .= '</span>';
                $breadcrumbs_navi_g_mu .= '</span>';
                
                
                // Page must have a parent
                if ( $post->post_parent ) {
                    
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                    
                    // Get parents in the right order
                    $anc = array_reverse( $anc );
                    
                    // Parent page loop
                    if ( ! isset( $breadcrumbs_ancestors ) ) {
                        $breadcrumbs_ancestors = null;
                    }
                    
                    foreach ( $anc as $ancestor ) {
                        
                        // R: Breadcrumbs Navigation Item Ancestors
                        $breadcrumbs_navi_ancestors = '';
                        $breadcrumbs_navi_ancestors .= sprintf( $breadcrumbs_navi_smu,
                            $breadcrumbs_term,
                            $breadcrumbs_term_css,
                            ' '.$breadcrumbs_navi_css.'--ancestor'
                        );
                        $breadcrumbs_navi_ancestors .= sprintf( $breadcrumbs_navi_a_mu,
                            get_the_title( $ancestor ),
                            sanitize_title( get_the_title( $ancestor ) ),
                            $breadcrumbs_navi_css,
                            get_permalink( $ancestor ),
                            get_the_title( $ancestor )
                        );
                        $breadcrumbs_navi_ancestors .= $breadcrumbs_nav_grp_smu;
                        
                        
                        // R: Breadcrumbs Ancestors
                        $breadcrumbs_ancestors .= $breadcrumbs_navi_ancestors;
                    }
                    
                    
                    // R: Breadcrumbs Navigation Item Current
                    $breadcrumbs_navi_current = '';
                    $breadcrumbs_navi_current .= sprintf( $breadcrumbs_navi_smu,
                        $breadcrumbs_term,
                        $breadcrumbs_term_css,
                        ' '.$breadcrumbs_navi_css.'--current'
                    );
                    $breadcrumbs_navi_current .= sprintf( $breadcrumbs_navi_g_mu,
                        get_the_title(),
                        sanitize_title( get_the_title( $ancestor ) ),
                        $breadcrumbs_navi_css.'-'. $post->ID,
                        get_the_title(),
                        $breadcrumbs_navi_css
                    );
                    $breadcrumbs_navi_current .= sprintf( $breadcrumbs_navi_emu,
                        $breadcrumbs_term
                    );
                    $breadcrumbs_navi_current .= $breadcrumbs_nav_grp_emu;
                    
                    
                    // R: Breadcrumbs Navigation Content
                    $breadcrumbs_navigation_content = '';
                    $breadcrumbs_navigation_content .= $breadcrumbs_nav_grp_smu;
                    $breadcrumbs_navigation_content .= $breadcrumbs_ancestors;
                    $breadcrumbs_navigation_content .= $breadcrumbs_navi_current;
                    $breadcrumbs_navigation_content .= $breadcrumbs_nav_grp_emu;
                
                
                    // R: Breadcrumbs Navigation
                    $breadcrumbs_navigation_cp = htmlok( array(
                        'name'      => $breadcrumbs_term,
                        'structure' => array(
                            'type'      => 'component',
                            'subtype'   => 'navigation',
                        ),
                        'content'   => array(
                            'component' => $breadcrumbs_navigation_content,
                        ),
                        'echo'      => true,
                    ) );
                }
                
            }
        }
    }
}