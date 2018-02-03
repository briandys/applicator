<?php // Main Content Header

if ( ! function_exists( 'applicator_main_content_header' ) )
{
    function applicator_main_content_header()
    {
        // Main Content Headings - Search
        if ( is_search() ) {

            // Initialize
            $property_text = '';
            $value_text = '';
            $line_array = '';


            // WP Query
            $entry_search = new WP_Query( array(
                's'         => $s,
                'showposts' => -1,
            ) );
            $entry_search_count = $entry_search->post_count;


            // Text Labels
            $no_search_result_term = esc_html__( 'No Search Result', 'applicator' );
            $search_result_term = esc_html__( 'Search Result', 'applicator' );
            $search_results_term = esc_html__( 'Search Results', 'applicator' );

            if ( $entry_search_count == 0 ) {
                $property_text = $no_search_result_term;
            } elseif ( $entry_search_count == 1 ) {
                $property_text = $search_result_term;
            } else {
                $property_text = $search_results_term;
            }


            // Variable Definitions
            $value_text = esc_html( get_search_query() );

            $line_array = array(
                array(
                    'css'   => 'property---line',
                    array(
                        'sep'       => $GLOBALS['applicator_space_sep'],
                        'txt'       => $property_text,
                    ),
                    array(
                        'sep'       => $GLOBALS['applicator_space_sep'],
                        'txt'       => 'for',
                    ),
                ),
                array(
                    'css'   => 'value---line',
                    array(
                        'sep'       => $GLOBALS['applicator_space_sep'],
                        'txt'       => $value_text,
                        'css'       => 'search-results-term---txt',
                    ),
                ),
                array(
                    'css'   => 'count---line',
                    array(
                        'sep'       => $GLOBALS['applicator_space_sep'],
                        'txt'       => $entry_search_count,
                        'css'       => 'search-results-count---txt',
                    ),
                ),
            );


            // Main Content Heading
            $main_content_heading_obj = applicator_htmlok( array(
                    'name'      => 'Main Content',
                    'structure' => array(
                        'type'          => 'object',
                        'subtype'       => 'heading',
                        'elem'          => 'h2'
                    ),
                    'content'   => array(
                        'object'        => array(
                            array(
                                'line'      => $line_array,
                            ),
                        ),
                    ),
                'echo'  => true,
            ) );

            wp_reset_postdata();
        }

        else
        {
            applicator_main_content_headings(); // Main Content Headings
        }

        echo applicator_page_nav();

        echo applicator_entry_nav();

        echo applicator_main_content_header_aside(); // Main Content Header Aside | inc > tags > aside.php
    }
}