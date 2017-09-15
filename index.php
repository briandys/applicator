<?php
if ( function_exists( 'get_header' ) ) {
    get_header();
}

else {
    die();
}
?>

<div class="hr main-content---hr">
    <div class="hr_cr main-content---hr_cr">
        
        <?php

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
            $no_search_result_term = esc_html__( 'No', 'applicator' );
            $search_result_term = esc_html__( 'Search Result', 'applicator' );
            $search_results_term = esc_html__( 'Search Results', 'applicator' );
            
            if ( $entry_search_count == 0 ) {
                $property_text = $no_search_result_term.' '.$search_result_term;
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
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $property_text,
                    ),
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => 'for',
                    ),
                ),
                array(
                    'css'   => 'value---line',
                    array(
                        'sep'       => $GLOBALS['space_sep'],
                        'txt'       => $value_text,
                        'css'       => 'search-results-term---txt',
                    ),
                ),
                array(
                    'css'   => 'count---line',
                    array(
                        'sep'       => $GLOBALS['space_sep'],
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
        
        else {
            // Main Content Headings
            applicator_main_content_headings();
        }
        
        
        // Main Content Header Aside | inc > tags > aside.php
        echo applicator_main_content_header_aside();
        ?> 
        
    </div>
</div><!-- Main Content Header -->

<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <?php
        
        // single.php
        if ( is_singular() ) {
            
            while ( have_posts() ) {
                
                // OB: Entry Nav
                ob_start();
                // inc > tags > entry-nav.php
                applicator_entry_nav();
                $entry_nav_ob_content = ob_get_contents();
                ob_end_clean();
                
                
                // OB: Entry Content
                ob_start();
                
                the_post();
                
                // template-parts > post-content.php
                applicator_post_content();
                
                // comments.php
                comments_template();
                
                $entry_content = ob_get_contents();
                ob_end_clean();
                
                // Entry (for single.php)
                $entry_entries_cp = applicator_htmlok( array(
                    'name'      => 'Entry',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'hr_content'    => applicator_entry_nav(),
                    'content'   => array(
                        'component'     => $entry_content,
                    ),
                    'fr_content'    => applicator_entry_nav(),
                ) );
                
            }
        }
        
        // Entries
        else {
            
            if ( have_posts() ) {
                
                // OB: Entries Content
                ob_start();
                while ( have_posts() ) {
                    the_post();

                    // template-parts > post-content.php
                    applicator_post_content();
                }
                $entries_ob_content = ob_get_contents();
                ob_end_clean();


                // Entries (for posts page)
                $entry_entries_cp = applicator_htmlok( array(
                    'name'      => 'Entries',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'hr_content'    => applicator_page_nav(),
                    'content'   => array(
                        'component'     => array(
                            $entries_ob_content,
                        ),
                    ),
                    'fr_content'    => applicator_page_nav(),
                ) );
                
            }
            
            // content-none.php
            else {
                
                // OB: Content None Content
                // Entries Content
                ob_start();
                get_template_part( 'content', 'none' );
                $content_none_content = ob_get_contents();
                ob_end_clean();
                
                $entry_entries_cp = $content_none_content;
            }
        }
        
        
        // Entry Module
        $entry_module_cp = applicator_htmlok( array(
            'name'      => 'Entry',
            'structure' => array(
                'type'      => 'component',
                'subtype'   => 'module',
            ),
            'content'   => array(
                'component'     => $entry_entries_cp,
            ),
        ) );
        
        
        // Primary Content
        $primary_content = applicator_htmlok( array(
            'name'      => 'Primary Content',
            'structure' => array(
                'type'      => 'constructor',
                'elem'      => 'main',
            ),
            'id'        => 'main',
            'css'       => 'pri-content',
            'root_css'  => 'site-main',
            'content'   => array(
                'constructor'   => $entry_module_cp,
            ),
            'echo'      => true,
        ) );
        
        
        // Secondary Content
        get_sidebar();
        
        ?>

    </div>
</div><!-- Main Content Content -->

<?php get_footer();