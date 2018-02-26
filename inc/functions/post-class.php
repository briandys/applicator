<?php

// Post Class





function applicator_post_class( $classes )
{
    global $post;
    
    // Variables
    $on = '--enabled';
    $off = '--disabled';
    $post_thumbnail_term = 'post-thumbnail';
    $post_excerpt_term = 'post-excerpt';

    // Post Thumbnail Class
    if ( '' !== get_the_post_thumbnail() ) {
        $classes[] = $post_thumbnail_term. $on;
    }
    else {
        $classes[] = $post_thumbnail_term. $off;
    }


    // Excerpt Class
    if ( has_excerpt() ) {
        $classes[] = $post_excerpt_term. $on;
    }
    else {
        $classes[] = $post_excerpt_term. $off;
    }


    // Category
    if ( has_category( '', $post->ID ) ) {
        $classes[] = 'category--populated';
    }
    else {
        $classes[] = 'category--empty';
    }
    
    
    // Multisite
    if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) )
    {
        $classes[] = 'post--site-preview';
    }
    
    
    if ( is_404() )
    {
        $classes[] = 'post--empty';
    }
    
    
    if ( get_option( 'show_avatars' ) == 0 )
    {
        $classes[] = 'author-avatar--disabled';
    }
    
    
    $r = array(
        'cp',
        'article',
        'post',
    );
    
    foreach ( $r as $class_name )
    {
        $classes[] = esc_attr( $class_name );
    }
    
    return $classes;
}
add_filter( 'post_class', 'applicator_post_class' );


function applicator_content_none_post_class()
{
    $r = array(
        'cp',
        ' '. 'article',
        ' '. 'post',
        ' '. 'post--empty',
    );
    
    foreach ( $r as $class_name )
    {
        echo esc_attr( $class_name );
    }
}
add_action( 'applicator_hook_post_class', 'applicator_content_none_post_class');