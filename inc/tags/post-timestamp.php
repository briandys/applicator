<?php // Published Timestamp | content.php

if ( ! function_exists( 'apl_post_pub_mod_ts' ) ) {
    function apl_post_pub_mod_ts() {
        
        $post_pub_mod_info_mu = '<div class="%2$s" data-name="%1$s">';
            $post_pub_mod_info_mu .= '<div class="cr %3$s---cr">';
                $post_pub_mod_info_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                $post_pub_mod_info_mu .= '<div class="ct %3$s---ct">';
                    $post_pub_mod_info_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                $post_pub_mod_info_mu .= '</div>';
            $post_pub_mod_info_mu .= '</div>';
        $post_pub_mod_info_mu .= '</div><!-- %1$s -->';
        
                $post_pub_mod_mu = '<div class="%2$s" data-name="%1$s">';
                    $post_pub_mod_mu .= '<div class="cr %3$s---cr">';
                        $post_pub_mod_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                        $post_pub_mod_mu .= '<div class="ct %3$s---ct">';
                            $post_pub_mod_mu .= '<div class="ct_cr %3$s---ct_cr">';
                                $post_pub_mod_mu .= '%5$s %6$s';
                            $post_pub_mod_mu .= '</div>';
                        $post_pub_mod_mu .= '</div><!-- ct -->';
                    $post_pub_mod_mu .= '</div>';
                $post_pub_mod_mu .= '</div><!-- %1$s -->';
        
                        $post_pub_mod_lbl_mu = '<span class="%2$s" data-name="%1$s">';
                            $post_pub_mod_lbl_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><span class="word %5$s---word">%4$s</span> <span class="word %7$s---word">%6$s</span></span></span>';
                        $post_pub_mod_lbl_mu .= '</span><!-- %1$s -->';

                        $post_pub_date_time_mu = '<div class="%2$s" data-name="%1$s">';
                            $post_pub_date_time_mu .= '<div class="cr %3$s---cr">';
                                $post_pub_date_time_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                                $post_pub_date_time_mu .= '<div class="ct %3$s---ct">';
                                    $post_pub_date_time_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                                $post_pub_date_time_mu .= '</div>';
                            $post_pub_date_time_mu .= '</div>';
                        $post_pub_date_time_mu .= '</div><!-- %1$s -->';

                                $post_pub_mod_date_mu = '<span class="%2$s" data-name="%1$s">';
                                    $post_pub_mod_date_mu .= '<time class="time %3$s---time" datetime="%11$s">';
                                        $post_pub_mod_date_mu .= '<span class="time_l %3$s---time_l">';
                                            $post_pub_mod_date_mu .= '<a class="a %3$s---a" href="%10$s" title="%12$s"><span class="a_l %3$s---a_l"><span class="word %5$s---word">%4$s</span> <span class="word %7$s---word">%6$s</span> <span class="word %9$s---word">%8$s</span></span></a>';
                                        $post_pub_mod_date_mu .= '</span>';
                                    $post_pub_mod_date_mu .= '</time>';
                                $post_pub_mod_date_mu .= '</span><!-- %1$s -->';

                                $post_pub_mod_time_mu = '<span class="%2$s" data-name="%1$s">';
                                    $post_pub_mod_time_mu .= '<time class="time %3$s---time" datetime="%11$s">';
                                        $post_pub_mod_time_mu .= '<span class="time_l %3$s---time_l">';
                                            $post_pub_mod_time_mu .= '<a class="a %3$s---a" href="%10$s" title="%12$s"><span class="a_l %3$s---a_l"><span class="word %5$s---word">%4$s</span><span class="sep colon---sep">:</span><span class="word %7$s---word">%6$s</span><span class="sep colon---sep">:</span><span class="word %9$s---word">%8$s</span></span></a>';
                                        $post_pub_mod_time_mu .= '</span>';
                                    $post_pub_mod_time_mu .= '</time>';
                                $post_pub_mod_time_mu .= '</span><!-- %1$s -->';
        
        // Post Published
        $post_pub_date = sprintf( $post_pub_mod_date_mu,
            'Post Published Date',
            'obj post-published-date',
            'post-pub-date',
            get_the_date( 'j' ), // Day (d)
            'day',
            get_the_date( 'M' ), // Month (mmm)
            'month',
            get_the_date( 'Y' ), // Year (yyyy)
            'year',
            esc_url( get_permalink() ),
            get_the_date( DATE_W3C ),
            get_the_date( 'j F Y')
        );
        
        $post_pub_time = sprintf( $post_pub_mod_time_mu,
            'Post Published Time',
            'obj post-published-time',
            'post-pub-time',
            get_the_date( 'H' ), // Day (d)
            'hours',
            get_the_date( 'i' ), // Month (mmm)
            'minutes',
            get_the_date( 's' ), // Year (yyyy)
            'seconds',
            esc_url( get_permalink() ),
            get_the_date( DATE_W3C ),
            get_the_date( 'H:i:s')
        );
        
        // Post Modified
        $post_mod_date = sprintf( $post_pub_mod_date_mu,
            'Post Modified Date',
            'obj post-modified-date',
            'post-mod-date',
            get_the_modified_date( 'j' ), // Day (d)
            'day',
            get_the_modified_date( 'M' ), // Month (mmm)
            'month',
            get_the_modified_date( 'Y' ), // Year (yyyy)
            'year',
            esc_url( get_permalink() ),
            get_the_modified_date( DATE_W3C ),
            get_the_modified_date( 'j F Y')
        );
        
        $post_mod_time = sprintf( $post_pub_mod_time_mu,
            'Post Modified Time',
            'obj post-modified-time',
            'post-mod-time',
            get_the_date( 'H' ), // Day (d)
            'hours',
            get_the_date( 'i' ), // Month (mmm)
            'minutes',
            get_the_date( 's' ), // Year (yyyy)
            'seconds',
            esc_url( get_permalink() ),
            get_the_date( DATE_W3C ),
            get_the_date( 'H:i:s')
        );
        
        $post_pub_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Published Timestamp Label',
            'obj post-published-timestamp-label',
            'post-pub-ts-lbl',
            esc_html__( 'Published', 'applicator' ),
            'published',
            esc_html__( 'on', 'applicator' ),
            'on'
        );
        
        $post_mod_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Modified Timestamp Label',
            'obj post-modified-timestamp-label',
            'post-mod-ts-lbl',
            esc_html__( 'Modified', 'applicator' ),
            'modified',
            esc_html__( 'on', 'applicator' ),
            'on'
        );
        
        $post_pub_date_time = sprintf( $post_pub_date_time_mu,
            'Post Published Date / Time',
            'cp post-published-date-time',
            'post-pub-date-time',
            esc_html__( 'Post Published Date / Time', 'applicator' ),
            $post_pub_date,
            $post_pub_time
        );
        
        $post_mod_date_time = sprintf( $post_pub_date_time_mu,
            'Post Modified Date / Time',
            'cp post-modified-date-time',
            'post-mod-date-time',
            esc_html__( 'Post Modified Date / Time', 'applicator' ),
            $post_mod_date,
            $post_mod_time
        );
        
        $post_pub = sprintf( $post_pub_mod_mu,
            'Post Published',
            'cp post-published',
            'post-pub',
            esc_html__( 'Post Published', 'applicator' ),
            $post_pub_lbl,
            $post_pub_date_time
        );
        
        $post_mod = sprintf( $post_pub_mod_mu,
            'Post Modified',
            'cp post-modified',
            'post-mod',
            esc_html__( 'Post Modified', 'applicator' ),
            $post_mod_lbl,
            $post_mod_date_time
        );
        
        printf( $post_pub_mod_info_mu,
            'Post Published / Modified Info',
            'cp post-published-modified-info',
            'post-pub-mod-info',
            esc_html__( 'Post Published Modified Info', 'applicator' ),
            $post_pub,
            $post_mod
        );
        
        printf( $GLOBALS['sample_markup'],
            'Data Name',
            'cp data-name',
            'd-n',
            esc_html__( 'DATA NAME', 'applicator' )
        );
    
    }
}