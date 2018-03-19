<?php

// Page Navigation | index.php

if ( ! function_exists( 'applicator_page_nav' ) )
{
    function applicator_page_nav()
    {
        
        
        // Terms Definitions
        $page_term = esc_html__( 'Page', 'applicator' );
        $next_term = esc_html__( 'Next', 'applicator' );
        $previous_term = esc_html__( 'Previous', 'applicator' );
        $page_navi_css = 'page-navi';
        $adjacent_navi_css = 'adjacent-navi';
        
        
        // MU: Page Number Navigation Item Start
        $page_navi_smu = '';
        $page_navi_smu .= '<span class="a_l %2$s---a_l"%5$s>';
        $page_navi_smu .= '<span class="l %2$s---l">';
        $page_navi_smu .= '<span class="txt %3$s---txt">';
        $page_navi_smu .= '%1$s';
        $page_navi_smu .= '</span>';
        $page_navi_smu .= ' <span class="txt %4$s---txt">';
        
        
        // MU: Page Number Navigation Item End
        $page_navi_emu = '';
        $page_navi_emu .= '</span>';
        $page_navi_emu .= '</span>';
        $page_navi_emu .= '</span>';
        
        
        // Page Number Navigation Item Start Content
        $page_navi_smu_content = sprintf( $page_navi_smu,
            $page_term,
            $page_navi_css,
            sanitize_title( $page_term ),
            'num page-number',
            ''
        );
        
        
        // Adjacent (Next / Previous) Navigation Item Start Content
        $adjacent_navi_next_smu_content = sprintf( $page_navi_smu,
            $next_term,
            $adjacent_navi_css,
            sanitize_title( $next_term ),
            sanitize_title( $page_term ),
            'title="'. $next_term. ' '. $page_term. '"'
        );
        
        
        // MU: Adjacent Navigation Item
        $adjacent_navi_next_mu = '';
        $adjacent_navi_next_mu .= $adjacent_navi_next_smu_content;
        $adjacent_navi_next_mu .= $page_term;
        $adjacent_navi_next_mu .= $page_navi_emu;
        
        
        // Page Number Navigation Item Start Content
        $adjacent_navi_previous_smu_content = sprintf( $page_navi_smu,
            $previous_term,
            $adjacent_navi_css,
            sanitize_title( $previous_term ),
            sanitize_title( $page_term ),
            'title="'. $previous_term. ' '. $page_term. '"'
        );
        
        
        // MU: Adjacent Navigation Item
        $adjacent_navi_previous_mu = '';
        $adjacent_navi_previous_mu .= $adjacent_navi_previous_smu_content;
        $adjacent_navi_previous_mu .= $page_term;
        $adjacent_navi_previous_mu .= $page_navi_emu;
        
        
        // R: Page Navigation Group
        $page_nav_grp = get_the_posts_pagination( array(
            'show_all'              => true,
            'mid_size'              => 0,

            'type'                  => 'list',

            'before_page_number'    => $page_navi_smu_content,
            'after_page_number'     => $page_navi_emu,

            'prev_text'             => $adjacent_navi_previous_mu,
            'next_text'             => $adjacent_navi_next_mu,
        ) );
        
        $page_navigation_cp = applicator_htmlok( array(
            'name'      => 'Page',
            'structure' => array(
                'type'      => 'component',
                'subtype'   => 'navigation',
            ),
            'content'   => array(
                'component' => $page_nav_grp,
            ),
        ) );

        
        if ( $page_nav_grp )
        {   
            return $page_navigation_cp;
        }
    }
}