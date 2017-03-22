<?php

//------------------------- Excerpt: Show More

if ( ! function_exists( 'applicator_excerpt_more' ) ) :
    function applicator_excerpt_more( $link ) {
        
        if ( is_admin() ) {
            return $link;
        }
        
        $link = sprintf(
            '<div class="cp show-more" data-name="Show More">'
                .'<div class="show-more--cr">'
                    .'<a class="a show-more--a" href="%6$s" title="%5$s %7$s">'
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
        
        return '&hellip; ' . $link;
    
    }
    add_filter( 'excerpt_more', 'applicator_excerpt_more' );
endif;


//------------------------- Content: Show More

if ( ! function_exists( 'modify_read_more_link' ) ) :
    function modify_read_more_link() {
        
        return sprintf(
            '<div class="cp show-more" data-name="Show More">'
                .'<div class="show-more--cr">'
                    .'<a class="a show-more--a" href="%6$s" title="%5$s %7$s">'
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
    
    }
    add_filter( 'the_content_more_link', 'modify_read_more_link' );
endif;