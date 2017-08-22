<?php
// Template Name: Multisite
// Displays the preview of all sites in a Multisite

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

        // Main Content Headings
        applicator_func_main_content_headings();
        
        // Main Content Header Aside | inc > tags > aside.php
        echo applicator_func_main_content_header_aside();
        ?> 
        
    </div>
</div><!-- Main Content Header -->

<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <?php
        
        if ( function_exists( 'get_sites' ) && class_exists( 'WP_Site_Query' ) ) {
            
            $sites = get_sites();
            
            $site_preview_cp = '';
            foreach ( $sites as $site ) {
                
                switch_to_blog( $site->blog_id );

                $site_id = get_object_vars($site)['blog_id'];
                $site_details = get_blog_details( $site_id );
                
                $site_name = $site_details->blogname;
                $site_name_css = 'site--'. sanitize_title( $site_details->blogname );
                $site_path = $site_details->path;
                $site_description = get_bloginfo( 'description' );

                // Site Main Name Heading
                $site_preview_heading_obj = applicator_htmlok( array(
                    'name'      => 'Site Preview',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'heading',
                        'elem'      => 'h1',
                        'linked'    => true,
                        'attr'      => array(
                            'a'         => array(
                                'href'      => $site_path,
                            ),
                        ),
                    ),
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'      => $site_name,
                            ),
                        ),
                    ),
                ) );
                
                // R: Site Main Name
                $site_main_name_obj = applicator_htmlok( array(
                    'name'      => 'Site Main Name',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                        'linked'    => true,
                        'attr'      => array(
                            'a'     => array(
                                'href'      => $site_path,
                            ),
                        ),
                    ),
                    'css'       => 'site-main-name',
                    'root_css'  => 'site-title',
                    'title'     => $site_name,
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'           => $site_name,
                                'css'           => 'site-name',
                            ),
                        ),
                    ),
                ) );
                
                // R: Site Main Description
                $site_main_description_obj = '';

                if ( $site_description ) {
                    $site_main_description_obj = applicator_htmlok( array(
                        'name'      => 'Site Main Description',
                        'structure' => array(
                            'type'      => 'object',
                            'linked'    => true,
                            'attr'      => array(
                                'a'     => array(
                                    'href'      => $site_path,
                                ),
                            ),
                        ),
                        'css'       => 'site-main-desc',
                        'title'     => $site_description,
                        'content'   => array(
                            'object'    => $site_description,
                        ),
                    ) );
                }
                
                // R: Site Main Info
                $site_main_info_cp = applicator_htmlok( array(
                    'name'      => 'Site Main Info',
                    'structure' => array(
                        'type'  => 'component',
                        'hr_structure'  => true,
                    ),
                    'css'       => 'site-main-info',
                    'content'   => array(
                        'component' => array(
                            
                            // Main Name
                            $site_main_name_obj,
                            
                            // Main Description
                            $site_main_description_obj,
                        ),
                    ),
                ) );

                /* WP QUery */
                $args = array(
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'order'         => 'DESC'
                );

                $the_query = new WP_Query( $args );

                // If Site has posts
                if ( $the_query->have_posts() ) {
                    
                    // OB: Entries
                    ob_start();
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        get_template_part( 'content', 'site-preview-entries' );
                    }
                    $site_entries_ob_content = ob_get_contents();
                    ob_end_clean();
                    
                    // Entries
                    $site_entries_cp = applicator_htmlok( array(
                        'name'      => 'Entries',
                        'structure' => array(
                            'type'      => 'component',
                        ),
                        'content'   => array(
                            'component'     => array(
                                $site_entries_ob_content,
                            ),
                        ),
                    ) );
                }
                
                wp_reset_postdata();
                
                $site_preview_cp .= applicator_htmlok( array(
                    'name'      => 'Site Preview',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'root_css'  => $site_name_css,
                    'content'   => array(
                        'component'     => array(
                            $site_main_info_cp,
                            $site_entries_cp,
                        ),
                    ),
                ) );

                restore_current_blog();
            }
        }
          
        
        // Multisite
        $multisite_cp = applicator_htmlok( array(
            'name'      => 'Multisite',
            'structure' => array(
                'type'      => 'component',
                'elem'      => 'section',
            ),
            'content'   => array(
                'component'     => array(
                    $site_preview_cp,
                ),
            ),
        ) );
        
        
        // Entry Module
        $entry_module_cp = applicator_htmlok( array(
            'name'      => 'Entry',
            'structure' => array(
                'type'      => 'component',
                'subtype'   => 'module',
            ),
            'content'   => array(
                'component'     => $multisite_cp,
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