<?php // Published Timestamp | content.php

if ( ! function_exists( 'apl_post_pub_mod' ) ) {
    function apl_post_pub_mod() {
        
        $post_pub_ts_mu = '<span class="obj %2$s" data-name="%1$s">';
            $post_pub_ts_mu .= '<time class="time %3$s---time" datetime="%6$s">';
                $post_pub_ts_mu .= '<span class="time_l %3$s---time_l">';
                    $post_pub_ts_mu .= '<a class="a %3$s---a" href="%4$s" title="%5$s"><span class="a_l %3$s---a_l"><span class="word day---word">%7$s</span> <span class="word month---word">%8$s</span> <span class="word year---word">%9$s</span></span></a>';
                $post_pub_ts_mu .= '</span>';
            $post_pub_ts_mu .= '</time>';
        $post_pub_ts_mu .= '</span><!-- %1$s -->';
        
        $post_pub_ts = sprintf( $post_pub_ts_mu,
            esc_attr__( 'Post Published Timestamp', 'applicator' ),
            'post-published-timestamp',
            'post-pub-ts',
            esc_url( get_permalink() ),
            get_the_title(),
            get_the_date( DATE_W3C ),
            get_the_date( 'j' ), // Day (d)
            get_the_date( 'M' ), // Month (mmm)
            get_the_date( 'Y' ) // Year (yyyy)
        );
        
        $post_pub_mu = '<div class="cp %2$s" data-name="%1$s">';
            $post_pub_mu .= '<div class="cr %3$s---cr">';
                $post_pub_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                $post_pub_mu .= '<div class="ct %3$s---ct">';
                    $post_pub_mu .= '<div class="ct_cr %3$s---ct_cr">';
                        $post_pub_mu .= '%4$s';
                    $post_pub_mu .= '</div>';
                $post_pub_mu .= '</div><!-- ct -->';
            $post_pub_mu .= '</div>';
        $post_pub_mu .= '</div><!-- %1$s -->';
        
        printf( $post_pub_mu,
            esc_attr__( 'Post Published', 'applicator' ),
            'post-published',
            'post-pub',
            $post_pub_ts
        );
    
    }
} // apl_post_pub_mod


if ( ! function_exists( 'applicator_pub_timestamp' ) ) :
    function applicator_pub_timestamp() {
        
        $pub_timestamp = '<div class="entry-timestamp pub-timestamp">';
            $pub_timestamp .= '<div class="entry-timestamp--cr pub-timestamp--cr">';
                $pub_timestamp .= '<span class="entry-timestamp--l pub-timestamp--l">';
                    $pub_timestamp .= '<span class="entry-timestamp--pred-l pub-timestamp--pred-l">%4$s</span>';
                    $pub_timestamp .= '<span class="entry-timestamp--subj-l pub-timestamp--subj-l">';
                        $pub_timestamp .= '<a class="a entry-timestamp--a pub-timestamp--a" href="%1$s" title="%2$s" rel="bookmark"><span class="entry-timestamp--a-l pub-timestamp--a-l">%3$s</span></a>';
                    $pub_timestamp .= '</span>';
                $pub_timestamp .= '</span>';
            $pub_timestamp .= '</div>';
        $pub_timestamp .= '</div>';

        $time_string = '<time class="time entry-timestamp--time pub-timestamp--time" datetime="%1$s">';
        $time_string .= '<span class="time-l entry-timestamp--time-l pub-timestamp--time-l">';
        $time_string .= '<span class="timestamp-day--l">%2$s</span>';
        $time_string .= ' <span class="timestamp-month--l">%3$s</span>';
        $time_string .= ' <span class="timestamp-year--l">%4$s</span>';
        $time_string .= '</span>';
        $time_string .= '</time>';

        $time_string = sprintf( $time_string,
            get_the_date( DATE_W3C ),
            get_the_date( 'j' ), // Day (d)
            get_the_date( 'M' ), // Month (mmm)
            get_the_date( 'Y' ) // Year (yyyy)
        );

        printf( $pub_timestamp,
            esc_url( get_permalink() ),
            get_the_title(),
            $time_string,
            __( 'Published on ', 'applicator')
        );
	
}
endif;


//------------------------- Modified Timestamp
// content.php

if ( ! function_exists( 'applicator_mod_timestamp' ) ) :
    function applicator_mod_timestamp() {
        
        $mod_timestamp = '<div class="entry-timestamp mod-timestamp">';
            $mod_timestamp .= '<div class="entry-timestamp--cr mod-timestamp--cr">';
                $mod_timestamp .= '<span class="mod-timestamp--l">';
                    $mod_timestamp .= '<span class="entry-timestamp--pred-l mod-timestamp--pred-l">%4$s</span>';
                    $mod_timestamp .= '<span class="entry-timestamp--subj-l mod-timestamp--subj-l">';
                        $mod_timestamp .= '<a class="a entry-timestamp--a mod-timestamp--a" href="%1$s" title="%2$s" rel="bookmark"><span class="entry-timestamp--a-l mod-timestamp--a-l">%3$s</span></a>';
                    $mod_timestamp .= '</span>';
                $mod_timestamp .= '</span>';
            $mod_timestamp .= '</div>';
        $mod_timestamp .= '</div>';

        $time_string = '<time class="time entry-timestamp--time mod_timestamp--time" datetime="%1$s">';
        $time_string .= '<span class="time-l entry-timestamp--time-l mod_timestamp--time-l">';
        $time_string .= '<span class="timestamp-day--l">%2$s</span>';
        $time_string .= ' <span class="timestamp-month--l">%3$s</span>';
        $time_string .= ' <span class="timestamp-year--l">%4$s</span>';
        $time_string .= '</span>';
        $time_string .= '</time>';

        $time_string = sprintf( $time_string,
            get_the_modified_date( DATE_W3C ),
            get_the_modified_date( 'j' ), // Day (d)
            get_the_modified_date( 'M' ), // Month (mmm)
            get_the_modified_date( 'Y' ) // Year (yyyy)
        );

        printf( $mod_timestamp,
            esc_url( get_permalink() ),
            get_the_title(),
            $time_string,
            __( 'Modified on ', 'applicator')
        );
	
}
endif;