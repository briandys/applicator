<?php // Published Timestamp | content.php

if ( ! function_exists( 'applicator_func_post_pub_mod_ts' ) ) {
    function applicator_func_post_pub_mod_ts() {
        
        // Markup
        $post_pub_mod_lbl_mu = '<span class="%2$s" data-name="%1$s">';
            $post_pub_mod_lbl_mu .= '<span class="g %3$s---g"><span class="txt %5$s---txt">%4$s</span> <span class="txt %7$s---txt">%6$s</span></span>';
        $post_pub_mod_lbl_mu .= '</span><!-- %1$s -->';
        
        // Content
        $post_pub_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Published Date and Time Stamp Label',
            'obj post-published-time-stamp-label',
            'post-pub-ts-lbl',
            esc_html__( 'Published', $GLOBALS['apl_textdomain'] ),
            'published',
            esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
            'on'
        );
        
        // Content
        $post_mod_lbl = sprintf( $post_pub_mod_lbl_mu,
            'Post Modified Date and Time Stamp Label',
            'obj post-modified-time-stamp-label',
            'post-mod-ts-lbl',
            esc_html__( 'Modified', $GLOBALS['apl_textdomain'] ),
            'modified',
            esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
            'on'
        );
        
        
        // Markup
        $post_pub_mod_date_mu = '<span class="%2$s" data-name="%1$s">';
            $post_pub_mod_date_mu .= '<time class="time %3$s---time" datetime="%11$s">';
                $post_pub_mod_date_mu .= '<span class="time_l %3$s---time_l">';
                    $post_pub_mod_date_mu .= '<a class="a %3$s---a" href="%10$s" title="%12$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">%4$s</span> <span class="txt %7$s---txt">%6$s</span> <span class="txt %9$s---txt">%8$s</span></span></a>';
                $post_pub_mod_date_mu .= '</span>';
            $post_pub_mod_date_mu .= '</time>';
        $post_pub_mod_date_mu .= '</span><!-- %1$s -->';
        
        // Content
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
        
        // Content
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
        
        
        // Markup
        $post_pub_mod_time_mu = '<span class="%2$s" data-name="%1$s">';
            $post_pub_mod_time_mu .= '<time class="time %3$s---time" datetime="%11$s">';
                $post_pub_mod_time_mu .= '<span class="time_l %3$s---time_l">';
                    $post_pub_mod_time_mu .= '<a class="a %3$s---a" href="%10$s" title="%12$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">%4$s</span><span class="sep colon---sep">:</span><span class="txt %7$s---txt">%6$s</span><span class="sep colon---sep">:</span><span class="txt %9$s---txt">%8$s</span></span></a>';
                $post_pub_mod_time_mu .= '</span>';
            $post_pub_mod_time_mu .= '</time>';
        $post_pub_mod_time_mu .= '</span><!-- %1$s -->';

        // Content
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
        
        // Content
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
        
        
        // Markup
        $post_pub_date_time_mu = '<div class="%2$s" data-name="%1$s">';
            $post_pub_date_time_mu .= '<div class="cr %3$s---cr">';
                $post_pub_date_time_mu .= '<div class="hr %3$s---hr">';
                    $post_pub_date_time_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $post_pub_date_time_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                    $post_pub_date_time_mu .= '</div>';
                $post_pub_date_time_mu .= '</div>';
                $post_pub_date_time_mu .= '<div class="ct %3$s---ct">';
                    $post_pub_date_time_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                $post_pub_date_time_mu .= '</div>';
            $post_pub_date_time_mu .= '</div>';
        $post_pub_date_time_mu .= '</div><!-- %1$s -->';
        
        // Content
        $post_pub_date_time = sprintf( $post_pub_date_time_mu,
            'Post Published Date and Time Stamp',
            'cp post-published-date-time-stamp',
            'post-pub-dts',
            esc_html__( 'Post Published Date and Time', $GLOBALS['apl_textdomain'] ),
            $post_pub_date,
            $post_pub_time
        );
        
        // Content
        $post_mod_date_time = sprintf( $post_pub_date_time_mu,
            'Post Modified Date and Time Stamp',
            'cp post-modified-date-time-stamp',
            'post-mod-dts',
            esc_html__( 'Post Modified Date and Time', $GLOBALS['apl_textdomain'] ),
            $post_mod_date,
            $post_mod_time
        );
        
        
        // Markup
        $post_pub_mod_mu = '<div class="%2$s" data-name="%1$s">';
            $post_pub_mod_mu .= '<div class="cr %3$s---cr">';
                $post_pub_mod_mu .= '<div class="hr %3$s---hr">';
                    $post_pub_mod_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $post_pub_mod_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                    $post_pub_mod_mu .= '</div>';
                $post_pub_mod_mu .= '</div>';
                $post_pub_mod_mu .= '<div class="ct %3$s---ct">';
                    $post_pub_mod_mu .= '<div class="ct_cr %3$s---ct_cr">';
                        $post_pub_mod_mu .= '%5$s %6$s';
                    $post_pub_mod_mu .= '</div>';
                $post_pub_mod_mu .= '</div><!-- ct -->';
            $post_pub_mod_mu .= '</div>';
        $post_pub_mod_mu .= '</div><!-- %1$s -->';
        
        // Content
        $post_pub = sprintf( $post_pub_mod_mu,
            'Post Published',
            'cp post-published',
            'post-pub',
            esc_html__( 'Post Published', $GLOBALS['apl_textdomain'] ),
            $post_pub_lbl,
            $post_pub_date_time
        );
        
        // Content
        $post_mod = sprintf( $post_pub_mod_mu,
            'Post Modified',
            'cp post-modified',
            'post-mod',
            esc_html__( 'Post Modified', $GLOBALS['apl_textdomain'] ),
            $post_mod_lbl,
            $post_mod_date_time
        );
        
        
        // Markup
        $post_pub_mod_info_mu = '<div class="%2$s" data-name="%1$s">';
            $post_pub_mod_info_mu .= '<div class="cr %3$s---cr">';
                $post_pub_mod_info_mu .= '<div class="hr %3$s---hr">';
                    $post_pub_mod_info_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $post_pub_mod_info_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                    $post_pub_mod_info_mu .= '</div>';
                $post_pub_mod_info_mu .= '</div>';
                $post_pub_mod_info_mu .= '<div class="ct %3$s---ct">';
                    $post_pub_mod_info_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                $post_pub_mod_info_mu .= '</div>';
            $post_pub_mod_info_mu .= '</div>';
        $post_pub_mod_info_mu .= '</div><!-- %1$s -->';
        
        // Display
        $post_pub_mod_info_NAME = 'Post Published and Modified Date and Time Stamp';
        printf( $post_pub_mod_info_mu,
            $post_pub_mod_info_NAME,
            'cp post-published-modified-date-time-stamp',
            'post-pub-mod-dts',
            esc_html__( $post_pub_mod_info_NAME, $GLOBALS['apl_textdomain'] ),
            $post_pub,
            $post_mod
        );
    
    }
}