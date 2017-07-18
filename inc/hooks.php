<?php // Hooks

// header.php
function applicator_hook_html_class() {
    do_action( 'applicator_hook_html_class' );
}

//  header.php
function applicator_hook_after_main_nav() {
    do_action( 'applicator_hook_after_main_nav' );
}

// content.php
function applicator_hook_after_post_heading() {
    do_action( 'applicator_hook_after_post_heading' );
}

// content.php
function applicator_hook_after_post_header_aside() {
    do_action( 'applicator_hook_after_post_header_aside' );
}

/*
function x() {
    echo 'xx';
}
add_action( 'applicator_hook_after_post_heading', 'x');
*/