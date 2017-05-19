<?php // Published Timestamp | content.php

/*
Structure

* Post Published, Modified (cp)

    ** Post Published (cp) | $post_published
    
        *** Post Published Label (obj) | $post_published_label_obj
            • Published on
        
        *** Post Published Date, Time Stamp (cp) | $post_published_date_time_stamp
            
            **** Post Published Date Stamp (obj) | $post_published_date_stamp_obj
                • [1 January 2020]
            
            **** Post Published Time Stamp (obj) | $post_published_time_stamp_obj
                • [00:00:00]

    ** Post Modified (cp) | $post_modified
    
        *** Post Modified Label (obj) | $post_modified_label_obj
            • Published on
        
        *** Post Modified Date, Time Stamp (cp) | $post_modified_date_time_stamp
            
            **** Post Modified Date Stamp (obj) | $post_modified_date_stamp_obj
                • [1 January 2020]
            
            **** Post Modified Time Stamp (obj) | $post_modified_time_stamp_obj
                • [00:00:00]

*/

if ( ! function_exists( 'applicator_func_post_pub_mod_ts' ) ) {
    function applicator_func_post_pub_mod_ts() {
        
        
        /* ------------ Post Published ---------- */
        
        
        $post_published_sec_css = 'post-pub';
        $post_published_label_obj_sec_css = $post_published_sec_css . '-lbl-obj';
        
        
        /* ------------ Post Published Label (obj) ---------- */
        
        // Markup - Text
        $post_published_modified_label_obj_txt_mu = '<span class="txt %2$s---txt">%1$s</span>';
        $post_published_modified_label_obj_txt_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
        
        // Content - Text
        $post_published_label_obj_txt = sprintf( $post_published_modified_label_obj_txt_mu,
            esc_html__( 'Published', $GLOBALS['apl_textdomain'] ),
                'published',
            esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
                'on'
        );
        
        // Content - Element
        $post_published_label_obj_elem = applicator_html_e( array(
            'type'      => 'g',
            'sec_css'   => $post_published_label_obj_sec_css,
            'content'   => $post_published_label_obj_txt
        ) );
        
        // Content - Object
        $post_published_label_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Published Label',
            'sec_css'   => $post_published_label_obj_sec_css,
            'content'   => $post_published_label_obj_elem
        ) );
        
        
        /* ------------ Post Published Date Stamp (obj) ---------- */
        
        // Markup - Text
        $post_published_modified_date_stamp_obj_txt_mu = '<span class="txt %2$s---txt">%1$s</span>';
        $post_published_modified_date_stamp_obj_txt_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
        $post_published_modified_date_stamp_obj_txt_mu .= ' <span class="txt %6$s---txt">%5$s</span>';
        
        // Content - Text
        $post_published_date_stamp_obj_txt = sprintf( $post_published_modified_date_stamp_obj_txt_mu,
            get_the_date( 'j' ), // Day (d)
                'day',
            get_the_date( 'M' ), // Month (mmm)
                'month',
            get_the_date( 'Y' ), // Year (yyyy)
                'year'
        );
        
        // Markup - Element
        $post_published_modified_date_time_stamp_obj_elem_mu = '<time class="time %2$s---time" datetime="%3$s">';
            $post_published_modified_date_time_stamp_obj_elem_mu .= '<a class="a %2$s---a" href="%4$s">';
                $post_published_modified_date_time_stamp_obj_elem_mu .= '<span class="a_l %2$s---a_l">';
                    $post_published_modified_date_time_stamp_obj_elem_mu .= '%1$s';
                $post_published_modified_date_time_stamp_obj_elem_mu .= '</span>';
            $post_published_modified_date_time_stamp_obj_elem_mu .= '</a>';
        $post_published_modified_date_time_stamp_obj_elem_mu .= '</time>';
        
        $post_published_date_stamp_obj_sec_css = $post_published_sec_css . '-ds-obj';
        
        // Content - Element
        $post_published_date_stamp_obj_elem = sprintf( $post_published_modified_date_time_stamp_obj_elem_mu,
            $post_published_date_stamp_obj_txt,
            $post_published_date_stamp_obj_sec_css,
            get_the_date( DATE_W3C ),
            esc_url( get_permalink() )
        );
        
        // Content - Object
        $post_published_date_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Published Date Stamp',
            'sec_css'   => $post_published_date_stamp_obj_sec_css,
            'title'     => get_the_date( 'j F Y'),
            'content'   => $post_published_date_stamp_obj_elem
        ) );
        
        
        /* ------------ Post Published Time Stamp (obj) ---------- */
        
        // Markup - Text
        $post_published_modified_time_stamp_obj_txt_mu = '<span class="txt %2$s---txt">%1$s</span>';
        $post_published_modified_time_stamp_obj_txt_mu .= '<span class="sep colon---sep">:</span>';
        $post_published_modified_time_stamp_obj_txt_mu .= '<span class="txt %4$s---txt">%3$s</span>';
        $post_published_modified_time_stamp_obj_txt_mu .= '<span class="sep colon---sep">:</span>';
        $post_published_modified_time_stamp_obj_txt_mu .= '<span class="txt %6$s---txt">%5$s</span>';
        
        // Content - Text
        $post_published_time_stamp_obj_txt = sprintf( $post_published_modified_time_stamp_obj_txt_mu,
            get_the_date( 'H' ), // Day (d)
                'hours',
            get_the_date( 'i' ), // Month (mmm)
                'minutes',
            get_the_date( 's' ), // Year (yyyy)
                'seconds'
        );
        
        $post_published_time_stamp_obj_sec_css = $post_published_sec_css . '-ts-obj';
        
        // Content - Element
        $post_published_time_stamp_obj_elem = sprintf( $post_published_modified_date_time_stamp_obj_elem_mu,
            $post_published_time_stamp_obj_txt,
            $post_published_time_stamp_obj_sec_css,
            get_the_date( DATE_W3C ),
            esc_url( get_permalink() )
        );
        
        // Content - Object
        $post_published_time_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Published Time Stamp',
            'sec_css'   => $post_published_time_stamp_obj_sec_css,
            'title'     => get_the_date( 'H:i:s'),
            'content'   => $post_published_time_stamp_obj_elem
        ) );
        
        
        /* ------------ Post Published Date, Time Stamp (cp) ---------- */
        
        // Content - Component
        $post_published_date_time_stamp = applicator_html_mco( array(
            'name'      => 'Post Published Date, Time Stamp',
            'sec_css'   => $post_published_sec_css . '-dts',
            'content'   => $post_published_date_stamp_obj . ' ' . $post_published_time_stamp_obj
        ) );
        
        
        /* ------------ Post Published (cp) ---------- */
        
        // Content - Component
        $post_published = applicator_html_mco( array(
            'name'      => 'Post Published',
            'sec_css'   => $post_published_sec_css,
            'content'   => $post_published_label_obj . $post_published_date_time_stamp
        ) );
        
        
        /* ------------ Post Modified ---------- */
        
        
        $post_modified_sec_css = 'post-mod';
        $post_modified_label_obj_sec_css = $post_modified_sec_css . '-lbl-obj';
        
        
        /* ------------ Post Modified Label (obj) ---------- */
        
        // Content - Text
        $post_modified_label_obj_txt = sprintf( $post_published_modified_label_obj_txt_mu,
            esc_html__( 'Modified', $GLOBALS['apl_textdomain'] ),
                'modified',
            esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
                'on'
        );
        
        // Content - Element
        $post_modified_label_obj_elem = applicator_html_e( array(
            'type'      => 'g',
            'sec_css'   => $post_modified_label_obj_sec_css,
            'content'   => $post_modified_label_obj_txt
        ) );
        
        // Content - Object
        $post_modified_label_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Modified Label',
            'sec_css'   => $post_modified_label_obj_sec_css,
            'content'   => $post_modified_label_obj_elem
        ) );
        
        
        /* ------------ Post Modified Date Stamp (obj) ---------- */
        
        // Content - Text
        $post_modified_date_stamp_obj_txt = sprintf( $post_published_modified_date_stamp_obj_txt_mu,
            get_the_modified_date( 'j' ), // Day (d)
                'day',
            get_the_modified_date( 'M' ), // Month (mmm)
                'month',
            get_the_modified_date( 'Y' ), // Year (yyyy)
                'year'
        );
        
        $post_modified_date_stamp_obj_sec_css = 'post-mod-ds-obj';
        
        // Content - Element
        $post_modified_date_stamp_obj_elem = sprintf( $post_published_modified_date_time_stamp_obj_elem_mu,
            $post_modified_date_stamp_obj_txt,
            $post_modified_date_stamp_obj_sec_css,
            get_the_modified_date( DATE_W3C ),
            esc_url( get_permalink() )
        );
        
        // Content - Object
        $post_modified_date_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Modified Date Stamp',
            'sec_css'   => $post_modified_date_stamp_obj_sec_css,
            'title'     => get_the_modified_date( 'j F Y'),
            'content'   => $post_modified_date_stamp_obj_elem
        ) );
        
        
        /* ------------ Post Modified Time Stamp (obj) ---------- */
        
        // Content - Text
        $post_modified_time_stamp_obj_txt = sprintf( $post_published_modified_time_stamp_obj_txt_mu,
            get_the_modified_time( 'H' ), // Day (d)
                'hours',
            get_the_modified_time( 'i' ), // Month (mmm)
                'minutes',
            get_the_modified_time( 's' ), // Year (yyyy)
                'seconds'
        );
        
        $post_modified_time_stamp_obj_sec_css = $post_modified_sec_css . '-ts-obj';
        
        // Content - Element
        $post_modified_time_stamp_obj_elem = sprintf( $post_published_modified_date_time_stamp_obj_elem_mu,
            $post_modified_time_stamp_obj_txt,
            $post_modified_time_stamp_obj_sec_css,
            get_the_modified_date( DATE_W3C ),
            esc_url( get_permalink() )
        );
        
        // Content - Object
        $post_modified_time_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Modified Time Stamp',
            'sec_css'   => $post_modified_time_stamp_obj_sec_css,
            'title'     => get_the_modified_time( 'H:i:s'),
            'content'   => $post_modified_time_stamp_obj_elem
        ) );
        
        
        /* ------------ Post Modified Date, Time Stamp (cp) ---------- */
        
        // Content - Component
        $post_modified_date_time_stamp = applicator_html_mco( array(
            'name'      => 'Post Modified Date, Time Stamp',
            'sec_css'   => $post_modified_sec_css . '-dts',
            'content'   => $post_modified_date_stamp_obj . ' ' . $post_modified_time_stamp_obj
        ) );
        
        
        /* ------------ Post Modified (cp) ---------- */
        
        // Content - Component
        $post_modified = applicator_html_mco( array(
            'name'      => 'Post Modified',
            'sec_css'   => $post_modified_sec_css,
            'content'   => $post_modified_label_obj . $post_modified_date_time_stamp
        ) );
        
        
        /* ------------ Post Published, Modified (cp) ---------- */
        
        // Content - Component
        $post_published_modified = applicator_html_mco( array(
            'name'      => 'Post Published, Modified',
            'sec_css'   => 'post-pub-mod',
            'content'   => $post_published . $post_modified,
            'echo'      => true
        ) );
        
        
        
        
        // Content - Component
        $post_published_modifiedx = applicator_html_e( array(
            'type'      => 'g',
            'sec_css'   => 'boo-yeah',
            'content'   => 'Boo Yeah',
            'echo'      => true
        ) );
        
        // Content - Component
        $post_published_modifiedxx = applicator_html_e( array(
            'type'      => 't',
            'linked'    => true,
            'href'      => '#',
            'sec_css'   => 'super-time',
            'datetime'  => 'Time to Sleep',
            'content'   => 'Ow Clock',
            'echo'      => true
        ) );
        
        // Content - Component
        $post_published_modifiedxxx = applicator_html_e( array(
            'type'      => 'a',
            'href'      => '#',
            'content'   => 'This is a link.',
            'echo'      => true
        ) );
    
    }
}