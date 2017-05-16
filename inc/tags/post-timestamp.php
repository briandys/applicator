<?php // Published Timestamp | content.php

if ( ! function_exists( 'applicator_func_post_pub_mod_ts' ) ) {
    function applicator_func_post_pub_mod_ts() {
        
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
        
        // Post Published Label
        $post_pub_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Published Date and Time Stamp Label',
            'obj post-published-timestamp-label',
            'post-pub-ts-lbl',
            esc_html__( 'Published', 'applicator' ),
            'published',
            esc_html__( 'on', 'applicator' ),
            'on'
        );
        
        // Post Modified Label
        $post_mod_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Modified Date and Time Stamp Label',
            'obj post-modified-timestamp-label',
            'post-mod-ts-lbl',
            esc_html__( 'Modified', 'applicator' ),
            'modified',
            esc_html__( 'on', 'applicator' ),
            'on'
        );
        
        // Post Published Date
        $post_pub_date = sprintf( $post_pub_mod_date_mu,
            'Post Published Date Stamp',
            'obj post-published-date-stamp',
            'post-pub-ds',
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
        
        // Post Published Time
        $post_pub_time = sprintf( $post_pub_mod_time_mu,
            'Post Published Time Stamp',
            'obj post-published-time-stamp',
            'post-pub-ts',
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
        
        // Post Modified Date
        $post_mod_date = sprintf( $post_pub_mod_date_mu,
            'Post Modified Date Stamp',
            'obj post-modified-date-stamp',
            'post-mod-ds',
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
        
        // Post Modified Time
        $post_mod_time = sprintf( $post_pub_mod_time_mu,
            'Post Modified Time Stamp',
            'obj post-modified-time-stamp',
            'post-mod-ts',
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
        
        // Post Published Date Time Component
        $post_pub_date_time = sprintf( $post_pub_date_time_mu,
            'Post Published Date and Time Stamp',
            'cp post-published-date-time-stamp',
            'post-pub-dts',
            esc_html__( 'Post Published Date and Time', $GLOBALS['apl_textdomain'] ),
            $post_pub_date,
            $post_pub_time
        );
        
        // Post Modified Date Time Component
        $post_mod_date_time = sprintf( $post_pub_date_time_mu,
            'Post Modified Date and Time Stamp',
            'cp post-modified-date-time-stamp',
            'post-mod-dts',
            esc_html__( 'Post Modified Date and Time', $GLOBALS['apl_textdomain'] ),
            $post_mod_date,
            $post_mod_time
        );
        
        // Post Published Info Component
        $post_pub = sprintf( $post_pub_mod_mu,
            'Post Published Info',
            'cp post-published-info',
            'post-pub-info',
            esc_html__( 'Post Published Info', $GLOBALS['apl_textdomain'] ),
            $post_pub_lbl,
            $post_pub_date_time
        );
        
        // Post Modified Info Component
        $post_mod = sprintf( $post_pub_mod_mu,
            'Post Modified Info',
            'cp post-modified-info',
            'post-mod-info',
            esc_html__( 'Post Modified Info', $GLOBALS['apl_textdomain'] ),
            $post_mod_lbl,
            $post_mod_date_time
        );
        
        // Post Published / Modified Info Component
        $post_pub_mod_info_NAME = 'Post Published and Modified Date and Time Stamp Info';
        printf( $post_pub_mod_info_mu,
            $post_pub_mod_info_NAME,
            'cp post-published-modified-date-time-stamp-info',
            'post-pub-mod-dts-info',
            esc_html__( $post_pub_mod_info_NAME, $GLOBALS['apl_textdomain'] ),
            $post_pub,
            $post_mod
        );
    
    }
}