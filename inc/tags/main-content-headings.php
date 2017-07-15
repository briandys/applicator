<?php // Main Content Headings | index.php

if ( ! function_exists( 'applicator_func_main_content_headings' ) ) {
    function applicator_func_main_content_headings() {
        
        
        
        
        
        $title = '';
        $label = '';
        $prop = '';
        $val = '';
        $val_content = '';
        $colon_sep = '';
        
        $entry_label = 'Entry';
        $entries_label = 'Entries';
        $posts_label = 'Posts';
        
        
        $property_text = '';
        $value_text = '';
        $line_array = '';
            
            
                
        
             
        
        // Home (default)
        // Settings > Reading > Your Latest Posts
        if ( is_front_page() && ! is_page() ) {

            $property_text = 'Front Page';
            $value_text = 'Posts';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Settings > Reading > Posts Page
        if ( is_home() ) {

            $property_text = 'Home Entries';
            $value_text = 'Posts';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Settings > Reading > Front Page
        if ( is_front_page() && is_page() ) {

            $property_text = 'Front Page';
            $value_text = 'Page';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        } 
                
        
        // Single
        if ( is_single() && ! is_attachment() ) {

            $property_text = 'Entry';
            $value_text = 'Post';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
        
        // Attachment
        elseif ( is_attachment() ) {

            $property_text = 'Entry';
            $value_text = 'Attachment';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
                
        // Page
        if ( is_page() && ! is_front_page() ) {

            $property_text = 'Entry';
            $value_text = 'Page';
            
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => $GLOBALS['space_sep'],
                    'txt'       => $value_text,
                ),
            );
        }
                
        // Singular
        if ( is_singular() && ! is_single() && ! is_page() ) {

            $property_text = 'Entry';
            $value_text = 'Other';
            
            $line_array = array(
                'css'   => 'value---line',
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

                $archive_type = 'Daily';

                $line_array = array(
                    'css'   => 'value---line',
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

                $archive_type = 'Monthly';

                $line_array = array(
                    'css'   => 'value---line',
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

                $archive_type = 'Yearly';

                $line_array = array(
                    'css'   => 'value---line',
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $date_year,
                    ),
                );
            }
            
            $property_text = $archive_type.' '.'Archive';
        }

        // Author
        if ( is_author() && ! is_post_type_archive() ) {

            $title = '';
            $prop = 'Author';
            $label = 'Entries Published by';

            $author = get_queried_object();
            if ( $author ) {
                $val = $author->display_name;
            }

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Category or Tag
        if ( is_category() || is_tag() ) {
            
            $colon_sep = $GLOBALS['colon_sep'];

            $prop = '';
            if ( is_category() ) {
                $prop = 'Category';
            }
            if ( is_tag() ) {
                $prop = 'Tag';
            }

            $label = $prop;
            $val = single_term_title( '', false );

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Taxonomy
        if ( is_tax() ) {
            
            $prop = 'Taxonomy';
            $label = $prop;
            $sep = ', ';
            $colon_sep = $GLOBALS['colon_sep'];

            $term = get_queried_object();
            if ( $term ) {
                $tax   = get_taxonomy( $term->taxonomy );
                $val = single_term_title( $tax->labels->name . $sep, false );
            }

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Post Type Archive
        if ( is_post_type_archive() ) {
            
            $prop = 'Post Type Archive';
            $label = $prop;
            $colon_sep = $GLOBALS['colon_sep'];

            $post_type = get_query_var( 'post_type' );
            if ( is_array( $post_type ) ) {
                $post_type = reset( $post_type );
            }

            $post_type_object = get_post_type_object( $post_type );
            if ( ! $post_type_object->has_archive ) {
                $val = post_type_archive_title( '', false );
            }

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Post Type Archive with has_archive should override terms.
        if ( is_post_type_archive() && $post_type_object->has_archive ) {
            
            $prop = 'Post Type Archive';
            $label = $prop;
            $val = post_type_archive_title( '', false );
            $colon_sep = $GLOBALS['colon_sep'];

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Markup
        $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';

        // Content
        $prop_content = sprintf( $prop_mu,
            esc_html__( $label, $GLOBALS['applicator_td'] ),
            sanitize_title( $label )
        );

        // Markup
        $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
            $main_ct_h_l_mu .= '%4$s';
        $main_ct_h_l_mu .= '</span>';
        $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
            $main_ct_h_l_mu .= '%1$s';
        $main_ct_h_l_mu .= '</span>';

        // Content
        $title = sprintf( $main_ct_h_l_mu,
            $val_content,
            sanitize_title( $prop ),
            esc_attr__( $val, $GLOBALS['applicator_td'] ),
            $prop_content . $colon_sep,
            esc_attr__( $prop, $GLOBALS['applicator_td'] )
        );

        // Display
        echo $title;
        
        
        $main_content_heading_obj = htmlok( array(
                'name'      => 'Main Content',
                'structure' => array(
                    'type'          => 'object',
                    'subtype'       => 'heading',
                    'elem'          => 'h2'
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
                                    array(
                                        'txt'       => ':',
                                        'css'       => 'colon---txt',
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