<?php // Comments Navigation | comments.php

if ( ! function_exists( 'applicator_func_comments_nav' ) ) {
    function applicator_func_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {

            // Text
            $next_comments_navi_txt = htmlok_txt( array(
                'content'   => array(
                    array(
                        'txt'   => esc_html__( 'Next', 'applicator' ),
                    ),
                    array(
                        'sep'   => $GLOBALS['space_sep'],
                        'txt'   => esc_html__( 'Comments', 'applicator' ),
                    ),
                ),
            ) );
            
            // Text
            $previous_comments_navi_txt = htmlok_txt( array(
                'content'   => array(
                    array(
                        'txt'   => esc_html__( 'Previous', 'applicator' ),
                    ),
                    array(
                        'sep'   => $GLOBALS['space_sep'],
                        'txt'   => esc_html__( 'Comments', 'applicator' ),
                    ),
                ),
            ) );
            
            // Element Label
            $next_comments_navi_label = htmlok_obj( array(
                'name'      => 'Next Comments',
                'elem'      => 'anchor label',
                'content'   => $next_comments_navi_txt,
            ) );
            
            // Element Label
            $previous_comments_navi_label = htmlok_obj( array(
                'name'      => 'Previous Comments',
                'elem'      => 'anchor label',
                'content'   => $previous_comments_navi_txt,
            ) );
            
            // Anchor Element (WPg)
            
            $next_comments_link = '';
            $next_comments_navi_obj = '';
            
            if ( get_next_comments_link() ) {
                
                $next_comments_link = get_next_comments_link( $next_comments_navi_label );
            
                // Object
                $next_comments_navi_obj = htmlok_obj( array(
                    'name'      => 'Next Comments',
                    'elem'      => 'list',
                    'content'   => $next_comments_link,
                ) );
            }
            
            // Anchor Element (WPg)
            
            $previous_comments_link = '';
            $previous_comments_navi_obj = '';
            
            if ( get_previous_comments_link() ) {
                
                $previous_comments_link = get_previous_comments_link( $previous_comments_navi_label );
            
                // Object
                $previous_comments_navi_obj = htmlok_obj( array(
                    'name'      => 'Previous Comments',
                    'elem'      => 'li',
                    'content'   => $previous_comments_link,
                ) );
            }
            
            // Comments Nav Group
            $comments_nav_group = '';
            $comments_nav_group .= '<ul class="grp comments-nav---grp">';
            $comments_nav_group .= $next_comments_navi_obj . $previous_comments_navi_obj;
            $comments_nav_group .= '</ul>';
            
            // Comments Nav - Component
            $comments_nav = htmlok_cp( array(
                'name'      => 'Comments',
                'type'      => 'nav',
                'content'   => $comments_nav_group,
            ) );
            
            return $comments_nav;
        }
    
    }
}