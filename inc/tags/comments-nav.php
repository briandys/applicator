<?php // Comments Navigation | comments.php

if ( ! function_exists( 'applicator_func_comments_nav' ) ) {
    function applicator_func_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            
            // Terms Definitions
            $next_term = esc_html__( 'Next', 'applicator' );
            $previous_term = esc_html__( 'Previous', 'applicator' );
            $comments_term = esc_html__( 'Comments', 'applicator' );
            $next_comments_term = esc_html__( 'Next Comments', 'applicator' );
            $previous_comments_term = esc_html__( 'Previous Comments', 'applicator' );
            $next_term_css = 'next';
            $previous_term_css = 'previous';
            $comments_term_css = 'comments';
            $navi_term_css = 'navi';
            $comments_navi_term_css = 'comments-navi';
            
            // Adjacent Comments Navigation Item Template Markup
            $adjacent_comments_navi_mu = '';
            $adjacent_comments_navi_mu .= '<span class="a_l %6$s---a_l %7$s---a_l" title="%3$s">';
                $adjacent_comments_navi_mu .= '<span class="txt %4$s---txt">';
                    $adjacent_comments_navi_mu .= '%1$s';
                $adjacent_comments_navi_mu .= '</span>';
                $adjacent_comments_navi_mu .= ' <span class="txt %5$s---txt">';
                    $adjacent_comments_navi_mu .= '%2$s';
                $adjacent_comments_navi_mu .= '</span>';
            $adjacent_comments_navi_mu .= '</span>';
            
            
            // Next Comments Navigation Item
            $next_comments_link = '';
            $next_comments_navi_obj = '';
            
            if ( get_next_comments_link() ) {
                
                $next_comments_navi_label = sprintf( $adjacent_comments_navi_mu,
                    $next_term,
                    $comments_term,
                    $next_comments_term,
                    $next_term_css,
                    $comments_term_css,
                    $next_term_css. '-'. $comments_term_css. '-'. $navi_term_css,
                    $comments_navi_term_css
                );

                $next_comments_link = get_next_comments_link( $next_comments_navi_label );
            
                $next_comments_navi_obj = applicator_htmlok( array(
                    'name'      => 'Next Comments',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'navigation item',
                        'wpg'           => true,
                        'root_obj_elem' => 'li',
                    ),
                    'root_css'  => 'comments-navi',
                    'content'   => array(
                        'object'    => $next_comments_link,
                    ),
                ) );
            }
            
            
            // Previous Comments Navigation Item
            $previous_comments_link = '';
            $previous_comments_navi_obj = '';
            
            if ( get_previous_comments_link() ) {
                
                $previous_comments_navi_label = sprintf( $adjacent_comments_navi_mu,
                    $previous_term,
                    $comments_term,
                    $previous_comments_term,
                    $previous_term_css,
                    $comments_term_css,
                    $previous_term_css. '-'. $comments_term_css. '-'. $navi_term_css,
                    $comments_navi_term_css
                );
                
                $previous_comments_link = get_previous_comments_link( $previous_comments_navi_label );
            
                $previous_comments_navi_obj = applicator_htmlok( array(
                    'name'      => 'Previous Comments',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'navigation item',
                        'wpg'           => true,
                        'root_obj_elem' => 'li',
                    ),
                    'root_css'  => 'comments-navi',
                    'content'   => array(
                        'object'    => $previous_comments_link,
                    ),
                ) );
                
            }
            
            // Comments Nav Group
            $comments_nav_group = '';
            $comments_nav_group .= '<ul class="grp comments-nav---grp">';
            $comments_nav_group .= $next_comments_navi_obj . $previous_comments_navi_obj;
            $comments_nav_group .= '</ul>';
            
            
            // R: Comments Navigation
            $comments_nav_cp = applicator_htmlok( array(
                'name'      => 'Comments',
                'structure' => array(
                    'type'      => 'component',
                    'subtype'   => 'navigation',
                ),
                'content'   => array(
                    'component' => $comments_nav_group,
                ),
            ) );
            
            return $comments_nav_cp;
        }
    }
}