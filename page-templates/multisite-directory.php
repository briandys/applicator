<?php

// Template Name: Multisite Directory
// Displays the preview of all sites in a Multisite


if ( is_multisite() )
{
    get_header();
    ?>

    <div class="hr main-content---hr">
        <div class="hr_cr main-content---hr_cr">

            <?php

            // Main Content Heading

            $property_text = esc_html__( 'Page', 'applicator' );
            $value_text = esc_html__( 'Multisite Directory', 'applicator' );
            $line_array = array(
                'css'   => 'value---line',
                array(
                    'sep'       => ' ',
                    'txt'       => $value_text,
                ),
            );

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

            // Main Content Header Aside | inc > tags > aside.php
            echo applicator_main_content_header_aside();
            ?> 

        </div>
    </div>

    <div class="mn main-content---mn">
        <div class="mn_cr main-content---mn_cr">

            <?php

            $sites = get_sites();

            $site_preview_cp = '';
            foreach ( $sites as $site ) {

                switch_to_blog( $site->blog_id );

                $site_id = get_object_vars( $site );
                
                $site_details = get_blog_details( $site_id['blog_id'] );

                $site_number = $site_details->blog_id;
                $site_name = $site_details->blogname;
                $site_name_css = 'site--'. sanitize_title( $site_details->blogname );
                $site_path = $site_details->path;
                $site_description = get_bloginfo( 'description', 'display' );

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

                // Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                $main_media_banner_obj = '';
                $main_banner_cp = '';

                if ( has_header_image() ) {
                    
                    // R: Main Media Banner
                    $main_media_banner_obj = applicator_htmlok( array(
                        'name'      => 'Main Media Banner',
                        'structure' => array(
                            'type'      => 'object',
                            'attr'      => array(
                                'elem'         => array(
                                    'style'      => 'background-image: url('. esc_url( get_header_image() ). ')',
                                ),
                            ),
                        ),
                        'content'   => array(
                            'object'    => get_custom_header_markup(),
                        ),
                    ) );
                
                    
                    // R: Main Banner
                    $main_banner_cp = applicator_htmlok( array(
                        'name'      => 'Main Banner',
                        'structure' => array(
                            'type'  => 'component',
                        ),
                        'content'   => array(
                            'component' => array(

                                $main_media_banner_obj,
                            ),
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
                    'content'   => array(
                        'component' => array(

                            // Main Name
                            $site_main_name_obj,

                            // Main Description
                            $site_main_description_obj,

                            // Main Banner
                            $main_banner_cp,
                        ),
                    ),
                ) );

                
                $args = array(
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'order'             => 'DESC',
                    'posts_per_page'    => 3,
                );

                $the_query = new WP_Query( $args );

                // If Site has posts
                if ( $the_query->have_posts() ) {

                    // OB: Entries
                    ob_start();
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        get_template_part( 'template-parts/content', 'multisite' );
                    }
                    $site_entries_ob_content = ob_get_clean();

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
                
                if ( $site_id['blog_id'] == 1 ) {
                    $site_type_css = ' '. 'site--root';
                }
                else {
                    $site_type_css = ' '. 'site--branches';
                }
                
                $site_preview_cp .= applicator_htmlok( array(
                    'name'      => 'Site Preview',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'root_css'  => $site_name_css. $site_type_css,
                    'content'   => array(
                        'component'     => array(
                            $site_main_info_cp,
                            $site_entries_cp,
                        ),
                    ),
                ) );

                restore_current_blog();
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
                'id'        => 'primary-content',
                'root_css'  => 'site-main',
                'content'   => array(
                    'constructor'   => $entry_module_cp,
                ),
                'echo'      => true,
            ) );


            get_sidebar(); // Main Content Aside

            ?>

        </div>
    </div>

    <?php get_footer();
    
}

// If Multisite is not enabled, use Index
else
{
    get_template_part( 'index' );
}