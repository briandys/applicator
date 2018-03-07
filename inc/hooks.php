<?php

/**
 * Hooks
 *
 * @package WordPress
 * @subpackage Applicator
 * @since 1.0
 */





// header.php
function applicator_hook_html_css()
{
    do_action( 'applicator_hook_html_css' );
}


// header.php
function applicator_hook_after_main_nav()
{
    do_action( 'applicator_hook_after_main_nav' );
}


// content.php
function applicator_after_post_title_hook()
{
    do_action( 'applicator_after_post_title_hook' );
}


// content.php
function applicator_hook_after_post_header_aside()
{
    do_action( 'applicator_hook_after_post_header_aside' );
}


// content.php
function applicator_after_post_meta_header_aside_hook()
{
    do_action( 'applicator_after_post_meta_header_aside_hook' );
}


// content-none.php
function applicator_hook_post_class()
{
    do_action( 'applicator_hook_post_class' );
}