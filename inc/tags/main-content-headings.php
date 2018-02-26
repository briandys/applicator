<?php

// Main Content Headings | index.php





if ( ! function_exists( 'applicator_main_content_headings' ) )
{
    function applicator_main_content_headings()
    {
        // Initialize
        $property_text = '';
        $value_text = '';
        $line_array = '';
        $value_line_term = 'value---line';
        $linked = false;
        $link_attr = '';
             
        
        // Blog Posts
        if ( is_home() )
        {
            $property_text = esc_html__( 'Entries', 'applicator' );
            $value_text = esc_html__( 'Posts', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }
                
        
        // Single
        if ( is_single() && ! is_attachment() )
        {   
            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Post', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }    
        
        // Page
        elseif ( is_page() && ! is_front_page() )
        {
            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Page', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }
        
        // Settings > Reading > A Static Page > Homepage
        elseif ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) )
        {
            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Front Page', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }
        
        // Attachment
        elseif ( is_attachment() )
        {
            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Attachment', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }
        
        // Error 404
        elseif ( is_404() )
        {
            $property_text = esc_html__( 'Entry', 'applicator' );
            $value_text = esc_html__( 'Error 404', 'applicator' );
            
            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }

        
        // Archive
        if ( is_day() || is_month() || is_year() )
        {   
            $date_day = get_the_date( 'j' );
            $date_month = get_the_date( 'F' );
            $date_year = get_the_date( 'Y' );
            
            $archive_year  = get_the_time('Y');
            $archive_month = get_the_time('m');
            $archive_day = get_the_time('d');

            $href_attr = '';
            
            $linked = true;

            // Daily Archive
            if ( is_day() )
            {
                $archive_type = esc_html__( 'Day', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_day,
                    ),
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_month,
                    ),
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_year,
                    ),
                );
                
                $href_attr = esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) );
            }

            
            // Monthly Archive
            elseif ( is_month() )
            {
                $archive_type = esc_html__( 'Month', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_month,
                    ),
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_year,
                    ),
                );
                
                $href_attr = esc_url( get_month_link( $archive_year, $archive_month ) );
            }

            
            // Yearly Archive
            elseif ( is_year() )
            {
                $archive_type = esc_html__( 'Year', 'applicator' );

                $line_array = array(
                    'css'   => $value_line_term,
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $date_year,
                    ),
                );
                
                $href_attr = esc_url( get_year_link( $archive_year ) );
            }
            
            $property_text = $archive_type.' '. esc_html__( 'Archive', 'applicator' );
                
            $link_attr = array(
                'a'         => array(
                    'href'      => $href_attr,
                ),
            );
        }

        
        // Author
        if ( is_author() && ! is_post_type_archive() )
        {   
            $linked = true;
            
            $property_text = esc_html__( 'Entries Published by', 'applicator' );
            
            $author = get_queried_object();
            
            if ( $author )
            {
                $value_text = $author->display_name;
                
                $link_attr = array(
                    'a'         => array(
                        'href'      => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                    ),
                );
            }

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
                ),
            );
        }

        
        // Category or Tag
        if ( is_category() || is_tag() )
        {
            $term = get_queried_object();
            
            $linked = true;
            
            if ( is_category() )
            {
                $property_text = esc_html__( 'Category', 'applicator' );
                $link_attr = array(
                    'a'         => array(
                        'href'      => esc_url( get_category_link( $term->term_id ) ),
                    ),
                );
            }
            
            
            if ( is_tag() )
            {
                $property_text = esc_html__( 'Tag', 'applicator' );
                $link_attr = array(
                    'a'         => array(
                        'href'      => esc_url( get_tag_link( $term->term_id ) ),
                    ),
                );
            }
            
            $value_text = single_term_title( '', false );

            $line_array = array(
                'css'   => $value_line_term,
                array(
                    'sep'   => $GLOBALS['applicator_space_sep'],
                    'txt'   => $value_text,
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
                    'linked'    => $linked,
                    'attr'      => $link_attr,
                ),
                'content'   => array(
                    'object'        => array(
                        array(
                            'line'      => array(
                                array(
                                    'css'   => 'property---line',
                                    array(
                                        'txt'   => $property_text,
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