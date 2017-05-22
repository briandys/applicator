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
        
        // Class Name Variables
        $post_published_sec_css = 'post-pub';
        $post_published_label_obj_sec_css = $post_published_sec_css . '-lbl-obj';
        $post_published_date_stamp_obj_sec_css = $post_published_sec_css . '-ds-obj';
        $post_published_time_stamp_obj_sec_css = $post_published_sec_css . '-ts-obj';
        
        
        /* ------------ Post Published Label (obj) ---------- */
        
        // Content - Text
        $published_txt = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( 'Published', $GLOBALS['apl_textdomain'] ),
                ),
                array(
                    'txt' => esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_published_label_obj_elem = applicator_html_e( array(
            'type'      => 'g',
            'sec_css'   => $post_published_label_obj_sec_css,
            'content'   => $published_txt
        ) );
        
        // Content - Object
        $post_published_label_obj = applicator_html_mco( array(
            'type'      => 'o',
            'layout'    => 'i',
            'name'      => 'Post Published Label',
            'sec_css'   => $post_published_label_obj_sec_css,
            'content'   => $post_published_label_obj_elem
        ) );
        
        
        /* ------------ Post Published Date Stamp (obj) ---------- */
        
        // Content - Text
        $post_published_date_stamp_obj_txt = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => get_the_date( 'j' ),
                    'css' => 'day',
                ),
                array(
                    'txt' => get_the_date( 'M' ),
                    'css' => 'month',
                    'sep' => ' ',
                ),
                array(
                    'txt' => get_the_date( 'Y' ),
                    'css' => 'year',
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_published_date_stamp_obj_elem = applicator_html_e( array(
            'type'      => 't',
            'linked'    => true,
            'attr'      => array(
                'datetime'  => get_the_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() )
            ),
            'sec_css'   => $post_published_date_stamp_obj_sec_css,
            'content'   => $post_published_date_stamp_obj_txt
        ) );
        
        // Content - Object
        $post_published_date_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Published Date Stamp',
            'sec_css'   => $post_published_date_stamp_obj_sec_css,
            'title'     => get_the_date( 'j F Y'),
            'content'   => $post_published_date_stamp_obj_elem
        ) );
        
        
        /* ------------ Post Published Time Stamp (obj) ---------- */
        
        // Content - Text
        $published_hours_txt = applicator_html_ok_txt( array(
            'type'      => 't',
            'txt_css'   => 'hours',
            'content'   => get_the_date( 'H' )
        ) );
        
        // Content - Text
        $published_minutes_txt = applicator_html_ok_txt( array(
            'type'      => 't',
            'txt_css'   => 'minutes',
            'content'   => get_the_date( 'i' )
        ) );
        
        // Content - Text
        $published_seconds_txt = applicator_html_ok_txt( array(
            'type'      => 't',
            'txt_css'   => 'seconds',
            'content'   => get_the_date( 's' )
        ) );
        
        // Content - Element
        $post_published_time_stamp_obj_elem = applicator_html_e( array(
            'type'      => 't',
            'linked'    => true,
            'attr'      => array(
                'datetime'  => get_the_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() )
            ),
            'sec_css'   => $post_published_time_stamp_obj_sec_css,
            'content'   => $published_hours_txt . $GLOBALS['colon_sep_mu'] . $published_minutes_txt . $GLOBALS['colon_sep_mu'] . $published_seconds_txt
        ) );
        
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
        $post_modified_date_stamp_obj_sec_css = $post_modified_sec_css . '-ds-obj';
        $post_modified_time_stamp_obj_sec_css = $post_modified_sec_css . '-ts-obj';
        
        
        /* ------------ Post Modified Label (obj) ---------- */
        
        // Content - Text
        $modified_txt = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( 'Modified', $GLOBALS['apl_textdomain'] ),
                ),
                array(
                    'txt' => esc_html__( 'on', $GLOBALS['apl_textdomain'] ),
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_modified_label_obj_elem = applicator_html_e( array(
            'type'      => 'g',
            'sec_css'   => $post_modified_label_obj_sec_css,
            'content'   => $modified_txt
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
        $post_modified_date_stamp_obj_txt = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => get_the_modified_date( 'j' ),
                    'css' => 'day',
                ),
                array(
                    'txt' => get_the_modified_date( 'M' ),
                    'css' => 'month',
                    'sep' => ' ',
                ),
                array(
                    'txt' => get_the_modified_date( 'Y' ),
                    'css' => 'year',
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_modified_date_stamp_obj_elem = applicator_html_e( array(
            'type'      => 't',
            'linked'    => true,
            'attr'      => array(
                'datetime'  => get_the_modified_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() )
            ),
            'sec_css'   => $post_modified_date_stamp_obj_sec_css,
            'content'   => $post_modified_date_stamp_obj_txt
        ) );
        
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
        $post_modified_time_stamp_txt = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => get_the_modified_time( 'H' ),
                    'css' => 'hours',
                ),
                array(
                    'txt' => get_the_modified_time( 'i' ),
                    'css' => 'minutes',
                    'sep' => $GLOBALS['colon_sep_mu'],
                ),
                array(
                    'txt' => get_the_modified_time( 's' ),
                    'css' => 'seconds',
                    'sep' => $GLOBALS['colon_sep_mu'],
                ),
            ),
        ) );
        
        // Content - Element
        $post_modified_time_stamp_obj_elem = applicator_html_e( array(
            'type'      => 't',
            'linked'    => true,
            'attr'      => array(
                'datetime'  => get_the_modified_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() )
            ),
            'sec_css'   => $post_modified_time_stamp_obj_sec_css,
            'content'   => $post_modified_time_stamp_txt,
        ) );
        
        // Content - Object
        $post_modified_time_stamp_obj = applicator_html_mco( array(
            'type'      => 'o',
            'name'      => 'Post Modified Time Stamp',
            'sec_css'   => $post_modified_time_stamp_obj_sec_css,
            'title'     => get_the_modified_time( 'H:i:s'),
            'content'   => $post_modified_time_stamp_obj_elem,
        ) );
        
        
        /* ------------ Post Modified Date, Time Stamp (cp) ---------- */
        
        // Content - Component
        $post_modified_date_time_stamp = applicator_html_mco( array(
            'name'      => 'Post Modified Date, Time Stamp',
            'sec_css'   => $post_modified_sec_css . '-dts',
            'content'   => $post_modified_date_stamp_obj . ' ' . $post_modified_time_stamp_obj,
        ) );
        
        
        /* ------------ Post Modified (cp) ---------- */
        
        // Content - Component
        $post_modified = applicator_html_mco( array(
            'name'      => 'Post Modified',
            'sec_css'   => $post_modified_sec_css,
            'content'   => $post_modified_label_obj . $post_modified_date_time_stamp,
        ) );
        
        
        /* ------------ Post Published, Modified (cp) ---------- */
        
        // Content - Component
        $post_published_modified = applicator_html_mco( array(
            'name'      => 'Post Published, Modified',
            'sec_css'   => 'post-pub-mod',
            'content'   => $post_published . $post_modified,
            'echo'      => true,
        ) );
        
        
        
        
        // Content - Text
        $test = applicator_html_ok_txt_test( array(
            'content' => array(
                array(
                    'txt' => get_the_modified_date( 'j' ), // Day (d)
                    'css' => 'day',
                ),
                array(
                    'txt' => get_the_modified_date( 'M' ), // Month (mmm)
                    'css' => 'month',
                ),
                array(
                    'txt' => get_the_modified_date( 'Y' ), // Year (yyyy)
                    'css' => 'year',
                ),
            ),
        ) );
    
    }
}