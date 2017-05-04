<?php // Hooks

// header.php
function apl_hook_html_class() {
    do_action( 'apl_hook_html_class' );
}

//  header.php
function apl_hook_after_main_nav() {
    do_action( 'apl_hook_after_main_nav' );
}

// content.php
function apl_hook_after_post_heading() {
    do_action( 'apl_hook_after_post_heading' );
}

// content.php
function apl_hook_after_post_header_aside() {
    do_action( 'apl_hook_after_post_header_aside' );
}