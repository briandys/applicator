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

if ( ! function_exists( 'applicator_post_published_modified' ) ) {
    function applicator_post_published_modified() {
        
        
        //------------------------------------ Post Published
        
        // Variables Definitions
        $published_on_term = esc_html__ ( 'Published on', 'applicator' );
        $published_term = esc_html__ ( 'Published', 'applicator' );
        $on_term = esc_html__ ( 'on', 'applicator' );
        $post_published_date_content = get_the_date( 'j F Y');
        $post_published_time_content = get_the_date( 'H:i:s');
        $published_on_date_time_content = $published_on_term.' '.$post_published_date_content.', '.$post_published_time_content;
        
        $modified_on_term = esc_html__ ( 'Modified on', 'applicator' );
        $modified_term = esc_html__ ( 'Modified', 'applicator' );
        $post_modified_date_content = get_the_modified_time( 'j F Y');
        $post_modified_time_content = get_the_modified_time( 'H:i:s');
        $modified_on_date_time_content = $modified_on_term.' '.$post_modified_date_content.', '.$post_modified_time_content;
        
        
        // R: Post Published Label
        $post_published_label_obj = applicator_htmlok( array(
            'name'      => 'Post Published',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'generic label',
            ),
            'css'       => 'post-pub',
            'content'   => array(
                'object' => array(
                    array(
                        'txt'   => $published_term,
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt'   => $on_term,
                    ),
                ),
                'after'     => $GLOBALS['space_sep'],
            ),
        ) );
        
        
        // R: Post Published Date Stamp
        $post_published_date_stamp_obj = applicator_htmlok( array(
            'name'      => 'Post Published Date Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_the_date( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => esc_url( get_permalink() ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'post-pub-d-stamp',
            'title'     => $published_on_date_time_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_the_date( 'j' ),
                        'css' => 'day',
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt' => get_the_date( 'M' ),
                        'css' => 'month',
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt' => get_the_date( 'Y' ),
                        'css' => 'year',
                    ),
                ),
            ),
        ) );
        
        
        // R: Post Published Time Stamp
        $post_published_time_stamp_obj = applicator_htmlok( array(
            'name'      => 'Post Published Time Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_the_date( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => esc_url( get_permalink() ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'post-pub-t-stamp',
            'title'     => $published_on_date_time_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_the_date( 'H' ),
                        'css' => 'hours',
                    ),
                    array(
                        'sep' => $GLOBALS['colon_sep'],
                        'txt' => get_the_date( 'i' ),
                        'css' => 'minutes',
                    ),
                    array(
                        'sep' => $GLOBALS['colon_sep'],
                        'txt' => get_the_date( 's' ),
                        'css' => 'seconds',
                    ),
                ),
                'before'    => $GLOBALS['comma_sep'],
            ),
        ) );
        
        
        // R: Post Published Date and Time Stamp
        $post_published_date_time_stamp_cp = applicator_htmlok( array(
            'name'      => 'Post Published Date and Time Stamp',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'post-pub-d-t-stamp',
            'content'   => array(
                'component' => array(
                    $post_published_date_stamp_obj,
                    $post_published_time_stamp_obj,
                ),
            ),
        ) );
        
        
        // R: Post Published
        $post_published_cp = applicator_htmlok( array(
            'name'      => 'Post Published',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'post-pub',
            'content'   => array(
                'component' => array(
                    $post_published_label_obj,
                    $post_published_date_time_stamp_cp,
                ),
            ),
        ) );
        
        
        //------------------------------------ Post Modified
        
        // R: Post Modified Label
        $post_modified_label_obj = applicator_htmlok( array(
            'name'      => 'Post Modified',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'generic label',
            ),
            'css'       => 'post-mod',
            'content'   => array(
                'object' => array(
                    array(
                        'txt'   => $modified_term,
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt'   => $on_term,
                    ),
                ),
                'after'     => $GLOBALS['space_sep'],
            ),
        ) );
        
        
        // R: Post Modified Date Stamp
        $post_modified_date_stamp_obj = applicator_htmlok( array(
            'name'      => 'Post Modified Date Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_the_modified_time( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => esc_url( get_permalink() ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'post-mod-d-stamp',
            'title'     => $modified_on_date_time_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_the_modified_time( 'j' ),
                        'css' => 'day',
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt' => get_the_modified_time( 'M' ),
                        'css' => 'month',
                    ),
                    array(
                        'sep' => $GLOBALS['space_sep'],
                        'txt' => get_the_modified_time( 'Y' ),
                        'css' => 'year',
                    ),
                ),
            ),
        ) );
        
        
        // R: Post Modified Time Stamp
        $post_modified_time_stamp_obj = applicator_htmlok( array(
            'name'      => 'Post Modified Time Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_the_modified_time( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => esc_url( get_permalink() ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'post-mod-t-stamp',
            'title'     => $modified_on_date_time_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_the_modified_time( 'H' ),
                        'css' => 'hours',
                    ),
                    array(
                        'sep' => $GLOBALS['colon_sep'],
                        'txt' => get_the_modified_time( 'i' ),
                        'css' => 'minutes',
                    ),
                    array(
                        'sep' => $GLOBALS['colon_sep'],
                        'txt' => get_the_modified_time( 's' ),
                        'css' => 'seconds',
                    ),
                ),
                'before'    => $GLOBALS['comma_sep'],
            ),
        ) );
        
        
        // R: Post Modified Date and Time Stamp
        $post_modified_date_time_stamp_cp = applicator_htmlok( array(
            'name'      => 'Post Modified Date and Time Stamp',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'post-mod-d-t-stamp',
            'content'   => array(
                'component' => array(
                    $post_modified_date_stamp_obj,
                    $post_modified_time_stamp_obj,
                ),
            ),
        ) );
        
        
        // R: Post Modified
        $post_modified_cp = applicator_htmlok( array(
            'name'      => 'Post Modified',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'post-mod',
            'content'   => array(
                'component' => array(
                    $post_modified_label_obj,
                    $post_modified_date_time_stamp_cp,
                ),
            ),
        ) );
        
        
        // R: Post Published, Modified
        $post_published_modified_cp = applicator_htmlok( array(
            'name'      => 'Post Published, Modified',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'post-pub-mod',
            'content'   => array(
                'component' => array(
                    $post_published_cp,
                    $post_modified_cp,
                ),
            ),
        ) );
        
        return $post_published_modified_cp;
    }
}