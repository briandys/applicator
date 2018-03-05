<?php

/**
 * Functions
 *
 * @package WordPress\Applicator\PHP
 */





/**
 * Includes
 */

$r_includes = array(
    'globals',
    'hooks',
    'settings',
    'styles-scripts--default',
    'styles-scripts--enhancements',
);


foreach ( $r_includes as $file_name )
{
    require( get_parent_theme_file_path( '/inc/'. $file_name. '.php' ) );
}





/**
 * Functions
 */

$r_functions = array(
    'applicator-htmlok',
    'body-class',
    'comment-form',
    'customizer',
    'customizer-custom-colors',
    'custom-fonts',
    'custom-visuals',
    'entry-content',
    'excerpt',
    'html-class',
    'icons',
    'main-content-footer',
    'main-content-header',
    'meta-description',
    'pingback-header',
    'post-class',
    'widgets',
);


foreach ( $r_functions as $file_name )
{
    require( get_parent_theme_file_path( '/inc/functions/'. $file_name. '.php' ) );
}





/**
 * Tags
 */

$r_tags = array(
    'aside',
    'breadcrumbs',
    'comment',
    'comments-actions-snippet',
    'comments-nav',
    'entry-nav',
    'main-content-headings',
    'main-nav',
    'page-nav',
    'post-actions',
    'post-author',
    'post-banner-visual',
    'post-classification',
    'post-nav',
    'post-published-modified',
);


foreach ( $r_tags as $file_name )
{
    require( get_parent_theme_file_path( '/inc/tags/'. $file_name. '.php' ) );
}





/**
 * Snap-Ons
 */

require( get_parent_theme_file_path( '/snap-on/index.php' ) );