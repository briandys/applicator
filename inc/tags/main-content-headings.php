<?php // Main Content Headings | index.php

if ( ! function_exists( 'apl_func_main_content_headings' ) ) {
    function apl_func_main_content_headings() {
        
        $title = '';
        $label = '';
        $prop = '';
        $val = '';
        $val_content = '';
        $colon_sep = '';
                
        // Single
        if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {

            $prop = 'Entry';
            $label = $prop;
            $val = 'Single';
            $colon_sep = $GLOBALS['colon_sep_mu'];

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
            $colon_sep = $GLOBALS['colon_sep_mu'];

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

        // Category or Tag
        if ( is_category() || is_tag() ) {
            
            $colon_sep = $GLOBALS['colon_sep_mu'];

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
            $colon_sep = $GLOBALS['colon_sep_mu'];

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

        // Author
        if ( is_author() && ! is_post_type_archive() ) {

            $title = '';
            $prop = 'Author';
            $label = 'All Entries Published by';

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

        // Post Type Archive with has_archive should override terms.
        if ( is_post_type_archive() && $post_type_object->has_archive ) {
            
            $prop = 'Post Type Archive';
            $label = $prop;
            $val = post_type_archive_title( '', false );
            $colon_sep = $GLOBALS['colon_sep_mu'];

            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
        }

        // Archive
        if ( is_archive() && ( is_day() || is_month() || is_year() ) ) {
            
            $val_txt_suffix = '---txt';
            $val_d = get_the_date( 'j' );
            $val_d_prefix = 'day';
            $val_m = get_the_date( 'F' );
            $val_m_prefix = 'month';
            $val_y = get_the_date( 'Y' );
            $val_y_prefix = 'year';
            $colon_sep = $GLOBALS['colon_sep_mu'];

            // Daily Archive
            if ( is_day() ) {

                $prop = 'Daily Archive';
                $label = $prop;
                $val = get_the_date( 'j F Y' );

                // Markup
                $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
                $val_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
                $val_mu .= ' <span class="txt %6$s---txt">%5$s</span>';

                // Content
                $val_content = sprintf( $val_mu,
                    $val_d,
                    $val_d_prefix . $val_txt_suffix . ' ' . $val_d_prefix . '-' . sanitize_title( $val_d ),
                    $val_m,
                    $val_m_prefix . $val_txt_suffix . ' ' . sanitize_title( $val_m ),
                    $val_y,
                    $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val_y )
                );
            }

            // Monthly Archive
            if ( is_month() ) {

                $prop = 'Monthly Archive';
                $label = $prop;
                $val = get_the_date( 'F Y' );

                // Markup
                $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
                $val_mu .= ' <span class="txt %4$s---txt">%3$s</span>';

                // Content
                $val_content = sprintf( $val_mu,
                    $val_m,
                    $val_m_prefix . $val_txt_suffix . ' ' . sanitize_title( $val_m ),
                    $val_y,
                    $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val_y )
                );
            }

            // Yearly Archive
            if ( is_year() ) {

                $prop = 'Yearly Archive';
                $label = $prop;
                $val = get_the_date( 'Y' );

                // Markup
                $val_mu = '<span class="txt %2$s---txt">%1$s</span>';

                // Content
                $val_content = sprintf( $val_mu,
                    $val,
                    $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val )
                );
            }
        }

        // Markup
        $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';

        // Content
        $prop_content = sprintf( $prop_mu,
            esc_html__( $label, 'applicator' ),
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
            esc_attr__( $val, 'applicator' ),
            $prop_content . $colon_sep,
            esc_attr__( $prop, 'applicator' )
        );

        // Display
        echo $title;
        
    }
}