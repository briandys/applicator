<?php
// Template Name: Multisite

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
            
            ob_start();
            
            $sites = get_sites();
            
            foreach ( $sites as $site ) {
                
                switch_to_blog( $site->blog_id );

                $site_id = get_object_vars($site)['blog_id'];
                $site_name = get_blog_details( $site_id )->blogname;

                $blog_details = get_blog_details( $site_id );
                
                echo '<div class="site">';

                echo '<a href="'. esc_url( $blog_details->path ). '">'. $site_name. '</a>';

                $args = array(
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'order'         => 'DESC'
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) {
                    
                    // OB: Sites Content
                    ob_start();
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        get_template_part( 'content', 'site-preview' );
                    }
                    $entries_ob_content = ob_get_contents();
                    ob_end_clean();
                    
                    // Entries (for posts page)
                    $entry_entries_cp = applicator_htmlok( array(
                        'name'      => 'Entries',
                        'structure' => array(
                            'type'      => 'component',
                        ),
                        'content'   => array(
                            'component'     => array(
                                $entries_ob_content,
                            ),
                        ),
                    ) );
                    
                }
                wp_reset_postdata();
                
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
                    'echo'      => true,
                ) );


                // Secondary Content
                get_sidebar();
                
                echo '</div>';

                restore_current_blog();
            }
            
            $sites_content = ob_get_contents();
            
            ob_end_clean();
            
            // Multisite
            $multisite_cp = applicator_htmlok( array(
                'name'      => 'Multisite',
                'structure' => array(
                    'type'      => 'component',
                ),
                'content'   => array(
                    'component'     => array(
                        $sites_content,
                    ),
                ),
                'echo'      => true,
            ) );
            
        }
        
        else {
            echo 'No Multisite';
        }
        
        ?>

    </div>
</div><!-- Main Content Content -->

<?php get_footer();