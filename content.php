<?php

// Post Classes

// Variables
$on = '--enabled';
$off = '--disabled';
$post_thumbnail_term = 'post-thumbnail';
$post_excerpt_term = 'post-excerpt';

// Post Thumbnail Class
if ( '' !== get_the_post_thumbnail() ) {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $on;
}
else {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $off;
}


// Excerpt Class
if ( has_excerpt() ) {
    $excerpt_class = ' '. $post_excerpt_term. $on;
}
else {
    $excerpt_class = ' '. $post_excerpt_term. $off;
}

// Post Classes Array
$post_classes = array(
    'cp',
    'article',
    'post',
    $post_thumbnail_class,
    $excerpt_class,
);

// Array Implode
$post_classes = implode( ' ', $post_classes );
?>

<article <?php post_class( $post_classes ); ?> data-name="Post CP">
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
                
                
                // After Main Post Title Hook | inc > hooks.php
                applicator_hook_after_main_post_title();
                
                
                // Post Actions | inc > tags > entry-actions.php
                applicator_post_actions();
                
                
                // Breadcrumbs Navigation | inc > tags > breadcumbs-nav.php
                applicator_breadcrumbs_nav();
                
                
                // E: Post Meta
                $post_meta = applicator_htmlok( array(
                    'name'      => 'Post Meta',
                    'structure' => array(
                        'type'      => 'component'
                    ),
                    'content'   => array(
                        'component'     => array(
                            
                            // Date and Time Stamp
                            // inc > tags > post-published-modified-cp.php
                            applicator_post_published_modified(),
                            
                            // Author
                            // inc > tags > post-author.php
                            applicator_post_author(),
                            
                            // Categories
                            // inc > tags > post-classification.php
                            applicator_post_categories(),
                        ),
                    ),
                ) );
                
                
                // E: Post Header Aside
                $post_header_aside = applicator_htmlok( array(
                    'name'      => 'Post Header',
                    'structure' => array(
                        'type'          => 'constructor',
                        'subtype'       => 'aside',
                        'hr_structure'  => true,
                    ),
                    'css'       => 'post-hr-as',
                    'content'   => array(
                        'constructor'   => array(
                            
                            // Post Meta
                            $post_meta,
                            
                            // Post Banner Visual | inc > tags > post-banner-visual.php
                            applicator_post_banner_visual(),
                            
                            // inc > tags > comments-actions-snippet-cp.php
                            applicator_comments_actions_snippet(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                // After Post Header Aside Hook
                applicator_hook_after_post_header_aside();
                
                ?>

            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                
                <?php
                
                // OB: Excerpt
                ob_start();
                the_excerpt();
                $excerpt_ob_content = ob_get_contents();
                ob_end_clean();
                
                
                // R: Post Excerpt
                $post_excerpt = applicator_htmlok( array(
                    'name'      => 'Post Excerpt',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'content'   => array(
                        'component'     => $excerpt_ob_content,
                    ),
                ) );
                
                
                // OB: Content
                ob_start();
                the_content();
                $content_ob_content = ob_get_contents();
                ob_end_clean();
                
                if ( is_home() || is_singular() || ( is_front_page() && ! is_page() ) ) {
                    
                    if ( has_excerpt() ) {
                        
                        // E: Post Excerpt
                        echo $post_excerpt;
                    }
                    
                    // E: Post Content
                    $post_content = applicator_htmlok( array(
                        'name'      => 'Post Content',
                        'structure' => array(
                            'type'      => 'component',
                        ),
                        'content'   => array(
                            'component'     => $content_ob_content,
                        ),
                        'echo'      => true,
                    ) );
                }
                
                else {
                    
                    // E: Post Excerpt
                    echo $post_excerpt;
                
                }
                
                
                // Entry Page Navigation
                // inc > tags > post-nav.php
                applicator_post_nav();
                
                // Sub-Post
                if ( is_page_template( 'sub-pages.php' ) ) {
                    
                    $parent = $post->ID;
                    $args = array(
                        'post_type'     => 'page',
                        'post_status'   => 'publish',
                        'post_parent'   => $parent,
                        'order'         => 'ASC'
                    );

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                        
                        
                        // OB: Query Sub-Post Content
                        ob_start();
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            get_template_part( 'content', get_post_format() );
                        }
                        $query_sub_post_ob_content = ob_get_contents();
                        ob_end_clean();
                        
                        
                        // E: Sub-Post Content
                        $sub_post_cp = applicator_htmlok( array(
                            'name'      => 'Sub-Post Content',
                            'structure' => array(
                                'type'      => 'component',
                            ),
                            'content'   => array(
                                'component' => $query_sub_post_ob_content,
                            ),
                            'echo'      => true,
                        ) );
                    }
                    wp_reset_postdata();
                }
                ?>

            </div>
        </div>

        <?php
        
        if ( 'post' === get_post_type() ) {
            
            if ( get_the_tag_list('', '', '') ) {
            ?>

            <footer class="fr post---fr entry-footer">
                <div class="fr_cr post---fr_cr">

                    <?php

                    // E: Post Meta
                    $post_meta = applicator_htmlok( array(
                        'name'      => 'Post Meta',
                        'structure' => array(
                            'type'      => 'component'
                        ),
                        'content'   => array(
                            'component'     => array(

                                // Tags
                                applicator_post_tags(),
                            ),
                        ),
                        'echo'      => true,
                    ) );
                    ?>

                </div>
            </footer>

        <?php
            }
        }
        ?>  

    </div>
</article><!-- Post CP -->