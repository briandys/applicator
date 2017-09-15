<?php // Main Content Headings | index.php

if ( ! function_exists( 'applicator_main_content_headings' ) ) {
    function applicator_main_content_headings() {
        
        // Initialize
        $property_text = '';
        $value_text = '';
        $line_array = '';
        $value_line_term = 'value---line';
             
        
        // Home (default)
        // Settings > Reading > Your Latest Posts
        if ( is_front_page() && ! is_page() ) {

            $property_text = esc_html__( 'Entries', 'applicator' );
            $value_text = esc_html__( 'Posts', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Settings > Reading > Posts Page
        if ( is_home() ) {

            $property_text = esc_html__( 'Entries', 'applicator' );
            $value_text = esc_html__( 'Posts', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Settings > Reading > Front Page
        if ( is_front_page() && is_page() ) {

            $property_text = esc_html__( 'Front Page', 'applicator' );
            $value_text = esc_html__( 'Page', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        } 
                
        
        // Single
        if ( is_single() && ! is_attachment() ) {

            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Post', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Attachment
        elseif ( is_attachment() ) {

            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Attachment', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
                
        // Page
        if ( is_page() && ! is_front_page() ) {

            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Page', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
                
        // Singular
        if ( is_singular() && ! is_single() && ! is_page() ) {

            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Other', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }

        // Archive
        if ( is_archive() && ( is_day() || is_month() || is_year() ) ) {
            
            $date_day = get_the_date( 'j' );
            $date_month = get_the_date( 'F' );
            $date_year = get_the_date( 'Y' );

            // Daily Archive
            if ( is_day() ) {

                $archive_type = esc_html__( 'Daily', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_day,
                    ),
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_month,
                    ),
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_year,
                    ),
                );
            }

            // Monthly Archive
            if ( is_month() ) {

                $archive_type = esc_html__( 'Monthly', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_month,
                    ),
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_year,
                    ),
                );
            }

            // Yearly Archive
            if ( is_year() ) {

                $archive_type = esc_html__( 'Yearly', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_year,
                    ),
                );
            }
            
            $property_text = $archive_type.' '.esc_html__( 'Archive', 'applicator' );
        }

        // Author
        if ( is_author() && ! is_post_type_archive() ) {
            
            $property_text = esc_html__( 'Entries Published by', 'applicator' );
            
            $author = get_queried_object();
            if ( $author ) {
                $value_text = $author->display_name;
            }

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }

        // Category or Tag
        if ( is_category() || is_tag() ) {
            
            if ( is_category() ) {
                $property_text = esc_html__( 'Category', 'applicator' );
            }
            
            elseif ( is_tag() ) {
                $property_text = esc_html__( 'Tag', 'applicator' );
            }
            
            $value_text = single_term_title( '', false );

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }

        // Taxonomy
        if ( is_tax() ) {
            
            $property_text = esc_html__( 'Taxonomy', 'applicator' );
            
            $term = get_queried_object();
            if ( $term ) {
                $tax = get_taxonomy( $term->taxonomy );
                $value_text = single_term_title( $tax->labels->name . ', ', false );
            }

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }

        // Post Type Archive
        if ( is_post_type_archive() ) {
            
            $property_text = esc_html__( 'Post Type Archive', 'applicator' );
            
            $post_type = get_query_var( 'post_type' );
            if ( is_array( $post_type ) ) {
                $post_type = reset( $post_type );
            }

            $post_type_object = get_post_type_object( $post_type );
            if ( ! $post_type_object->has_archive ) {
                $value_text = post_type_archive_title( '', false );
            }

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }

        // Post Type Archive with has_archive should override terms.
        if ( is_post_type_archive() && $post_type_object->has_archive ) {
            
            $property_text = esc_html__( 'Post Type Archive', 'applicator' );
            
            $value_text = post_type_archive_title( '', false );

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Error 404
        if ( is_404() ) {

            $property_text = esc_html__( 'Error 404', 'applicator' );
            $value_text = esc_html__( 'Page', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        
        // Main Content Heading
        $main_content_heading_obj = applicator_htmlok( array(
                'name'      => 'Main Content',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'heading',
                    'elem'      => 'h2',
                ),
                'content'   => array(
                    'object'        => array(
                        array(
                            'line'      => array(
                                array(
                                    'css'   => 'property---line',
                                    array(
                                        'txt'       => $property_text,
                                    ),
                                ),
                                $line_array,
                            ),
                        ),
                    ),
                ),
            'echo'  => true,
        ) );
        
    }
}