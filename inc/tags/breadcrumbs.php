<?php

// Breadcrumbs Navigation | content.php
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin





if ( ! function_exists( 'applicator_breadcrumbs' ) )
{
    function applicator_breadcrumbs()
    {
        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() )
        {
            // Terms Variables
            $breadcrumbs_term = __( 'Breadcrumbs', 'applicator' );
            $breadcrumbs_term_css = sanitize_title( $breadcrumbs_term );
            $breadcrumbs_data_name_term = 'Navigation Item OBJ';
            $breadcrumbs_navi_css = 'breadcrumbs-navi';


            // Template Markups

            // Group <ul>
            $breadcrumbs_nav_grp_smu = '';
            $breadcrumbs_nav_grp_smu .= '<div class="grp breadcrumbs-nav---grp">';

            $breadcrumbs_nav_grp_emu = '';
            $breadcrumbs_nav_grp_emu .= '</div>';


            // Navi <a>
            $breadcrumbs_navi_a_mu = '';
            $breadcrumbs_navi_a_mu .= '<div class="item obj navi %6$s-navi %7$s" data-name="%8$s '.$breadcrumbs_data_name_term.'">';
                $breadcrumbs_navi_a_mu .= '<a class="a %3$s---a" href="%4$s" title="%5$s">';
                    $breadcrumbs_navi_a_mu .= '<span class="a_l %3$s---a_l">';
                        $breadcrumbs_navi_a_mu .= '<span class="l %3$s---l">';
                            $breadcrumbs_navi_a_mu .= '<span class="txt %2$s---txt">';
                                $breadcrumbs_navi_a_mu .= '%1$s';
                            $breadcrumbs_navi_a_mu .= '</span>';
                        $breadcrumbs_navi_a_mu .= '</span>';
                    $breadcrumbs_navi_a_mu .= '</span>';
                $breadcrumbs_navi_a_mu .= '</a>';
            $breadcrumbs_navi_a_mu .= '</div>';


            // Navi <g>
            $breadcrumbs_navi_g_mu = '';
            $breadcrumbs_navi_g_mu .= '<div class="item obj navi %6$s-navi %7$s" data-name="%8$s '.$breadcrumbs_data_name_term.'">';
                $breadcrumbs_navi_g_mu .= '<span class="g %5$s---g %3$s---g" title="%4$s">';
                    $breadcrumbs_navi_g_mu .= '<span class="g_l %5$s---g_l %3$s---g_l">';
                        $breadcrumbs_navi_g_mu .= '<span class="l %5$s---l %3$s---l">';
                            $breadcrumbs_navi_g_mu .= '<span class="txt %2$s---txt">';
                                $breadcrumbs_navi_g_mu .= '%1$s';
                            $breadcrumbs_navi_g_mu .= '</span>';
                        $breadcrumbs_navi_g_mu .= '</span>';
                    $breadcrumbs_navi_g_mu .= '</span>';
                $breadcrumbs_navi_g_mu .= '</span>';
            $breadcrumbs_navi_g_mu .= '</div>';
            
            
            // If child page, get parents 
            $anc = get_post_ancestors( $post->ID );

            // Get parents in the right order
            $anc = array_reverse( $anc );

            // Parent page loop
            if ( ! isset( $breadcrumbs_ancestors ) )
            {
                $breadcrumbs_ancestors = null;
            }

            foreach ( $anc as $ancestor )
            {

                $post_title_ancestor = get_the_title( $ancestor );

                // R: Breadcrumbs Navigation Item Ancestors
                $breadcrumbs_navi_ancestors = '';
                $breadcrumbs_navi_ancestors .= sprintf( $breadcrumbs_navi_a_mu,
                    esc_html( $post_title_ancestor ),
                    sanitize_title( get_the_title( $ancestor ) ),
                    $breadcrumbs_navi_css,
                    get_permalink( $ancestor ),
                    esc_attr( $post_title_ancestor ),
                    $breadcrumbs_term_css,
                    $breadcrumbs_navi_css. '--'. 'ancestor',
                    $breadcrumbs_term

                );


                // R: Breadcrumbs Ancestors
                $breadcrumbs_ancestors .= $breadcrumbs_navi_ancestors;
            }

            $post_title = get_the_title();                    

            // R: Breadcrumbs Navigation Item Current
            $breadcrumbs_navi_current = '';
            $breadcrumbs_navi_current .= sprintf( $breadcrumbs_navi_g_mu,
                esc_html( $post_title ),
                sanitize_title( get_the_title() ),
                $breadcrumbs_navi_css,
                esc_attr( $post_title ),
                $breadcrumbs_navi_css,
                $breadcrumbs_term_css,
                $breadcrumbs_navi_css. '--'. 'current',
                $breadcrumbs_term
            );


            // R: Breadcrumbs Navigation Content
            $breadcrumbs_navigation_content = '';
            $breadcrumbs_navigation_content .= $breadcrumbs_nav_grp_smu;
            $breadcrumbs_navigation_content .= $breadcrumbs_ancestors;
            $breadcrumbs_navigation_content .= $breadcrumbs_navi_current;
            $breadcrumbs_navigation_content .= $breadcrumbs_nav_grp_emu;


            // R: Breadcrumbs Navigation
            $breadcrumbs_navigation_cp = applicator_htmlok( array(
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





if ( ! function_exists( 'applicator_breadcrumbs_body_class' ) )
{
    function applicator_breadcrumbs_body_class( $classes )
    {
        global $post;

        if ( is_page() && $post->post_parent && ! is_attachment() )
        {
            $classes[] = 'breadcrumbs'. '---'. $GLOBALS['applicator_feature_class_name'];
        }
        return $classes;
    }
    add_filter( 'body_class', 'applicator_breadcrumbs_body_class' );
}