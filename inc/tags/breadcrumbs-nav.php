<?php // Breadcrumbs Navigation | content.php
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

if ( ! function_exists( 'apl_func_breadcrumbs_nav' ) ) {
    function apl_func_breadcrumbs_nav() {    
        
        global $post;

        if ( ! is_front_page() ) {
            
            if ( is_page() ) {
                
                $crumbs_nav_start_mu = '<div class="nav %3$s" role="navigation" aria-label="%1$s" data-name="%2$s">';
                    $crumbs_nav_start_mu .= '<div class="cr %3$s---cr">';
                        $crumbs_nav_start_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                        $crumbs_nav_end_mu = '</ul>';
                    $crumbs_nav_end_mu .= '</div>';
                $crumbs_nav_end_mu .= '</div>';
                
                $crumbs_nav_start = printf( $crumbs_nav_start_mu,
                    esc_attr__( 'Breadcrumbs Navigation', 'applicator' ),
                    'Breadcrumbs Navigation',
                    'crumbs-nav'
                );

                $crumbs_grp_mu = '<ul class="grp crumbs-nav---grp">';
                
                $crumbs_navi_mu = '<li class="item obj navi %1$s %1$s--%2$s %1$s--current" data-name="Breadcrumbs Navigation Item"><span class="g %1$s---g"><span class="g_l %1$s---g_l"><span class="word navi---word">%3$s</span></span></span></li></ul>';
                
                $crumbs_navi = sprintf( $crumbs_navi_mu,
                    'crumbs-navi',
                    $post->ID,
                    get_the_title()
                );
                
                echo $crumbs_grp_mu;
                
                if ( $post->post_parent ) {
                    
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                    
                    // Get parents in the right order
                    $anc = array_reverse( $anc );
                    
                    // Parent page loop
                    if ( !isset( $parents ) ) {
                        $parents = null;
                    }
                    
                    foreach ( $anc as $ancestor ) {
                        
                        $crumbs_navi_start_mu = '<li class="item obj navi %1$s %1$s--%2$s" data-name="Breadcrumbs Navigation Item">';
                            $crumbs_navi_start_mu .= '<a class="a %1$s---a" href="%3$s" title="%4$s"><span class="a_l %1$s---a_l"><span class="word navi---word">%4$s</span></span></a>';

                        $crumbs_navi_start = sprintf( $crumbs_navi_start_mu,
                            'crumbs-navi',
                            $ancestor,
                            get_permalink( $ancestor ),
                            get_the_title( $ancestor )
                        );
                        
                        $parents .= $crumbs_navi_start . $crumbs_grp_mu;
                    }
                    
                    // Display parent pages
                    echo $parents;
                    
                    // Current page
                    echo $crumbs_navi;
                    
                }
            
                echo $crumbs_nav_end_mu;
                
            }
        }
    }
}