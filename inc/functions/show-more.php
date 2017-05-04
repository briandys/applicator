<?php // Excerpt: Show More

if ( ! function_exists( 'apl_func_show_more' ) ) {
    function apl_func_show_more( $show_more_axn ) {
        
        if ( is_admin() ) {
            return $show_more_axn;
        }
        
        $show_more_axn_mu = '<span class="obj axn show-more-axn" data-name="Show More Action">';
            $show_more_axn_mu .= '<a class="a show-more-axn---a more-link" href="%5$s" title="%1$s"><span class="a_l show-more-axn---a_l"><span class="prop show-more-axn---prop"><span class="word show---word">%2$s</span> <span class="word more---word">%3$s</span> <span class="word of---word">%4$s</span></span> <span class="val post-title---val"><span class="word post-title---word">%6$s</span></span></span></a>';
        $show_more_axn_mu .= '</span>';
        
        $show_more_axn = sprintf( $show_more_axn_mu,
            esc_attr__( 'Show More', 'applicator' ),
            esc_html__( 'Show', 'applicator' ),
            esc_html__( 'More', 'applicator' ),
            esc_html__( 'of', 'applicator' ),
            esc_url( get_permalink( get_the_ID() ) ),
            get_the_title( get_the_ID() )
        );
        
        /* Pattern after content.php the_content and the_excerpt */
        if ( is_home() || is_singular() ) {
            return $show_more_axn;
        } else {
           return '<span class="sep ellip---sep">&hellip;</span> ' . $show_more_axn;
        }
    
    }
    add_filter( 'excerpt_more', 'apl_func_show_more' );
    add_filter( 'the_content_more_link', 'apl_func_show_more' );
}