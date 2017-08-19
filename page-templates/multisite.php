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
            
            $sites = get_sites();
            
            foreach ( $sites as $site ) {
                
                switch_to_blog( $site->blog_id );

                $site_id = get_object_vars($site)['blog_id'];
                $site_name = get_blog_details( $site_id )->blogname;

                $blog_details = get_blog_details( $site_id );

                echo 'Site ID/Name: ' . $site_id . ' / ' . $site_name . '\n';

                echo $blog_details->path;

                $args = array(
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'order'         => 'ASC'
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        
                        ?>
                        
                        <article <?php post_class( 'cp article' ); ?> data-name="Post CP">
                            <div class="cr post---cr">
                                <header class="hr post---hr entry-header">
                                    <div class="hr_cr post---hr_cr">
        
                                        <?php

                                        // E: Main Post Title
                                        $post_title_obj = applicator_htmlok( array(
                                            'name'      => 'Main Post Title',
                                            'structure' => array(
                                                'type'      => 'object',
                                                'elem'      => 'h1',
                                                'linked'    => true,
                                                'layout'    => 'inline',
                                                'attr'      => array(
                                                    'a'         => array(
                                                        'href'      => esc_url( get_permalink() ),
                                                        'rel'       => 'bookmark',
                                                        'title'     => get_the_title(),
                                                    ),
                                                ),
                                            ),
                                            'content'   => array(
                                                'object'        => get_the_title(),
                                            ),
                                            'echo'      => true,
                                        ) );

                                        ?>
                                        
                                    </div>
                                </header>
                                <div class="ct post---ct entry-content">
                                    <div class="ct_cr post---ct_cr">
                                        
                                        <?php
                                        
                                        if ( has_excerpt() ) {
                        
                                            // E: Post Excerpt
                                            echo $post_excerpt;
                                        }
                        
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </article><!-- Post CP -->
                        
                    <?php
                    }
                    
                }
                wp_reset_postdata();

                restore_current_blog();
            }
            return;
        }
        
        ?>

    </div>
</div><!-- Main Content Content -->

<?php get_footer();