<?php
//------------------------- Page Navigation
// index.php

if ( ! function_exists( 'applicator_page_nav' ) ) :
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
        
        $links = paginate_links( array(
            'base'          => $pagenum_link,
            'format'        => $format,
            'total'         => $GLOBALS['wp_query']->max_num_pages,
            'current'       => $paged,
            'show_all'      => true,
            'add_args'      => array_map( 'urlencode', $query_args ),
            'prev_next'     => true,
            
            'prev_text'     => '<span class="a-l prev--a-l" rel="prev" title="' . esc_attr__( 'Previous', 'applicator' ) . ' ' . esc_attr__( 'Page', 'applicator' ) . '"><span class="pred-l">' . esc_html__( 'Previous', 'applicator' ) . '</span> <span class="subj-l">' . esc_html__( 'Page', 'applicator' ) . '</span></span>',
            
            'next_text'     => '<span class="a-l next--a-l" rel="next" title="' . esc_attr__( 'Next', 'applicator' ) . ' ' . esc_attr__( 'Page', 'applicator' ) . '"><span class="pred-l">' . esc_html__( 'Next', 'applicator' ) . '</span> <span class="subj-l">' . esc_html__( 'Page', 'applicator' ) . '</span></span>',
            
            'type'          => 'list',
            
            'before_page_number'  => '<span class="a-l"><span class="pred-l">' . esc_html__( 'Page', 'applicator' ) . '</span> <span class="subj-l"> ',
            
            'after_page_number'   => '</span></span>'
        ) );

        if ( $links ) : ?>
        
        <div class="nav page-nav" role="navigation" aria-label="<?php esc_html_e( 'Page Navigation', 'applicator' ); ?>">
            <div class="nav--cr page-nav--cr">
                <div class="h nav--h page-nav--h">
                    <span class="page-nav--h-l"><?php esc_html_e( 'Page Navigation', 'applicator' ); ?></span>
                </div>
                <?php echo $links; ?>
            </div>
        </div><!-- page-nav -->
        
        <?php endif;
    }
endif;