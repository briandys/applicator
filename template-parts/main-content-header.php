<?php get_header(); ?>

<div class="hr main-content---hr">
    <div class="hr_cr main-content---hr_cr">

        <?php
        
        // Main Content Heading - Search
        if ( is_search() )
        {
            // Initialize
            $property_text = '';
            $value_text = '';
            $line_array = '';


            $entry_search = new WP_Query( array(
                's'         => $s,
                'showposts' => -1,
            ) );
            
            $entry_search_count = $entry_search->post_count;


            if ( $entry_search_count == 0 )
            {
                $property_text = esc_html__( 'No Search Result', 'applicator' );
            }
            
            elseif ( $entry_search_count == 1 )
            {
                $property_text = esc_html__( 'Search Result', 'applicator' );
            }
            
            else
            {
                $property_text = esc_html__( 'Search Results', 'applicator' );
            }


            // Variable Definitions
            $value_text = esc_html( get_search_query() );

            $line_array = array(
                array(
                    'css'   => 'property---line',
                    array(
                        'sep'       => ' ',
                        'txt'       => $property_text,
                    ),
                    array(
                        'sep'       => ' ',
                        'txt'       => 'for',
                    ),
                ),
                array(
                    'css'   => 'value---line',
                    array(
                        'sep'       => ' ',
                        'txt'       => $value_text,
                        'css'       => 'search-results-term---txt',
                    ),
                ),
                array(
                    'css'   => 'count---line',
                    array(
                        'sep'       => ' ',
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
                    'elem'          => 'h2',
                    'linked'        => true,
                    'attr'          => array(
                        'a'             => array(
                            'href'          => esc_url( get_search_link() ),
                        ),
                    ),
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
        
        applicator_main_content_header(); // inc > functions > main-content-header.php
        ?>

    </div>
</div>