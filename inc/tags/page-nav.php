<?php // Page Navigation | index.php

if ( ! function_exists( 'applicator_page_nav' ) ) {
    function applicator_page_nav() {
        
        global $wp_query, $wp_rewrite;

        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
        
        
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
        
        
        if ( ! is_search() ) {
            
            // R: Page Navigation Group
            $page_nav_grp = paginate_links( array(
                'base'          => $pagenum_link,
                'format'        => $format,
                'total'         => $GLOBALS['wp_query']->max_num_pages,
                'current'       => $paged,
                'show_all'      => false,
                'end_size'      => 1,
                'mid_size'      => 0,
                'add_args'      => array_map( 'urlencode', $query_args ),

                'type'          => 'list',
                'prev_next'     => true,

                'before_page_number'  => $page_navi_smu_content,
                'after_page_number'   => $page_navi_emu,

                'prev_text'     => $adjacent_navi_previous_mu,
                'next_text'     => $adjacent_navi_next_mu,
            ) );
            
        }
        
        // If in Search Results
        else {
        
            // R: Page Navigation Group
            $page_nav_grp = paginate_links( array(
                'base'          => $pagenum_link,
                'format'        => $format,
                'total'         => $GLOBALS['wp_query']->max_num_pages,
                'current'       => $paged,
                'show_all'      => true,
                'end_size'      => 1,
                'mid_size'      => 0,
                'add_args'      => array_map( 'urlencode', $query_args ),

                'type'          => 'list',
                'prev_next'     => true,

                'before_page_number'  => $page_navi_smu_content,
                'after_page_number'   => $page_navi_emu,

                'prev_text'     => $adjacent_navi_previous_mu,
                'next_text'     => $adjacent_navi_next_mu,
            ) );
            
        }

        
        if ( $page_nav_grp ) {
            
            
            // R: Page Navigation
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
            
            return $page_navigation_cp;
        }
    }
}