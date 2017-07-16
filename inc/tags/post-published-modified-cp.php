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

if ( ! function_exists( 'applicator_func_post_published_modified_cp' ) ) {
    function applicator_func_post_published_modified_cp() {
        
        
        /* ------------ Post Published ---------- */
        
        // Class Name Variables
        $post_published_css = 'post-pub';
        $post_published_label_obj_css = $post_published_css . '-lbl';
        $post_published_date_stamp_obj_css = $post_published_css . '-ds';
        $post_published_time_stamp_obj_css = $post_published_css . '-ts';
        $post_published_date_time_stamp_css = $post_published_css . '-dts';
        
        
        /* ------------ Post Published Label (obj) ---------- */
        
        // Content - Text
        $post_published_label_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( 'Published', 'applicator' ),
                ),
                array(
                    'txt' => esc_html__( 'on', 'applicator' ),
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_published_label_obj = htmlok_obj( array(
            'name'      => 'Post Published Label',
            'layout'    => 'i',
            'elem'      => 'g',
            'css'       => $post_published_label_obj_css,
            'content'   => $post_published_label_txt,
        ) );
        
        
        /* ------------ Post Published Date Stamp (obj) ---------- */
        
        // Content - Text
        $post_published_date_stamp_obj_txt = htmlok_txt( array(
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
        $post_published_date_stamp_obj = htmlok_obj( array(
            'name'      => 'Post Published Date Stamp',
            'layout'    => 'i',
            'elem'      => 't',
            'css'       => $post_published_date_stamp_obj_css,
            'linked'    => true,
            'attr'      => array(
                'title'  => get_the_date( 'j F Y'),
                'datetime'  => get_the_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() ),
            ),
            'content'   => $post_published_date_stamp_obj_txt,
        ) );
        
        
        /* ------------ Post Published Time Stamp (obj) ---------- */
        
        // Content - Text
        $post_published_time_stamp_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => get_the_date( 'H' ),
                    'css' => 'hours',
                ),
                array(
                    'txt' => get_the_date( 'i' ),
                    'css' => 'minutes',
                    'sep' => $GLOBALS['colon_sep'],
                ),
                array(
                    'txt' => get_the_date( 's' ),
                    'css' => 'seconds',
                    'sep' => $GLOBALS['colon_sep'],
                ),
            ),
        ) );
        
        // Content - Object
        $post_published_time_stamp_obj = htmlok_obj( array(
            'name'      => 'Post Published Time Stamp',
            'layout'    => 'i',
            'elem'      => 't',
            'css'       => $post_published_time_stamp_obj_css,
            'linked'    => true,
            'attr'      => array(
                'title'  => get_the_date( 'H:i:s'),
                'datetime'  => get_the_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() ),
            ),
            'content'   => $post_published_time_stamp_txt,
        ) );
        
        
        /* ------------ Post Published Date, Time Stamp (cp) ---------- */
        
        // Content - Component
        $post_published_date_time_stamp = htmlok_cp( array(
            'name'          => 'Post Published Date, Time Stamp',
            'css'       => $post_published_date_time_stamp_css,
            'content'       => $post_published_date_stamp_obj . $post_published_time_stamp_obj,
        ) );
        
        
        /* ------------ Post Published (cp) ---------- */
        
        // Content - Component
        $post_published = htmlok_cp( array(
            'name'      => 'Post Published',
            'css'   => $post_published_css,
            'content'   => $post_published_label_obj . $post_published_date_time_stamp,
        ) );
        
        
        /* ------------ Post Modified ---------- */
        
        
        $post_modified_css = 'post-mod';
        $post_modified_label_obj_css = $post_modified_css . '-lbl';
        $post_modified_date_stamp_obj_css = $post_modified_css . '-ds';
        $post_modified_time_stamp_obj_css = $post_modified_css . '-ts';
        $post_modified_date_time_stamp_css = $post_modified_css . '-dts';
        
        
        /* ------------ Post Modified Label (obj) ---------- */
        
        // Content - Text
        $post_modified_label_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( 'Modified', 'applicator' ),
                ),
                array(
                    'txt' => esc_html__( 'on', 'applicator' ),
                    'sep' => ' ',
                ),
            ),
        ) );
        
        // Content - Element
        $post_modified_label_obj = htmlok_obj( array(
            'name'      => 'Post Modified Label',
            'layout'    => 'i',
            'elem'      => 'g',
            'css'       => $post_modified_label_obj_css,
            'content'   => $post_modified_label_txt,
        ) );
        
        
        /* ------------ Post Modified Date Stamp (obj) ---------- */
        
        // Content - Text
        $post_modified_date_stamp_obj_txt = htmlok_txt( array(
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
        
        // Content - Object
        $post_modified_date_stamp_obj = htmlok_obj( array(
            'name'      => 'Post Modified Date Stamp',
            'layout'    => 'i',
            'elem'      => 't',
            'css'       => $post_modified_date_stamp_obj_css,
            'linked'    => true,
            'attr'      => array(
                'title'  => get_the_modified_date( 'j F Y'),
                'datetime'  => get_the_modified_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() ),
            ),
            'content'   => $post_modified_date_stamp_obj_txt,
        ) );
        
        
        /* ------------ Post Modified Time Stamp (obj) ---------- */
        
        // Content - Text
        $post_modified_time_stamp_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => get_the_modified_time( 'H' ),
                    'css' => 'hours',
                ),
                array(
                    'txt' => get_the_modified_time( 'i' ),
                    'css' => 'minutes',
                    'sep' => $GLOBALS['colon_sep'],
                ),
                array(
                    'txt' => get_the_modified_time( 's' ),
                    'css' => 'seconds',
                    'sep' => $GLOBALS['colon_sep'],
                ),
            ),
        ) );
        
        // Content - Object
        $post_modified_time_stamp_obj = htmlok_obj( array(
            'name'      => 'Post Modified Time Stamp',
            'layout'    => 'i',
            'elem'      => 't',
            'css'       => $post_modified_time_stamp_obj_css,
            'linked'    => true,
            'attr'      => array(
                'title'  => get_the_modified_time( 'H:i:s'),
                'datetime'  => get_the_modified_date( DATE_W3C ),
                'href'      => esc_url( get_permalink() ),
            ),
            'content'   => $post_modified_time_stamp_txt,
        ) );
        
        
        /* ------------ Post Modified Date, Time Stamp (cp) ---------- */
        
        // Content - Component
        $post_modified_date_time_stamp = htmlok_cp( array(
            'name'          => 'Post Modified Date, Time Stamp',
            'css'       => $post_modified_date_time_stamp_css,
            'content'       => $post_modified_date_stamp_obj . $post_modified_time_stamp_obj,
        ) );
        
        
        /* ------------ Post Modified (cp) ---------- */
        
        // Content - Component
        $post_modified = htmlok_cp( array(
            'name'      => 'Post Modified',
            'css'   => $post_modified_css,
            'content'   => $post_modified_label_obj . $post_modified_date_time_stamp,
        ) );
        
        
        /* ------------ Post Published, Modified (cp) ---------- */
        
        // Content - Component
        $post_published_modified = htmlok_cp( array(
            'name'      => 'Post Published, Modified',
            'css'   => 'post-pub-mod',
            'content'   => $post_published . $post_modified,
        ) );
        
        return $post_published_modified;
    
    }
}