<?php // Post Navigation | index.php
// Created via <!--nextpage-->
// For Attachment Page, show which Post it belongs
// https://bavotasan.com/2012/a-better-wp_link_pages-for-wordpress/

if ( ! function_exists('applicator_post_nav' ) ) {
    function applicator_post_nav( $args = '' ) {
        
        // MU: Page Number Navigation Item Start
        $post_navi_a_l_mu = '';
        $post_navi_a_l_mu .= '<span class="txt %3$s---txt">';
            $post_navi_a_l_mu .= '%1$s';
        $post_navi_a_l_mu .= '</span>';
        $post_navi_a_l_mu .= ' <span class="txt %4$s---txt">';
            $post_navi_a_l_mu .= '%2$s';
        $post_navi_a_l_mu .= '</span>';


        // R: Post Navigation Item Anchor Label
        $post_navi_a_l = sprintf( $post_navi_a_l_mu,
            esc_html__( 'Page', 'applicator' ),
            '%',
            'page',
            'num post-page-number'
        );

        $defaults = array(
            'before' => '<ul class="grp post-nav---grp">',
            'after' => '</ul>',
            'text_before' => '',
            'text_after' => '',
            'next_or_number' => 'number', 
            'nextpagelink' => __( 'Next Page', 'applicator' ),
            'previouspagelink' => __( 'Previous Page', 'applicator' ),
            'pagelink' => $post_navi_a_l,
            'echo' => 1
        );

        /* To pass Theme Check */
        ob_start();
        wp_link_pages( $args );
        ob_end_clean();
        
        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'wp_link_pages_args', $r );
        extract( $r, EXTR_SKIP );

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ( $multipage ) {
            if ( 'number' == $next_or_number ) {
                $output .= $before;
                for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                    $j = str_replace( '%', $i, $pagelink );
                    $output .= ' ';
                    if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                        $output .= '<li class="li item obj navi post-navi" data-name="Post Navigation Item OBJ">';
                        $output .= _wp_link_page( $i );
                        $output .= '<span class="a_l post-navi---a_l">';
                        $output .= '<span class="l post-navi---l">';
                    }

                    else {
                        $output .= '<li class="li item obj navi post-navi post-navi--current" data-name="Post Navigation Item OBJ">';
                        $output .= '<span class="g post-navi---g">';
                        $output .= '<span class="g_l post-navi---g_l">';
                        $output .= '<span class="l post-navi---l">';
                    }

                    $output .= $text_before . $j . $text_after;
                    if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                        $output .= '</span>';
                        $output .= '</span>';
                        $output .= '</a>';
                    }

                    else {
                        $output .= '</span>';
                        $output .= '</span>';
                        $output .= '</span>';
                    }
                    $output .= '</li>';
                }
                $output .= $after;
            }

            else {
                if ( $more ) {
                    $output .= $before;
                    $i = $page - 1;
                    if ( $i && $more ) {
                        $output .= _wp_link_page( $i );
                        $output .= $text_before . $previouspagelink . $text_after . '</a>';
                    }
                    $i = $page + 1;
                    if ( $i <= $numpages && $more ) {
                        $output .= _wp_link_page( $i );
                        $output .= $text_before . $nextpagelink . $text_after . '</a>';
                    }
                    $output .= $after;
                }
            }
        }
        
        elseif ( is_singular( 'attachment' ) ) {
            
            if ( get_previous_post_link() ) {
                
                
                // Terms Variables
                $post_terms = esc_html__( 'Post', 'applicator' );
                $post_terms_css = sanitize_title( $post_terms );
                
                
                // MU: Parent Post Navigation Item
                $parent_post_navi_mu = '';
                $parent_post_navi_mu .= '<span class="obj navi %2$s-navi" data-name="%3$s Navigation Item OBJ">';
                $parent_post_navi_mu .= '%1$s';
                $parent_post_navi_mu .= '</span>';
                
                
                // R: Parent Post Navigation Label
                $parent_post_nav_label_obj = applicator_htmlok( array(
                    'name'      => 'Parent Post Navigation',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'generic label',
                        'layout'    => 'inline',
                    ),
                    'content'   => array(
                        'object'    => 'Posted in',
                        'after'     => $GLOBALS['applicator_space_sep'],
                    ),
                ) );
                
                
                // R: Parent Post Navigation Item
                $parent_post_navi = sprintf( $parent_post_navi_mu,
                    get_previous_post_link( '%link', '%title' ),
                    $post_terms_css,
                    $post_terms
                );
                
                
                // R: Post Navigation Content
                $post_nav_content= '';
                $post_nav_content .= $parent_post_nav_label_obj;
                $post_nav_content .= $parent_post_navi;
                
                
                $output = $post_nav_content;
            }
        }

        if ( $multipage || is_singular( 'attachment' ) ) {
            // E: Post Navigation
            $post_nav_cp = applicator_htmlok( array(
                'name'      => 'Post',
                'structure' => array(
                    'type'      => 'component',
                    'subtype'   => 'navigation',
                ),
                'content'   => array(
                    'component' => $output,
                ),
                'echo'      => true,
            ) );
        }
        
    }
}