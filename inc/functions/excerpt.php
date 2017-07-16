<?php // Show More

if ( ! function_exists( 'applicator_func_show_more' ) ) {
    function applicator_func_show_more( $show_more_axn ) {
        
        if ( is_admin() ) {
            return $show_more_axn;
        }
        
        // To do: DRY this markup
        
        $show_more_axn_mu = '<div class="obj axn %2$s" data-name="Show More Action Object">';
            $show_more_axn_mu .= '<a class="a %2$s---a more-link" href="%6$s" title="%7$s %1$s">';
                $show_more_axn_mu .= '<span class="a_l %2$s---a_l">';
                    $show_more_axn_mu .= '<span class="prop show-more---prop"><span class="txt show---txt">%3$s</span> <span class="txt more---txt">%4$s</span> <span class="txt of---txt">%5$s</span></span>';
                    $show_more_axn_mu .= ' <span class="val post-title---val"><span class="txt post-title---txt">%1$s</span></span>';
                $show_more_axn_mu .= '</span>';
            $show_more_axn_mu .= '</a>';
        $show_more_axn_mu .= '</div>';
        
        $show_more_label_mu = '<div class="obj %2$s" data-name="Show More Label Object">';
            $show_more_label_mu .= '<span class="g %2$s---g" title="%6$s %1$s">';
                $show_more_label_mu .= '<span class="a_l %2$s---a_l">';
                    $show_more_label_mu .= '<span class="prop show-more---prop"><span class="txt show---txt">%3$s</span> <span class="txt more---txt">%4$s</span> <span class="txt of---txt">%5$s</span></span>';
                    $show_more_label_mu .= ' <span class="val post-title---val"><span class="txt post-title---txt">%1$s</span></span>';
                $show_more_label_mu .= '</span>';
            $show_more_label_mu .= '</span>';
        $show_more_label_mu .= '</div>';
        
        $show_more_axn = sprintf( $show_more_axn_mu,
            get_the_title( get_the_ID() ),
            'show-more-axn',
            esc_html__( 'Show', 'applicator' ),
            esc_html__( 'More', 'applicator' ),
            esc_html__( 'of', 'applicator' ),
            esc_url( get_permalink( get_the_ID() ) ),
            esc_attr__( 'Show More of', 'applicator' )
        );
        
        $show_more_label = sprintf( $show_more_label_mu,
            get_the_title( get_the_ID() ),
            'show-more-axn',
            esc_html__( 'Show', 'applicator' ),
            esc_html__( 'More', 'applicator' ),
            esc_html__( 'of', 'applicator' ),
            esc_attr__( 'Show More of', 'applicator' )
        );
        
        // Pattern after content.php
        if ( is_home() || is_singular() || ( is_front_page() && ! is_page() ) ) {
            return $show_more_axn;
        } else {
            return '<span class="sep ellip---sep">&hellip;</span>' . $show_more_label;
        }
    
    }
    add_filter( 'excerpt_more', 'applicator_func_show_more' );
    add_filter( 'the_content_more_link', 'applicator_func_show_more' );
}

function applicator_func_the_excerpt( $excerpt ) {
    
    if ( is_home() || is_singular() || ( is_front_page() && ! is_page() ) ) {
        return $excerpt;
    } else {
        return '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" title="' . esc_attr__( 'Show More of', 'applicator' ) . ' ' . get_the_title( get_the_ID() ) . '">' . $excerpt . '</a>';
    }
}
add_filter( 'get_the_excerpt', 'applicator_func_the_excerpt' );