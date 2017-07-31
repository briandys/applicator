<?php // Comments Navigation | comments.php

if ( ! function_exists( 'applicator_func_comments_nav' ) ) {
    function applicator_func_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            
            
            // Adjacent Comments Navigation Item Template Markup
            $adjacent_comments_navi_mu = '';
            $adjacent_comments_navi_mu .= '<span class="a_l %6$s---a_l" title="%3$s">';
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
                    esc_html__( 'Next', 'applicator' ),
                    esc_html__( 'Comments', 'applicator' ),
                    esc_html__( 'Next Comments', 'applicator' ),
                    'next',
                    'comments',
                    'next-comments-navi'
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
                    esc_html__( 'Previous', 'applicator' ),
                    esc_html__( 'Comments', 'applicator' ),
                    esc_html__( 'Previous Comments', 'applicator' ),
                    'previous',
                    'comments',
                    'previous-comments-navi'
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