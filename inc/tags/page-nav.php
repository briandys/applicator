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
        
        $page_num_navi_start_mu = '<span class="a_l %2$s---a_l"><span class="word page---word">%1$s</span> <span class="num page-num---num">';
        
        $page_num_navi_end_mu = '</span></span>';
        
        $adjacent_navi_mu = '<span class="a_l %4$s-navi---a_l" rel="%5$s" title="%1$s"><span class="word %5$s---word">%2$s</span> <span class="word page---word">%3$s</span></span>';
        
        $page_nav_grp = paginate_links( array(
            'base'          => $pagenum_link,
            'format'        => $format,
            'total'         => $GLOBALS['wp_query']->max_num_pages,
            'current'       => $paged,
            'show_all'      => true,
            'add_args'      => array_map( 'urlencode', $query_args ),
            
            'type'          => 'list',
            
            'before_page_number'  => sprintf( $page_num_navi_start_mu,
                                       esc_html__( 'Page', 'applicator' ),
                                       'page-num-navi'
                                       ),
            
            'after_page_number'   => $page_num_navi_end_mu,
            
            'prev_next'     => true,
            
            'prev_text'     => sprintf( $adjacent_navi_mu,
                                       esc_attr__( 'Previous Page', 'applicator' ),
                                       esc_html__( 'Previous', 'applicator' ),
                                       esc_html__( 'Page', 'applicator' ),
                                       'prev-page',
                                       'prev'
                                       ),
            
            'next_text'     => sprintf( $adjacent_navi_mu,
                                       esc_attr__( 'Next Page', 'applicator' ),
                                       esc_html__( 'Next', 'applicator' ),
                                       esc_html__( 'Page', 'applicator' ),
                                       'next-page',
                                       'next'
                                       )
        ) );

        if ( $page_nav_grp ) { ?>
        
        <div class="nav page-nav" role="navigation" aria-label="<?php esc_html_e( 'Page Navigation', 'applicator' ); ?>" data-name="Page Navigation">
            <div class="cr page-nav---cr">
                <div class="h page-nav---h">
                    <span class="h_l page-nav---h_l"><?php esc_html_e( 'Page Navigation', 'applicator' ); ?></span>
                </div>
                <div class="ct page-nav---ct">
                    <div class="ct_cr page-nav---ct_cr">
                        <?php echo $page_nav_grp; ?>
                    </div>
                </div><!-- ct -->
            </div>
        </div><!-- Page Navigation -->
        
        <?php }
    }
}