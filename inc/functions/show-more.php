<?php

//------------------------- Excerpt: Show More

if ( ! function_exists( 'applicator_show_more' ) ) :
    function applicator_show_more( $link ) {
        
        if ( is_admin() ) {
            return $link;
        }
        
        $link = sprintf(
            '<div class="cp show-more" data-name="Show More">'
                .'<div class="show-more--cr">'
                    .'<a class="a show-more--a more-link" href="%6$s" title="%5$s %7$s">'
                        .'<span class="a-l">'
                            .'<span class="show-more--a--pred-l">'
                                .'<span class="show-more--a--verb-l">%1$s</span>'
                                .' <span class="show-more--a--prn-l">%2$s</span>'
                                .' <span class="show-more--a--prep-l">%3$s</span><span class="show-more--a--sep">%4$s</span>'
                            .'</span>'
                            .' <span class="show-more--a--subj-l entry-title--l">%7$s</span>'
                        .'</span>'
                    .'</a>'
                .'</div>'
            .'</div>',
            esc_html__( 'Show', 'applicator' ),
            esc_html__( 'More', 'applicator' ),
            esc_html__( 'of', 'applicator' ),
            esc_html__( ':', 'applicator' ),
            esc_attr__( 'Show More of:', 'applicator' ),
            esc_url( get_permalink( get_the_ID() ) ),
            get_the_title( get_the_ID() )
        );
        
        /* Pattern after content.php the_content and the_excerpt */
        if ( is_home() || is_single() ) {
            return $link;
        } else {
           return '&hellip; ' . $link;
        }
    
    }
    add_filter( 'excerpt_more', 'applicator_show_more' );
    add_filter( 'the_content_more_link', 'applicator_show_more' );
endif;