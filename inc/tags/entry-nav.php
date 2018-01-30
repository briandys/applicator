<?php // Entries Navigation
// index.php

if ( ! function_exists('applicator_entry_nav' ) ) {
    function applicator_entry_nav() {
        
        
        if ( ! is_attachment() && is_singular() ) {
        
        
            // Variables
            $previous = get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous ) {
                return;
            }
            
            
            // Terms Definitions
            $next_term = esc_html__( 'Next', 'applicator' );
            $previous_term = esc_html__( 'Previous', 'applicator' );
            $entry_term = esc_html__( 'Entry', 'applicator' );
            $post_title_term = esc_html__( 'Post Title', 'applicator' );
            $navi_term_css = 'navi';
            $entry_navi_term_css = 'entry-navi';
            
            
            // MU: Entry Navigation Item Anchor Label Template Markup
            $entry_navi_a_l_mu = '';
            $entry_navi_a_l_mu .= '<span class="a_l %5$s---a_l %10$s---a_l" title="%9$s">';
                $entry_navi_a_l_mu .= '<span class="l %5$s---l %10$s---l">';
                    $entry_navi_a_l_mu .= '<span class="line property---line">';
                        $entry_navi_a_l_mu .= '<span class="txt %6$s---txt">';
                            $entry_navi_a_l_mu .= '%1$s';
                        $entry_navi_a_l_mu .= '</span>';
                        $entry_navi_a_l_mu .= ' <span class="txt %7$s---txt">';
                            $entry_navi_a_l_mu .= '%2$s';
                        $entry_navi_a_l_mu .= '</span>';
                        $entry_navi_a_l_mu .= '%3$s';
                    $entry_navi_a_l_mu .= '</span>';
                    $entry_navi_a_l_mu .= ' <span class="line value---line">';
                        $entry_navi_a_l_mu .= '<span class="txt %8$s---txt">';
                            $entry_navi_a_l_mu .= '%4$s';
                        $entry_navi_a_l_mu .= '</span>';
                    $entry_navi_a_l_mu .= '</span>';
                $entry_navi_a_l_mu .= '</span>';
            $entry_navi_a_l_mu .= '</span>';
            
            
            // R: Next Entry Navigation Item
            $next_entry_navi = sprintf( $entry_navi_a_l_mu,
                $next_term,
                $entry_term,
                $GLOBALS['applicator_colon_sep']. $GLOBALS['applicator_space_sep'],
                '%title',
                sanitize_title( $next_term. '-'. $entry_term. '-'. $navi_term_css ),
                sanitize_title( $next_term ),
                sanitize_title( $entry_term ),
                sanitize_title( $post_title_term ),
                $next_term.' '.$entry_term. ':'. ' '. '%title',
                $entry_navi_term_css
            );
            
            
            // R: Previous Entry Navigation Item
            $previous_entry_navi = sprintf( $entry_navi_a_l_mu,
                $previous_term,
                $entry_term,
                $GLOBALS['applicator_colon_sep']. $GLOBALS['applicator_space_sep'],
                '%title',
                sanitize_title( $previous_term. '-'. $entry_term. '-'. $navi_term_css ),
                sanitize_title( $previous_term ),
                sanitize_title( $entry_term ),
                sanitize_title( $post_title_term ),
                $previous_term.' '.$entry_term. ':'. ' '. '%title',
                $entry_navi_term_css
            );
            
            
            // OB: Next Entry Link
            ob_start();
            next_post_link( '%link', $next_entry_navi );
            $next_entry_link_ob_content = ob_get_clean();
            
            
            // OB: Previous Entry Link
            ob_start();
            previous_post_link( '%link', $previous_entry_navi );
            $previous_entry_link_ob_content = ob_get_clean();
            
            
            // R:
            $next_entry_obj = applicator_htmlok( array(
                'name'      => $next_term.' '.$entry_term,
                'structure' => array(
                    'type'          => 'object',
                    'subtype'       => 'navigation item',
                    'wpg'           => true,
                    'root_obj_elem' => 'li',
                ),
                'root_css'  => 'entry-navi',
                'content'   => array(
                    'object'        => $next_entry_link_ob_content,
                ),
            ) );
            
            
            // R:
            $previous_entry_obj = applicator_htmlok( array(
                'name'      => $previous_term.' '.$entry_term,
                'structure' => array(
                    'type'          => 'object',
                    'subtype'       => 'navigation item',
                    'wpg'           => true,
                    'root_obj_elem' => 'li',
                ),
                'root_css'  => 'entry-navi',
                'content'   => array(
                    'object'        => $previous_entry_link_ob_content,
                ),
            ) );
            
            
            // MU: Entry Navigation Group Template Markup
            $entry_nav_group_mu = '';
            $entry_nav_group_mu .= '<ul class="grp entry-nav---grp">';
            if ( get_next_post_link() ) {
                $entry_nav_group_mu .= $next_entry_obj;
            }
            if ( get_previous_post_link() ) {
                $entry_nav_group_mu .= $previous_entry_obj;
            }
            $entry_nav_group_mu .= '</ul>';


            // R: Entry Navigation
            $entry_navigation_cp = applicator_htmlok( array(
                'name'      => 'Entry',
                'structure' => array(
                    'type'      => 'component',
                    'subtype'   => 'navigation',
                    'linked'    => true,
                    'attr'      => array(
                        'a'         => array(
                            'href'      => 'link',
                        ),
                    ),
                ),
                'content'   => array(
                    'component' => $entry_nav_group_mu,
                ),
            ) );

            return $entry_navigation_cp;
        }
    }
}